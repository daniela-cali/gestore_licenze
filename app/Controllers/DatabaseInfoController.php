<?php
// app/Controllers/DatabaseInfoController.php
namespace App\Controllers;

class DatabaseInfoController extends BaseController
{
    public function index()
    {
        try {
            $db = \Config\Database::connect();
            
            // Test connessione e codifica
            $query = $db->query("
                SELECT 
                    current_database() as db_name,
                    pg_encoding_to_char(encoding) as encoding,
                    datcollate as collation,
                    datctype as ctype
                FROM pg_database 
                WHERE datname = current_database()
            ");
            
            $result = $query->getRow();
            
            return view('database/db_test', ['db_info' => $result]);
            
        } catch (\Exception $e) {
            // Passa l'errore alla view
            return view('database/db_test', ['error' => $e->getMessage()]);
        }
    }

    public function getTableFields($tableName)
    {
        try {
            log_message('info', 'Richiesta campi per la tabella: ' . $tableName);
            $db = \Config\Database::connect();
            $schema = env('database.default.schema', 'public');
            
            $query = $db->query("
                SELECT column_name, data_type, is_nullable, column_default
                FROM information_schema.columns 
                WHERE table_name = ? AND table_schema = ?
                ORDER BY ordinal_position
            ", [$tableName, $schema]);
            $result = $query->getResultArray();
            log_message('info', 'Ho eseguito la query per ottenere i campi della tabella: ' . $tableName);
            //log_message('info', 'Risultato: ' . print_r($result, true));
            $allowedFields = [];
            foreach ($result as $key => $value) {
                $allowedFields[] = $value['column_name'];
            }

            log_message('info', 'Campi consentiti: ' . print_r($allowedFields, true));
            return view('database/db_fields', ['fields' => $result, 'table_name' => $tableName, 'allowed_fields' => $allowedFields]);
            
        } catch (\Exception $e) {
            log_message('error', 'Errore nel recupero campi: ' . $e->getMessage());
            return view('database/db_fields', ['error' => $e->getMessage()]);
        }
    }

    public function info()
    {
        try {
            $db = \Config\Database::connect();
            $schema = env('database.default.schema', 'public');
            
            // Ottieni informazioni database
            $db_info = $db->query("
                SELECT 
                    current_database() as db_name,
                    pg_encoding_to_char(encoding) as encoding,
                    datcollate as collation,
                    datctype as ctype
                FROM pg_database 
                WHERE datname = current_database()
            ")->getRow();
            
            // Tabelle dello schema
            $tables = $db->query("
                SELECT tablename 
                FROM pg_tables 
                WHERE schemaname = ? 
                ORDER BY tablename
            ", [$schema])->getResult();
            
            // Struttura tbana
            $columns_tbana = $db->query("
                SELECT column_name, data_type, is_nullable, column_default
                FROM information_schema.columns 
                WHERE table_name = 'tbana' 
                AND table_schema = ?
                ORDER BY ordinal_position
            ", [$schema])->getResult();
            
            // Struttura tblic
            $columns_tblic = $db->query("
                SELECT column_name, data_type, is_nullable, column_default
                FROM information_schema.columns 
                WHERE table_name = 'tblic' 
                AND table_schema = ?
                ORDER BY ordinal_position
            ", [$schema])->getResult();
            
            $data = [
                'db_info' => $db_info,
                'schema' => $schema,
                'tables' => $tables,
                'columns_ana' => $columns_tbana,
                'columns_lic' => $columns_tblic, 
            ];
            
            return view('database/db_info', $data);
            
        } catch (\Exception $e) {
            return view('database/db_test', ['error' => $e->getMessage()]);
        }
    }
}