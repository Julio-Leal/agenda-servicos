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

            $erros = [];

            if ($nome === '') {
                $erros[] = 'O nome é obrigatório.';
            }

            if ($cpf === '') {
                $erros[] = 'O CPF é obrigatório.';
            }

            if ($telefone === '') {
                $erros[] = 'O telefone é obrigatório.';
            }

            if ($email === '') {
                $erros[] = 'O e-mail é obrigatório.';
            }

            if ($dataNascimento === '') {
                $erros[] = 'A data de nascimento é obrigatória.';
            }

            if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $erros[] = 'O e-mail informado é inválido.';
            }

            if ($cpf !== '') {
                $cpfNumeros = preg_replace('/\D/', '', $cpf);
                if (strlen($cpfNumeros) !== 11) {
                    $erros[] = 'O CPF deve possuir 11 dígitos.';
                }
            }

            if ($telefone !== '') {

                $telefoneNumeros = preg_replace('/\D/', '', $telefone);

                if (strlen($telefoneNumeros) < 10 || strlen($telefoneNumeros) > 11) {
                    $erros[] = 'O telefone deve possuir 10 ou 11 dígitos.';
                }
            }            

            if ($dataNascimento !== '') {
                $data = \DateTime::createFromFormat(
                    'Y-m-d',
                    $dataNascimento
                );
                $errosData = \DateTime::getLastErrors();
                if (
                    !$data ||
                    ($errosData !== false && (
                        $errosData['warning_count'] > 0 ||
                        $errosData['error_count'] > 0
                    ))
                ) {
                    $erros[] = 'A data de nascimento é inválida.';
                } else if ($data && $data > new \DateTime()) {
                    $erros[] = 'A data de nascimento não pode estar no futuro.';
                }
            }

            $clienteExistente = $this->repository->findByCpf($cpf);
            if ($clienteExistente) {
                $erros[] = 'Já existe um cliente cadastrado com este CPF.';
            }

            if (!empty($erros)) {
                header('Content-Type: application/json');

                echo json_encode([
                    'sucesso' => false,
                    'erros' => $erros
                ]);

                exit;
            }

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