<?php 
    namespace App\Repositories;

    use App\Core\Database;
    use App\Models\Servico;

    class ServicoRepository {
        private $connection;

        public function __construct() {
            $database = new Database();
            $this->connection = $database->getConnection();
        }

        public function create(Servico $servico) {
            $sql = "INSERT INTO servico
                    (NOME, DESCRICAO, DURACAO, PRECO, ATIVO)
                    VALUES (:nome, :descricao, :duracao, :preco, :ativo)";
            
            $stmt = $this->connection->prepare($sql);

            $stmt->bindValue(':nome', $servico->getNome());
            $stmt->bindValue(':descricao', $servico->getDescricao());
            $stmt->bindValue(':duracao', $servico->getDuracao());
            $stmt->bindValue(':preco', $servico->getPreco());
            $stmt->bindValue(':ativo', $servico->isAtivo());

            return $stmt->execute();
        }

        public function findAll() {
            $sql = "SELECT *
                    FROM servico
                    ORDER BY ID";
            
            $stmt =  $this->connection->query($sql);

            return $stmt->fetchAll();
        }

        public function findById(int $id) {
            $sql = "SELECT *
                    FROM servico
                    WHERE ID = :id";
            
            $stmt = $this->connection->prepare($sql);
            $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
        }

        public function update(Servico $servico) {
            $sql = "UPDATE servico
                    SET 
                        NOME = :nome, 
                        DESCRICAO = :descricao, 
                        DURACAO = :duracao, 
                        PRECO = :preco, 
                        ATIVO = :ativo
                    WHERE ID = :id";

            $stmt = $this->connection->prepare($sql);

            $stmt->bindValue(':nome', $servico->getNome());
            $stmt->bindValue(':descricao', $servico->getDescricao());
            $stmt->bindValue(':duracao', $servico->getDuracao());
            $stmt->bindValue(':preco', $servico->getPreco());
            $stmt->bindValue(':ativo', $servico->isAtivo());
            $stmt->bindValue(':id', $servico->getId(), \PDO::PARAM_INT);

            return $stmt->execute();
        }
    }
?>