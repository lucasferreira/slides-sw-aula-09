-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: shared-mysql
-- Tempo de geração: 02/06/2021 às 13:40
-- Versão do servidor: 5.6.51
-- Versão do PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `satc`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `alunos`
--

DROP TABLE IF EXISTS `alunos`;
CREATE TABLE `alunos` (
  `id` int(11) NOT NULL,
  `curso_id` int(11) NOT NULL,
  `codigo` varchar(64) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cursos`
--

DROP TABLE IF EXISTS `cursos`;
CREATE TABLE `cursos` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `cursos`
--

INSERT INTO `cursos` (`id`, `name`, `updated_at`, `created_at`) VALUES
(1, 'Engenharia de Computação', '2021-06-02 00:57:27', '2021-05-19 00:43:38'),
(3, 'Publicidade e Propaganda', '2021-06-02 00:57:09', '2021-05-19 00:47:50'),
(6, 'Jornalismo', '2021-06-02 00:58:51', '2021-06-02 00:58:51');

-- --------------------------------------------------------

--
-- Estrutura para tabela `professores`
--

DROP TABLE IF EXISTS `professores`;
CREATE TABLE `professores` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `curso_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `al_code` (`codigo`),
  ADD KEY `aluno_curso_id` (`curso_id`);

--
-- Índices de tabela `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `professores`
--
ALTER TABLE `professores`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `professores`
--
ALTER TABLE `professores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
