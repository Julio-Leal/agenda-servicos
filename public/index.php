<?php

require_once __DIR__ . '/../app/models/Usuario.php';

$usuario = new Usuario(
    "João Silva",
    "joao@email.com",
    "123456"
);

echo $usuario->getNome();
echo "<br>";
echo $usuario->getEmail();
echo "<br>";
echo $usuario->getTipo();