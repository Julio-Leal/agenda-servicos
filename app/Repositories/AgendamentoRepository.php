<?php 
    namespace App\Repositories;

    use App\Core\Database;
    use App\Models\Agendamento;

    class AgendamentoRepository {
        private $connection;

        public function __construct() {
            $database = new Database();
            $this->connection = $database->getConnection();
        }

        public function create(Agendamento $agendamento) {
            $sql = "INSERT INTO agendamento
                    (CLIENTE_ID, PROFISSIONAL_ID, SERVICO_ID, DATA, HORA, STATUS, OBERVACAO)
                    VALUES (:clienteId, :profissionalId, :servicoId, :data, :hora, :status, :observacao)";
            
            $stmt = $this->connection->prepare($sql);

            $stmt->bindValue(':clienteId', $agendamento->getClienteId());
            $stmt->bindValue(':profissionalId', $agendamento->getProfissionalId());
            $stmt->bindValue(':servicoId', $agendamento->getServicoId());
            $stmt->bindValue(':data', $agendamento->getData());
            $stmt->bindValue(':hora', $agendamento->getHora());
            $stmt->bindValue(':status', $agendamento->getStatus());
            $stmt->bindValue(':observacao', $agendamento->getObservacao());

            return $stmt->execute();
        }
    }
?>