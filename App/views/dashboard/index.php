<header class="page-header">
    <div>
        <h1>Dashboard</h1>
        <p>Visão geral do seu estabelecimento.</p>
    </div>

    <button type="button" class="primary-button">
        + Novo agendamento
    </button>
</header>

<section class="stats-grid" aria-label="Resumo">

    <article class="stat-card">
        <span class="stat-card__label">Agendamentos hoje</span>
        <strong class="stat-card__value">12</strong>
        <span class="stat-card__description">3 aguardando confirmação</span>
    </article>

    <article class="stat-card">
        <span class="stat-card__label">Clientes</span>
        <strong class="stat-card__value">248</strong>
        <span class="stat-card__description">Clientes cadastrados</span>
    </article>

    <article class="stat-card">
        <span class="stat-card__label">Serviços ativos</span>
        <strong class="stat-card__value">16</strong>
        <span class="stat-card__description">Disponíveis para agendamento</span>
    </article>

    <article class="stat-card">
        <span class="stat-card__label">Funcionários</span>
        <strong class="stat-card__value">8</strong>
        <span class="stat-card__description">Profissionais cadastrados</span>
    </article>

</section>

<section class="content-card">
    <div class="content-card__header">
        <div>
            <h2>Próximos agendamentos</h2>
            <p>Confira os atendimentos programados.</p>
        </div>

        <a href="#" class="text-link">Ver agenda</a>
    </div>

    <div class="empty-state">
        <div class="empty-state__icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none">
                <rect x="4" y="5" width="16" height="15" rx="2"></rect>
                <path d="M8 3v4M16 3v4M4 10h16"></path>
            </svg>
        </div>

        <h3>Área preparada para a agenda</h3>
        <p>
            Nesta área vamos exibir os agendamentos vindos do banco de dados.
        </p>
    </div>
</section>