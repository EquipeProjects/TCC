-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Set-2023 às 03:36
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

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
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tipo_usuario` enum('cliente','vendedor') NOT NULL DEFAULT 'cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `username`, `password`, `nome`, `email`, `tipo_usuario`) VALUES
(1, 'a', '123', 'sdd', 'daviribeiroandre67@gmail.com', 'cliente'),
(2, 'a333', '2344', 'davi ribeiro andre', 'daviribeiroandre67@gmail.com', 'cliente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagens_produto`
--

CREATE TABLE `imagens_produto` (
  `id` int(11) NOT NULL,
  `produto_id` int(11) DEFAULT NULL,
  `caminho` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `nome_cliente` varchar(255) NOT NULL,
  `total_pedido` decimal(10,2) NOT NULL,
  `status_pagamento` enum('pendente','processando','pago','cancelado') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id`, `nome_cliente`, `total_pedido`, `status_pagamento`) VALUES
(1, 'Exemplo de Nome do Cliente', '219903.00', 'pendente'),
(2, 'Exemplo de Nome do Cliente', '219900.00', 'pendente'),
(3, 'Exemplo de Nome do Cliente', '23.00', 'pendente');

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
  `subcategoria` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `valor`, `descricao`, `imagem`, `categoria_id`, `subcategoria`) VALUES
(13, 'davi ribeiro andre', '23.00', 'aaaa', 0x75706c6f6164732f67322e706e67, 1, NULL),
(14, 'tenis', '23.00', 'aaddd', 0x75706c6f6164732f63616465726e6f2e6a7067, 1, NULL),
(19, 'ass', '55.00', 'womna', 0x75706c6f6164732f776f6e792e6a7067, 3, 'TOPS / CROPPEDS'),
(20, 'tenis', '5000.00', 'saaa', NULL, 3, NULL),
(22, 'yyyy', '0.00', '', 0x75706c6f6164732f626c6f7175696e686f2e6a7067, 0, ''),
(35, 'MORANGAS', '219900.00', 'O MORANGO E BOM MAS VOCÊ NÃO VIU O MORANGETE.', 0x75706c6f6164732f696d6167656d5f323032332d30392d31395f3134313632373934312e706e67, 4, 'INFANTIL'),
(36, 'tenis', '34.00', 'yuszsttdgdf', 0x75706c6f6164732f, 2, 'JEANS'),
(37, 'testew', '99.00', '', 0x75706c6f6164732f, 1, 'CALÇAS'),
(42, 't4rertertrt', '3.00', '', 0x75706c6f6164732f63616465726e6f2e6a7067, 2, 'JEANS'),
(54, 'dddd', '0.00', '', 0x75706c6f6164732f, 2, 'BLUSAS');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tamanhos`
--

CREATE TABLE `tamanhos` (
  `tamanho_id` int(11) NOT NULL,
  `nome_tamanho` varchar(10) DEFAULT NULL,
  `estoque` int(11) DEFAULT NULL,
  `produto_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tamanhos`
--

INSERT INTO `tamanhos` (`tamanho_id`, `nome_tamanho`, `estoque`, `produto_id`) VALUES
(1, 'eu', 0, NULL),
(2, 'souu', 0, NULL),
(3, 'a', 0, NULL),
(4, 'b', 0, NULL),
(5, 'c', 0, NULL),
(21, 'g', 50, 36),
(22, 'gg', 30, 36),
(27, '100', 0, 35),
(28, '200', 90, 35),
(29, 'm', 30, 37),
(37, 'f', 39, 54),
(38, 'm', 70, 54);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendedores`
--

CREATE TABLE `vendedores` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tipo_usuario` enum('cliente','vendedor') NOT NULL DEFAULT 'vendedor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `vendedores`
--

INSERT INTO `vendedores` (`id`, `username`, `password`, `nome`, `email`, `tipo_usuario`) VALUES
(1, 'a444', '2344', 'dddd', 'd@gmail.com', 'vendedor'),
(2, 'tio bill', '3', 'microsoft', 'd@gmail.com', 'vendedor'),
(3, 'teste', '3', 'jose', 'd@gmail.com', 'vendedor');

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
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Índices para tabela `imagens_produto`
--
ALTER TABLE `imagens_produto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produto_id` (`produto_id`);

--
-- Índices para tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tamanhos`
--
ALTER TABLE `tamanhos`
  ADD PRIMARY KEY (`tamanho_id`),
  ADD KEY `fk_size_product` (`produto_id`);

--
-- Índices para tabela `vendedores`
--
ALTER TABLE `vendedores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

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
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `imagens_produto`
--
ALTER TABLE `imagens_produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de tabela `tamanhos`
--
ALTER TABLE `tamanhos`
  MODIFY `tamanho_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de tabela `vendedores`
--
ALTER TABLE `vendedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `imagens_produto`
--
ALTER TABLE `imagens_produto`
  ADD CONSTRAINT `imagens_produto_ibfk_1` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tamanhos`
--
ALTER TABLE `tamanhos`
  ADD CONSTRAINT `fk_size_product` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
