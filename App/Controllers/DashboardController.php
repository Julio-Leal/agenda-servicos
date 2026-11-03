<?php

namespace App\Controllers;

use App\Repositories\DashboardRepository;

class DashboardController
{
    private DashboardRepository $repository;

    public function __construct()
    {
        $this->repository = new DashboardRepository();
    }

    public function index(): void
    {
        $agendamentosHoje = $this->repository->contarAgendamentos();

        $clientesCadastrados = $this->repository->contarClientesCadastrados();

        $funcionariosAtivos = $this->repository->contarFuncionariosAtivos();

        $servicosAtivos = $this->repository->contarServicosAtivos();

        require __DIR__ . '/../views/layouts/dashboard.php';
    }
}