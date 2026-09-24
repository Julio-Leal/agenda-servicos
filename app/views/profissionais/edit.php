<header class="page-header">
    <div>
        <h1>Editar profissional</h1>
        <p>
            Altere os dados do profissional cadastrado.
        </p>
    </div>
</header>

<section class="content-card">

    <form
        id="form-profissional"
        data-pagina-retorno="profissionais"
        method="POST"
        action="index.php?pagina=profissionais&acao=update"
    >

        <input
            type="hidden"
            name="id"
            value="<?= htmlspecialchars($profissional['ID']) ?>"
        >

        <div class="form-grid">

            <div class="form-group">
                <label for="nome">Nome</label>
                <input
                    type="text"
                    id="nome"
                    name="nome"
                    value="<?= htmlspecialchars($profissional['NOME']) ?>"
                    required
                >
            </div>

            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input
                    type="text"
                    id="telefone"
                    name="telefone"
                    value="<?= htmlspecialchars($profissional['TELEFONE'] ?? '') ?>"
                    placeholder="(00) 00000-0000"
                >
            </div>

            <div class="form-group">
                <label for="email">E-mail</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="<?= htmlspecialchars($profissional['EMAIL'] ?? '') ?>"
                >
            </div>

            <div class="form-group">
                <label for="especialidade">Especialidade</label>
                <input
                    type="text"
                    id="especialidade"
                    name="especialidade"
                    value="<?= htmlspecialchars($profissional['ESPECIALIDADE'] ?? '') ?>"
                >
            </div>

            <div class="form-group">
                <label for="ativo">Status</label>
                <select id="ativo" name="ativo">
                    <option value="1" <?= $profissional['ATIVO'] ? 'selected' : '' ?>>
                        Ativo
                    </option>
                    <option value="0" <?= !$profissional['ATIVO'] ? 'selected' : '' ?>>
                        Inativo
                    </option>
                </select>
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
                Salvar alterações
            </button>
        </div>

    </form>

</section>
