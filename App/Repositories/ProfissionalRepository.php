<?php

namespace App\Repositories;

use App\Core\Database;
use App\Models\Profissional;

class ProfissionalRepository
{
    private $connection;

    public function __construct()
    {
        $database = new Database();
        $this->connection = $database->getConnection();
    }

    public function create(Profissional $profissional)
    {
        $sql = "INSERT INTO profissional
                (NOME, TELEFONE, EMAIL, ESPECIALIDADE, ATIVO)
                VALUES (:nome, :telefone, :email, :especialidade, :ativo)";

        $stmt = $this->connection->prepare($sql);

        $stmt->bindValue(':nome', $profissional->getNome());
        $stmt->bindValue(':telefone', $profissional->getTelefone());
        $stmt->bindValue(':email', $profissional->getEmail());
        $stmt->bindValue(':especialidade', $profissional->getEspecialidade());
        $stmt->bindValue(':ativo', $profissional->isAtivo());

        return $stmt->execute();
    }

    public function findAll()
    {
        $sql = "SELECT *
                FROM profissional
                ORDER BY NOME";

        $stmt = $this->connection->query($sql);

        return $stmt->fetchAll();
    }

    public function findById(int $id)
    {
        $sql = "SELECT *
                FROM profissional
                WHERE ID = :id";

        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function update(Profissional $profissional)
    {
        $sql = "UPDATE profissional
                SET
                    NOME = :nome,
                    TELEFONE = :telefone,
                    EMAIL = :email,
                    ESPECIALIDADE = :especialidade,
                    ATIVO = :ativo
                WHERE ID = :id";

        $stmt = $this->connection->prepare($sql);

        $stmt->bindValue(':nome', $profissional->getNome());
        $stmt->bindValue(':telefone', $profissional->getTelefone());
        $stmt->bindValue(':email', $profissional->getEmail());
        $stmt->bindValue(':especialidade', $profissional->getEspecialidade());
        $stmt->bindValue(':ativo', $profissional->isAtivo());
        $stmt->bindValue(':id', $profissional->getId(), \PDO::PARAM_INT);

        return $stmt->execute();
    }
}
