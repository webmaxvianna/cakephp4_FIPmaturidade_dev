-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Ago-2020 às 18:37
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
-- Extraindo dados da tabela `specialties`
--

INSERT INTO `specialties` (`id`, `especialidade`, `created`, `modified`) VALUES
(1, 'Modelo de Negócios', '2020-08-06 18:28:16', '2020-08-06 18:28:16'),
(2, 'Tecnologia', '2020-08-06 18:28:30', '2020-08-06 18:28:30'),
(3, 'Inovação', '2020-08-06 18:28:38', '2020-08-06 18:28:38'),
(4, 'Jurídico', '2020-08-06 18:28:45', '2020-08-06 18:28:45'),
(5, 'Investidor', '2020-08-06 18:28:51', '2020-08-06 18:28:51'),
(6, 'Empreendedor', '2020-08-06 18:29:17', '2020-08-06 18:29:17'),
(7, 'Empresário', '2020-08-06 18:29:29', '2020-08-06 18:29:29'),
(8, 'Design Thinkings', '2020-08-06 18:30:00', '2020-08-06 18:30:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
