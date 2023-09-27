-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Set-2023 às 03:01
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Banco de dados: `sistema_login`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacoes`
--

CREATE TABLE `avaliacoes` (
  `id` int(11) NOT NULL,
  `classificacao` int(11) NOT NULL,
  `comentario` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `avaliacoes`
--

INSERT INTO `avaliacoes` (`id`, `classificacao`, `comentario`) VALUES
(132, 5, 'Muito bom o produto'),
(133, 1, 'Recomendado'),
(134, 4, 'Melhor coisa'),
(135, 3, 'Outro nível'),
(136, 2, 'Melhor de todos'),
(137, 1, ''),
(138, 1, ''),
(139, 1, ''),
(140, 1, ''),
(141, 1, ''),
(142, 3, ''),
(143, 1, 'tt'),
(144, 1, 'y'),
(145, 1, 'tt'),
(146, 5, ''),
(147, 1, 'ddddd'),
(148, 5, ''),
(149, 1, 'm');

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `sobrenome` varchar(100) NOT NULL,
  `cnpj` int(20) NOT NULL,
  `razaosocial` varchar(200) NOT NULL,
  `ins_cestadual` int(200) NOT NULL,
  `telefone` int(20) NOT NULL,
  `cep` int(50) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `numero` int(20) NOT NULL,
  `complemento` int(20) NOT NULL,
  `bairro` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `estado` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id`, `nome`, `sobrenome`, `cnpj`, `razaosocial`, `ins_cestadual`, `telefone`, `cep`, `endereco`, `numero`, `complemento`, `bairro`, `email`, `senha`, `estado`) VALUES
(1, 'e', 'e', 1, '1', 1, 1, 1, '1', 1, 1, '1', '1@gmail.com', '$2y$10$y3NLtc0z/rJYUI6vQQmCt.bCquTiBjfJTV6Spo5gP5zVxwmFhhdce', '1'),
(2, 'e', 'e', 1, '1', 1, 1, 1, '1', 1, 1, '1', '1@gmail.com', '$2y$10$8ZXCaCnaalBE31OY0AQn1.gG9B82tTlQ728A73qCSBc5TcK5fp.I2', '1'),
(3, 'e', 'e', 1, '1', 1, 1, 1, '1', 1, 1, '1', '1@gmail.com', '$2y$10$zynib9T2gRTosk9w.VA2eO14.k2yfPe7LJG58HYs69gZgx3xEgM6m', '1'),
(4, 'e', 'e', 1, '1', 1, 1, 1, '1', 1, 1, '1', '1@gmail.com', '$2y$10$m20/5Vau.XfDHbtV6WW2BeN.crB9cuh4IuHYJ2PnbO4awvmOYTpgq', '1'),
(5, 'e', 'e', 1, '1', 1, 1, 1, '1', 1, 1, '1', '1@gmail.com', '$2y$10$SZtCQ2r9uRoTgICpNQpNgO1HozwIE9kuxr7QdGXT3D61Qt1J8Um4K', '1'),
(6, 'e', 'e', 1, '1', 1, 1, 1, '1', 1, 1, '1', '1@gmail.com', '$2y$10$2/cfjwr0ZcQuY7SJkBOjcO/P0VpGKigKCwtkOL2NOJXn/0oLXPJBe', '1'),
(7, 'jose', 'silva', 1212, 'vender', 2353, 9870, 21344, '1213', 113, 111, '111', 'jose@gmail.com', '$2y$10$FiKkIBZy/c9fH18kHrQTB.PQBisuVpc8c/hi1q09eDE/JsO4irUjS', '11'),
(8, 'jose', 'silva', 1212, 'vender', 2353, 9870, 21344, '1213', 113, 111, '111', 'jose@gmail.com', '$2y$10$5tP49hUDMJ4ksiMsevY17e8n0I8CMIsn3wcMTIRieS5/XLM4YSTwS', '11'),
(9, 'jose', 'silva', 1212, 'vender', 2353, 9870, 21344, '1213', 113, 111, '111', 'jose@gmail.com', '$2y$10$QelfkEqhTb14ii0vQlaQ2.80WsnO2erJRP0GwzvO7mkAxEaUEO.0u', '11'),
(10, '1', '1', 1, '1', 11, 1, 1, '1', 1, 1, '1', '1@gmail.com', '$2y$10$Ndxa9ce2HQCPjfrlqToS9uQvH5UKB5r8vdM01uxrKo6zddHP1wNLK', '1'),
(11, '1', '1', 1, '1', 11, 1, 1, '1', 1, 1, '1', '1@gmail.com', '$2y$10$lKBO/ewPSJ5ttj/fpvylcOB4jUTmObuuCxeUdQ5jh4qeezIolRKH.', '1'),
(12, '1', '1', 1, '1', 11, 1, 1, '1', 1, 1, '1', '1@gmail.com', '$2y$10$HSp1g98AJoflmcuAk1IXJOrHRgCDvU.hsJGJNKeuxp5vK3l7TvlPC', '1'),
(13, 'yga', 'toddys', 12, 'dinheiro', 34, 56, 78, '90', 9, 87, '65', 'gaaa@gmail.com', '$2y$10$ZE8ybJV/zlLNsKDpyVUbzOFASQx0zBt3HqyOcSglYPe7wkT022ZJy', 'sp');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(150) DEFAULT NULL,
  `email_or_phone` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `email_or_phone`, `password`, `phone`, `email`) VALUES
