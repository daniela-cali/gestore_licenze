<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="bi bi-house-door"></i> Home - MeTe Licenze</h5>
        </div>
        <div class="card-body">
            <p class="lead">Benvenuto nel sistema di gestione licenze.</p>

            <div class="row g-4 mt-3">
                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center">
                            <i class="bi bi-people-fill fs-1 text-primary mb-2"></i>
                            <h6>Clienti</h6>
                            <p class="text-muted small">Visualizza e cerca tutti i clienti registrati.</p>
                            <a href="<?= base_url('/clienti') ?>" class="btn btn-outline-primary btn-sm">
                                Vai ai Clienti
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center">
                            <i class="bi bi-key-fill fs-1 text-success mb-2"></i>
                            <h6>Licenze</h6>
                            <p class="text-muted small">Gestione e visualizzazione licenze attive.</p>
                            <a href="<?= base_url('/licenze') ?>" class="btn btn-outline-success btn-sm">
                                Vai alle Licenze
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body text-center">
                            <i class="bi bi-database-fill-check fs-1 text-warning mb-2"></i>
                            <h6>Test Database</h6>
                            <p class="text-muted small">Verifica connessione e struttura del database.</p>
                            <a href="<?= base_url('/database/info') ?>" class="btn btn-outline-warning btn-sm">
                                Visualizza Tools Database
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?= $this->endSection() ?>
