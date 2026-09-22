<?php 
    namespace App\Controllers;

    use App\Repositories\ClienteRepository;
    use App\Models\Cliente;

    class ClienteController {
        private $repository;
        
        public function __construct() {
            $this->repository  = new ClienteRepository();
        }

        public function create(Cliente $cliente) {
            $resultado = $this->repository->create($cliente);
            return $resultado;
        }

        public function findAll() {
            $clientes = $this->repository->findAll();
            return $clientes;
        }

        public function findById(int $id) {
            $cliente = $this->repository->findById($id);
            return $cliente;
        }

        public function update(Cliente $cliente) {
            $resultado = $this->repository->update($cliente);
            return $resultado;
        }

        public function delete(int $id) {
            $resultado = $this->repository->delete($id);
            return $resultado;
        }
    }
?>