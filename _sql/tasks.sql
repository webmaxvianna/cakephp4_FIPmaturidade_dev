-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Ago-2020 às 11:56
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
-- Extraindo dados da tabela `tasks`
--

INSERT INTO `tasks` (`id`, `atividade`, `dimensao`, `tipo`, `data_inicial`, `data_final`, `created`, `modified`) VALUES
(1, '<p>Conhecer fatores chaves relacionados com a solução proposta:\r\npolíticos, sociais, ambientais, culturais e legais&nbsp;<br></p>', 'Complementar', 'Conhecimento', NULL, NULL, '2020-08-07 11:53:31', '2020-08-07 11:53:31'),
(2, '<p>Conhecer as implicações jurídicas da solução&nbsp;<br></p>', 'Complementar', 'Conhecimento', NULL, NULL, '2020-08-07 11:53:59', '2020-08-07 11:53:59'),
(3, '<p>Avaliar possíveis oportunidades em função dos fatores e riscos\r\nconhecidos<br></p>', 'Complementar', 'Habilidade', NULL, NULL, '2020-08-07 11:54:25', '2020-08-07 11:54:25'),
(4, '<p>Quantificar o custo do problema para os clientes<br></p>', 'Finanças', 'Habilidade', NULL, NULL, '2020-08-07 11:54:42', '2020-08-07 11:54:42'),
(5, '<p>Conhecer o valor de mercado das soluções existentes<br></p>', 'Finanças', 'Conhecimento', NULL, NULL, '2020-08-07 11:55:03', '2020-08-07 11:55:03'),
(6, '<p>Conhecer os serviços oferecidos pelo PCT<br></p>', 'Gestão', 'Conhecimento', NULL, NULL, '2020-08-07 11:55:24', '2020-08-07 11:55:24');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
