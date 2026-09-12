<?php

class Usuario
{
    private int $id;
    private string $nome;
    private string $email;
    private string $senha;
    private string $tipo;
    private string $criadoEm;

    public function __construct(
        string $nome,
        string $email,
        string $senha,
        string $tipo = 'FUNCIONARIO'
    ) {
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
        $this->tipo = $tipo;
    }

    public function getId(): ?int
    {
        return $this->id ?? null;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getSenha(): string
    {
        return $this->senha;
    }

    public function setSenha(string $senha): void
    {
        $this->senha = $senha;
    }

    public function getTipo(): string
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): void
    {
        $this->tipo = $tipo;
    }

    public function getCriadoEm(): ?string
    {
        return $this->criadoEm ?? null;
    }
}
