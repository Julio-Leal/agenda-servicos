<?php 
    namespace App\Repositories;

    use App\Core\Database;
    use App\Models\Cliente;

    class ClienteRepository {
        private $connection;

        public function __construct() {
            $database = new Database();
            $this->connection = $database->getConnection();
        }

        public function create(Cliente $cliente) {
            $sql = "INSERT INTO cliente
                    (NOME, CPF, TELEFONE, EMAIL, DATA_NASCIMENTO)
                    VALUES (:nome, :cpf, :telefone, :email, :dataNascimento)";

            $stmt = $this->connection->prepare($sql);

            $stmt->bindValue(':nome', $cliente->getNome());
            $stmt->bindValue(':cpf', $cliente->getCpf());
            $stmt->bindValue(':telefone', $cliente->getTelefone());
            $stmt->bindValue(':email', $cliente->getEmail());
            $stmt->bindValue(':dataNascimento', $cliente->getDataNascimento());

            return $stmt->execute();
        }

        public function findAll() {
            $sql = "SELECT ID, NOME, CPF, TELEFONE, EMAIL, DATA_NASCIMENTO, CRIADO_EM 
                    FROM cliente
                    ORDER BY NOME";
                    
            $stmt = $this->connection->query($sql);
            
            return $stmt->fetchAll();
        }

        public function findById(int $id) {
            $sql = "SELECT * 
                    FROM cliente
                    WHERE ID = :id";

            $stmt = $this->connection->prepare($sql);

            $stmt->bindValue(':id', $id, \PDO::PARAM_INT);

            $stmt->execute();

            return $stmt->fetch();
        }

        public function findByCpf(string $cpf) {
            $sql = "SELECT *
                    FROM cliente
                    WHERE CPF = :cpf";

            $stmt = $this->connection->prepare($sql);
            $stmt->bindValue(':cpf', $cpf);
            $stmt->execute();
            return $stmt->fetch();
        }

        public function update(Cliente $cliente) {
            $sql = "UPDATE cliente
                    SET
                        NOME = :nome,
                        CPF = :cpf,
                        TELEFONE = :telefone,
                        EMAIL = :email,
                        DATA_NASCIMENTO = :dataNascimento
                    WHERE ID = :id";

            $stmt = $this->connection->prepare($sql);

            $stmt->bindValue(':nome', $cliente->getNome());
            $stmt->bindValue(':cpf', $cliente->getCpf());
            $stmt->bindValue(':telefone', $cliente->getTelefone());
            $stmt->bindValue(':email', $cliente->getEmail());
            $stmt->bindValue(':dataNascimento', $cliente->getDataNascimento());
            $stmt->bindValue(':id', $cliente->getId(), \PDO::PARAM_INT);

            return $stmt->execute();
        }

        public function delete(int $id) {
            $sql = "DELETE FROM cliente
                    WHERE ID = :id";

            $stmt = $this->connection->prepare($sql);

            $stmt->bindValue(':id', $id, \PDO::PARAM_INT);

            return $stmt->execute();
        }
    }
?>