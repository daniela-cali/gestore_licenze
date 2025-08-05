<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="bi bi-key-fill"></i> <?= esc($title) ?> </h5>
            <a href="<?= base_url('/licenze') ?>" class="btn btn-light btn-sm">
                <i class="bi bi-arrow-left"></i> Torna all'elenco
            </a>
        </div>

        <div class="card-body">
            <form action="<?= base_url('/licenze/salva') ?>" method="post">

                <div class="mb-3">
                    <label for="codice" class="form-label">Codice Licenza</label>
                    <input type="text" name="codice" id="codice" class="form-control" required placeholder="Es. ABC12345">
                </div>

                <div class="mb-3">
                    <label for="descrizione" class="form-label">Descrizione</label>
                    <input type="text" name="descrizione" id="descrizione" class="form-control" rows="3" placeholder="Descrizione della licenza" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="tipologia" class="form-label">Tipologia</label>
                    <select name="tipologia" id="tipologia" class="form-select" required>
                        <option value="">-- Seleziona --</option>
                        <option value="SI">Sigla</option>
                        <option value="VA">VarHub</option>
                        <option value="SK">SKTN</option>
                    </select>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-check-circle"></i> Salva Licenza
                    </button>
                    <a href="<?= base_url('/licenze') ?>" class="btn btn-secondary">Annulla</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
