<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Database;

class GenerateAllowedFields extends BaseCommand
{
    protected $group       = 'Custom';
    protected $name        = 'generate:allowed-fields';
    protected $description = 'Genera l’elenco dei campi per $allowedFields da una tabella DB (escludendo id e <tabella>_id_pk).';

    protected $usage       = 'generate:allowed-fields [schema.tabella|tabella]';
    protected $arguments   = [
        'nome_tabella' => 'Nome della tabella, opzionalmente con schema: schema.tabella'
    ];

    public function run(array $params)
    {
        if (empty($params[0])) {
            CLI::error('Devi specificare il nome della tabella (opzionale schema.tabella).');
            return;
        }

        $input = explode('.', $params[0]);
        $schema = null;
        $tabella = '';

        if (count($input) === 2) {
            [$schema, $tabella] = $input;
        } else {
            $tabella = $input[0];
        }

        $db = Database::connect();

        $sql = "
            SELECT column_name
            FROM information_schema.columns
            WHERE table_name = :table:
        ";

        $paramsQuery = ['table' => $tabella];

        if ($schema) {
            $sql .= " AND table_schema = :schema:";
            $paramsQuery['schema'] = $schema;
        }

        try {
            $query = $db->query($sql, $paramsQuery);
            $rows = $query->getResultArray();
        } catch (\Throwable $e) {
            CLI::error("Errore nel recupero colonne: " . $e->getMessage());
            return;
        }

        if (empty($rows)) {
            CLI::error("Nessun campo trovato nella tabella '{$tabella}'.");
            return;
        }

        $fields = array_column($rows, 'column_name');

        // --- Debug: stampa tutti i campi trovati, con apici per vedere spazi ---
        $fileLog = WRITEPATH . $tabella.'_allowed_fields.log';

        // Scrivo campi trovati su file (sovrascrivo a ogni esecuzione)
        file_put_contents($fileLog, "Campi trovati (con apici):\n");

        foreach ($fields as $f) {
            file_put_contents($fileLog, " - '" . $f . "'\n", FILE_APPEND);
        }

        // Campi da escludere
        $exclude = [
            'id',
            strtolower(trim($tabella) . '_id_pk'),
        ];

        $allowed = array_filter($fields, function($f) use ($exclude) {
            $field = strtolower(trim($f));
            return !in_array($field, $exclude, true);
        });

        // Scrivo lista allowedFields su file
        file_put_contents($fileLog, "\nCopia e incolla questo nel tuo Model:\n", FILE_APPEND);
        file_put_contents($fileLog, "protected \$allowedFields = [\n", FILE_APPEND);

        foreach ($allowed as $campo) {
            file_put_contents($fileLog, "    '{$campo}',\n", FILE_APPEND);
        }

        file_put_contents($fileLog, "];\n\n", FILE_APPEND);

        CLI::write("Output scritto su file: {$fileLog}", 'green');
    }
}
