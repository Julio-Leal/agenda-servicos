<form
    id="form-cliente"
    data-pagina-retorno="clientes"
    method="POST"
    action="index.php?pagina=clientes&acao=update"
>

    <input
        type="hidden"
        name="id"
        value="<?= htmlspecialchars($cliente['ID']) ?>"
    >

    <div class="form-grid">

        <div class="form-group">
            <label for="nome">Nome</label>

            <input
                type="text"
                id="nome"
                name="nome"
                value="<?= htmlspecialchars($cliente['NOME']) ?>"
                required
            >
        </div>

        <div class="form-group">
            <label for="cpf">CPF</label>

            <input
                type="text"
                id="cpf"
                name="cpf"
                value="<?= htmlspecialchars($cliente['CPF']) ?>"
                required
            >
        </div>

        <div class="form-group">
            <label for="telefone">Telefone</label>

            <input
                type="text"
                id="telefone"
                name="telefone"
                value="<?= htmlspecialchars($cliente['TELEFONE']) ?>"
                required
            >
        </div>

        <div class="form-group">
            <label for="email">E-mail</label>

            <input
                type="email"
                id="email"
                name="email"
                value="<?= htmlspecialchars($cliente['EMAIL']) ?>"
                required
            >
        </div>

        <div class="form-group">
            <label for="data_nascimento">
                Data de nascimento
            </label>

            <input
                type="date"
                id="data_nascimento"
                name="data_nascimento"
                value="<?= htmlspecialchars($cliente['DATA_NASCIMENTO']) ?>"
                required
            >
        </div>

    </div>

    <div class="form-actions">

        <button
            type="button"
            class="secondary-button"
            data-pagina="clientes"
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