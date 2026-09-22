<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>AgendaPro — Painel</title>

    <link rel="stylesheet" href="/public/assets/css/reset.css">
    <link rel="stylesheet" href="/public/assets/css/dashboard.css">
</head>

<body class="dashboard-page">

    <div class="dashboard-layout">

        <!-- Menu lateral -->
        <aside class="sidebar" aria-label="Menu principal">

            <div class="sidebar__brand">
                <div class="brand__icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none">
                        <rect x="4" y="3" width="16" height="18" rx="3"></rect>
                        <path d="M8 3v4M16 3v4M4 9h16"></path>
                        <path d="M8 13h3M8 17h3M14 13h2M14 17h2"></path>
                    </svg>
                </div>

                <span class="brand__name">AgendaPro</span>
            </div>

            <nav class="sidebar__nav">

                <a href="#" class="nav-item nav-item--active" data-pagina="dashboard">
                    <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <rect x="4" y="4" width="6" height="6" rx="1"></rect>
                        <rect x="14" y="4" width="6" height="6" rx="1"></rect>
                        <rect x="4" y="14" width="6" height="6" rx="1"></rect>
                        <rect x="14" y="14" width="6" height="6" rx="1"></rect>
                    </svg>
                    <span>Dashboard</span>
                </a>

                <a href="#" class="nav-item" data-pagina="agenda">
                    <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <rect x="4" y="5" width="16" height="15" rx="2"></rect>
                        <path d="M8 3v4M16 3v4M4 10h16"></path>
                    </svg>
                    <span>Agenda</span>
                </a>

                <a href="#" class="nav-item" data-pagina="servicos">
                    <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <rect x="5" y="4" width="14" height="17" rx="2"></rect>
                        <path d="M9 4v3M15 4v3M5 10h14"></path>
                        <path d="M9 14h2M13 14h2M9 17h2M13 17h2"></path>
                    </svg>
                    <span>Serviços</span>
                </a>

                <a href="#" class="nav-item" data-pagina="profissionais">
                    <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M16 20v-1.5a4 4 0 0 0-4-4H7a4 4 0 0 0-4 4V20"></path>
                        <circle cx="9.5" cy="7" r="3"></circle>
                        <path d="M17 11a3 3 0 1 0-1-5.83"></path>
                        <path d="M21 20v-1.5a4 4 0 0 0-3-3.87"></path>
                    </svg>
                    <span>Profissionais</span>
                </a>

                <a href="#" class="nav-item" data-pagina="clientes">
                    <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <circle cx="12" cy="8" r="3"></circle>
                        <path d="M5 20a7 7 0 0 1 14 0"></path>
                    </svg>
                    <span>Clientes</span>
                </a>

                <a href="#" class="nav-item" data-pagina="configuracoes">
                    <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <circle cx="12" cy="12" r="3"></circle>
                        <path d="M19.4 15a1.7 1.7 0 0 0 .34 1.88l.06.06-1.7 1.7-.06-.06a1.7 1.7 0 0 0-1.88-.34 1.7 1.7 0 0 0-1.03 1.56V20h-2.4v-.2a1.7 1.7 0 0 0-1.03-1.56 1.7 1.7 0 0 0-1.88.34l-.06.06-1.7-1.7.06-.06A1.7 1.7 0 0 0 8.46 15a1.7 1.7 0 0 0-1.56-1.03H6.7v-2.4h.2A1.7 1.7 0 0 0 8.46 10a1.7 1.7 0 0 0-.34-1.88l-.06-.06 1.7-1.7.06.06a1.7 1.7 0 0 0 1.88.34A1.7 1.7 0 0 0 12.73 5.2V5h2.4v.2a1.7 1.7 0 0 0 1.03 1.56 1.7 1.7 0 0 0 1.88-.34l.06-.06 1.7 1.7-.06.06A1.7 1.7 0 0 0 19.4 10c.16.62.72 1.03 1.36 1.03h.2v2.4h-.2A1.7 1.7 0 0 0 19.4 15Z"></path>
                    </svg>
                    <span>Configurações</span>
                </a>

            </nav>

            <div class="sidebar__footer">
                <button type="button" class="logout-button">
                    <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M10 17l5-5-5-5"></path>
                        <path d="M15 12H3"></path>
                        <path d="M13 4h6a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2h-6"></path>
                    </svg>
                    <span>Sair</span>
                </button>
            </div>

        </aside>


        <!-- Área principal -->
        <div class="dashboard-main">

            <!-- Cabeçalho -->
            <header class="topbar">

                <div class="topbar__search">
                    <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <circle cx="11" cy="11" r="6"></circle>
                        <path d="m16 16 4 4"></path>
                    </svg>

                    <input
                        type="search"
                        placeholder="Buscar..."
                        aria-label="Buscar"
                    >
                </div>

                <div class="topbar__user">
                    <button type="button" class="notification-button" aria-label="Notificações">
                        <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M18 9a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9"></path>
                            <path d="M10 21h4"></path>
                        </svg>
                    </button>

                    <div class="user-avatar" aria-hidden="true">CS</div>

                    <div class="user-info">
                        <strong>Clínica Solis</strong>
                        <span>Administrador</span>
                    </div>
                </div>

            </header>


            <!-- Conteúdo que será trocado pela SPA futuramente -->
            <main id="conteudo" class="dashboard-content">

                

            </main>

        </div>

    </div>
    <script src="assets/js/app.js"></script>
</body>
</html>
