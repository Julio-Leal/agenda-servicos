<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Agenda de Serviços — Cadastro</title>

    <link rel="stylesheet" href="login.css">
</head>

<body>

    <main class="login-page">

        <!-- Apresentação -->
        <section class="hero" aria-label="Apresentação">
            <div class="hero__content">

                <div class="hero__logo">
                    <img src="" alt="Logo Agenda de Serviços">
                    <h1>Agenda de Serviços</h1>
                </div>

                <div class="hero__description">
                    <h2>Simplifique seus agendamentos</h2>

                    <p>
                        A plataforma mais completa para gerenciar seus serviços,
                        colaboradores e clientes em um só lugar.
                    </p>
                </div>

                <div class="hero__tags" aria-label="Características da plataforma">
                    <span class="tag">Rápido</span>
                    <span class="tag">Profissional</span>
                    <span class="tag">Seguro</span>
                    <span class="tag">Automático</span>
                </div>

            </div>
        </section>


        <!-- Login -->
        <section class="login" aria-label="Área de login">
            <div class="login__content">

                <header class="login__header">
                    <h2>Crie sua conta</h2>
                    <p>Comece a gerenciar sua agenda em poucos minutos.</p>
                </header>

                <form class="login__form" action="" method="POST">
                    <div class="form-group">
                        <label for="email">Nome completo <span>*</span></label>
                        <input
                            type="text"
                            id="nome"
                            name="nome"
                            placeholder="Ex: João Silva"
                            autocomplete="name"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail <span>*</span></label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="Digite seu e-mail"
                            autocomplete="email"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="email">Telefone <span>*</span></label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="(11) 99999-9999"
                            autocomplete="email"
                            required
                        >
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Senha <span>*</span></label>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Crie uma senha forte"
                            autocomplete="current-password"
                            required
                        >
                    </div>

                    <div class="form-group">
                        <label for="password">Confirmar senha <span>*</span></label>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Repita a senha criada"
                            autocomplete="current-password"
                            required
                        >
                    </div>

                    <button type="submit" class="login__button">
                        Criar conta
                    </button>

                    <p class="login__register">
                        Já tenho uma conta?
                        <a href="#">Entrar</a>
                    </p>

                </form>

            </div>
        </section>

    </main>

</body>
</html>