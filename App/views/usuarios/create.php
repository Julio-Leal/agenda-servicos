<form
    id="form-usuario"
    data-pagina-retorno="usuarios"
    method="POST"
    action="index.php?pagina=usuarios&acao=store"
>
    <div class="form-grid">

        <div class="form-group">
            <label for="nome">Nome</label>
            <input
                type="text"
                id="nome"
                name="nome"
                maxlength="100"
                required
            >
        </div>

        <div class="form-group">
            <label for="email">E-mail</label>
            <input
                type="email"
                id="email"
                name="email"
                required
            >
        </div>

        <div class="form-group">
            <label for="tipo">Cargo</label>
            <select id="tipo" name="tipo" required>
                <option value="">Selecione</option>
                <option value="GERENTE">Gerente</option>
            </select>
        </div>

        <div class="form-group">
            <label for="senha">Senha</label>
            <input
                type="password"
                id="senha"
                name="senha"
                autocomplete="new-password"
                minlength="6"
                required
            >
        </div>

        <div class="form-group">
            <label for="confirmar-senha">Confirmar senha</label>
            <input
                type="password"
                id="confirmar-senha"
                name="confirmar_senha"
                autocomplete="new-password"
                required
            >
        </div>

    </div>

    <div class="form-actions">
        <button type="submit" class="primary-button">
            Cadastrar usuário
        </button>

        <button
            type="button"
            class="secondary-button"
            data-pagina="usuarios"
        >
            Cancelar
        </button>
    </div>
</form>