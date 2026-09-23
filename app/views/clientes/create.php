<header class="page-header">
    <div>
        <h1>Novo cliente</h1>
        <p>
            Cadastre um novo cliente no sistema.
        </p>
    </div>
</header>

<section class="content-card">
    <div class="content-card__header">
        <h2>Dados do cliente</h2>
        <p>
            Preencha os dados abaixo para cadastrar o cliente.
        </p>
    </div>

    <form id="form-cliente" method="POST" action="index.php?pagina=clientes&acao=store">
        <div class="form-grid">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="cpf">CPF</label>
                <input type="text" id="cpf" name="cpf" required>
            </div>
            <div class="form-group">
                <label for="telefone">Telefone</label>
                <input type="text" id="telefone" name="telefone" required>
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="data_nascimento">Data de nascimento</label>
                <input type="date" id="data_nascimento" name="data_nascimento" required>
            </div>
        </div>
        <div class="form-actions">
            <button type="button" class="secondary-button" data-pagina="clientes">Cancelar</button>
            <button type="submit" class="primary-button">Cadastrar cliente</button>
        </div>
    </form>
</section>