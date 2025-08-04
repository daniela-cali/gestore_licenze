<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dettaglio Cliente - Gestore Licenze</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css" rel="stylesheet" />
    <!-- CSS Personalizzato -->
    <link href="<?= base_url('assets/css/custom.css') ?>" rel="stylesheet" />
</head>
<body>
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><i class="bi bi-person-badge"></i> Dettaglio Cliente</h5>
        </div>
        <div class="card-body">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" id="clienteTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="anagrafica-tab" data-bs-toggle="tab" data-bs-target="#anagrafica" type="button" role="tab" aria-controls="anagrafica" aria-selected="true">
                        <i class="bi bi-file-person"></i> Anagrafica
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="licenze-tab" data-bs-toggle="tab" data-bs-target="#licenze" type="button" role="tab" aria-controls="licenze" aria-selected="false">
                        <i class="bi bi-key"></i> Licenze
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="aggiornamenti-tab" data-bs-toggle="tab" data-bs-target="#aggiornamenti" type="button" role="tab" aria-controls="aggiornamenti" aria-selected="false">
                        <i class="bi bi-clock-history"></i> Aggiornamenti
                    </button>
                </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content mt-3" id="clienteTabContent">
                <div class="tab-pane fade show active" id="anagrafica" role="tabpanel" aria-labelledby="anagrafica-tab">
                    <dl class="row">
                        <dt class="col-sm-3">Codice Cliente</dt>
                        <dd class="col-sm-9"><?= esc($cliente->codice_cliente) ?></dd>

                        <dt class="col-sm-3">Nome</dt>
                        <dd class="col-sm-9"><?= esc($cliente->nome) ?></dd>

                        <dt class="col-sm-3">Email</dt>
                        <dd class="col-sm-9"><?= esc($cliente->email) ?></dd>

                        <dt class="col-sm-3">Telefono</dt>
                        <dd class="col-sm-9"><?= esc($cliente->telefono) ?></dd>

                        <dt class="col-sm-3">Città</dt>
                        <dd class="col-sm-9"><?= esc($cliente->citta) ?></dd>

                        <dt class="col-sm-3">Indirizzo</dt>
                        <dd class="col-sm-9"><?= esc($cliente->indirizzo) ?></dd>
                    </dl>
                </div>

                <div class="tab-pane fade" id="licenze" role="tabpanel" aria-labelledby="licenze-tab">
                    <?php if (!empty($licenze)): ?>
                        <ul class="list-group">
                            <?php foreach ($licenze as $licenza): ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <?= esc($licenza->nome_licenza) ?>
                                    <span class="badge bg-primary rounded-pill"><?= esc($licenza->quantita) ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <div class="alert alert-warning">
                            <i class="bi bi-exclamation-triangle"></i> Nessuna licenza associata a questo cliente.
                        </div>
                    <?php endif; ?>
                </div>

                <div class="tab-pane fade" id="aggiornamenti" role="tabpanel" aria-labelledby="aggiornamenti-tab">
                    <?php if (!empty($aggiornamenti)): ?>
                        <ul class="list-group">
                            <?php foreach ($aggiornamenti as $agg): ?>
                                <li class="list-group-item">
                                    <strong><?= esc($agg->data) ?></strong> - <?= esc($agg->descrizione) ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <div class="alert alert-info">
                            <i class="bi bi-info-circle"></i> Nessun aggiornamento disponibile.
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
