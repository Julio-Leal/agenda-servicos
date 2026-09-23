<?php 
    namespace App\Controllers;

    use App\Repositories\ClienteRepository;
    use App\Models\Cliente;

    class ClienteController {
        private $repository;
        
        public function __construct() {
            $this->repository  = new ClienteRepository();
        }

        public function create(Cliente $cliente) {
            $resultado = $this->repository->create($cliente);
            return $resultado;
        }

        public function findAll() {
            $clientes = $this->repository->findAll();
            return $clientes;
        }

        public function findById(int $id) {
            $cliente = $this->repository->findById($id);
            return $cliente;
        }

        public function update(Cliente $cliente) {
            $resultado = $this->repository->update($cliente);
            return $resultado;
        }

        public function delete(int $id) {
            $resultado = $this->repository->delete($id);
            return $resultado;
        }

        public function index() {
            $clientes = $this->repository->findAll();
            require __DIR__ . '/../Views/clientes/index.php';
        }

        public function store() {
            $nome = trim($_POST['nome'] ?? '');
            $cpf = trim($_POST['cpf'] ?? '');
            $telefone = trim($_POST['telefone'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $dataNascimento = trim($_POST['data_nascimento'] ?? '');

            $cliente = new Cliente(
                $nome,
                $cpf,
                $telefone,
                $email,
                $dataNascimento
            );

            $this->repository->create($cliente);

            header('Content-Type: application/json');

            echo json_encode([
                'sucesso' => true,
                'mensagem' => 'Cliente cadastrado com sucesso.'
            ]);

            exit;
        }
    }
?>