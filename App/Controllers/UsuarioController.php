<?php 
namespace App\Controllers;

use App\Repositories\UsuarioRepository;
use App\Models\Usuario;

class UsuarioController {
    private $repository;

    public function __construct() {
        $this->repository = new UsuarioRepository();
    }

    public function index() {
        $usuarios = $this->repository->findAll();
        require __DIR__ . '/../Views/usuarios/index.php';
    }

    public function store() {
        //Verifica se o usuaário já possui uma sessão
        if (isset($_SESSION['usuario_id'])) {
            exit;
        }

        $erros = [];

        // Se for GET, apenas mostra o formulário.
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
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
            return;
        }

        $repository = new UsuarioRepository();

        // Verifica se o e-mail já foi cadastrado.
        if ($repository->findByEmail($email)) {
            $erros[] = 'Este e-mail já está cadastrado.';
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
            return;
        }

        exit;
    }

    public function findAll() {
        $usuarios = $this->repository->findAll();
        return $usuarios;
    }
}
?>