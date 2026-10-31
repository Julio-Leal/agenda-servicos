<?php

namespace App\Core;

use App\Controllers\AuthController;
use App\Controllers\ClienteController;
use App\Controllers\ServicoController;
use App\Controllers\ProfissionalController;
use App\Controllers\UsuarioController;

class Router
{
    public function handle($pagina, $acao = null)
    {
        switch ($pagina) {
            //Autenticação --
            case 'login':

                $controller = new AuthController();
                $controller->login();

                break;
                
            case 'logout':

                $this->verificarLogin();

                $controller = new AuthController();
                $controller->logout();

                break;
            //Dashboard -- 
            case 'dashboard':

                $this->verificarLogin();

                require __DIR__ . '/../Views/dashboard/index.php';

                break;
            //Clientes --
            case 'clientes':

                $this->verificarLogin();

                $controller = new ClienteController();

                $this->executarAcao(
                    $controller,
                    $acao,
                    [
                        'store'  => 'store',
                        'update' => 'update',
                        'delete' => 'delete'
                    ]
                );

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
            //Serviços --
            case 'servicos':
                $this->verificarLogin();
                $controller = new ServicoController();
                $this->executarAcao(
                    $controller,
                    $acao,
                    [
                        'store'  => 'store',
                        'update' => 'update'
                    ]
                );
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
            //Profissionais --
            case 'profissionais':

                $this->verificarLogin();

                $controller = new ProfissionalController();

                $this->executarAcao(
                    $controller,
                    $acao,
                    [
                        'store'  => 'store',
                        'update' => 'update'
                    ]
                );

                break;

            case 'profissionais-create':

                $this->verificarLogin();

                require __DIR__ . '/../Views/profissionais/create.php';

                break;

            case 'profissionais-edit':

                $this->verificarLogin();

                $controller = new ProfissionalController();

                $id = (int) ($_GET['id'] ?? 0);

                $controller->edit($id);

                break;
            //Usuários -- Adm Only
            case 'usuarios':

                $this->verificarAdmin();

                $controller = new UsuarioController();

                $this->executarAcao(
                    $controller,
                    $acao,
                    [
                        'store'  => 'store',
                        'update' => 'update'
                    ]
                );

                break;

            case 'usuarios-create':

                $this->verificarAdmin();

                require __DIR__ . '/../Views/usuarios/create.php';

                break;

            case 'usuarios-edit':

                $this->verificarAdmin();

                $controller = new UsuarioController();

                $id = (int) ($_GET['id'] ?? 0);

                $controller->edit($id);

                break;
            //Ronta não encontrada --
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

    //Padroniza a execução de ações --
    private function executarAcao($controller, $acao, array $acoes)
    {
        if ($acao !== null && isset($acoes[$acao])) {

            $metodo = $acoes[$acao];

            $controller->$metodo();

            return;
        }

        $controller->index();
    }

    //Controle de aceso --
    private function verificarLogin()
    {
        if (!isset($_SESSION['usuario_id'])) {
            header('Location: index.php?pagina=login');
            exit;
        }
    }

    private function verificarAdmin() {
        $this->verificarLogin();

        if (($_SESSION['usuario_tipo'] ?? '') !== 'ADMIN') {
            http_response_code(403);
            echo 'Acesso negado. Somente o administrador pode acessar esta área.';
            exit;
        }
    }
}