(26, 'rr', '', '$2y$10$J8ATppRjNZYcBul9a5oc/.QRFux1ibxXRII4TPO/nrXir/84o5Mr6', NULL, ''),
(27, 'rr', '', '$2y$10$uzBQGZUDqd9iA2i352q/AOhRxQSPqJP.Xw4FUJzXLGT9VFfSJLiDS', NULL, ''),
(28, 'rr', '', '$2y$10$ZCuHDSWn8KzbJxol7iZSyuJKYEbVbRHHDP6Soq30Y7wdiXJSoIwTe', NULL, ''),
(29, 'rr', '', '$2y$10$sJkILQDD7StufTyDxef6ieok.wkHn7U4sp58VDXacVYHMYknnI0li', NULL, ''),
(30, 'rr', '', '$2y$10$uePOIk3nUnqB52lP3e0xROKMUvejvxhA/iBWl5uoxmCRgWI7Jv.Ii', NULL, ''),
(31, 'rr', '', '$2y$10$upaWYvkRRB5LwJynlAcJQ.sz5QkjuXM9N1A94KMRDr.DvMTsveNc2', NULL, ''),
(32, 'rr', '', '$2y$10$k5GkT4Cku.HaE5t4GRkh7eq149Tma10gwMM/L/YMB7fp.kufEB1XO', NULL, ''),
(33, 'rr', '', '$2y$10$mT5lzoleDdrNSwL6lv0Q3ukr2cFBABV37040nFx55Vr2DJ1P4dDSu', NULL, ''),
(34, 'rr', '', '$2y$10$k79vezMZPrpfYtFCKJN3p.RI0Ke4f0KQHeGA4VFys3pVXVr7HpNIy', NULL, ''),
(35, 'rr', '', '$2y$10$6i644Hh03O3/tywIMuP7wOGqzPTVbH4nrvX2Dfm6gqUZ20ZqpuGI.', NULL, ''),
(36, 'g', NULL, '$2y$10$IH5vX3Z9RQLtvU661bd1ju3pzSVCklqzyJYAmz6WY8lQh86hrYlhC', 'g', ''),
(37, 'e', NULL, '$2y$10$yBIivXHlgeMY0/Qq0.4lseGBEowZZl0KIaT8M59LAfiw.I/g3KyGy', 'r', ''),
(38, '1111', NULL, '$2y$10$3X64zbhyYJNIDggUsQ4SeOvfejjUvbuuittgwj49su5CAYFR1cUR6', '222', ''),
(39, 'jose', NULL, '$2y$10$JddG6DTaTDJ//pPEXbPp8OA68piaHoQDNefBfSvfeYFS5IbpU5r1W', '333', ''),
(40, '33333333', NULL, '$2y$10$0N/MN9Wb6JM5z8Q1Oy2Tl.Fa97r1H1wz7C0lavKMCcg5.FN2duYyK', 'fff', ''),
(41, 'joao', NULL, '$2y$10$DmAFKJV..PTlb02KU4fn2.4hViOMntn3IPFTUELKTxaJAEXXPn7kG', 'joao', ''),
(42, 'ttttttttt', NULL, '$2y$10$otHZTRGZfLNx/uRNNiMLiuuLb5QRDI4CgHuatY2hUVLTWkcvz7ttO', 'tttttttt', ''),
(43, 'mario', NULL, '$2y$10$cFayPehebt4/w83pzq0gcO6xN/trzI0UyQmf7cxvOCl56hUCEg0/.', 'mar455@gmail.com', ''),
(44, 'hhhh', NULL, '$2y$10$ZC5s87LOwDtTzpGrEEXpIO17WFLc3WrdmBuoluFsPSWLhMuDyPU/u', 'hhh@gmail.com', ''),
(45, 'karen', NULL, '$2y$10$hfpWq/RGUceR.W9kzlDyPuGMJb8s73bdvH.ukgsu.MaUA5cifOLlu', 'ka@gmail.com', ''),
(46, 'eeeee', NULL, '$2y$10$KpsHtftleY//cYfUFn9s2eaqjYIK06X31hwUeg/ciiJEQ.YQUH0UK', NULL, 'e@gmail.com'),
(47, 'yyyyyyyy', NULL, '$2y$10$/FW55gCbDySQLQKltms8fOHWMsb.dD9zHFt1tFFtuHNwkPk0njqsC', 'yyyyyyyyy', ''),
(48, 'jose', NULL, '$2y$10$A1.jMFq8JMfqQqG6dtSGp.149p9MXwAXwO2vT/KyAOFSn4dwCihSa', NULL, 'jose@gmail.com'),
(49, 'joselina', NULL, '$2y$10$pZrsqje23Qz2zgYNuQ8y5e.yJ7aozeJGcusDCPVp2y7xprQ0724v2', NULL, 'jose345d@gmail.com'),
(50, '1', NULL, '$2y$10$MfIMPOGknS/b6yNzAnzND.2QOq1Q7FSPr7OF20YE3ocdmxiOznUNC', NULL, ''),
(51, '2', NULL, '$2y$10$6w7D18uTopgZ8xg2mGU9OO2GDF8h6JjWGuh3PGQpzLllQjYu/UCvK', NULL, '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;
