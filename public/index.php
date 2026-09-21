<?php

    require_once __DIR__ . '/../vendor/autoload.php';

    use App\Models\Cliente;
    use App\Repositories\ClienteRepository;

    $repository = new ClienteRepository();

    /* 
    METODO DE CRIACAO FUNCIONANDO!!!!!

    $cliente = new Cliente(
        'João gomes',
        '56898654356',
        '45999999999',
        'jogaogomees@email.com',
        '2000-08-05'
    );

    $resultado = $repository->create($cliente);

    if ($resultado) {
        echo "Cliente cadastrado com sucesso!";
    } */

    /* 
    METODO BUSCAR TODOS FUNCIONANDO!!!

    $clientes = $repository->findAll();

    echo '<pre>';
    print_r($clientes);
    echo '</pre>'; */

?>