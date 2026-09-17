<?php

namespace App\Models;   

class Agendamento {
    private int $id;

    private int $clienteId;
    private int $profissionalId;
    private int $servicoId;

    private string $data;
    private string $hora;
    private string $status;

    private ?string $observacao;
    private string $criadoEm;

    public function __construct(
        int $clienteId,
        int $profissionalId,
        int $servicoId,
        string $data,
        string $hora,
        string $status = 'AGENDADO',
        ?string $observacao = null
    ) {
        $this->clienteId = $clienteId;
        $this->profissionalId = $profissionalId;
        $this->servicoId = $servicoId;
        $this->data = $data;
        $this->hora = $hora;
        $this->status = $status;
        $this->observacao = $observacao;
    }

    public function getId(): ?int
    {
        return $this->id ?? null;
    }

    public function getClienteId(): int
    {
        return $this->clienteId;
    }

    public function setClienteId(int $clienteId): void
    {
        $this->clienteId = $clienteId;
    }

    public function getProfissionalId(): int
    {
        return $this->profissionalId;
    }

    public function setProfissionalId(int $profissionalId): void
    {
        $this->profissionalId = $profissionalId;
    }

    public function getServicoId(): int
    {
        return $this->servicoId;
    }

    public function setServicoId(int $servicoId): void
    {
        $this->servicoId = $servicoId;
    }

    public function getData(): string
    {
        return $this->data;
    }

    public function setData(string $data): void
    {
        $this->data = $data;
    }

    public function getHora(): string
    {
        return $this->hora;
    }

    public function setHora(string $hora): void
    {
        $this->hora = $hora;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function getObservacao(): ?string
    {
        return $this->observacao;
    }

    public function setObservacao(?string $observacao): void
    {
        $this->observacao = $observacao;
    }

    public function getCriadoEm(): ?string
    {
        return $this->criadoEm ?? null;
    }
}
