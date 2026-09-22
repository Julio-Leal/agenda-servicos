<?php

    require_once __DIR__ . '/../vendor/autoload.php';

    use App\Controllers\ClienteController;

    $controller = new ClienteController();

    $clientes = $controller->findAll();

    echo '<pre>';
    print_r($clientes);
    echo '</pre>';
?>