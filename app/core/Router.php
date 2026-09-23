<?php 

    namespace App\Core;

    use App\Controllers\ClienteController;

    class Router {
        public function handle($pagina) {
            switch($pagina) {
                case 'dashboard':
                    require __DIR__ . '/../Views/dashboard/index.php';
                    break;

                case 'clientes':
                    $controller = new ClienteController();
                    $controller->index();
                    break;
                
                default: 
                    require __DIR__ . '/../Views/layouts/dashboard.php';
                    break;
            }
        }   
    }

?>