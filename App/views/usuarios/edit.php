<header class="page-header">
    <div>
        <h1>Editar usuário</h1>
        <p>Atualize os dados do usuário.</p>
    </div>
</header>

<section class="content-card">

    <form
        id="form-usuario"
        data-pagina-retorno="usuarios"
        method="POST"
        action="index.php?pagina=usuarios&acao=update"
    >

        <input
            type="hidden"
            name="id"
            value="<?= (int) $usuario['ID'] ?>"
        >

        <div class="form-grid">

            <div class="form-group">
                <label for="nome">Nome</label>
                <input
                    type="text"
                    id="nome"
                    name="nome"
                    maxlength="100"
                    value="<?= htmlspecialchars($usuario['NOME']) ?>"
                    required
                >
            </div>

            <div class="form-group">
                <label for="email">E-mail</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="<?= htmlspecialchars($usuario['EMAIL']) ?>"
                    required
                >
            </div>

            <div class="form-group">
                <label for="tipo">Cargo</label>
                <select id="tipo" name="tipo" required>
                    <option value="GERENTE"
                        <?= $usuario['TIPO'] === 'GERENTE' ? 'selected' : '' ?>>
                        Gerente
                    </option>
                </select>
            </div>

            <div class="form-group">
                <label for="senha">Nova senha (opcional)</label>
                <input
                    type="password"
                    id="senha"
                    name="senha"
                    autocomplete="new-password"
                    minlength="6"
                >
            </div>

        </div>

        <div class="form-actions">

            <button
                type="button"
                class="secondary-button"
                data-pagina="usuarios"
            >
                Cancelar
            </button>

            <button type="submit" class="primary-button">
                Salvar alterações
            </button>

        </div>

    </form>

</section>