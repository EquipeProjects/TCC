-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Nov-2023 às 19:17
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
-- Estrutura da tabela `avaliacoes`
--

CREATE TABLE `avaliacoes` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `produto_id` int(11) DEFAULT NULL,
  `avaliacao` int(11) DEFAULT NULL,
  `comentario` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `avaliacoes`
--

INSERT INTO `avaliacoes` (`id`, `cliente_id`, `produto_id`, `avaliacao`, `comentario`) VALUES
(33, 1, 68, 1, 'z'),
(34, 1, 68, 5, 'cc'),
(35, 1, 68, 5, 'a'),
(36, 1, 68, 2, 'd'),
(37, 1, 65, 1, ''),
(38, 1, 65, 4, 'a'),
(39, 1, 65, 6, 'c'),
(40, 1, 65, 9, 'ss'),
(41, 1, 65, 10, 'd'),
(42, 1, 65, 10, 'f'),
(43, 1, 65, 5, 's'),
(44, 1, 65, 5, 's'),
(45, 1, 65, 0, 's'),
(46, 1, 68, 4, 'o'),
(47, 1, 68, 5, '0'),
(48, 1, 68, 0, '0'),
(49, 1, 68, 5, '='),
(50, 1, 68, 5, ''),
(51, 1, 68, 5, ''),
(52, 1, 68, 5, ''),
(53, 1, 68, 1, 'a'),
(54, 1, 68, 4, 's'),
(55, 1, 68, 5, 's'),
(56, 1, 68, 5, 'a'),
(57, 1, 68, 5, 'as'),
(66, 1, 55, 5, 'ss'),
(67, 1, 65, 1, ''),
(68, 1, 65, 5, ''),
(69, 1, 65, 5, ''),
(70, 1, 65, 4, ''),
(71, 1, 70, 4, 'teste'),
(72, 1, 55, 3, 'oiiiiii'),
(73, 1, 55, 1, 'o q eu faço?'),
(74, 1, 70, 1, 'a'),
(75, 1, 70, 5, 's'),
(76, 1, 70, 4, 'ad'),
(77, 1, 70, 1, 'kakakaka obg\n'),
(78, 1, 70, 5, 'simmmm'),
(79, 1, 65, 1, 'v'),
(80, 1, 65, 1, 'a'),
(81, 1, 65, 10, ''),
(82, 1, 65, 1, '1'),
(83, 1, 65, 5, 'testee');

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
-- Estrutura da tabela `favoritos`
--

CREATE TABLE `favoritos` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagens_produto`
--

CREATE TABLE `imagens_produto` (
  `id` int(11) NOT NULL,
  `produto_id` int(11) DEFAULT NULL,
  `caminho` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `imagens_produto`
--

INSERT INTO `imagens_produto` (`id`, `produto_id`, `caminho`) VALUES
(11, 60, 'uploads/lesera.jpg'),
(20, 68, 'uploads/imagem_2023-11-21_115051006.png'),
(21, 68, 'uploads/imagem_2023-11-21_115052718.png'),
(22, 68, 'uploads/imagem_2023-11-21_115054670.png'),
(26, 70, 'uploads/31Nl3mlrWHL._AC_SX522_.jpg'),
(27, 70, 'uploads/41sh5g-X+LL._AC_SX522_.jpg'),
(28, 70, 'uploads/81jwYv5F10L._AC_SY500_.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens_pedido`
--

