-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Ago-2020 às 11:36
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `u163901951_maturidade`
--

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `nome`, `sobrenome`, `nome_completo`, `data_nascimento`, `sexo`, `email`, `username`, `password`, `foto`, `status`, `confirmacao_email`, `confirmacao_celular`, `cpf`, `rg`, `facebook`, `linkedin`, `instagram`, `lattes`, `telefone1`, `telefone2`, `cep`, `logradouro`, `numero`, `complemento`, `bairro`, `cidade`, `estado`, `pais`, `role_id`, `created`, `modified`) VALUES
(1, 'Max', 'Vianna', 'Max Vianna', '1978-05-22', 'Masculino', 'max@teste.com', 'maxvianna', '$2y$10$r/mSJdE8P3sMAoMDRNZgy.v7ee.L7Jdjy8X3DKwAEKmTNdL3FV8ka', '', 1, 0, 0, '', '', '', '', '', '', '12981583387', '', '19013710', '', '', '', '', 'Presidente Prudente', 'SP', 'Brasil', 1, '2020-08-05 17:10:16', '2020-08-05 17:10:16'),
(2, 'Gestor 1', 'Teste', 'Gestor 1 Teste', '1910-01-01', 'Masculino', 'gestor1@teste.com', 'gestor1', '$2y$10$NO2eUq7I57X..5BNnjJkB.v6m/puJ2KfdbYFSG6dCV17ihG6df3zy', '', 1, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '2020-08-07 11:31:07', '2020-08-07 11:31:07'),
(3, 'Avaliador 1', 'Teste', 'Avaliador 1 Teste', '1920-02-02', 'Masculino', 'avaliador1@teste.com', 'avaliador1', '$2y$10$YminCDMKfebaLFzPpFAarephTCNQGXgagG5gID7Ugvmc5DwXdUGXe', '', 1, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 2, '2020-08-07 11:32:03', '2020-08-07 11:32:03'),
(4, 'Candidato 1', 'Teste', 'Candidato 1 Teste', '1930-03-03', 'Masculino', 'candidato1@teste.com', 'candidato1', '$2y$10$bQ1lJ7pyWcBVieFePzm7pO8xdKByIvf8RVJoX5Zvk6RqQ5yUkov4W', '', 1, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 3, '2020-08-07 11:32:44', '2020-08-07 11:32:44'),
(5, 'Consultor 1', 'Teste', 'Consultor 1 Teste', '1950-05-05', 'Masculino', 'consultor1@teste.com', 'consultor1', '$2y$10$sKGGdMcWkhk78Qq3nAy0Z.05KWMbAGu.Kz5sa4AzLAfUnxBdl0VVe', '', 1, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 4, '2020-08-07 11:33:48', '2020-08-07 11:33:48'),
(6, 'Jurado 1', 'Teste', 'Jurado 1 Teste', '1960-06-06', 'Masculino', 'jurado1@teste.com', 'jurado1', '$2y$10$DOq/lK9jD4c2ZH6pcpYLYuuLqYewvRwRrQmSSqG.Kxd/LQNV/ujh.', '', 1, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 5, '2020-08-07 11:34:32', '2020-08-07 11:34:32');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
