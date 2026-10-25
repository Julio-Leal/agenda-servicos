<?php

namespace App\Controllers;

use App\Models\Usuario;
use App\Repositories\UsuarioRepository;

class AuthController
{
    private $repository;

    public function __construct()
    {
        $this->repository = null;
    }

    public function login()
    {
        if (isset($_SESSION['usuario_id'])) {
            header('Location: index.php');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            $erros = [];
            require __DIR__ . '/../Views/auth/login.php';
            return;
        }

        $email = trim($_POST['email'] ?? '');
        $senha = $_POST['senha'] ?? '';

        $erros = [];

        if ($email === '') {
            $erros[] = 'O e-mail é obrigatório.';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $erros[] = 'Informe um e-mail válido.';
        }

        if ($senha === '') {
            $erros[] = 'A senha é obrigatória.';
        }

        if (!empty($erros)) {
            require __DIR__ . '/../Views/auth/login.php';
            return;
        }

        $this->repository = new UsuarioRepository();

        $usuario = $this->repository->findByEmail($email);

        if (!$usuario || !password_verify($senha, $usuario['SENHA'])) {
            $erros[] = 'E-mail ou senha inválidos.';

            require __DIR__ . '/../Views/auth/login.php';
            return;
        }

        session_regenerate_id(true);

        $_SESSION['usuario_id'] = $usuario['ID'];
        $_SESSION['usuario_nome'] = $usuario['NOME'];
        $_SESSION['usuario_email'] = $usuario['EMAIL'];
        $_SESSION['usuario_tipo'] = $usuario['TIPO'];

        header('Location: index.php');
        exit;
    }

    public function cadastro() {
        if (isset($_SESSION['usuario_id'])) {
            header('Location: index.php');
            exit;
        }

        $erros = [];

        // Se for GET, apenas mostra o formulário.
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            require __DIR__ . '/../Views/auth/cadastro.php';
            return;
        }

        // Recebe os dados do formulário.
        $nome = trim($_POST['nome'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $senha = $_POST['senha'] ?? '';
        $confirmarSenha = $_POST['confirmar_senha'] ?? '';

        // Validações no servidor.
        if ($nome === '' || mb_strlen($nome) > 100) {
            $erros[] = 'Informe um nome válido de até 100 caracteres.';
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

        if (!empty($erros)) {
            require __DIR__ . '/../Views/auth/cadastro.php';
            return;
        }

        $repository = new UsuarioRepository();

        // Verifica se o e-mail já foi cadastrado.
        if ($repository->findByEmail($email)) {
            $erros[] = 'Este e-mail já está cadastrado.';

            require __DIR__ . '/../Views/auth/cadastro.php';
            return;
        }

        // Transforma a senha em hash.
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        // Cria o objeto Usuario.
        $usuario = new Usuario(
            $nome,
            $email,
            $senhaHash,
            'FUNCIONARIO'
        );

        try {
            // Salva o usuário no banco.
            $repository->create($usuario);
        } catch (\PDOException $e) {
            $erros[] = 'Não foi possível concluir o cadastro. Verifique os dados e tente novamente.';

            require __DIR__ . '/../Views/auth/cadastro.php';
            return;
        }

        // Redireciona para o login.
        header('Location: index.php?pagina=login');
        exit;
    }

    public function logout()
    {
        $_SESSION = [];

        if (ini_get('session.use_cookies')) {
            $params = session_get_cookie_params();

            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params['path'],
                $params['domain'],
                $params['secure'],
                $params['httponly']
            );
        }

        session_destroy();

        header('Location: index.php?pagina=login');
        exit;
    }
}
