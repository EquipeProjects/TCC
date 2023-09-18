-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Set-2023 às 03:24
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `meubanco`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `id` int(11) NOT NULL,
  `produto_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `preco` decimal(10,2) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `data_pedido` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`) VALUES
(1, 'masculino'),
(2, 'unissex'),
(3, 'feminino'),
(4, 'calçados');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `imagem` blob DEFAULT NULL,
  `categoria_id` int(11) DEFAULT NULL,
  `subcategoria` varchar(255) DEFAULT NULL,
  `tamanho_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `valor`, `descricao`, `imagem`, `categoria_id`, `subcategoria`, `tamanho_id`) VALUES
(13, 'davi ribeiro andre', '23.00', 'aaaa', 0x75706c6f6164732f67322e706e67, 1, NULL, NULL),
(14, 'tenis', '23.00', 'aaddd', 0x75706c6f6164732f63616465726e6f2e6a7067, 1, NULL, NULL),
(16, 'aaaaaa', '909090.00', 'adfdfadfafafs', 0x75706c6f6164732f726f757061312e6a7067, 1, NULL, NULL),
(18, 'siuuu', '90.00', '', 0x75706c6f6164732f, 4, 'MASCULINOS', NULL),
(19, 'ass', '55.00', 'womna', 0x75706c6f6164732f776f6e792e6a7067, 3, 'TOPS / CROPPEDS', NULL),
(20, 'tenis', '5000.00', 'saaa', NULL, 3, NULL, NULL),
(21, 'sarsd', '120.00', '', 0x75706c6f6164732f, 3, 'JEANS', NULL),
(22, 'yyyy', '0.00', '', 0x75706c6f6164732f626c6f7175696e686f2e6a7067, 0, '', NULL),
(23, 'men', '8090.00', 'siuuuu', 0x75706c6f6164732f556e7469746c6564202d20322e706e67, 1, 'BLUSAS', NULL),
(24, 'ruiom', '0.00', '', 0x75706c6f6164732f, 0, '', NULL),
(25, 'ruiom', '0.00', '', 0x75706c6f6164732f, 0, '', NULL),
(26, 'ruiu mhmg', '0.00', '', 0x75706c6f6164732f, 0, '', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tamanhos`
--

CREATE TABLE `tamanhos` (
  `tamanho_id` int(11) NOT NULL,
  `nome_tamanho` varchar(10) DEFAULT NULL,
  `estoque` int(11) DEFAULT NULL,
  `produto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tamanhos`
--

INSERT INTO `tamanhos` (`tamanho_id`, `nome_tamanho`, `estoque`, `produto_id`) VALUES
(1, 'eu', 0, 0),
(2, 'souu', 0, 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_size` (`tamanho_id`);

--
-- Índices para tabela `tamanhos`
--
ALTER TABLE `tamanhos`
  ADD PRIMARY KEY (`tamanho_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `tamanhos`
--
ALTER TABLE `tamanhos`
  MODIFY `tamanho_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `fk_product_size` FOREIGN KEY (`tamanho_id`) REFERENCES `tamanhos` (`tamanho_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
