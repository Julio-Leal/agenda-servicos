<?php

    require_once __DIR__ . '/../vendor/autoload.php';
    
    use App\Core\Router;

    $pagina = $_GET['pagina'] ?? null;
    $acao = $_GET['acao'] ?? null;

    $router = new Router();

    $router->handle($pagina, $acao);
?>