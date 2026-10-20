<header class="page-header">
    <div>
        <h1>Novo serviço</h1>
        <p>
            Cadastre um novo serviço no sistema.
        </p>
    </div>
</header>

<section class="content-card">

    <form
        id="form-servico"
        data-pagina-retorno="servicos"
        method="POST"
        action="index.php?pagina=servicos&acao=store"
    >

        <div class="form-grid">

            <div class="form-group">
                <label for="nome">Nome</label>

                <input
                    type="text"
                    id="nome"
                    name="nome"
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
                    required
                >
            </div>

            <div class="form-group">
                <label for="descricao">Descrição</label>

                <input
                    type="text"
                    id="descricao"
                    name="descricao"
                >
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
                Cadastrar serviço
            </button>

        </div>

    </form>

</section>