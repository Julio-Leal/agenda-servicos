<?php

namespace App\Models;

class Servico {
    private int $id;
    private string $nome;
    private ?string $descricao;
    private int $duracao;
    private float $preco;
    private bool $ativo;
    private string $criadoEm;

    public function __construct(
        string $nome,
        int $duracao,
        float $preco,
        ?string $descricao = null,
        bool $ativo = true
    ) {
        $this->nome = $nome;
        $this->duracao = $duracao;
        $this->preco = $preco;
        $this->descricao = $descricao;
        $this->ativo = $ativo;
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

    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    public function setDescricao(?string $descricao): void
    {
        $this->descricao = $descricao;
    }

    public function getDuracao(): int
    {
        return $this->duracao;
    }

    public function setDuracao(int $duracao): void
    {
        $this->duracao = $duracao;
    }

    public function getPreco(): float
    {
        return $this->preco;
    }

    public function setPreco(float $preco): void
    {
        $this->preco = $preco;
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
