-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Ago-2020 às 18:38
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
-- Extraindo dados da tabela `characteristics`
--

INSERT INTO `characteristics` (`id`, `sobre`, `created`, `modified`) VALUES
(1, 'Sou um empreendedor de uma startup', '2020-08-06 18:01:24', '2020-08-06 18:01:24'),
(2, 'Trabalho para uma startup (mas não sou o fundador)', '2020-08-06 18:01:59', '2020-08-06 18:01:59'),
(3, 'Tenho interesse na comunidade empreendedora (mas não estou trabalhando em uma startup)', '2020-08-06 18:02:13', '2020-08-06 18:02:13'),
(4, 'Sou um mentor', '2020-08-06 18:02:24', '2020-08-06 18:02:24'),
(5, 'Sou um investidor', '2020-08-06 18:02:33', '2020-08-06 18:02:33'),
(6, 'Sou um empresário', '2020-08-06 18:02:44', '2020-08-06 18:02:44'),
(7, 'Sou um estudante', '2020-08-06 18:03:04', '2020-08-06 18:03:04'),
(8, 'Sou um professor e/ou pesquisador', '2020-08-06 18:03:14', '2020-08-06 18:03:14');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