CREATE TABLE `itens_pedido` (
  `id_item_pedido` int(11) NOT NULL,
  `id_pedido` int(11) DEFAULT NULL,
  `id_produto` int(11) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `preco_unitario` decimal(10,2) DEFAULT NULL,
  `total_item` decimal(10,2) DEFAULT NULL,
  `valor_frete` decimal(10,2) DEFAULT NULL,
  `tamanho` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `itens_pedido`
--

INSERT INTO `itens_pedido` (`id_item_pedido`, `id_pedido`, `id_produto`, `quantidade`, `preco_unitario`, `total_item`, `valor_frete`, `tamanho`) VALUES
(1, 1, 5, 10, '33.00', '330.00', NULL, '0'),
(2, 2, 5, 1, '33.00', '33.00', NULL, '0'),
(3, 3, 6, 1, '50.00', '50.00', '10.05', '0'),
(4, 4, 6, 1, '50.00', '50.00', '9.94', '0'),
(5, 4, 8, 1, '100.00', '100.00', '9.94', '0'),
(6, 4, 9, 1, '40.00', '40.00', '9.94', '0'),
(7, 10, 68, 0, '2.00', '2.00', '9.77', '0'),
(8, 11, 68, 0, '2.00', '2.00', '9.77', '0'),
(9, 12, 68, 0, '2.00', '2.00', '9.77', '0'),
(10, 13, 68, 0, '2.00', '2.00', '9.77', '0'),
(11, 18, 68, 1, '2.00', '2.00', '9.77', '0'),
(12, 19, 68, 1, '2.00', '2.00', '9.77', '0'),
(13, 20, 68, 1, '2.00', '2.00', '9.77', '0'),
(14, 21, 68, 1, '2.00', '2.00', '9.77', '0'),
(15, 23, 68, 1, '2.00', '2.00', '9.77', '0'),
(16, 24, 68, 1, '2.00', '2.00', '9.77', ''),
(17, 25, 68, 1, '2.00', '2.00', '9.77', ''),
(18, 26, 68, 1, '2.00', '2.00', '9.77', ''),
(19, 27, 68, 1, '2.00', '2.00', '9.77', ''),
(21, 29, 68, 1, '2.00', '2.00', '9.77', ''),
(26, 34, 68, 1, '2.00', '2.00', '9.77', 'Personalizado (Altura: a, Largura: s, Comprimento: s)'),
(30, 38, 68, 1, '2.00', '2.00', '9.77', 'Personalizado (Altura: ss, Largura: ff, Comprimento: v)'),
(31, 39, 68, 1, '2.00', '2.00', '9.77', 'Personalizado (Altura: s, Largura: d, Comprimento: a)'),
(32, 40, 68, 1, '2.00', '2.00', '9.77', 'Personalizado (Altura: s, Largura: d, Comprimento: c)'),
(33, 41, 68, 1, '2.00', '2.00', '9.77', 'Personalizado (Altura: s, Largura: d, Comprimento: c)'),
(34, 42, 68, 1, '2.00', '2.00', '9.77', 'Personalizado (Altura: ae, Largura: s, Comprimento: dd)'),
(35, 43, 68, 1, '2.00', '2.00', '9.77', 'Personalizado (Altura: a, Largura: s, Comprimento: x)'),
(36, 44, 68, 1, '2.00', '2.00', '9.77', 'Personalizado (Altura: a, Largura: s, Comprimento: x)'),
(37, 45, 68, 1, '2.00', '2.00', '9.77', 'Personalizado (Altura: a, Largura: s, Comprimento: x)'),
(38, 46, 68, 1, '2.00', '2.00', '9.77', 'Personalizado (Altura: x, Largura: c, Comprimento: v)'),
(39, 47, 68, 1, '2.00', '2.00', '9.77', 'Personalizado (Altura: a, Largura: s, Comprimento: f)'),
(40, 48, 69, 1, '100.00', '100.00', '10.56', 'Personalizado (Altura: 100, Largura: 100, Comprimento: 80)'),
(41, 49, 70, 1, '110.00', '110.00', '10.66', 'Personalizado (Altura: 100, Largura: 100, Comprimento: 80)'),
(42, 50, 65, 1, '12.00', '12.00', '0.00', 'A');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `data_pedido` date DEFAULT NULL,
  `status_pedido` varchar(255) DEFAULT NULL,
  `total_pedido` decimal(10,2) DEFAULT NULL,
  `endereco_entrega` text DEFAULT NULL,
  `metodo_pagamento` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `pedidos`
--

INSERT INTO `pedidos` (`id_pedido`, `id_cliente`, `data_pedido`, `status_pedido`, `total_pedido`, `endereco_entrega`, `metodo_pagamento`) VALUES
(1, 10, '2023-10-24', 'Cancelado', '330.00', 'Endereço de entrega do cliente', 'Método de pagamento do cliente'),
(2, 10, '2023-10-25', 'Cancelado', '33.00', 'Endereço de entrega do cliente', 'Método de pagamento do cliente'),
(3, 10, '2023-11-21', 'Em Processamento', '60.05', 'aaaa', 'pix'),
(4, 10, '2023-11-21', 'Em Processamento', '199.94', 'nn', 'pix'),
(5, 10, '2023-11-21', 'Em Processamento', '0.00', 'teste', 'pix'),
(6, 10, '2023-11-21', 'Em Processamento', '0.00', 'teste', 'pix'),
(7, 10, '2023-11-21', 'Em Processamento', '0.00', 'teste', 'pix'),
(8, 10, '2023-11-21', 'Em Processamento', '0.00', 'teste', 'pix'),
(9, 10, '2023-11-21', 'Em Processamento', '0.00', 'teste', 'pix'),
(10, 10, '2023-11-21', 'Em Processamento', '9.77', 'teste', 'pix'),
(11, 10, '2023-11-21', 'Em Processamento', '11.77', 'teste', 'pix'),
(12, 10, '2023-11-21', 'Em Processamento', '11.77', 'teste', 'pix'),
(13, 10, '2023-11-21', 'Em Processamento', '11.77', 'teste', 'pix'),
(14, 10, '2023-11-21', 'Em Processamento', '0.00', 'teste', 'pix'),
(15, 10, '2023-11-21', 'Em Processamento', '0.00', 'teste', 'pix'),
(16, 10, '2023-11-21', 'Em Processamento', '0.00', 'teste', 'pix'),
(17, 10, '2023-11-21', 'Em Processamento', '0.00', 'teste', 'pix'),
(18, 10, '2023-11-21', 'Em Processamento', '11.77', 'teste', 'pix'),
(19, 10, '2023-11-21', 'Em Processamento', '11.77', 'teste', 'pix'),
(20, 10, '2023-11-21', 'Em Processamento', '11.77', 'teste', 'pix'),
(21, 10, '2023-11-21', 'Em Processamento', '11.77', 'teste', 'pix'),
(22, 10, '2023-11-22', 'Em Processamento', '0.00', 'teste', 'pix'),
(23, 10, '2023-11-22', 'Em Processamento', '11.77', 'teste', 'pix'),
(24, 10, '2023-11-22', 'Em Processamento', '11.77', 'teste', 'pix'),
(25, 10, '2023-11-22', 'Em Processamento', '11.77', 'teste', 'pix'),
(26, 10, '2023-11-22', 'Em Processamento', '11.77', 'teste', 'pix'),
(27, 10, '2023-11-22', 'Em Processamento', '11.77', 'teste', 'pix'),
(28, 10, '2023-11-22', 'Em Processamento', '11.77', 'teste', 'pix'),
(29, 0, '2023-11-22', 'Em Processamento', '11.77', 'teste', 'pix'),
(30, 0, '2023-11-22', 'Em Processamento', '11.77', 'teste', 'pix'),
(31, 0, '2023-11-23', 'Em Processamento', '11.77', 'teste', 'pix'),
(32, 0, '2023-11-23', 'Em Processamento', '11.77', 'teste', 'pix'),
(33, 0, '2023-11-23', 'Em Processamento', '11.77', 'teste', 'pix'),
(34, 0, '2023-11-23', 'Em Processamento', '11.77', 'teste', 'pix'),
(35, 0, '2023-11-23', 'Em Processamento', '11.77', 'teste', 'pix'),
(36, 0, '2023-11-23', 'Em Processamento', '11.77', 'teste', 'pix'),
(37, 0, '2023-11-23', 'Em Processamento', '11.77', 'teste', 'pix'),
(38, 0, '2023-11-23', 'Em Processamento', '11.77', 'teste', 'pix'),
(39, 0, '2023-11-23', 'Em Processamento', '11.77', 'teste', 'pix'),
(40, 0, '2023-11-23', 'Em Processamento', '11.77', 'teste', 'pix'),
(41, 0, '2023-11-23', 'Em Processamento', '11.77', 'teste', 'pix'),
(42, 0, '2023-11-23', 'Em Processamento', '11.77', 'teste', 'pix'),
(43, 0, '2023-11-23', 'Em Processamento', '11.77', 'teste', 'pix'),
(44, 0, '2023-11-23', 'Em Processamento', '11.77', 'teste', 'pix'),
(45, 0, '2023-11-23', 'Em Processamento', '11.77', 'teste', 'pix'),
(46, 0, '2023-11-23', 'Em Processamento', '11.77', 'teste', 'pix'),
(47, 0, '2023-11-23', 'Em Processamento', '11.77', 'teste', 'pix'),
(48, 0, '2023-11-23', 'Em Processamento', '110.56', 'teste', 'pix'),
(49, 0, '2023-11-23', 'Em Processamento', '120.66', 'teste', 'pix'),
(50, 10, '2023-11-24', 'Em Processamento', '12.00', 'teste', 'pix');

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
  `peso` decimal(10,2) NOT NULL,
  `altura` decimal(10,2) NOT NULL,
  `comprimento` decimal(10,2) NOT NULL,
  `largura` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `valor`, `descricao`, `imagem`, `categoria_id`, `subcategoria`, `peso`, `altura`, `comprimento`, `largura`) VALUES
