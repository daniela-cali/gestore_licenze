<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><i class="bi bi-person-badge"></i> Gestione Cliente</h5>
        </div>
        <div class="card-body">
            <!-- Nav Tabs -->
            <ul class="nav nav-tabs" id="clienteTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="anagrafica-tab" data-bs-toggle="tab" data-bs-target="#anagrafica" type="button" role="tab">
                        <i class="bi bi-person-vcard"></i> Anagrafica
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="licenze-tab" data-bs-toggle="tab" data-bs-target="#licenze" type="button" role="tab">
                        <i class="bi bi-key"></i> Licenze
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="aggiornamenti-tab" data-bs-toggle="tab" data-bs-target="#aggiornamenti" type="button" role="tab">
                        <i class="bi bi-arrow-repeat"></i> Aggiornamenti Licenze
                    </button>
                </li>
            </ul>

            <div class="tab-content pt-4" id="clienteTabsContent">

                <!-- ANAGRAFICA -->
                <div class="tab-pane fade show active" id="anagrafica" role="tabpanel">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Nome</label>
                            <div class="form-control bg-light"><?= esc($cliente->nome) ?></div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Cognome</label>
                            <div class="form-control bg-light"><?= esc($cliente->cognome) ?></div>
                        </div>
                        <!-- Altri campi... -->
                    </div>
                </div>

                <!-- LICENZE (MODIFICA + INSERISCI) -->
                <div class="tab-pane fade" id="licenze" role="tabpanel">
                    <!-- Form Aggiunta Licenza -->
                    <form action="/licenze/crea" method="post" class="mb-4">
                        <input type="hidden" name="cliente_id" value="<?= esc($cliente->id) ?>">
                        <div class="row g-3 align-items-end">
                            <div class="col-md-3">
                                <label class="form-label">Codice</label>
                                <input type="text" name="codice" class="form-control" required>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Prodotto</label>
                                <input type="text" name="prodotto" class="form-control" required>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Attivazione</label>
                                <input type="date" name="attivazione" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Scadenza</label>
                                <input type="date" name="scadenza" class="form-control">
                            </div>
                            <div class="col-md-2 mt-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="attiva" value="1" id="attiva">
                                    <label class="form-check-label" for="attiva">Attiva</label>
                                </div>
                            </div>
                            <div class="col-md-2 mt-2">
                                <button type="submit" class="btn btn-success">
                                    <i class="bi bi-plus-circle"></i> Aggiungi
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Tabella Licenze Esistenti -->
                    <?php if (!empty($licenze)): ?>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Codice</th>
                                    <th>Prodotto</th>
                                    <th>Attivazione</th>
                                    <th>Scadenza</th>
                                    <th>Stato</th>
                                    <th>Azioni</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($licenze as $lic): ?>
                                    <tr>
                                        <td><?= esc($lic->codice) ?></td>
                                        <td><?= esc($lic->prodotto) ?></td>
                                        <td><?= esc($lic->attivazione) ?></td>
                                        <td><?= esc($lic->scadenza) ?></td>
                                        <td>
                                            <?= $lic->attiva ? '<span class="badge bg-success">Attiva</span>' : '<span class="badge bg-secondary">Scaduta</span>' ?>
                                        </td>
                                        <td>
                                            <a href="/licenze/modifica/<?= $lic->id ?>" class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <a href="/licenze/elimina/<?= $lic->id ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Sei sicuro?')">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <div class="alert alert-warning">Nessuna licenza registrata.</div>
                    <?php endif; ?>
                </div>

                <!-- AGGIORNAMENTI LICENZE (MODIFICA + INSERISCI) -->
                <div class="tab-pane fade" id="aggiornamenti" role="tabpanel">
                    <!-- Form Aggiunta Aggiornamento -->
                    <form action="/aggiornamenti/crea" method="post" class="mb-4">
                        <input type="hidden" name="cliente_id" value="<?= esc($cliente->id) ?>">
                        <div class="row g-3 align-items-end">
                            <div class="col-md-4">
                                <label class="form-label">Prodotto</label>
                                <input type="text" name="prodotto" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Descrizione</label>
                                <input type="text" name="descrizione" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Data</label>
                                <input type="date" name="data" class="form-control">
                            </div>
                            <div class="col-md-1">
                                <button type="submit" class="btn btn-success">
                                    <i class="bi bi-plus-circle"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Lista Aggiornamenti -->
                    <?php if (!empty($aggiornamenti)): ?>
                        <ul class="list-group">
                            <?php foreach ($aggiornamenti as $upd): ?>
                                <li class="list-group-item d-flex justify-content-between">
                                    <div>
                                        <strong><?= esc($upd->prodotto) ?></strong><br>
                                        <small class="text-muted"><?= esc($upd->descrizione) ?></small>
                                    </div>
                                    <div class="text-end">
                                        <span class="badge bg-primary"><?= esc($upd->data) ?></span><br>
                                        <a href="/aggiornamenti/modifica/<?= $upd->id ?>" class="btn btn-sm btn-outline-primary mt-1">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a href="/aggiornamenti/elimina/<?= $upd->id ?>" class="btn btn-sm btn-outline-danger mt-1" onclick="return confirm('Eliminare aggiornamento?')">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php else: ?>
                        <div class="alert alert-info">Nessun aggiornamento disponibile.</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
