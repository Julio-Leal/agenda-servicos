-- Execute este script uma única vez se o banco agenda_servicos já foi criado
-- com a versão anterior do schema.sql.
-- Usuário: admin@agenda.com
-- Senha inicial: 123456

UPDATE usuario
SET SENHA = '$2y$12$DOWa7SIa9UOuxlJupQb93ecoMXXYEiwU4A.RDH6QuREiZifQ9GSDS'
WHERE EMAIL = 'admin@agenda.com';
