-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 07-Abr-2023 às 02:26
-- Versão do servidor: 5.6.34
-- versão do PHP: 8.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `speedlog`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacoes`
--

CREATE TABLE `avaliacoes` (
  `avaliacao_id` int(11) NOT NULL,
  `avaliacao_entrega` int(11) NOT NULL,
  `avaliacao_total` tinyint(1) NOT NULL,
  `avaliacao_desc` varchar(150) DEFAULT NULL,
  `avaliacao_tempoOK` tinyint(1) NOT NULL DEFAULT '1',
  `avaliacao_entregaOK` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `conquistas`
--

CREATE TABLE `conquistas` (
  `conquista_id` int(11) NOT NULL,
  `conquista_nome` varchar(20) NOT NULL,
  `conquista_desc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `conquistas`
--

INSERT INTO `conquistas` (`conquista_id`, `conquista_nome`, `conquista_desc`) VALUES
(1, 'Imparável', 'Concluiu pelo menos 5 viagens no mesmo dia'),
(2, 'O início de tudo', 'Concluiu sua primeira entrega'),
(3, 'Pela longa estrada', 'Fez uma entrega com 10km ou mais de distância'),
(4, 'Eu sou a velocidade', 'Terminou uma entrega em 10 minutos ou menos'),
(5, 'Bem falado', 'Recebeu um elogio'),
(6, 'Criatura noturna', 'Fez uma entrega durante a noite'),
(7, 'Coração de mãe', 'Aceitou outra entrega antes de concluir a atual'),
(8, 'Ligeiro', 'Realizou uma entrega urgente'),
(9, 'Presentinho', 'Ganhou gorjeta de uma entrega'),
(10, 'Comunicativo', 'Respondeu uma mensagem de conversa'),
(11, 'Foco', 'Realizou ao menos 1 entrega por cinco dias seguidos'),
(12, 'O respeito das ruas', 'Recebeu uma avaliação de nota máxima');

-- --------------------------------------------------------

--
-- Estrutura da tabela `conversas`
--

