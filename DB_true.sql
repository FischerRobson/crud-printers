-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Maio-2020 às 01:23
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `impressoras`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `impressora`
--

CREATE TABLE `impressora` (
  `id_impressora` int(11) NOT NULL,
  `nr_serie` varchar(30) NOT NULL,
  `id_modelo` int(11) DEFAULT NULL,
  `id_setor` int(11) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `e_bkp` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `log`
--

CREATE TABLE `log` (
  `id_log` int(11) NOT NULL,
  `id_setor` int(11) NOT NULL,
  `id_modelo` int(11) NOT NULL,
  `nr_serie` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `id_impressora` char(255) NOT NULL,
  `data` datetime NOT NULL,
  `acao` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `id_lg` int(11) NOT NULL,
  `user` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nm_user` varchar(25) DEFAULT NULL,
  `nivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`id_lg`, `user`, `password`, `nm_user`, `nivel`) VALUES
(7, 'basico', '202cb962ac59075b964b07152d234b70', 'Basico', 2),
(9, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrador', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `modelo`
--

CREATE TABLE `modelo` (
  `id_modelo` int(11) NOT NULL,
  `nm_modelo` varchar(255) NOT NULL DEFAULT '',
  `nm_marca` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `modelo`
--

INSERT INTO `modelo` (`id_modelo`, `nm_modelo`, `nm_marca`) VALUES
(1, 'SL-M4020ND', 'Samsung'),
(2, 'SL-M4070FR', 'Samsung'),
(3, 'GC420T', 'Zebra'),
(4, 'ZT410', 'Zebra'),
(5, 'Ricoh', 'Ricoh'),
(6, 'novo modelo', 'lambimia SA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `setor`
--

CREATE TABLE `setor` (
  `id_setor` int(2) NOT NULL,
  `nm_setor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `setor`
--

INSERT INTO `setor` (`id_setor`, `nm_setor`) VALUES
(1, 'TI'),
(2, 'Fatuamento'),
(3, 'Administração'),
(4, 'Nutrição'),
(5, 'COL'),
(6, 'Recep SUS'),
(7, 'CDI SUS'),
(8, 'CDI Frei'),
(9, 'Laboratório'),
(10, 'CECOI'),
(11, 'CHAP'),
(12, 'Banco de Sangue'),
(13, 'Centro Obstétrico'),
(14, 'Centro Cirurgico'),
(15, 'Hemodiálise'),
(16, 'Fármacia'),
(17, 'Cartório'),
(18, 'Hotelária'),
(19, 'Banco de Leite'),
(20, 'Neuro'),
(21, 'Eletro'),
(22, 'Hemodinâmica'),
(23, 'Manutenção'),
(24, 'Financeiro'),
(25, 'CERTO 1'),
(26, 'CERTO 2'),
(27, 'Recep Frei'),
(28, 'Internação SUS'),
(29, 'Internação Frei'),
(30, 'RH '),
(31, 'RH/Qualidade'),
(32, 'UTQ'),
(33, 'UTI Adulto'),
(34, 'UTI Infantil'),
(35, 'Pediátria'),
(36, 'Biomédic'),
(37, ' UTI Neonatal'),
(38, 'Hospital de Ensino'),
(39, 'CCIH'),
(40, 'Almoxarifado'),
(41, 'Recebimento'),
(42, 'Medicina Ocupacional'),
(43, 'UTQ Amb'),
(44, 'Recrutamento'),
(45, 'Serviço Social'),
(46, 'Multi'),
(47, 'SUS Infantil'),
(48, '2A'),
(49, '2B'),
(50, '3A'),
(51, '3C'),
(52, '4A');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `impressora`
--
ALTER TABLE `impressora`
  ADD PRIMARY KEY (`id_impressora`),
  ADD KEY `id_modelo` (`id_modelo`),
  ADD KEY `id_setor` (`id_setor`);

--
-- Índices para tabela `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`);

--
-- Índices para tabela `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_lg`);

--
-- Índices para tabela `modelo`
--
ALTER TABLE `modelo`
  ADD PRIMARY KEY (`id_modelo`);

--
-- Índices para tabela `setor`
--
ALTER TABLE `setor`
  ADD PRIMARY KEY (`id_setor`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `impressora`
--
ALTER TABLE `impressora`
  MODIFY `id_impressora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de tabela `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `id_lg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `modelo`
--
ALTER TABLE `modelo`
  MODIFY `id_modelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `setor`
--
ALTER TABLE `setor`
  MODIFY `id_setor` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `impressora`
--
ALTER TABLE `impressora`
  ADD CONSTRAINT `impressora_ibfk_1` FOREIGN KEY (`id_modelo`) REFERENCES `modelo` (`id_modelo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `impressora_ibfk_2` FOREIGN KEY (`id_setor`) REFERENCES `setor` (`id_setor`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
