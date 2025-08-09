<?php

namespace App\Models;

use CodeIgniter\Model;

class LicenzeModel extends Model
{
    protected $table            = 'nrg.tblic';
    protected $primaryKey       = 'tblic_id_pk';
    protected $allowedFields    = [
        'tblic_id_pk',
        'tblic_cd',
        'tblic_tp',
        'tblic_natura',
        'tblic_desc',
        'tblic_tbana_id',
        'tblic_stato'
    ];

    protected $returnType       = 'object';
    /**
     * Genera l'elenco delle licenze
     */
    public function getLicenze()
    {
        return $this->select([
            'tblic_cd as nome_licenza',
            'tblic_id_pk as id',
            'tblic_tp as tipo',
            'tblic_natura as natura',
            'tblic_desc as descrizione',
            'tblic_tbana_id as id_cliente',
            'tblic_stato as stato'

        ])
            ->orderBy('tblic_cd', 'ASC')
            ->findAll();
    }
    
    public function getLicenzeByCliente($id)
    {
        return $this->where('tblic_tbana_id', $id)->findAll();
    }

    public function salva($data)
    {
        log_message('info', 'Ricevo i seguenti dati: ' . json_encode($data));
        $query = $this->query("SELECT nextval('nrg.s_tblic_id') AS next_id");
        $nextId = $query->getRow()->next_id;
        log_message('info', 'e aggiungo il prossimo ID per la licenza: ' . $nextId);
        // Salva i dati della lice nza nel database
        $this->insert([
            'tblic_id_pk' => $nextId,
            'tblic_cd' => $data['tblic_cd'],
            'tblic_desc' => $data['tblic_desc'],
            'tblic_tp' => $data['tblic_tp'],
            'tblic_stato' => 't', // Imposta lo stato iniziale come attivo
        ], true);

        return $this->getInsertID(); // Restituisce l'ID della nuova licenza

    }
}
