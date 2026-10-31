<?php

namespace App\Controllers;

use App\Repositories\UsuarioRepository;
use App\Models\Usuario;

class UsuarioController {
    private $repository;

    public function __construct() {
        $this->repository = new UsuarioRepository();
    }

    private function verificarAdmin(): void {
        if (
            !isset($_SESSION['usuario_id']) ||
            ($_SESSION['usuario_tipo'] ?? '') !== 'ADMIN'
        ) {
            http_response_code(403);
            exit('Acesso negado.');
        }
    }

    private function responder(array $dados): void {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($dados);
        exit;
    }

    public function index() {
        $this->verificarAdmin();

        $usuarios = $this->repository->findAll();

        require __DIR__ . '/../Views/usuarios/index.php';
    }

    public function store() {
        $this->verificarAdmin();

        $nome = trim($_POST['nome'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $senha = $_POST['senha'] ?? '';
        $confirmarSenha = $_POST['confirmar_senha'] ?? '';
        $tipo = $_POST['tipo'] ?? '';

        $erros = [];

        if ($nome === '' || mb_strlen($nome) > 100) {
            $erros[] = 'Informe um nome válido.';
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $erros[] = 'Informe um e-mail válido.';
        }
        if (strlen($senha) < 6) {
            $erros[] = 'A senha deve ter pelo menos 6 caracteres.';
        }
        if ($senha !== $confirmarSenha) {
            $erros[] = 'As senhas não coincidem.';
        }
        // Somente cargos autorizados podem ser cadastrados.
        $cargosPermitidos = ['GERENTE'];
        if (!in_array($tipo, $cargosPermitidos, true)) {
            $erros[] = 'Cargo inválido.';
        }

        if ($this->repository->findByEmail($email)) {
            $erros[] = 'Este e-mail já está cadastrado.';
        }
        
        if (!empty($erros)) {
            $this->responder([
                'sucesso' => false,
                'erros' => $erros
            ]);
        }

        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        $usuario = new Usuario(
            $nome,
            $email,
            $senhaHash,
            $tipo
        );

        try {
            $this->repository->create($usuario);
        } catch (\PDOException $e) {
            $this->responder([
                'sucesso' => false,
                'erros' => ['Não foi possível cadastrar o usuário.']
            ]);
        }

        $this->responder([
            'sucesso' => true,
            'mensagem' => 'Usuário cadastrado com sucesso.'
        ]);
    }

    public function edit(int $id)
    {
        $this->verificarAdmin();

        $usuario = $this->repository->findById($id);

        if (!$usuario) {
            http_response_code(404);
            echo 'Usuário não encontrado.';
            return;
        }

        require __DIR__ . '/../Views/usuarios/edit.php';
    }

    public function update() {
        $this->verificarAdmin();

        $id = (int) ($_POST['id'] ?? 0);
        $nome = trim($_POST['nome'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $tipo = $_POST['tipo'] ?? '';
        $senha = $_POST['senha'] ?? '';

        $erros = [];

        $usuarioExistente = $this->repository->findById($id);

        if (!$usuarioExistente) {
            $erros[] = 'Usuário não encontrado.';
        }

        if ($nome === '' || mb_strlen($nome) > 100) {
            $erros[] = 'Informe um nome válido.';
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $erros[] = 'Informe um e-mail válido.';
        }

        if (!in_array($tipo, ['GERENTE'], true)) {
            $erros[] = 'Cargo inválido.';
        }

        if ($senha !== '' && strlen($senha) < 6) {
            $erros[] = 'A nova senha deve ter pelo menos 6 caracteres.';
        }

        $outroUsuario = $this->repository->findByEmail($email);

        if ($outroUsuario && (int) $outroUsuario['ID'] !== $id) {
            $erros[] = 'Este e-mail já está cadastrado.';
        }

        if (!empty($erros)) {
            $this->responder([
                'sucesso' => false,
                'erros' => $erros
            ]);
        }

        // Não permite alterar a própria conta ADMIN por esta tela.
        if ($usuarioExistente['TIPO'] === 'ADMIN') {
            $this->responder([
                'sucesso' => false,
                'erros' => ['A conta administradora não pode ser alterada por esta operação.']
            ]);
        }

        $senhaHash = $senha !== ''
            ? password_hash($senha, PASSWORD_DEFAULT)
            : $usuarioExistente['SENHA'];

        $usuario = new Usuario(
            $nome,
            $email,
            $senhaHash,
            $tipo
        );

        $usuario->setId($id);

        $this->repository->update($usuario);

        $this->responder([
            'sucesso' => true,
            'mensagem' => 'Usuário atualizado com sucesso.'
        ]);
    }
}