(35, 'MORANGAS', '219900.00', 'O MORANGO E BOM MAS VOCÊ NÃO VIU O MORANGETE.', 0x75706c6f6164732f696d6167656d5f323032332d30392d31395f3134313632373934312e706e67, 4, 'INFANTIL', '0.00', '0.00', '0.00', '0.00'),
(55, 'oi', '40000.00', 'ggggggg', 0x75706c6f6164732f7472656e322e6a7067, 1, 'CALÇAS', '0.00', '0.00', '0.00', '0.00'),
(60, 'oi', '35.00', 'tzt gfdbg dfgb f hg', '', 3, 'SAIAS / VESTIDOS', '0.00', '0.00', '0.00', '0.00'),
(65, 'tt', '12.00', '', 0x75706c6f6164732f696d6167656d5f323032332d30392d32385f3230333135353231382e706e67, 2, 'CALÇAS', '0.00', '0.00', '0.00', '0.00'),
(68, 'calça', '3.00', 'essss', 0x75706c6f6164732f696d6167656d5f323032332d31312d32315f3131353033383337362e706e67, 0, '', '0.50', '10.00', '10.00', '10.00'),
(70, 'camisa masculina', '110.00', 'Pertencente a linha Casual, o modelo O-BARK SS TEE oferece conforto e Estilo para qualquer situação\r\nTecido em algodão de alta qualidade proporciona alto conforto para o dia todo\r\nFit loose evita atritos com a pele e evita irritações\r\ncom estampa frontal aplicada ', 0x75706c6f6164732f3431705173554f5157794c2e5f41435f53583532325f2e6a7067, 1, 'CAMISETAS / REGATAS', '0.50', '7.00', '7.00', '7.00');

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
(27, '100', 0, 35),
(28, '200', 90, 35),
(39, 'p', 55, 55),
(40, 'm', 20, 55),
(41, 'g', 10, 55),
(42, 'gg', 40, 55),
(45, 'h', 3, 60),
(50, 'w', 22, 65),
(69, '1', 10, 68),
(76, 'p', 10, 70),
(77, 'g', 20, 70);

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
(3, 'teste', '3', 'jose', 'd@gmail.com', 'vendedor'),
(4, 'soueu', '12', 'da', 'l@gmail.com', 'vendedor'),
(5, 'mariovendas', '123', 'mario da silva', 'mario@gmail.com', 'vendedor'),
(6, 'mariovendas1', '321', 'mario luiz', 'marioluiz@gmail.com', 'vendedor'),
(8, 'teste1', '1', 'davi', '', 'vendedor'),
(9, 'teste2', '1', 'davi', '', 'vendedor'),
(10, 'teste10', '123', 'davii', '', 'vendedor');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`cliente_id`),
  ADD KEY `produto_id` (`produto_id`);

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
-- Índices para tabela `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_favorito` (`usuario_id`);

