<?php 
    //session_start();

    require_once __DIR__ . '/../vendor/autoload.php';

    use App\Models\Cliente;

    $cliente = new Cliente("Júlio", 12345678958, "9");

    echo "Autload Funcionando";
?>