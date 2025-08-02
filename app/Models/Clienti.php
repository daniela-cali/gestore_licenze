<?php

namespace App\Models;

use CodeIgniter\Model;

class Clienti extends Model
{
    protected $table            = 'nrg.tbana';
    protected $primaryKey       = 'tbana_id_pk';
    
    protected $returnType       = 'array';

    public function getClienti()
    {
        return $this->findAll();
    }


}
