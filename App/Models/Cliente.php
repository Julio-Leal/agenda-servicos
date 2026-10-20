<?php

namespace App\Models;

class Cliente {
    private int $id;
    private string $nome;
    private string $cpf;
    private string $telefone;
    private ?string $email;
    private ?string $dataNascimento;
    private string $criadoEm;

    public function __construct(
        string $nome,
        string $cpf,
        string $telefone,
        ?string $email = null,
        ?string $dataNascimento = null
    ) {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->telefone = $telefone;
        $this->email = $email;
        $this->dataNascimento = $dataNascimento;
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

    public function getCpf(): string
    {
        return $this->cpf;
    }

    public function setCpf(string $cpf): void
    {
        $this->cpf = $cpf;
    }

    public function getTelefone(): string
    {
        return $this->telefone;
    }

    public function setTelefone(string $telefone): void
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

    public function getDataNascimento(): ?string
    {
        return $this->dataNascimento;
    }

    public function setDataNascimento(?string $dataNascimento): void
    {
        $this->dataNascimento = $dataNascimento;
    }

    public function getCriadoEm(): ?string
    {
        return $this->criadoEm ?? null;
    }
}
