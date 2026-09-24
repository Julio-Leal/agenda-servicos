<?php

namespace App\Repositories;

use App\Core\Database;
use App\Models\Usuario;

class UsuarioRepository
{
    private $connection;

    public function __construct()
    {
        $database = new Database();
        $this->connection = $database->getConnection();
    }

    public function create(Usuario $usuario)
    {
        $sql = "INSERT INTO usuario
                (NOME, EMAIL, SENHA, TIPO)
                VALUES (:nome, :email, :senha, :tipo)";

        $stmt = $this->connection->prepare($sql);

        $stmt->bindValue(':nome', $usuario->getNome());
        $stmt->bindValue(':email', $usuario->getEmail());
        $stmt->bindValue(':senha', $usuario->getSenha());
        $stmt->bindValue(':tipo', $usuario->getTipo());

        return $stmt->execute();
    }

    public function findByEmail(string $email)
    {
        $sql = "SELECT *
                FROM usuario
                WHERE EMAIL = :email";

        $stmt = $this->connection->prepare($sql);

        $stmt->bindValue(':email', $email);

        $stmt->execute();

        return $stmt->fetch();
    }
}