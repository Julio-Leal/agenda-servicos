<?php

namespace App\Controllers;

use App\Repositories\UsuarioRepository;
use App\Models\Usuario;
use PDOException;

class UsuarioController {
    private UsuarioRepository $repository;
    private const CARGOS_PERMITIDOS = ['GERENTE'];

    public function __construct() {
        $this->repository = new UsuarioRepository();
    }

    //Métodos auxiliares --
    private function verificarAdmin(): void {
        if (
            !isset($_SESSION['usuario_id']) ||
            ($_SESSION['usuario_tipo'] ?? '') !== 'ADMIN'
        ) {
            http_response_code(403);
            exit('Acesso negado.');
        }
    }

    private function responder(array $dados, int $status = 200): void {
        http_response_code($status);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($dados);
        exit;
    }

    private function responderErroBanco(): void {
        $this->responder([
            'sucesso' => false,
            'erros' => ['Não foi possível concluir a operação. Tente novamente.']
        ], 500);
    }

    private function validarDados(
        string $nome,
        string $email,
        string $tipo,
        string $senha = '',
        ?int $id = null
    ): array {
        $erros = [];

        // Validação do nome --
        if ($nome === '' || mb_strlen($nome) > 100) {
            $erros[] = 'Informe um nome válido.';
        }

        // Validação do e-mail --
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $erros[] = 'Informe um e-mail válido.';
        } else {
            $outroUsuario = $this->repository->findByEmail($email);

            if (
                $outroUsuario &&
                (int) $outroUsuario['ID'] !== $id
            ) {
                $erros[] = 'Este e-mail já está cadastrado.';
            }
        }

        // Validação do cargo --
        if (!in_array($tipo, self::CARGOS_PERMITIDOS, true)) {
            $erros[] = 'Cargo inválido.';
        }

        // A senha só é obrigatória no cadastro.
        // Na edição, uma senha vazia significa manter a atual.
        if ($id === null && strlen($senha) < 6) {
            $erros[] = 'A senha deve ter pelo menos 6 caracteres.';
        } elseif ($id !== null && $senha !== '' && strlen($senha) < 6) {
            $erros[] = 'A nova senha deve ter pelo menos 6 caracteres.';
        }

        return $erros;
    }

    //Listagem --
    public function index(): void {
        $this->verificarAdmin();

        $usuarios = $this->repository->findAll();

        require __DIR__ . '/../Views/usuarios/index.php';
    }

    //Cadastro --
    public function store(): void {
        $this->verificarAdmin();

        $nome = trim($_POST['nome'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $senha = $_POST['senha'] ?? '';
        $confirmarSenha = $_POST['confirmar_senha'] ?? '';
        $tipo = $_POST['tipo'] ?? '';

        try {
            $erros = $this->validarDados(
                $nome,
                $email,
                $tipo,
                $senha
            );

            if ($senha !== $confirmarSenha) {
                $erros[] = 'As senhas não coincidem.';
            }

            if (!empty($erros)) {
                $this->responder([
                    'sucesso' => false,
                    'erros' => $erros
                ], 422);
            }

            $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

            $usuario = new Usuario(
                $nome,
                $email,
                $senhaHash,
                $tipo
            );

            $this->repository->create($usuario);

            $this->responder([
                'sucesso' => true,
                'mensagem' => 'Usuário cadastrado com sucesso.'
            ], 201);

        } catch (PDOException $e) {
            $this->responderErroBanco();
        }

        exit;
    }

    //Edição -- Exibição do formulário.
    public function edit(int $id): void {
        $this->verificarAdmin();

        $usuario = $this->repository->findById($id);

        if (!$usuario) {
            http_response_code(404);
            exit('Usuário não encontrado.');
        }

        require __DIR__ . '/../Views/usuarios/edit.php';
    }

    //Edição -- Atualização dos dados
    public function update(): void {
        $this->verificarAdmin();

        $id = (int) ($_POST['id'] ?? 0);
        $nome = trim($_POST['nome'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $tipo = $_POST['tipo'] ?? '';
        $senha = $_POST['senha'] ?? '';

        try {
            $usuarioExistente = $this->repository->findById($id);

            if (!$usuarioExistente) {
                $this->responder([
                    'sucesso' => false,
                    'erros' => ['Usuário não encontrado.']
                ], 404);
            }

            // A conta ADMIN não pode ser alterada por esta tela. -- 
            if ($usuarioExistente['TIPO'] === 'ADMIN') {
                $this->responder([
                    'sucesso' => false,
                    'erros' => [
                        'A conta administradora não pode ser alterada por esta operação.'
                    ]
                ], 403);
            }

            $erros = $this->validarDados(
                $nome,
                $email,
                $tipo,
                $senha,
                $id
            );

            if (!empty($erros)) {
                $this->responder([
                    'sucesso' => false,
                    'erros' => $erros
                ], 422);
            }

            // Se uma nova senha foi informada, gera outro hash.
            // Caso contrário, preserva o hash atual.
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

        } catch (PDOException $e) {
            $this->responderErroBanco();
        }

        exit;
    }
}
