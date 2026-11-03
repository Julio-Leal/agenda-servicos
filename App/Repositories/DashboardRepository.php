<?php 
namespace App\Repositories;

use App\Core\Database;
use App\Models\Dashboard;

class DashboardRepository {
    private $connection;

    public function __construct()
    {
        $database = new Database();
        $this->connection = $database->getConnection();
    }

    public function contarAgendamentos(): ?int
    {
        $sql = "SELECT COUNT(*) 
                AS total
                FROM agendamento
                WHERE DATA = CURDATE()";
        try {
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();

            $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);

            return (int) $resultado['total'];

        } catch (\PDOException $e) {
            // Implementar tratamento de erro
            return null;
        }
    }

    public function contarClientesCadastrados(): ?int
    {
        $sql = "SELECT COUNT(*) 
                AS total
                FROM cliente";
        try {
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();

            $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);

            return (int) $resultado['total'];

        } catch (\PDOException $e) {
            // Implementar tratamento de erro
            return null;
        }
    }

    public function contarFuncionariosAtivos(): ?int
    {
        $sql = "SELECT COUNT(*) 
                AS total
                FROM profissional
                WHERE ATIVO = 1";
        try {
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();

            $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);

            return (int) $resultado['total'];

        } catch (\PDOException $e) {
            // Implementar tratamento de erro
            return null;
        }
    }

    public function contarServicosAtivos(): ?int
    {
        $sql = "SELECT COUNT(*) 
                AS total
                FROM servico
                WHERE ATIVO = 1";
        try {
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();

            $resultado = $stmt->fetch(\PDO::FETCH_ASSOC);

            return (int) $resultado['total'];

        } catch (\PDOException $e) {
            // Implementar tratamento de erro
            return null;
        }
    }
}
?>