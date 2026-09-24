<?php

    require_once __DIR__ . '/../vendor/autoload.php';

    // use App\Core\Router;

    // $pagina = $_GET['pagina'] ?? null;
    // $acao = $_GET['acao'] ?? null;

    // $router = new Router();

    // $router->handle($pagina, $acao);

    use App\Models\Servico;
    use App\Repositories\ServicoRepository;

    $repository = new ServicoRepository();

    $servico = new Servico(
        'Corte de Barba', 
        30, 
        25.00, 
        'corte de barba tradicional'
    );

    $resultado = $repository->create($servico);

    var_dump($resultado);
    echo '<br>';
    echo '<br>';
    $servicos = $repository->findAll();

    var_dump($servicos);
    echo '<br>';
    echo '<br>';
    //teste
    $servicoEncontrado = $repository->findById(2);

    var_dump($servicoEncontrado);
    echo '<br>';

    //teste
    $servico = new Servico(
        'Corte de cabelo atualizado',
        90,
        65.00,
        'Descrição atualizada'
    );

    $servico->setId(1);

    $resultado2 = $repository->update($servico);

    var_dump($resultado2);
?>