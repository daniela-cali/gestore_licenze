<?php

namespace App\Models;

use CodeIgniter\Model;

class AggiornamentiModel extends Model
{
    protected $table            = 'nrg.tblicagg';
    protected $primaryKey       = 'tblicagg_id_pk';
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields = ['tblicagg_id_pk', 
                                'tblicagg_tblic_id', 
                                'tblicagg_versione', 
                                'tblicagg_tblicvers_id', 
                                'tblicagg_note', 
                                'tblicagg_dt_agg', 
                                'tblicagg_stato', 
                                'tblicagg_dtvar', 
                                'tblicagg_tyute_id', 
                                'tblicagg_tyazi_id', 
                                'tblicagg_tbdep_id', 
                                ];



    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    function getByLicenza($id_licenza)
    {
        log_message('info', 'AggiornamentiModel::getByLicenza - ID Licenza: ' . $id_licenza);
        return $this->where('tblicagg_tblic_id', $id_licenza)
            ->orderBy('tblicagg_dt_agg', 'DESC')
            ->findAll();
    }
    
}
