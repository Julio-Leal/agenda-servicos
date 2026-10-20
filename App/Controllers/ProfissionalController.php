<?php

namespace App\Controllers;

use App\Models\Profissional;
use App\Repositories\ProfissionalRepository;

class ProfissionalController
{
    private $repository;

    public function __construct()
    {
        $this->repository = new ProfissionalRepository();
    }

    public function index()
    {
        $profissionais = $this->repository->findAll();

        require __DIR__ . '/../Views/profissionais/index.php';
    }

    public function store()
    {
        $nome = trim($_POST['nome'] ?? '');
        $telefone = trim($_POST['telefone'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $especialidade = trim($_POST['especialidade'] ?? '');

        $erros = $this->validarDados($nome, $telefone, $email);

        if (!empty($erros)) {
            $this->responderErro($erros);
        }

        $profissional = new Profissional(
            $nome,
            $telefone !== '' ? $telefone : null,
            $email !== '' ? $email : null,
            $especialidade !== '' ? $especialidade : null,
            true
        );

        $this->repository->create($profissional);

        header('Content-Type: application/json');
        echo json_encode([
            'sucesso' => true,
            'mensagem' => 'Profissional cadastrado com sucesso.'
        ]);
        exit;
    }

    public function edit(int $id)
    {
        $profissional = $this->repository->findById($id);

        if (!$profissional) {
            echo 'Profissional não encontrado.';
            return;
        }

        require __DIR__ . '/../Views/profissionais/edit.php';
    }

    public function update()
    {
        $id = (int) ($_POST['id'] ?? 0);
        $nome = trim($_POST['nome'] ?? '');
        $telefone = trim($_POST['telefone'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $especialidade = trim($_POST['especialidade'] ?? '');
        $ativo = ($_POST['ativo'] ?? '1') === '1';

        $erros = [];

        if ($id <= 0 || !$this->repository->findById($id)) {
            $erros[] = 'Profissional não encontrado.';
        }

        $erros = array_merge(
            $erros,
            $this->validarDados($nome, $telefone, $email)
        );

        if (!empty($erros)) {
            $this->responderErro($erros);
        }

        $profissional = new Profissional(
            $nome,
            $telefone !== '' ? $telefone : null,
            $email !== '' ? $email : null,
            $especialidade !== '' ? $especialidade : null,
            $ativo
        );

        $profissional->setId($id);

        $this->repository->update($profissional);

        header('Content-Type: application/json');
        echo json_encode([
            'sucesso' => true,
            'mensagem' => 'Profissional atualizado com sucesso.'
        ]);
        exit;
    }

    private function validarDados(string $nome, string $telefone, string $email): array
    {
        $erros = [];

        if ($nome === '') {
            $erros[] = 'O nome é obrigatório.';
        }

        if ($telefone !== '') {
            $telefoneNumeros = preg_replace('/\D/', '', $telefone);

            if (strlen($telefoneNumeros) < 10 || strlen($telefoneNumeros) > 11) {
                $erros[] = 'O telefone deve possuir 10 ou 11 dígitos.';
            }
        }

        if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $erros[] = 'O e-mail informado é inválido.';
        }

        return $erros;
    }

    private function responderErro(array $erros): void
    {
        header('Content-Type: application/json');
        echo json_encode([
            'sucesso' => false,
            'erros' => $erros
        ]);
        exit;
    }
}
