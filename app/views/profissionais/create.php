<header class="page-header">
    <div>
        <h1>Novo profissional</h1>
        <p>
            Cadastre um profissional que poderá realizar serviços no sistema.
        </p>
    </div>
</header>

<section class="content-card">

    <form
        id="form-profissional"
        data-pagina-retorno="profissionais"
        method="POST"
        action="index.php?pagina=profissionais&acao=store"
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
                <label for="telefone">Telefone</label>
                <input
                    type="text"
                    id="telefone"
                    name="telefone"
                    placeholder="(00) 00000-0000"
                >
            </div>

            <div class="form-group">
                <label for="email">E-mail</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                >
            </div>

            <div class="form-group">
                <label for="especialidade">Especialidade</label>
                <input
                    type="text"
                    id="especialidade"
                    name="especialidade"
                    placeholder="Ex.: Cabeleireiro"
                >
            </div>

        </div>

        <div class="form-actions">
            <button
                type="button"
                class="secondary-button"
                data-pagina="profissionais"
            >
                Cancelar
            </button>

            <button
                type="submit"
                class="primary-button"
            >
                Cadastrar profissional
            </button>
        </div>

    </form>

</section>
