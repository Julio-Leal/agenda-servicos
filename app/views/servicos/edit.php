<header class="page-header">
    <div>
        <h1>Editar serviço</h1>
        <p>
            Altere os dados do serviço cadastrado.
        </p>
    </div>
</header>

<section class="content-card">

    <form
        id="form-servico"
        method="POST"
        action="index.php?pagina=servicos&acao=update"
    >

        <input
            type="hidden"
            name="id"
            value="<?= htmlspecialchars($servico['ID']) ?>"
        >

        <div class="form-grid">

            <div class="form-group">
                <label for="nome">Nome</label>

                <input
                    type="text"
                    id="nome"
                    name="nome"
                    value="<?= htmlspecialchars($servico['NOME']) ?>"
                    required
                >
            </div>

            <div class="form-group">
                <label for="duracao">Duração (minutos)</label>

                <input
                    type="number"
                    id="duracao"
                    name="duracao"
                    min="1"
                    value="<?= htmlspecialchars($servico['DURACAO']) ?>"
                    required
                >
            </div>

            <div class="form-group">
                <label for="preco">Preço</label>

                <input
                    type="number"
                    id="preco"
                    name="preco"
                    min="0"
                    step="0.01"
                    value="<?= htmlspecialchars($servico['PRECO']) ?>"
                    required
                >
            </div>

            <div class="form-group">
                <label for="descricao">Descrição</label>

                <input
                    type="text"
                    id="descricao"
                    name="descricao"
                    value="<?= htmlspecialchars($servico['DESCRICAO'] ?? '') ?>"
                >
            </div>

            <div class="form-group">
                <label for="ativo">Status</label>

                <select
                    id="ativo"
                    name="ativo"
                >
                    <option
                        value="1"
                        <?= $servico['ATIVO'] ? 'selected' : '' ?>
                    >
                        Ativo
                    </option>

                    <option
                        value="0"
                        <?= !$servico['ATIVO'] ? 'selected' : '' ?>
                    >
                        Inativo
                    </option>
                </select>
            </div>

        </div>

        <div class="form-actions">

            <button
                type="button"
                class="secondary-button"
                data-pagina="servicos"
            >
                Cancelar
            </button>

            <button
                type="submit"
                class="primary-button"
            >
                Salvar alterações
            </button>

        </div>

    </form>

</section>