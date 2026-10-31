<header class="page-header">
    <div>
        <h1>Novo usuário</h1>
        <p>
            Cadastre um novo usuário no sistema.
        </p>
    </div>
</header>

<section class="content-card">
    <div class="content-card__header">
        <h2>Dados do usuário</h2>
        <p>
            Preencha os dados abaixo para cadastrar o usuário.
        </p>
    </div>  
    <form 
        id="form-usuario"
        data-pagina-retorno="usuarios"
        method="POST"
        action="index.php?pagina=usuarios&acao=store" //implementar...
    >
        <div class="form-grid"> 
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha</label>
                <input 
                    type="password" 
                    id="senha" 
                    name="senha" 
                    placeholder="Cria uma senha de 6 dígitos" 
                    autocomplete="current-password" 
                    required
                >
            </div>
            <div class="form-group">
                <label for="confirmar-senha">Confirmar senha</label>
                <input 
                    type="password" 
                    id="confirmar-senha" 
                    name="confirmar-senha" 
                    placeholder="Repita a senha criada" 
                    autocomplete="new-password" 
                    required
                >
            </div>
            <button type="submit" class="criar-conta__button">
                Criar conta
            </button>
        </div>
    </form>
</section>