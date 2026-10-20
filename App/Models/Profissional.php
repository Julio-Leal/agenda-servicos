<?php

namespace App\Models;

class Profissional {
    private int $id;
    private string $nome;
    private ?string $telefone;
    private ?string $email;
    private ?string $especialidade;
    private bool $ativo;
    private string $criadoEm;

    public function __construct(
        string $nome,
        ?string $telefone = null,
        ?string $email = null,
        ?string $especialidade = null,
        bool $ativo = true
    ) {
        $this->nome = $nome;
        $this->telefone = $telefone;
        $this->email = $email;
        $this->especialidade = $especialidade;
        $this->ativo = $ativo;
    }

    public function getId(): ?int
    {
        return $this->id ?? null;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function getTelefone(): ?string
    {
        return $this->telefone;
    }

    public function setTelefone(?string $telefone): void
    {
        $this->telefone = $telefone;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function getEspecialidade(): ?string
    {
        return $this->especialidade;
    }

    public function setEspecialidade(?string $especialidade): void
    {
        $this->especialidade = $especialidade;
    }

    public function isAtivo(): bool
    {
        return $this->ativo;
    }

    public function setAtivo(bool $ativo): void
    {
        $this->ativo = $ativo;
    }

    public function getCriadoEm(): ?string
    {
        return $this->criadoEm ?? null;
    }
}
