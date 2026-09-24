# Agenda de Serviços

Sistema web para gerenciamento de clientes, profissionais e serviços, desenvolvido como projeto acadêmico em PHP 8+ com MySQL/MariaDB.

O projeto tem como objetivo aplicar conceitos de desenvolvimento web, formulários, validações no servidor, autenticação, sessões, persistência de dados e organização do código utilizando separação entre lógica e apresentação.

## Integrante

- **JÚLIO ANDRÉ CAVALCANTE LEAL**

O projeto está sendo desenvolvido individualmente.

## Tecnologias utilizadas

- PHP 8+
- MySQL/MariaDB
- PDO
- Composer
- HTML5
- CSS3
- JavaScript
- Arquitetura baseada na separação entre Controllers, Models, Repositories e Views

O projeto **não utiliza frameworks PHP**, como Laravel.

## Requisitos para execução

Para executar o sistema, é necessário ter instalado:

- PHP 8 ou superior
- MySQL ou MariaDB
- Composer
- Extensão PDO
- Extensão PDO_MySQL
- Servidor web Apache ou servidor embutido do PHP

## Estrutura do projeto

```text
agenda-servicos/
│
├── app/
│   ├── Controllers/
│   ├── Core/
│   ├── Models/
│   ├── Repositories/
│   └── Views/
│
├── config/
│   └── database.php
│
├── database/
│   ├── schema.sql
│   └── auth_update.sql
│
├── public/
│   ├── assets/
│   └── index.php
│
├── vendor/
├── composer.json
└── README.md
```

### Organização das principais partes

- **Controllers:** recebem as requisições e controlam o fluxo da aplicação.
- **Models:** representam as entidades utilizadas pelo sistema.
- **Repositories:** concentram o acesso e as operações realizadas no banco de dados.
- **Views:** responsáveis pela apresentação HTML das páginas.
- **Core:** contém componentes centrais da aplicação, como conexão com o banco e roteamento.
- **config:** contém as configurações do sistema.
- **database:** contém os scripts SQL necessários para criação e atualização do banco.
- **public:** contém o ponto de entrada da aplicação.

## Instalação e configuração

### 1. Clonar o projeto

Clone o repositório do GitHub:

```bash
git clone URL_DO_REPOSITORIO
```

Entre na pasta:

```bash
cd agenda-servicos
```

### 2. Instalar as dependências

Execute:

```bash
composer install
```

O projeto utiliza o Composer principalmente para o autoload das classes.

### 3. Criar o banco de dados

Crie um banco de dados chamado:

```text
agenda_servicos
```

Depois execute o arquivo:

```text
database/schema.sql
```

Esse script cria as tabelas utilizadas pelo sistema.

### 4. Configurar a conexão com o banco

Edite:

```text
config/database.php
```

Configure os dados de acordo com o ambiente utilizado:

```php
return [
    'host' => '127.0.0.1',
    'port' => '3306',
    'database' => 'agenda_servicos',
    'username' => 'root',
    'password' => ''
];
```

Caso o MySQL/MariaDB possua senha para o usuário configurado, altere o campo `password`.

### 5. Atualização da senha do administrador

Se o banco já tiver sido criado utilizando uma versão anterior do projeto, execute uma única vez:

```text
database/auth_update.sql
```

Esse script atualiza a senha inicial do administrador para o formato de hash utilizado pelo sistema.

### 6. Executar a aplicação

Uma opção é utilizar o servidor embutido do PHP:

```bash
php -S localhost:8000 -t public
```

Depois acesse:

```text
http://localhost:8000
```

Também é possível utilizar um servidor Apache, como o disponibilizado pelo XAMPP, configurando o projeto de acordo com o ambiente local.

## Acesso inicial

O sistema possui um usuário administrador inicial:

```text
E-mail: admin@agenda.com
Senha: 123456
```

A senha não é armazenada em texto puro. O sistema utiliza `password_hash()` para armazenamento e `password_verify()` para verificar a senha durante o login.

## Autenticação e sessão

