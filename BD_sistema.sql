-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Fev-2021 às 18:56
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sistema`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `client_name` varchar(60) NOT NULL,
  `client_email` varchar(60) NOT NULL,
  `client_address` varchar(100) NOT NULL,
  `client_tel` varchar(50) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `clients`
--

INSERT INTO `clients` (`id`, `client_name`, `client_email`, `client_address`, `client_tel`, `status`) VALUES
(1, 'Juliano', 'juliano@juliano.mx', 'Rua qualquer', '41984040962', 'active'),
(2, 'Lizie', 'robsonj2011@gmail.com', 'Qualquer', '41984040962', 'robsonj2011@gma'),
(3, 'Juliano sw', 'test@teste', 'Qualquer', '41984040962', 'inactive'),
(4, 'Robson', 'test@teste', 'Qualquer', '41984040962', 'active');

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

CREATE TABLE `products` (
  `id` int(5) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `product_cod` varchar(30) NOT NULL,
  `weight` varchar(10) NOT NULL,
  `product_sizes` varchar(30) NOT NULL,
  `product_type` varchar(20) NOT NULL,
  `product_stock` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`id`, `product_name`, `company_name`, `unit`, `product_cod`, `weight`, `product_sizes`, `product_type`, `product_stock`) VALUES
(1, '', '', '', '', '', '', '', ''),
(3, 'PAPEL', 'TESTE', 'teste', '00002', '0,10', '15x21', 'teste', '10'),
(4, 'TINTA AZUL', 'teste', 'FOLHAS', '00002', '10', '20X25', 'PACOTE', '11'),
(5, 'TINTA VERMELHA', 'INSTAIMPRESSO', 'FOLHAS', '1024', '10', '20X25', 'PACOTE', '11');

-- --------------------------------------------------------

--
-- Estrutura da tabela `providers`
--

CREATE TABLE `providers` (
  `id` int(11) NOT NULL,
  `provider_name` varchar(60) NOT NULL,
  `provider_email` varchar(60) NOT NULL,
  `provider_address` varchar(100) NOT NULL,
  `provider_tel` varchar(50) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `providers`
--

INSERT INTO `providers` (`id`, `provider_name`, `provider_email`, `provider_address`, `provider_tel`, `status`) VALUES
(33, 'Robson Juliano', 'testes@teste.com', '13213', '2123132', 'active');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_register`
--

CREATE TABLE `user_register` (
  `id` int(5) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `img_dir` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `user_register`
--

INSERT INTO `user_register` (`id`, `firstname`, `lastname`, `username`, `password`, `role`, `status`, `img_dir`) VALUES
(1, 'Admin', 'admin', 'admin', 'admin', 'Admin', 'active', 'upload/gsw.png'),
(137, 'admin2', 'admin2', 'admin2', 'admin2', 'Admin', 'active', 'upload/Impressao-62.jpg'),
(138, 'teste16', '', 'teste16', 'teste55', 'User', 'active', 'upload/'),
(139, 'usuario', '', 'usuario', 'teste55', 'User', 'active', 'upload/');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_rules`
--

CREATE TABLE `user_rules` (
  `id` int(5) NOT NULL,
  `user_id` int(10) NOT NULL,
  `user_type` varchar(10) NOT NULL,
  `date_creation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `user_register`
--
ALTER TABLE `user_register`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `user_rules`
--
ALTER TABLE `user_rules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `products`
--
ALTER TABLE `products`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `providers`
--
ALTER TABLE `providers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `user_register`
--
ALTER TABLE `user_register`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT de tabela `user_rules`
--
ALTER TABLE `user_rules`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `user_rules`
--
ALTER TABLE `user_rules`
  ADD CONSTRAINT `user_rules_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_register` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
