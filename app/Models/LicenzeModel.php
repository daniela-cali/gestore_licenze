<?php

namespace App\Models;

use CodeIgniter\Model;

class LicenzeModel extends Model
{
    protected $table            = 'nrg.tblic';
    protected $primaryKey       = 'tblic_id_pk';
    
    protected $returnType       = 'object';

public function getClienti()
{
    return $this->select([
            'tblic_cd as codice_licenza',
            'tblic_id_pk as id',
            'tblic_tp as tipo',
            'tblic_natura as natura',
            'tblic_desc as descrizione',
            'tblic_tbana_id as id_cliente',

        ])
        ->orderBy('tbana_ragsoc1', 'ASC')
        ->where('tbcf_tp', 'C')
        ->findAll();
}


}
