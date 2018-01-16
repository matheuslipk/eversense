-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 16-Jan-2018 às 15:43
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eversense`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acao`
--

CREATE TABLE `acao` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `acao`
--

INSERT INTO `acao` (`id`, `nome`, `descricao`) VALUES
(1, 'Ligar', ''),
(2, 'Desligar', ''),
(3, 'Aumenta Volume', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `acao_objeto`
--

CREATE TABLE `acao_objeto` (
  `id_acao` int(11) NOT NULL,
  `id_objeto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `acao_objeto`
--

INSERT INTO `acao_objeto` (`id_acao`, `id_objeto`) VALUES
(1, 1),
(1, 2),
(2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ambiente`
--

CREATE TABLE `ambiente` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ambiente`
--

INSERT INTO `ambiente` (`id`, `id_usuario`, `nome`, `descricao`) VALUES
(1, 1, 'Sala', ''),
(2, 1, 'Quarto 1', ''),
(4, 1, 'Quarto 2', 'descriÃ§Ã£o do ambiente'),
(5, 1, 'quarto 2', 'descriÃ§Ã£o');

-- --------------------------------------------------------

--
-- Estrutura da tabela `instituicao`
--

CREATE TABLE `instituicao` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `endereco` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `medicao`
--

CREATE TABLE `medicao` (
  `id` int(11) NOT NULL,
  `id_sensor` int(11) NOT NULL,
  `valor` double(7,2) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `medicao`
--

INSERT INTO `medicao` (`id`, `id_sensor`, `valor`, `data`) VALUES
(1, 1, 30.00, '2018-01-16 03:26:15'),
(2, 1, 32.00, '2018-01-16 03:26:33'),
(4, 1, 30.70, '2018-01-16 13:31:40');

-- --------------------------------------------------------

--
-- Estrutura da tabela `no`
--

CREATE TABLE `no` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `id_ambiente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `no`
--

INSERT INTO `no` (`id`, `id_usuario`, `ip`, `nome`, `descricao`, `id_ambiente`) VALUES
(2, 1, '192.168.0.100', 'No 1', '', 1),
(3, 1, '192.168.0.101', 'No 2', '', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `objeto`
--

CREATE TABLE `objeto` (
  `id` int(11) NOT NULL,
  `id_ambiente` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `objeto`
--

INSERT INTO `objeto` (`id`, `id_ambiente`, `nome`, `descricao`) VALUES
(1, 1, 'Ar condicionado', ''),
(2, 1, 'Televisão', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sensor`
--

CREATE TABLE `sensor` (
  `id` int(11) NOT NULL,
  `id_no` int(11) NOT NULL,
  `id_ambiente` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_tipo_sensor` int(11) NOT NULL,
  `ip` varchar(15) DEFAULT NULL,
  `mac` varchar(50) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sensor`
--

INSERT INTO `sensor` (`id`, `id_no`, `id_ambiente`, `id_usuario`, `id_tipo_sensor`, `ip`, `mac`, `nome`, `descricao`) VALUES
(1, 2, 1, 1, 1, '192.168.0.1', '', 'Sensor modelo x', NULL),
(3, 2, 1, 1, 1, NULL, 'a', '', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_sensor`
--

CREATE TABLE `tipo_sensor` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `unidade_medida` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipo_sensor`
--

INSERT INTO `tipo_sensor` (`id`, `nome`, `unidade_medida`) VALUES
(1, 'Sensor de temperatura', 'Celsius'),
(2, 'Sensor de umidade', 'Porcentagem');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'Samuel', 'samuel@email.com', 'senha123');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_acao_objeto`
-- (See below for the actual view)
--
CREATE TABLE `view_acao_objeto` (
`id_objeto` int(11)
,`nome_objeto` varchar(100)
,`id_acao` int(11)
,`nome_acao` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_medicao`
-- (See below for the actual view)
--
CREATE TABLE `view_medicao` (
`id_medicao` int(11)
,`id_ambiente` int(11)
,`id_sensor` int(11)
,`valor` double(7,2)
,`data` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_no`
-- (See below for the actual view)
--
CREATE TABLE `view_no` (
`id_no` int(11)
,`id_usuario` int(11)
,`nome_usuario` varchar(100)
,`ip_no` varchar(15)
,`nome_no` varchar(100)
,`descricao` varchar(200)
,`id_ambiente` int(11)
,`nome_ambiente` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_sensor`
-- (See below for the actual view)
--
CREATE TABLE `view_sensor` (
`id` int(11)
,`id_no` int(11)
,`nome_no` varchar(100)
,`id_tipo_sensor` int(11)
,`nome` varchar(100)
,`ip` varchar(15)
,`mac` varchar(50)
,`nome_sensor` varchar(50)
,`descricao` varchar(200)
);

-- --------------------------------------------------------

--
-- Structure for view `view_acao_objeto`
--
DROP TABLE IF EXISTS `view_acao_objeto`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_acao_objeto`  AS  select `ao`.`id_objeto` AS `id_objeto`,`o`.`nome` AS `nome_objeto`,`ao`.`id_acao` AS `id_acao`,`a`.`nome` AS `nome_acao` from ((`acao_objeto` `ao` join `acao` `a`) join `objeto` `o`) where ((`ao`.`id_acao` = `a`.`id`) and (`ao`.`id_objeto` = `o`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_medicao`
--
DROP TABLE IF EXISTS `view_medicao`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_medicao`  AS  select `m`.`id` AS `id_medicao`,`s`.`id_ambiente` AS `id_ambiente`,`m`.`id_sensor` AS `id_sensor`,`m`.`valor` AS `valor`,`m`.`data` AS `data` from (`medicao` `m` join `sensor` `s`) where (`m`.`id_sensor` = `s`.`id`) ;

-- --------------------------------------------------------

--
-- Structure for view `view_no`
--
DROP TABLE IF EXISTS `view_no`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_no`  AS  select `n`.`id` AS `id_no`,`n`.`id_usuario` AS `id_usuario`,`u`.`nome` AS `nome_usuario`,`n`.`ip` AS `ip_no`,`n`.`nome` AS `nome_no`,`n`.`descricao` AS `descricao`,`n`.`id_ambiente` AS `id_ambiente`,`a`.`nome` AS `nome_ambiente` from ((`no` `n` join `usuario` `u`) join `ambiente` `a`) where ((`u`.`id` = `n`.`id_usuario`) and (`n`.`id_ambiente` = `a`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_sensor`
--
DROP TABLE IF EXISTS `view_sensor`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_sensor`  AS  select `s`.`id` AS `id`,`s`.`id_no` AS `id_no`,`n`.`nome` AS `nome_no`,`s`.`id_tipo_sensor` AS `id_tipo_sensor`,`ts`.`nome` AS `nome`,`s`.`ip` AS `ip`,`s`.`mac` AS `mac`,`s`.`nome` AS `nome_sensor`,`s`.`descricao` AS `descricao` from ((`sensor` `s` join `no` `n`) join `tipo_sensor` `ts`) where ((`s`.`id_no` = `n`.`id`) and (`s`.`id_tipo_sensor` = `ts`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acao`
--
ALTER TABLE `acao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `acao_objeto`
--
ALTER TABLE `acao_objeto`
  ADD PRIMARY KEY (`id_acao`,`id_objeto`),
  ADD KEY `atuacao_sensor_ibfk_1` (`id_objeto`);

--
-- Indexes for table `ambiente`
--
ALTER TABLE `ambiente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `instituicao`
--
ALTER TABLE `instituicao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicao`
--
ALTER TABLE `medicao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sensor` (`id_sensor`);

--
-- Indexes for table `no`
--
ALTER TABLE `no`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`,`id_ambiente`);

--
-- Indexes for table `objeto`
--
ALTER TABLE `objeto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_ambiente` (`id_ambiente`);

--
-- Indexes for table `sensor`
--
ALTER TABLE `sensor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mac` (`mac`),
  ADD KEY `no` (`id_no`),
  ADD KEY `tipo_sensor` (`id_tipo_sensor`),
  ADD KEY `id_ambiente` (`id_ambiente`,`id_usuario`),
  ADD KEY `sensor_ibfk_3` (`id_usuario`,`id_ambiente`,`id_no`);

--
-- Indexes for table `tipo_sensor`
--
ALTER TABLE `tipo_sensor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acao`
--
ALTER TABLE `acao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ambiente`
--
ALTER TABLE `ambiente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `instituicao`
--
ALTER TABLE `instituicao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `medicao`
--
ALTER TABLE `medicao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `no`
--
ALTER TABLE `no`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `objeto`
--
ALTER TABLE `objeto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sensor`
--
ALTER TABLE `sensor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tipo_sensor`
--
ALTER TABLE `tipo_sensor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `acao_objeto`
--
ALTER TABLE `acao_objeto`
  ADD CONSTRAINT `acao_objeto_ibfk_1` FOREIGN KEY (`id_objeto`) REFERENCES `objeto` (`id`),
  ADD CONSTRAINT `acao_objeto_ibfk_2` FOREIGN KEY (`id_acao`) REFERENCES `acao` (`id`);

--
-- Limitadores para a tabela `ambiente`
--
ALTER TABLE `ambiente`
  ADD CONSTRAINT `ambiente_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

--
-- Limitadores para a tabela `medicao`
--
ALTER TABLE `medicao`
  ADD CONSTRAINT `medicao_ibfk_1` FOREIGN KEY (`id_sensor`) REFERENCES `sensor` (`id`);

--
-- Limitadores para a tabela `no`
--
ALTER TABLE `no`
  ADD CONSTRAINT `no_ibfk_1` FOREIGN KEY (`id_usuario`,`id_ambiente`) REFERENCES `ambiente` (`id_usuario`, `id`);

--
-- Limitadores para a tabela `objeto`
--
ALTER TABLE `objeto`
  ADD CONSTRAINT `objeto_ibfk_1` FOREIGN KEY (`id_ambiente`) REFERENCES `ambiente` (`id`);

--
-- Limitadores para a tabela `sensor`
--
ALTER TABLE `sensor`
  ADD CONSTRAINT `sensor_ibfk_2` FOREIGN KEY (`id_tipo_sensor`) REFERENCES `tipo_sensor` (`id`),
  ADD CONSTRAINT `sensor_ibfk_3` FOREIGN KEY (`id_usuario`,`id_ambiente`,`id_no`) REFERENCES `no` (`id_usuario`, `id_ambiente`, `id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
