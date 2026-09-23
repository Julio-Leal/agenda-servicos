<header class="page-header">
    <div>
        <h1>Clientes</h1>
        <p>
            Gerencie os clientes cadastrados no estabelecimento.
        </p>
    </div>
    <button type="button" class="primary-button" data-pagina="clientes-create">
        + Novo cliente
    </button>
</header>

<section class="content-card">
    <div class="content-card__header">
        <div>
            <h2>Clientes cadastrados</h2>
            <p>
                Lista de clientes do sistema. 
            </p>
        </div>
    </div>

    <?php if(empty($clientes)): ?>
        <div class="empty-state">
            <div class="empty-state__icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none">
                    <circle cx="12" cy="8" r="3"></circle>
                    <path d="M5 20a7 7 0 0 1 14 0"></path>
                </svg>
            </div>
            <h3>Nenhum cliente cadastrado</h3>
            <p>
                Ainda não existem clientes cadastrados no sistema.
            </p>
        </div>
    <?php else: ?>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Telefone</th>
                        <th>E-mail</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($clientes as $cliente): ?>
                        <tr>
                            <td>
                                <?= htmlspecialchars($cliente['NOME']) ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($cliente['CPF']) ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($cliente['TELEFONE']) ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($cliente['EMAIL']) ?>
                            </td>
                            <td>
                                <button
                                    type="button"
                                    class="secondary-button"
                                    data-pagina="clientes-edit"
                                    data-id="<?= $cliente['ID'] ?>"
                                >
                                    Editar
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</section>