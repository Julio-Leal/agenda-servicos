<header class="page-header">
    <div>
        <h1>Serviços</h1>

        <p>
            Gerencie os serviços cadastrados no estabelecimento.
        </p>
    </div>
</header>

<section class="content-card">

    <div class="content-card__header">
        <div>
            <h2>Serviços cadastrados</h2>

            <p>
                Lista de serviços disponíveis no sistema.
            </p>
        </div>
    </div>

    <?php if (empty($servicos)): ?>

        <div class="empty-state">

            <h3>Nenhum serviço cadastrado</h3>

            <p>
                Ainda não existem serviços cadastrados no sistema.
            </p>

        </div>

    <?php else: ?>

        <div class="table-container">

            <table>

                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Duração</th>
                        <th>Preço</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>

                    <?php foreach ($servicos as $servico): ?>

                        <tr>

                            <td>
                                <?= htmlspecialchars($servico['NOME']) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($servico['DESCRICAO'] ?? '') ?>
                            </td>

                            <td>
                                <?= htmlspecialchars($servico['DURACAO']) ?> min
                            </td>

                            <td>
                                R$ <?= number_format(
                                    (float) $servico['PRECO'],
                                    2,
                                    ',',
                                    '.'
                                ) ?>
                            </td>

                            <td>
                                <?= $servico['ATIVO'] ? 'Ativo' : 'Inativo' ?>
                            </td>

                        </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    <?php endif; ?>

</section>