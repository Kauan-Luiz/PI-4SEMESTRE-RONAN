-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Dez-2025 às 20:28
-- Versão do servidor: 10.4.32-MariaDB
-- versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projects_level`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` text DEFAULT NULL,
  `preco` decimal(10,2) NOT NULL,
  `cor` varchar(50) DEFAULT NULL,
  `quantidade` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `descricao`, `preco`, `cor`, `quantidade`) VALUES
(2, 'carro', 'veio', 10000.00, NULL, 5),
(3, 'Antonio', 'feio', 10000.00, NULL, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` bigint(20) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `rua` varchar(255) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `complemento` varchar(50) DEFAULT NULL,
  `bairro` varchar(255) DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `nivel_de_acesso` enum('Administrador','Funcionário','Cliente') NOT NULL,
  `senha` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome`, `cpf`, `data_nascimento`, `celular`, `rua`, `numero`, `complemento`, `bairro`, `cidade`, `cep`, `estado`, `email`, `nivel_de_acesso`, `senha`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Kauan Luiz', '460.214.108-07', '2005-12-25', '14988374605', 'Arthur Silva', '234', 'Casa', 'Recanto Regina', 'Barra Bonita', '17342-240', 'Sã', 'Kauan@outlook.com', '', '$2y$10$GZ5oY2ijr/v0fiePVxYgQeo7k1Pe3w5zxjdZKNvp9DEiz4NLlimg6', '2025-11-16 16:04:33', '2025-12-04 17:16:38', NULL),
(2, 'Kauan Luiz', '46021410807', '2005-12-25', '14988374605', 'Arthur Silva', '234', 'Casa', 'Recanto Regina', 'Barra Bonita', '17342240', 'Sã', 'admin@admin.com', '', '$2y$10$eokF6h8q9fWV8ngU8HPPO.YrXcYfPlXXy8vggAl8iSqhOubMGi6vO', '2025-12-03 23:03:47', '2025-12-03 23:03:47', NULL),
(3, 'Antonio', '460.214.108-07', '2005-12-25', '14988374605', 'Arthur Silva', '234', NULL, 'Recanto Regina', 'Barra Bonita', '17342-240', 'Sã', 'antoniotonicarlos0@gmail.com', '', '$2y$10$UBopA1AYm.r1M8B9vNR25u1eU5lBwIoU0MnqhVNPUaF6fKMnzoGGO', '2025-12-03 23:09:09', '2025-12-03 23:09:09', NULL),
(4, 'Antonio', '460.214.108-07', '2005-12-25', '14988374605', 'Arthur Silva', '234', NULL, 'Recanto Regina', 'Barra Bonita', '17342-240', 'Sã', 'antoniotonicarlos0@gmail.com', '', '$2y$10$d5odCzFRuVbuhKT4wgtE/.uLBgBGZ0YqWSRuwsuoAu74TDZt34sAi', '2025-12-03 23:09:16', '2025-12-03 23:09:16', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
