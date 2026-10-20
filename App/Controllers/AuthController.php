<?php

namespace App\Controllers;

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
