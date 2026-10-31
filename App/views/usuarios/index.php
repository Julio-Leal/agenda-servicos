<header class="page-header">
    <div>
        <h1>Usuarios</h1>
        <p>
            Gerencie os usuarios cadastrados no estabelecimento.
        </p>
    </div>
    <button type="button" class="primary-button" data-pagina="usuarios-create">
        + Novo usuario
    </button>
</header>
<section class="content-card">
    <div class="content-card__header">
        <div>
            <h2>Usuarios cadastrados</h2>
            <p>
                Lista de usuarios do sistema.
            </p>
        </div>
    </div>
    <?php if(empty($usuarios)): ?>
        <div class="empty-state">
            <div class="empty-state__icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none">
                    <circle cx="12" cy="8" r="3"></circle>
                    <path d="M5 20a7 7 0 0 1 14 0"></path>
                </svg>
            </div>
            <h3>Nenhum usuario cadastrado</h3>
            <p>
                Ainda não existem usuarios cadastrados no sistema
            </p>
        </div>
    <?php else: ?>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Tipo</th>
                        <th>Açoes</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($usuarios as $usuario): ?>
                        <tr>
                            <td>
                                <?= htmlspecialchars($usuario['NOME']) ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($usuario['EMAIL']) ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($usuario['TIPO']) ?>
                            </td>
                            <td>
                                <button
                                    type="button"
                                    class="secondary-button"
                                    data-pagina="usuarios-edit"
                                    data-id="<?= $usuario['ID'] ?>"
                                >
                                    Editar
                                </button>
                                <button
                                    type="button"
                                    class="secondary-button"
                                    data-acao="excluir-usuario"
                                    data-id="<?= $usuario['ID'] ?>"
                                >
                                    Excluir
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</section>