CREATE TABLE `conversas` (
  `conversa_id` int(11) NOT NULL,
  `conversa_usuario1` int(11) NOT NULL,
  `conversa_usuario2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cupons`
--

CREATE TABLE `cupons` (
  `cupom_id` int(11) NOT NULL,
  `cupom_cod` varchar(15) NOT NULL,
  `cupom_desconto` decimal(10,2) NOT NULL,
  `cupom_tipoPorcento` tinyint(1) NOT NULL,
  `cupom_inicio` datetime DEFAULT NULL,
  `cupom_termino` datetime DEFAULT NULL,
  `cupom_qtde` int(11) DEFAULT NULL,
  `cupom_desc` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cupons`
--

INSERT INTO `cupons` (`cupom_id`, `cupom_cod`, `cupom_desconto`, `cupom_tipoPorcento`, `cupom_inicio`, `cupom_termino`, `cupom_qtde`, `cupom_desc`) VALUES
(1, 'LANCAMENTO', '5.00', 0, '2023-02-16 20:00:00', '2023-04-01 00:00:00', 3, 'Promoção de lançamento'),
(2, 'PRIMEIRA', '2.00', 0, '2023-03-01 20:00:00', '2023-04-01 00:00:00', 20, 'Desconto de primeiro pedido da conta'),
(3, '1ABRIL', '1.00', 0, '2023-03-01 19:00:00', '2023-03-09 19:10:00', 1, 'Dia da mentira');

-- --------------------------------------------------------

--
-- Estrutura da tabela `denuncias`
--

CREATE TABLE `denuncias` (
  `denuncia_id` int(11) NOT NULL,
  `denuncia_idDenunciante` int(11) NOT NULL,
  `denuncia_entrega` int(11) DEFAULT NULL,
  `denuncia_descricao` varchar(254) NOT NULL,
  `denuncia_data` datetime DEFAULT CURRENT_TIMESTAMP,
  `denuncia_status` varchar(10) NOT NULL COMMENT 'PENDENTE, EM ANÁLISE, FECHADA'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `denuncias`
--

INSERT INTO `denuncias` (`denuncia_id`, `denuncia_idDenunciante`, `denuncia_entrega`, `denuncia_descricao`, `denuncia_data`, `denuncia_status`) VALUES
(1, 4, 1, 'entrega veio quebrada', '2023-03-10 14:18:09', 'TERMINADA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `elogios`
--

CREATE TABLE `elogios` (
  `elogio_id` int(11) NOT NULL,
  `elogio_usuario` int(11) NOT NULL,
  `elogio_entregador` int(11) NOT NULL,
  `elogio_data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `entregadores`
--

CREATE TABLE `entregadores` (
  `entregador_id` int(11) NOT NULL,
  `entregador_placaMoto` varchar(8) NOT NULL,
  `entregador_foto` varchar(70) DEFAULT NULL,
  `entregador_status` varchar(8) NOT NULL DEFAULT 'LIVRE' COMMENT 'LIVRE, OCUPADO OU INATIVO'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `entregadores`
--

INSERT INTO `entregadores` (`entregador_id`, `entregador_placaMoto`, `entregador_foto`, `entregador_status`) VALUES
(2, 'AAA1111', 'rogerin.jpg', 'LIVRE'),
(3, 'DAY 8090', 'klebin.jpg', 'LIVRE'),
(18, 'BBB 2222', NULL, 'LIVRE');

-- --------------------------------------------------------

--
-- Estrutura da tabela `entregas`
--

CREATE TABLE `entregas` (
  `entrega_id` int(11) NOT NULL,
  `entrega_enderecoOrigem` varchar(254) NOT NULL,
  `entrega_enderecoDestino` varchar(254) NOT NULL,
  `entrega_cepOrigem` varchar(9) NOT NULL,
  `entrega_cepDestino` varchar(9) NOT NULL,
  `entrega_peso` float NOT NULL,
  `entrega_status` varchar(10) NOT NULL COMMENT 'PENDENTE, EM ANDAMENTO OU FINALIZADA',
  `entrega_dataPedido` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `entrega_dataTransporte` datetime DEFAULT CURRENT_TIMESTAMP,
  `entrega_dataEntrega` datetime DEFAULT CURRENT_TIMESTAMP,
  `tempoEstimado` varchar(10) NOT NULL,
  `entrega_cliente` varchar(100) NOT NULL,
  `entrega_clienteID` int(11) NOT NULL,
  `entrega_responsavel` int(11) DEFAULT NULL,
  `entrega_valor` decimal(10,0) NOT NULL,
  `entrega_gorjeta` decimal(4,0) DEFAULT NULL,
  `entrega_cupom` varchar(15) DEFAULT NULL,
  `entrega_observacao` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `entregas`
--

INSERT INTO `entregas` (`entrega_id`, `entrega_enderecoOrigem`, `entrega_enderecoDestino`, `entrega_cepOrigem`, `entrega_cepDestino`, `entrega_peso`, `entrega_status`, `entrega_dataPedido`, `entrega_dataTransporte`, `entrega_dataEntrega`, `tempoEstimado`, `entrega_cliente`, `entrega_clienteID`, `entrega_responsavel`, `entrega_valor`, `entrega_gorjeta`, `entrega_cupom`, `entrega_observacao`) VALUES
(29, 'Rua Américo Lobo', 'Avenida dos Andradas', '36050-00', '36036-00', 12, 'FINALIZADO', '2023-04-01 21:03:42', '2023-04-01 21:03:42', '2023-04-01 21:03:42', '21:16', '1', 17, 18, '0', NULL, NULL, ''),
(30, 'Rua Américo Lobo', 'Avenida dos Andradas', '36050-00', '36036-00', 12, 'FINALIZADO', '2023-04-01 21:09:44', '2023-04-01 21:09:44', '2023-04-01 21:09:44', '21:00', '1', 17, 18, '0', NULL, NULL, ''),
(31, 'Rua Américo Lobo', 'Avenida dos Andradas', '36050-00', '36036-00', 12, 'PENDENTE', '2023-04-01 21:12:14', '2023-04-01 21:12:14', '2023-04-01 21:12:14', '', '1', 17, NULL, '0', NULL, NULL, ''),
(32, '', '', '36050-00', '36036-00', 12, 'PENDENTE', '2023-04-04 08:50:29', '2023-04-04 08:50:29', '2023-04-04 08:50:29', '', 'carlinha', 4, NULL, '0', NULL, NULL, ''),
(33, '', '', '36050-00', '36036-00', 12, 'PENDENTE', '2023-04-05 08:45:11', '2023-04-05 08:45:11', '2023-04-05 08:45:11', '', 'carlinha', 4, NULL, '0', NULL, NULL, ''),
(34, 'Rua Américo Lobo', 'Avenida dos Andradas', '36050-00', '36036-00', 0, 'PENDENTE', '2023-04-06 17:00:33', '2023-04-06 17:00:33', '2023-04-06 17:00:33', '', 'carlinha', 4, NULL, '0', NULL, NULL, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `frete`
--

CREATE TABLE `frete` (
  `frete_id` int(11) NOT NULL,
  `frete_tipo` varchar(9) NOT NULL,
  `valor_km` decimal(10,2) NOT NULL,
  `valor_minuto` decimal(10,2) NOT NULL,
  `valor_kgAte1` decimal(10,2) NOT NULL,
  `valor_kg1a3` decimal(10,2) NOT NULL,
  `valor_kg3a8` decimal(10,2) NOT NULL,
  `valor_kg8a12` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `frete`
--

INSERT INTO `frete` (`frete_id`, `frete_tipo`, `valor_km`, `valor_minuto`, `valor_kgAte1`, `valor_kg1a3`, `valor_kg3a8`, `valor_kg8a12`) VALUES
(1, 'DOMINGO', '2.00', '0.30', '3.00', '5.00', '9.00', '12.00'),
(2, 'SEGUNDA', '0.50', '2.00', '3.00', '5.00', '5.00', '8.00'),
(3, 'TERCA', '0.50', '0.30', '3.00', '5.00', '9.00', '12.00'),
(4, 'QUARTA', '0.50', '0.30', '3.00', '5.00', '9.00', '12.00'),
(5, 'QUINTA', '0.50', '0.30', '3.00', '5.00', '9.00', '12.00'),
(6, 'SEXTA', '0.50', '0.30', '3.00', '5.00', '9.00', '12.00'),
(7, 'SABADO', '0.50', '2.00', '3.00', '5.00', '5.00', '8.00'),
(9, 'FERIADO', '0.50', '2.00', '3.00', '5.00', '5.00', '8.00'),
(10, 'PROMOCAO', '0.50', '0.30', '3.00', '5.00', '9.00', '12.00'),
(11, 'PADRAO', '0.50', '0.30', '3.00', '5.00', '9.00', '12.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `log`
--

CREATE TABLE `log` (
  `log_id` int(11) NOT NULL,
  `log_tipo` varchar(15) NOT NULL COMMENT 'AVALIACAO, CONQUISTA, CUPOM, DENUNCIA, ELOGIO, ENTREGA, NOTIFICAÇÃO, STATUS',
  `log_usuario` int(11) NOT NULL,
  `log_desc` varchar(254) NOT NULL,
  `log_data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagens`
--

CREATE TABLE `mensagens` (
  `mensagem_id` int(11) NOT NULL,
  `mensagem_conversa` int(11) NOT NULL,
  `mensagem_usuario` int(11) NOT NULL,
  `mensagem_texto` varchar(254) NOT NULL,
  `mensagem_data` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificacoes`
--

CREATE TABLE `notificacoes` (
  `notificacao_id` int(11) NOT NULL,
  `notificacao_titulo` varchar(30) NOT NULL,
  `notificacao_desc` varchar(254) NOT NULL,
  `notificacao_usuario` int(11) NOT NULL,
  `notificacao_visualizado` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `notificacoes`
--

INSERT INTO `notificacoes` (`notificacao_id`, `notificacao_titulo`, `notificacao_desc`, `notificacao_usuario`, `notificacao_visualizado`) VALUES
(1, 'testando titulo de notificação', 'aqui vai a descrição da notificação', 2, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` int(11) NOT NULL,
  `usuario_nome` varchar(50) NOT NULL,
  `usuario_email` varchar(254) NOT NULL,
  `usuario_cpf` varchar(14) NOT NULL,
  `usuario_apelido` varchar(15) NOT NULL,
  `usuario_senha` varchar(30) NOT NULL,
  `usuario_tipo` varchar(13) NOT NULL COMMENT 'ADMINISTRADOR, CLIENTE, ENTREGADOR OU SUPORTE',
  `usuario_telefone` varchar(16) DEFAULT NULL,
  `usuario_status` varchar(10) NOT NULL DEFAULT 'ATIVO' COMMENT 'ATIVO, INATIVO, SUSPENSO OU BANIDO',
  `usuario_dataConta` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `usuario_nome`, `usuario_email`, `usuario_cpf`, `usuario_apelido`, `usuario_senha`, `usuario_tipo`, `usuario_telefone`, `usuario_status`, `usuario_dataConta`) VALUES
(1, 'ADMINISTRADOR', 'admin@mail.com', '000.000.000-00', 'admin', '1', 'ADMINISTRADOR', NULL, 'ATIVO', '2020-01-10 09:00:00'),
(2, 'ROGÉRIO ULISSES', 'rogerin@mail.com', '123.456.789-10', 'rogerin', '1', 'ENTREGADOR', '(32)9999-9999', 'ATIVO', '2016-04-07 10:20:00'),
(3, 'KLEBER FALAMANSA', 'klebinho@mail.com', '121.121.121-38', 'klebin', '1', 'ENTREGADOR', '9 9999-9998', 'ATIVO', '2022-06-10 18:33:00'),
(4, 'CARLA PIRES E BULE', 'carlinha@mail.com', '789.456.123-89', 'carlinha', 'a', 'CLIENTE', '9 88888888', 'ATIVO', '2020-12-23 17:03:00'),
(5, 'VINÍCIUS MACHADO VIANNA', 'vini@mail.com', '444.444.444-44', 'vini', '1', 'CLIENTE', '(32)99999-9999', 'ATIVO', '2023-03-16 20:33:30'),
(8, 'RAFAELA DE FARIA BILHEIROS', 'rafa@mail.com', '222.222.222-22', 'rafa', '1', 'CLIENTE', '(32)99999-9999', 'ATIVO', '2023-03-25 19:05:01');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD PRIMARY KEY (`avaliacao_id`);

--
-- Índices para tabela `conquistas`
--
ALTER TABLE `conquistas`
  ADD PRIMARY KEY (`conquista_id`);

--
-- Índices para tabela `cupons`
--
ALTER TABLE `cupons`
  ADD PRIMARY KEY (`cupom_id`);

--
-- Índices para tabela `denuncias`
--
ALTER TABLE `denuncias`
  ADD PRIMARY KEY (`denuncia_id`);

--
-- Índices para tabela `elogios`
--
ALTER TABLE `elogios`
  ADD PRIMARY KEY (`elogio_id`);

--
-- Índices para tabela `entregadores`
--
ALTER TABLE `entregadores`
  ADD PRIMARY KEY (`entregador_id`);

--
-- Índices para tabela `entregas`
--
ALTER TABLE `entregas`
  ADD PRIMARY KEY (`entrega_id`);

--
-- Índices para tabela `frete`
--
ALTER TABLE `frete`
  ADD PRIMARY KEY (`frete_id`);

--
-- Índices para tabela `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`log_id`);

--
-- Índices para tabela `mensagens`
--
ALTER TABLE `mensagens`
  ADD PRIMARY KEY (`mensagem_id`);

--
-- Índices para tabela `notificacoes`
--
ALTER TABLE `notificacoes`
  ADD PRIMARY KEY (`notificacao_id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  MODIFY `avaliacao_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `conquistas`
--
ALTER TABLE `conquistas`
  MODIFY `conquista_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `cupons`
--
ALTER TABLE `cupons`
  MODIFY `cupom_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `denuncias`
--
ALTER TABLE `denuncias`
  MODIFY `denuncia_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `elogios`
--
ALTER TABLE `elogios`
  MODIFY `elogio_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `entregas`
--
ALTER TABLE `entregas`
  MODIFY `entrega_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `frete`
--
ALTER TABLE `frete`
  MODIFY `frete_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `log`
--
ALTER TABLE `log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `mensagens`
--
ALTER TABLE `mensagens`
  MODIFY `mensagem_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `notificacoes`
--
ALTER TABLE `notificacoes`
  MODIFY `notificacao_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
