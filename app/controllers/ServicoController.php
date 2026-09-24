<?php 
    namespace App\Controllers;

    use App\Repositories\ServicoRepository;
    use App\Models\Servico;

    class ServicoController {
        private $repository;

        public function __construct() {
            $this->repository = new ServicoRepository();
        }

        public function create(Servico $servico) {
            $resultado = $this->repository->create($servico);
            return $resultado;
        }

        public function findAll() {
            $servicos = $this->repository->findAll();
            return $servicos;
        }

        public function findById(int $id) {
            $servico = $this->repository->findById($id);
            return $servico;
        }

        public function update() {
            $id = (int) ($_POST['id'] ?? 0);

            $nome = trim($_POST['nome'] ?? '');
            $duracao = trim($_POST['duracao'] ?? '');
            $preco = trim($_POST['preco'] ?? '');
            $descricao = trim($_POST['descricao'] ?? '');
            $ativo = trim($_POST['ativo'] ?? '');

            $servicoExistente = $this->repository->findbyId($id);

            if($servicoExistente && (int) $servicoExistente['ID' !==$id]) {
                header('Content-Type: application/json');

                echo json_encode([
                    'sucesso' => false, 
                    'erros' => [
                        'Ja existe outro servico cadastrado com este id.'
                    ]
                ]);

                exit;
            }

            $servico = new Servico(
                $nome, 
                $duracao,
                $preco,
                $descricao, 
                $ativo
            );

            $servico->setId($id);

            $this->repository->update($servico);

            header('Content-Type: application/json');

            echo json_encode([
                'sucesso' => true, 
                'mensagem' => 'Servico atualizado com sucesso.'
            ]);

            exit;
        }

        public function index() {
            $servicos = $this->repository->findAll();
            require __DIR__ . '/../Views/servicos/index.php';
        }

        public function store() {
            $nome = trim($_POST['nome'] ?? '');
            $duracao = trim($_POST['duracao'] ?? '');
            $preco = trim($_POST['emprecoil'] ?? '');
            $descricao = trim($_POST['descricao'] ?? '');
            $ativo = trim($_POST['ativo'] ?? '');

            $erros = [];

            if ($nome === '') {
                $erros[] = 'O nome é obrigatório.';
            }

            if ($duracao === '') {
                $erros[] = 'A duração é obrigatória.';
            }

            if ($preco === '') {
                $erros[] = 'O preço é obrigatório.';
            }

            if ($descricao === '') {
                $erros[] = 'A descricao é obrigatória.';
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
                $duracao,
                $preco,
                $descricao,
                $ativo
            );

            $this->repository->create($servico);

            header('Content-Type: application/json');

            echo json_encode([
                'sucesso' => true,
                'mensagem' => 'Cliente cadastrado com sucesso.'
            ]);
            
            exit;
        }

        public function edit(int $id) {
            $servico = $this->repository->findById($id);

            if (!$servico) {
                echo 'Serviço não encontrado.';
                return;
            }

            require __DIR__ . '/../Views/servicos/edit.php';
        }
    }
?>