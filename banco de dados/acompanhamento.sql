-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 08/01/2021 às 19:17
-- Versão do servidor: 10.3.25-MariaDB-0ubuntu0.20.04.1
-- Versão do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `acompanhamento`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `atualizacoes`
--

CREATE TABLE `atualizacoes` (
  `id` int(11) NOT NULL,
  `idpedido` int(11) NOT NULL,
  `nome` varchar(244) NOT NULL,
  `descricao` text NOT NULL,
  `data` datetime NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `atualizacoes`
--

INSERT INTO `atualizacoes` (`id`, `idpedido`, `nome`, `descricao`, `data`, `tipo`) VALUES
(1, 1, 'Projeto adicionado ao sistema', 'parabéns! seu projeto foi adicionado ao sistema e em breve será feito por nossa equipe.', '2021-01-05 13:47:00', 0),
(2, 1, 'Começou a ser produzido.', 'Seu projeto começou a ser produzido por Douglas Gomes Tosta', '2021-01-05 20:47:00', 0),
(3, 1, 'Houve uma falha ao fazer seu projeto', 'fotos fornecidas com qualidade incompatível, entraremos em contato com você para resolver esse problema.', '2021-01-05 23:16:32', 2),
(4, 1, 'projeto finalizado com exito.', 'seu projeto foi finalizado com êxito e enviado a você.', '2021-01-05 23:31:24', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cargahoraria`
--

CREATE TABLE `cargahoraria` (
  `id` int(11) NOT NULL,
  `idfuncionario` int(11) NOT NULL,
  `idpedido` int(11) NOT NULL,
  `inicio` datetime NOT NULL,
  `fim` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `cargahoraria`
--

INSERT INTO `cargahoraria` (`id`, `idfuncionario`, `idpedido`, `inicio`, `fim`) VALUES
(1, 1, 1, '2021-01-06 15:43:17', '2021-01-06 19:43:17'),
(2, 1, 1, '2021-01-06 19:00:45', '2021-01-08 16:07:23');

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id` int(11) NOT NULL,
  `nivel` int(11) NOT NULL,
  `nome` varchar(244) NOT NULL,
  `email` varchar(244) NOT NULL,
  `senha` varchar(244) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id`, `nivel`, `nome`, `email`, `senha`) VALUES
(1, 0, 'Douglas Gomes Tosta', 'douglasgomestosta@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `nome` text NOT NULL,
  `ultimoupdate` datetime NOT NULL,
  `data_prevista` date NOT NULL,
  `codigosecreto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `status`, `nome`, `ultimoupdate`, `data_prevista`, `codigosecreto`) VALUES
(1, 1, 'Criação de site portfolio', '2021-01-05 19:19:34', '2021-01-31', 123);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `atualizacoes`
--
ALTER TABLE `atualizacoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `cargahoraria`
--
ALTER TABLE `cargahoraria`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `atualizacoes`
--
ALTER TABLE `atualizacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `cargahoraria`
--
ALTER TABLE `cargahoraria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
