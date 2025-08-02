<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Clienti extends BaseController
{
    public function index()
    {
        $model = new \App\Models\Clienti();
        $data['clienti'] = $model->getClienti();

        return view('gestione/elenco_clienti', $data);
    }
}
