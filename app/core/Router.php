<?php

namespace App\Core;

use App\Controllers\AuthController;
use App\Controllers\ClienteController;
use App\Controllers\ServicoController;

class Router
{
    public function handle($pagina, $acao = null)
    {
        switch ($pagina) {

            case 'login':

                $controller = new AuthController();
                $controller->login();

                break;

            case 'logout':

                $this->verificarLogin();

                $controller = new AuthController();
                $controller->logout();

                break;

            case 'dashboard':

                $this->verificarLogin();

                require __DIR__ . '/../Views/dashboard/index.php';

                break;

            case 'clientes':

                $this->verificarLogin();

                $controller = new ClienteController();

                if ($acao === 'store') {
                    $controller->store();
                    break;
                }

                if ($acao === 'update') {
                    $controller->update();
                    break;
                }

                if ($acao === 'delete') {
                    $id = (int) ($_GET['id'] ?? 0);

                    $controller->delete($id);

                    break;
                }

                $controller->index();

                break;

            case 'clientes-create':

                $this->verificarLogin();

                require __DIR__ . '/../Views/clientes/create.php';

                break;

            case 'clientes-edit':

                $this->verificarLogin();

                $controller = new ClienteController();

                $id = (int) ($_GET['id'] ?? 0);

                $controller->edit($id);

                break;

            case 'servicos':

                $this->verificarLogin();

                $controller = new ServicoController();

                if ($acao === 'store') {
                    $controller->store();
                    break;
                }

                if ($acao === 'update') {
                    $controller->update();
                    break;
                }

                $controller->index();

                break;

            case 'servicos-create':

                $this->verificarLogin();

                require __DIR__ . '/../Views/servicos/create.php';

                break;

            case 'servicos-edit':

                $this->verificarLogin();

                $controller = new ServicoController();

                $id = (int) ($_GET['id'] ?? 0);

                $controller->edit($id);

                break;

            default:

                if (isset($_SESSION['usuario_id'])) {
                    require __DIR__ . '/../Views/layouts/dashboard.php';
                } else {
                    $erros = [];
                    require __DIR__ . '/../Views/auth/login.php';
                }

                break;
        }
    }

    private function verificarLogin()
    {
        if (!isset($_SESSION['usuario_id'])) {
            header('Location: index.php?pagina=login');
            exit;
        }
    }
}
