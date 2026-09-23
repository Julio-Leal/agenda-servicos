<?php

    require_once __DIR__ . '/../vendor/autoload.php';

    $pagina = $_GET['pagina'] ?? null;

    if ($pagina === 'clientes') {

        require __DIR__ . '/../app/Views/clientes/index.php';

        exit;
    }

    if ($pagina === 'dashboard') {

        require __DIR__ . '/../app/Views/dashboard/index.php';

        exit;
    }

    require __DIR__ . '/../app/Views/layouts/dashboard.php';
?>