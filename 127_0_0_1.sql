-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Abr-2021 às 21:08
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `crudsimples`
--
CREATE DATABASE IF NOT EXISTS `crudsimples` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `crudsimples`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contatos`
--

CREATE TABLE `contatos` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `celular` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `contatos`
--

INSERT INTO `contatos` (`id`, `nome`, `endereco`, `celular`) VALUES
(22, 'Lourival Arantes de Souza', 'Rua Guatemala, 453', '(14) 99192-4537'),
(23, 'Adriana Silveira ', 'Rua São Paulo, 45', '(14) 99778-1023'),
(24, 'Benedito César Souza', 'Rua Santa Catarina, 11', '(14) 99798-2314'),
(25, 'Carlos Santos da Silva', 'Rua Paraná, 45', '(16) 88123-3456'),
(26, 'Daniel de Oliveira Santos', 'Rua Lourenço Prado, 67', '(15) 99788-4512'),
(27, 'Eduardo Campos de Azevedo', 'Rua Primeiro de Março, 39', '(13) 88123-4567'),
(28, 'Fábio Ricardo Ferreira', 'Rua Dr. Italo Poli, 90', '(11) 99123-7890'),
(30, 'Hector Babenco', 'Rua São Bento, 54', '(12) 99823-5693'),
(31, 'Ivani de Freitas', 'Rua Panamá, 567', '(14) 99788-0123'),
(32, 'Lauro de Souza Gomes', 'Rua General Izidoro, 686', '(12) 99123-6543'),
(33, 'Maria da Silva Santos', 'Rua Campos Salles, 890', '(15) 88123-3490'),
(34, 'Nair Belo', 'Rua Major Prado, 2345', '(14) 99790-8976'),
(35, 'Olavo Marques dos Santos', 'Rua Desemb. José Sarney, 55', '(14) 99123-8970'),
(36, 'Pedro Pereira de Almeida', 'Rua Sete de Setembro, 7896', '(11) 99778-0932'),
(37, 'Ricardo de Oliveira', 'Rua Edgard Ferraz, 5645', '(14) 99192-7879'),
(38, 'Sebastião Camargo', 'Rua Paissandú, 1790', '(14) 99773-3067'),
(39, 'Tadeu de Albuquerque', 'Avenida Izaltino A. Carvalho, 145', '(11) 88123-8979'),
(40, 'Vanderlei dos Santos de Arruda', 'Avenida das Nações, 76', '(13) 99192-4530'),
(41, 'Ana Laura de Abreu', 'Rua Quintino Bocaiúva, 2341', '(16) 99194-5638'),
(42, 'David Teotônio de Souza', 'Rua Amaral Gurgel, 234', '(14) 99777-9235');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `contatos`
--
ALTER TABLE `contatos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `contatos`
--
ALTER TABLE `contatos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
