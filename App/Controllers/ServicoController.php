<?php

namespace App\Controllers;

use App\Models\Servico;
use App\Repositories\ServicoRepository;

class ServicoController
{
    private $repository;

    public function __construct()
    {
        $this->repository = new ServicoRepository();
    }

    public function index()
    {
        $servicos = $this->repository->findAll();

        require __DIR__ . '/../Views/servicos/index.php';
    }

    public function store()
    {
        $nome = trim($_POST['nome'] ?? '');
        $descricao = trim($_POST['descricao'] ?? '');
        $duracao = trim($_POST['duracao'] ?? '');
        $preco = trim($_POST['preco'] ?? '');

        $erros = [];

        if ($nome === '') {
            $erros[] = 'O nome é obrigatório.';
        }

        if ($duracao === '') {
            $erros[] = 'A duração é obrigatória.';
        } elseif (!is_numeric($duracao) || (int) $duracao <= 0) {
            $erros[] = 'A duração deve ser maior que zero.';
        }

        if ($preco === '') {
            $erros[] = 'O preço é obrigatório.';
        } elseif (!is_numeric($preco) || (float) $preco < 0) {
            $erros[] = 'O preço deve ser maior ou igual a zero.';
        }

        if (!empty($erros)) {
            header('Content-Type: application/json');

            echo json_encode([
                'sucesso' => false,
                'erros' => $erros
            ]);

            exit;
        }

        $servico = new Servico(
            $nome,
            (int) $duracao,
            (float) $preco,
            $descricao !== '' ? $descricao : null,
            true
        );

        $this->repository->create($servico);

        header('Content-Type: application/json');

        echo json_encode([
            'sucesso' => true,
            'mensagem' => 'Serviço cadastrado com sucesso.'
        ]);

        exit;
    }

    public function edit(int $id)
    {
        $servico = $this->repository->findById($id);

        if (!$servico) {
            echo 'Serviço não encontrado.';
            return;
        }

        require __DIR__ . '/../Views/servicos/edit.php';
    }

    public function update()
    {
        $id = (int) ($_POST['id'] ?? 0);

        $nome = trim($_POST['nome'] ?? '');
        $descricao = trim($_POST['descricao'] ?? '');
        $duracao = trim($_POST['duracao'] ?? '');
        $preco = trim($_POST['preco'] ?? '');
        $ativo = isset($_POST['ativo']) ? (bool) $_POST['ativo'] : true;

        $erros = [];

        if ($id <= 0) {
            $erros[] = 'Serviço inválido.';
        }

        if ($nome === '') {
            $erros[] = 'O nome é obrigatório.';
        }

        if ($duracao === '') {
            $erros[] = 'A duração é obrigatória.';
        } elseif (!is_numeric($duracao) || (int) $duracao <= 0) {
            $erros[] = 'A duração deve ser maior que zero.';
        }

        if ($preco === '') {
            $erros[] = 'O preço é obrigatório.';
        } elseif (!is_numeric($preco) || (float) $preco < 0) {
            $erros[] = 'O preço deve ser maior ou igual a zero.';
        }

        $servicoExistente = $this->repository->findById($id);

        if (!$servicoExistente) {
            $erros[] = 'Serviço não encontrado.';
        }

        if (!empty($erros)) {
            header('Content-Type: application/json');

            echo json_encode([
                'sucesso' => false,
                'erros' => $erros
            ]);

            exit;
        }

        $servico = new Servico(
            $nome,
            (int) $duracao,
            (float) $preco,
            $descricao !== '' ? $descricao : null,
            $ativo
        );

        $servico->setId($id);

        $this->repository->update($servico);

        header('Content-Type: application/json');

        echo json_encode([
            'sucesso' => true,
            'mensagem' => 'Serviço atualizado com sucesso.'
        ]);

        exit;
    }
}