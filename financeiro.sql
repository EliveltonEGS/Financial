-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 05/10/2020 às 01:17
-- Versão do servidor: 10.4.14-MariaDB
-- Versão do PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `financeiro`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `balance` double NOT NULL,
  `agency` varchar(50) NOT NULL,
  `account` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `client`
--

INSERT INTO `client` (`id`, `name`, `cpf`, `balance`, `agency`, `account`) VALUES
(3, 'elivelton', '12345678932', 1000, '6269', '8888'),
(4, 'Client 02', '98765432101', 2000, '789', '5050');

-- --------------------------------------------------------

--
-- Estrutura para tabela `credit`
--

CREATE TABLE `credit` (
  `id` int(11) NOT NULL,
  `value` double NOT NULL,
  `id_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `debit`
--

CREATE TABLE `debit` (
  `id` int(11) NOT NULL,
  `value` double NOT NULL,
  `id_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `transfer`
--

CREATE TABLE `transfer` (
  `id` int(11) NOT NULL,
  `value` double NOT NULL,
  `id_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `credit`
--
ALTER TABLE `credit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_credit_client` (`id_client`);

--
-- Índices de tabela `debit`
--
ALTER TABLE `debit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_debit_client` (`id_client`);

--
-- Índices de tabela `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_transfer_client` (`id_client`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `credit`
--
ALTER TABLE `credit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `debit`
--
ALTER TABLE `debit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `transfer`
--
ALTER TABLE `transfer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `credit`
--
ALTER TABLE `credit`
  ADD CONSTRAINT `FK_credit_client` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`);

--
-- Restrições para tabelas `debit`
--
ALTER TABLE `debit`
  ADD CONSTRAINT `FK_debit_client` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`);

--
-- Restrições para tabelas `transfer`
--
ALTER TABLE `transfer`
  ADD CONSTRAINT `FK_transfer_client` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
