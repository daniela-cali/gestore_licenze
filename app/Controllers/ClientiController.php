<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ClientiModel;
use App\Models\LicenzeModel;
use CodeIgniter\HTTP\ResponseInterface;

class ClientiController extends BaseController
{

    protected $ClientiModel;
    protected $LicenzeModel;
    public function __construct()
    {
        $this->ClientiModel = new ClientiModel();
        $this->LicenzeModel = new LicenzeModel();
    }

    public function index()
    {


        $data['clienti'] = $this->ClientiModel->getClienti();
        $data['title'] = 'Elenco Clienti';

        return view('clienti/index', $data);
    }

    public function schedaCliente($id)
    {

        $data['cliente'] = $this->ClientiModel->getClientiById($id);
        $data['licenze'] = $this->LicenzeModel->getLicenzeByCliente($id);
        log_message('info', 'Ricevuto ID Cliente: ' . $id);
        log_message('info', 'Dati Cliente: ' . json_encode($data['cliente']));
        log_message('info', 'Dati Licenze: ' . json_encode($data['licenze']));
        $data['title'] = 'Scheda Cliente';

        return view('clienti/scheda_cliente', $data);
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
