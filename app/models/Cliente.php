<?php 
    class Usuario {
        private int $id;
        private String $nome;
        private String $email;
        private String $senha;
        private String $tipo;
        private String $criadoEm;

        public function __construct( 
            string $nome, 
            string $email, 
            string $senha, 
            string $tipo = 'FUNCIONARIO' 
        ) { 
            $this->nome = $nome; 
            $this->email = $email; 
            $this->senha = $senha; 
            $this->tipo = $tipo; 
        }

        public function getId(): ?int {
            return $this->id ?? null;
        }

        public function getNome(): String {
            return $this->nome;
        }

        public function setNome(String $nome): void {
            $this->nome = $nome;
        } 

        public function getEmail(): String {
            return $this->email;
        }

        public function setEmail(String $email): void {
            $this->email = $email;
        }

        public function getSenha(): String {
            return $this->senha;
        }

        public function setSenha(String $senha): void {
            $this->senha = $senha;
        }

        public function getTipo(): String {
            return $this->tipo;
        }

        public function setTipo(String $tipo): void {
            $this->tipo = $tipo;
        }

        public function getCriadoEm(): ?String {
            return $this->criadoEm ?? null;
        }
    }
?>