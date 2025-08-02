<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="bi bi-people"></i> Elenco Clienti</h5>
            <a href="/clienti/crea" class="btn btn-light btn-sm">
                <i class="bi bi-plus-circle"></i> Aggiungi Cliente
            </a>
        </div>
        <div class="card-body">
            <?php $clienti = $data ?? null; ?>
            <?php if (!empty($clienti)): ?>
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Nome</th>
                                <th>Cognome</th>
                                <th>Email</th>
                                <th>Telefono</th>
                                <th>Licenze</th>
                                <th>Azioni</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($clienti as $cliente): ?>
                                <tr>
                                    <td><?= esc($cliente->nome) ?></td>
                                    <td><?= esc($cliente->cognome) ?></td>
                                    <td><?= esc($cliente->email) ?></td>
                                    <td><?= esc($cliente->telefono) ?></td>
                                    <td>
                                        <?php if ($cliente->licenze_attive > 0): ?>
                                            <span class="badge bg-success"><?= $cliente->licenze_attive ?> attive</span>
                                        <?php else: ?>
                                            <span class="badge bg-secondary">Nessuna</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="/clienti/visualizza/<?= $cliente->id ?>" class="btn btn-sm btn-outline-primary" title="Visualizza">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="/clienti/modifica/<?= $cliente->id ?>" class="btn btn-sm btn-outline-secondary" title="Modifica">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a href="/clienti/elimina/<?= $cliente->id ?>" class="btn btn-sm btn-outline-danger" title="Elimina" onclick="return confirm('Eliminare il cliente?')">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php else: ?>
                <div class="alert alert-info">
                    <i class="bi bi-info-circle"></i> Nessun cliente trovato nel database.
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
