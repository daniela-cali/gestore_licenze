<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class LicenzeController extends BaseController
{
    protected $LicenzeModel;
    protected $ClientiModel;
    public function __construct()
    {
        $this->LicenzeModel = new \App\Models\LicenzeModel();
        $this->ClientiModel = new \App\Models\ClientiModel();
    }

    public function index()
    {   
        $data['licenze'] = $this->LicenzeModel->getLicenze();
        $data['title'] = 'Elenco Licenze';

        return view('licenze/index', $data);
    }
    
    /**public function creaByIdCliente($idCliente = null)
    {
        // Se $idCliente è fornito, puoi usarlo per precompilare il campo id_cliente nel form
        $data['id_cliente'] = $idCliente;

        // Passa i dati alla vista
        $data['title'] = 'Crea Licenza per IDCliente ' . esc($idCliente);

    
       return view('licenze/crea', $data);
    }**/

    public function crea($idCliente = null)
    {
        // Se $idCliente è fornito, puoi usarlo per precompilare il campo id_cliente nel form
        $data['id_cliente'] = $idCliente;

        // Se non hai un ID cliente, puoi gestire la logica di creazione della licenza senza ID cliente
        if ($idCliente === null) {
            $data['title'] = 'Crea Licenza SENZA IDCliente';
        } else {
            $data['title'] = 'Crea Licenza per IDCliente ' . esc($idCliente);
        }
        
       return view('licenze/crea', $data);
    }
    public function salva($idCliente = null)
    {
        // Logica per salvare la licenza
        // Puoi usare $this->request->getPost() per ottenere i dati dal form
        // E poi salvare i dati nel database usando il modello LicenzeModel
        $data = [
            'tblic_tbana_id' => $idCliente, // Se $idCliente è fornito, lo usiamo
            'tblic_cd' => $this->request->getPost('codice'),
            'tblic_desc' => $this->request->getPost('descrizione'),
            'tblic_tp' => $this->request->getPost('tipologia'),
        ];
        $this->LicenzeModel->salva($data, true); 
        // Redirect o mostra un messaggio di successo
        return redirect()->to('/licenze');
    }   

    public function modifica($id)
    {
        // Logica per modificare una licenza
        // Puoi usare $this->request->getPost() per ottenere i dati dal form
        // E poi aggiornare i dati nel database usando il modello LicenzeModel
        log_message('info', 'Modifica licenza con ID: ' . $id);
        log_message('info', 'Dati ricevuti: ' . json_encode($this->request->getPost()));
        $data = [
            'tblic_cd' => $this->request->getPost('codice'),
            'tblic_desc' => $this->request->getPost('descrizione'),
            'tblic_tp' => $this->request->getPost('tipologia'),
        ];
        log_message('info', 'Dati da salvare: ' . json_encode($data));
        //$this->LicenzeModel->update($id, $data);
        // Redirect o mostra un messaggio di successo
        return redirect()->to('/licenze');
    }
    public function elimina($id)
    {
        // Logica per eliminare una licenza
        $this->LicenzeModel->delete($id);
        // Redirect o mostra un messaggio di successo
        return redirect()->to('/licenze');
    }
    public function visualizza($id)
    {
        // Logica per visualizzare i dettagli di una licenza
        $data['licenza'] = $this->LicenzeModel->find($id);
        if (!$data['licenza']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Licenza non trovata');
        }
        $data['title'] = 'Dettagli Licenza ' . esc($data['licenza']->tblic_cd);

        return view('licenze/visualizza', $data);
    }
    public function jsonByLicenza($idLicenza)
{
    $aggModel = new \App\Models\AggiornamentiModel();
    $aggiornamenti = $aggModel->getByLicenza($idLicenza);

    return $this->response->setJSON($aggiornamenti);
}
}
