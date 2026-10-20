<header class="page-header">
    <div>
        <h1>Profissionais</h1>
        <p>
            Gerencie os profissionais que realizam os serviços do estabelecimento.
        </p>
    </div>

    <button
        type="button"
        class="primary-button"
        data-pagina="profissionais-create"
    >
        + Novo profissional
    </button>
</header>

<section class="content-card">

    <div class="content-card__header">
        <div>
            <h2>Profissionais cadastrados</h2>
            <p>
                Lista de profissionais disponíveis no sistema.
            </p>
        </div>
    </div>

    <?php if (empty($profissionais)): ?>

        <div class="empty-state">
            <h3>Nenhum profissional cadastrado</h3>
            <p>
                Ainda não existem profissionais cadastrados no sistema.
            </p>
        </div>

    <?php else: ?>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>E-mail</th>
                        <th>Especialidade</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($profissionais as $profissional): ?>
                        <tr>
                            <td><?= htmlspecialchars($profissional['NOME']) ?></td>
                            <td><?= htmlspecialchars($profissional['TELEFONE'] ?? '') ?></td>
                            <td><?= htmlspecialchars($profissional['EMAIL'] ?? '') ?></td>
                            <td><?= htmlspecialchars($profissional['ESPECIALIDADE'] ?? '') ?></td>
                            <td><?= $profissional['ATIVO'] ? 'Ativo' : 'Inativo' ?></td>
                            <td>
                                <button
                                    type="button"
                                    class="secondary-button"
                                    data-pagina="profissionais-edit"
                                    data-id="<?= $profissional['ID'] ?>"
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
