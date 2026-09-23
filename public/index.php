<?php

    require_once __DIR__ . '/../vendor/autoload.php';

    use App\Core\Router;

    $pagina = $_GET['pagina'] ?? null;

    $router = new Router();

    $router->handle($pagina);
?>