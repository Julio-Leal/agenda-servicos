<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Agenda de Serviços — Login</title>
    <link rel="stylesheet" href="/assets/css/login.css">

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
                    <h2>Login</h2>
                    <p>Entre na sua conta para continuar.</p>
                </header>

                <form class="login__form" action="" method="POST">

                    <div class="form-group">
                        <label for="email">E-mail</label>
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
                        <label for="password">Senha</label>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Digite sua senha"
                            autocomplete="current-password"
                            required
                        >
                    </div>

                    <div class="login__options">
                        <a href="#">Esqueci minha senha</a>
                    </div>

                    <button type="submit" class="login__button">
                        Entrar
                    </button>

                    <p class="login__register">
                        Não tem uma conta?
                        <a href="#">Criar conta</a>
                    </p>

                </form>

            </div>
        </section>

    </main>
    
</body>
</html>