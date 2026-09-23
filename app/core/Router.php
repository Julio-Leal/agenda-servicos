<?php 

    namespace App\Core;

    use App\Controllers\ClienteController;

    class Router {
        public function handle($pagina, $acao = null) {
            switch($pagina) {
                case 'dashboard':
                    require __DIR__ . '/../Views/dashboard/index.php';
                    break;

                case 'clientes':
                    $controller = new ClienteController();
                    if($acabou === 'store') {
                        $controller->store();
                        break;
                    }
                    $controller->index();
                    break;
                
                case 'clientes-create':
                    require __DIR__ . '/../Views/clientes/create.php';
                    break;

                default: 
                    require __DIR__ . '/../Views/layouts/dashboard.php';
                    break;
            }
        }   
    }

?>