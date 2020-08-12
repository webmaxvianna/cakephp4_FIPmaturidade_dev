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
-- Extraindo dados da tabela `interests`
--

INSERT INTO `interests` (`id`, `interesse`, `created`, `modified`) VALUES
(1, 'Participação em eventos', '2020-08-06 18:06:09', '2020-08-06 18:06:09'),
(2, 'Networking e encontros', '2020-08-06 18:06:17', '2020-08-06 18:06:17'),
(3, 'Realização de cursos', '2020-08-06 18:08:12', '2020-08-06 18:08:12'),
(4, 'Desenvolvimento de idéias', '2020-08-06 18:08:27', '2020-08-06 18:08:27'),
(5, 'Palestras', '2020-08-06 18:08:42', '2020-08-06 18:08:42'),
(6, 'Hackatons e competições', '2020-08-06 18:15:04', '2020-08-06 18:15:04'),
(7, 'Primeiros passos para uma startup', '2020-08-06 18:15:27', '2020-08-06 18:15:27'),
(8, 'Promoção de cursos/eventos', '2020-08-06 18:15:38', '2020-08-06 18:15:38'),
(9, 'Mentoria', '2020-08-06 18:16:43', '2020-08-06 18:16:43');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
