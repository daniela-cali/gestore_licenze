<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClientiModel;
use CodeIgniter\HTTP\ResponseInterface;

class ClientiController extends BaseController
{
    protected $ClientiModel;
    public function __construct()
    {
        $this->ClientiModel = new ClientiModel();
    }

    public function index()
    {


        $data['clienti'] = $this->ClientiModel->getClienti();
        $data['title'] = 'Elenco Clienti';

        return view('gestione/elenco_clienti', $data);
    }

    public function licenze()
    {

        $data['clienti'] = $this->ClientiModel->getClienti();
        $data['title'] = 'Elenco Clienti';

        return view('gestione/elenco_clienti_bss', $data);
    }
}

/*
tbana_ragsoc1
tbana_indirizzo1
tbana_citta
tbana_cap
tbana_provincia
tbana_telefono1
*/