--
-- Índices para tabela `imagens_produto`
--
ALTER TABLE `imagens_produto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `produto_id` (`produto_id`);

--
-- Índices para tabela `itens_pedido`
--
ALTER TABLE `itens_pedido`
  ADD PRIMARY KEY (`id_item_pedido`),
  ADD KEY `id_pedido` (`id_pedido`);

--
-- Índices para tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`);

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
-- AUTO_INCREMENT de tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

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
-- AUTO_INCREMENT de tabela `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `imagens_produto`
--
ALTER TABLE `imagens_produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `itens_pedido`
--
ALTER TABLE `itens_pedido`
  MODIFY `id_item_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de tabela `tamanhos`
--
ALTER TABLE `tamanhos`
  MODIFY `tamanho_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT de tabela `vendedores`
--
ALTER TABLE `vendedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD CONSTRAINT `avaliacoes_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `avaliacoes_ibfk_2` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`);

--
-- Limitadores para a tabela `imagens_produto`
--
ALTER TABLE `imagens_produto`
  ADD CONSTRAINT `imagens_produto_ibfk_1` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `itens_pedido`
--
ALTER TABLE `itens_pedido`
  ADD CONSTRAINT `itens_pedido_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id_pedido`);

--
-- Limitadores para a tabela `tamanhos`
--
ALTER TABLE `tamanhos`
  ADD CONSTRAINT `fk_size_product` FOREIGN KEY (`produto_id`) REFERENCES `produtos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
