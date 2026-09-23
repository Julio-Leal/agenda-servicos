<?php 

    namespace App\Core;

    class Router {
        public function handle($pagina) {
            switch($pagina) {
                case 'dashboard':
                    require __DIR__ . '/../Views/dashboard/index.php';
                    break;

                case 'clientes':
                    require __DIR__ . '/../Views/clientes/index.php';
                    break;
                
                default: 
                    require __DIR__ . '/../Views/layouts/dashboard.php';
                    break;
            }
        }   
    }

?>