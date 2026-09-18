<?php 
    namespace App\Repositories;

    use App\Core\Database;
    use App\Models\CLiente;

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
    }
?>