<?php

namespace App\Models;

class Dashboard {

    private int $agendamentosHoje;
    private int $clientesAtivos;
    private float $faturamentoMensal;
    private int $funcionarios;

    public function __construct(
        int $agendamentosHoje,
        int $clientesAtivos,
        float $faturamentoMensal,
        int $funcionarios
    ) {
        $this->agendamentosHoje = $agendamentosHoje;
        $this->clientesAtivos = $clientesAtivos;
        $this->faturamentoMensal = $faturamentoMensal;
        $this->funcionarios = $funcionarios;
    }

    public function getAgendamentosHoje(): ?int 
    {
        return $this->agendamentosHoje ?? null;
    }

    public function setAgendamentosHoje(int $agendamentosHoje): void
    {
        $this->agendamentosHoje = $agendamentosHoje;
    }

    public function getClientesAtivos(): ?int 
    {
        return $this->clientesAtivos ?? null;
    }

    public function setClientesAtivos(int $clientesAtivos): void
    {
        $this->clientesAtivos = $clientesAtivos;
    }

    public function getFaturamentoMensal(): ?float 
    {
        return $this->faturamentoMensal ?? null;
    }

    public function setFaturamentoMensal(float $faturamentoMensal): void 
    {
        $this->faturamentoMensal = $faturamentoMensal;
    }

    public function getFuncionarios(): ?int 
    {
        return $this->funcionarios ?? null;
    }

    public function setFuncionarios(int $funcionarios): void 
    {
        $this->funcionarios = $funcionarios;
    }
}
?>