O sistema possui autenticação baseada em sessão PHP.

Após um login válido, são armazenadas na sessão informações do usuário, como:

- ID;
- nome;
- e-mail;
- tipo de usuário.

As áreas internas do sistema verificam se existe uma sessão de usuário autenticado antes de permitir o acesso.

O logout encerra a sessão e retorna o usuário para a tela de login.

## Funcionalidades do Trabalho 1

### Autenticação

- Login;
- Logout;
- Controle de sessão;
- Proteção das áreas internas.

### Clientes

- Cadastro;
- Listagem;
- Edição;
- Exclusão;
- Validação dos dados enviados pelo formulário;
- Tratamento de CPF duplicado.

### Serviços

- Cadastro;
- Listagem;
- Edição;
- Controle do status ativo/inativo;
- Validação dos dados enviados pelo formulário.

### Profissionais

- Cadastro;
- Listagem;
- Edição;
- Controle do status ativo/inativo;
- Validação do nome;
- Validação do telefone quando informado;
- Validação do e-mail quando informado.

### Validações

As validações são realizadas no lado do servidor, utilizando PHP.

Entre as validações implementadas estão:

- campos obrigatórios;
- formato de e-mail;
- existência de registros para edição;
- valores numéricos válidos;
- duração do serviço maior que zero;
- preço válido;
- CPF duplicado;
- telefone com quantidade válida de dígitos.

## Arquitetura

A aplicação utiliza uma organização baseada na separação entre lógica e apresentação.

O fluxo principal de uma requisição segue, de forma geral:

```text
Cliente
   ↓
public/index.php
   ↓
Router
   ↓
Controller
   ↓
Repository
   ↓
Database / PDO
   ↓
MySQL/MariaDB
```

Quando necessário, o Controller também carrega a View responsável pela apresentação dos dados.

Essa organização busca evitar que regras de negócio e acesso ao banco fiquem diretamente misturados com o HTML.

## Segurança

O projeto utiliza algumas práticas básicas de segurança:

- sessões para autenticação;
- `password_hash()` para armazenamento de senhas;
- `password_verify()` para validação de senhas;
- PDO;
- prepared statements;
- validações no servidor;
- escape de dados apresentados no HTML.

## Estado atual do projeto

### Trabalho 1

- [x] PHP 8+
- [x] Banco de dados relacional
- [x] Separação entre lógica e apresentação
- [x] Controllers
- [x] Models
- [x] Repositories
- [x] Views
- [x] Formulários
- [x] Validação no servidor
- [x] Tratamento de erros
- [x] Autenticação
- [x] Sessão
- [x] Áreas protegidas
- [x] Interface gráfica
- [x] Listagem de dados
- [x] Cadastro e edição de clientes
- [x] Cadastro e edição de serviços
- [x] Cadastro e edição de profissionais

### Próximas funcionalidades

As funcionalidades abaixo fazem parte da evolução planejada do sistema:

- [ ] Cadastro e gerenciamento de agendamentos
- [ ] Regras de conflito de horários
- [ ] Dashboard com dados reais do sistema
- [ ] Revisão final de testes e validações

## Observações

O projeto está sendo desenvolvido individualmente por **JÚLIO ANDRÉ CAVALCANTE LEAL**.

O Trabalho 1 concentra os requisitos de PHP, formulários, validação no servidor, separação da lógica e apresentação e autenticação.

O módulo de profissionais foi incluído como o terceiro conjunto de cadastro/edição do Trabalho 1. O módulo de agendamentos será desenvolvido nas etapas seguintes do projeto.

## Bugs ou limitações conhecidas

Até o momento, as funcionalidades implementadas do Trabalho 1 são:

- autenticação e sessão;
- cadastro, edição, listagem e exclusão de clientes;
- cadastro, edição e listagem de serviços;
- alteração do status dos serviços;
- cadastro, edição e listagem de profissionais;
- alteração do status dos profissionais;
- validações no servidor.

As funcionalidades ainda não implementadas estão descritas na seção **Próximas funcionalidades**.
