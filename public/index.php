<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Models\Cliente;
use App\Repositories\ClienteRepository;

$repository = new ClienteRepository();

$cliente = new Cliente(
    'Cliente Teste',
    '12345678900',
    '42999999999',
    'teste@email.com',
    '2000-01-01'
);

$resultado = $repository->create($cliente);

if ($resultado) {
    echo "Cliente cadastrado com sucesso!";
}

?>