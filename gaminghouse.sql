-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2024 at 12:04 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gaminghouse`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`id`, `nome`) VALUES
(1, 'MELHOR DESTRUIDA'),
(2, 'MELHOR MUSICA'),
(3, 'MELHOR COMIDA'),
(4, 'MELHOR BEBIDA'),
(5, 'MELHOR JOGO'),
(6, 'MELHOR JOGO COADJUVANTE'),
(7, 'MELHOR BORDAO'),
(8, 'MELHOR BORDAO COADJUVANTE'),
(9, 'MELHOR MOMENTO'),
(10, 'MELHOR FOTOGRAFIA'),
(11, 'MELHOR ROLEPLAY');

-- --------------------------------------------------------

--
-- Table structure for table `indicados`
--

CREATE TABLE `indicados` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `pontuacao` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `indicados`
--

INSERT INTO `indicados` (`id`, `nome`, `categoria_id`, `pontuacao`) VALUES
(12, 'E que hoje vai ter FESTINHA!', 2, 680),
(13, 'Site GH', 1, 570),
(14, 'Perna do cara', 1, 230),
(15, 'Coxinha + Bolinho De Queijo', 3, 350),
(16, 'Red Bull COCO AÇAI', 4, 350),
(17, 'Suco de Goiaba', 4, 40),
(18, 'Remnant From The Ashes', 5, 130),
(19, 'League of Legends', 5, 560),
(20, 'Warzone', 5, -300),
(21, 'PokerStars', 6, 40),
(22, 'Nal do Canal', 7, 820),
(23, 'Baiano', 7, 510),
(24, 'Approved Knuckles', 8, 690),
(25, 'Siiii He He He', 8, 590),
(26, 'Seu jorge Coxinha', 9, 440),
(27, 'Bixinho do Carro', 10, 300),
(28, 'Matrix', 10, 680),
(29, 'Viagem Salvador+Candeias', 11, 360),
(30, 'Pc de Albert', 1, 400),
(31, 'Meu tornozelo', 1, 230),
(32, 'Almoço la em cima', 3, 480),
(33, 'Ovo de Joao', 3, 390),
(34, 'Bolo de chocolate', 3, 270),
(35, 'Tnt Manga', 4, 250),
(36, 'Agua', 4, 190),
(37, 'Tnt Maça Verde', 4, 310),
(38, 'Road 96 Mile 0', 6, 600),
(39, 'Guitar Flash', 6, 130),
(40, 'Cazemiro', 7, 240),
(41, 'Valeu NT', 8, 700),
(42, 'Chegada de Albert', 9, 460),
(44, 'Tiltados depois do Mestre Abismo', 9, 560),
(45, 'Bella ciao', 2, 380),
(46, 'Hot Dog', 3, 400),
(47, 'Moqueca', 3, 340),
(48, 'Cozido', 3, 340),
(49, 'ICE LIMÃO', 4, 400),
(50, 'TNT TANGERINA', 4, 340),
(51, 'UFFFFFFF', 8, 240),
(52, 'AGUA AGUA AGUA', 8, 460),
(53, 'THE GOAAAAAT', 8, 170),
(54, 'LARY MESÁRIA', 9, 360),
(55, 'CONNECT FOUR - ZOE', 9, 480),
(56, 'TEM ALGUMA COISA DE ERRADO AQUI', 7, 480),
(57, 'CIBERPUNK - ROAD 96', 10, 360),
(58, 'ICE AZUL', 10, 360),
(59, 'RODIZIO DE PIZZA - FAST', 11, 500),
(60, 'JÃO GANK', 11, 380),
(61, 'Indianos contrabando', 9, 540),
(62, 'Kjaerbye a mira tremida', 9, 320),
(63, 'CANALHAS', 8, 300),
(64, 'Yakisoba', 3, 90),
(65, 'Carros Brancos', 9, 300);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `senha`) VALUES
(1, 'fernando', 'lixo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indicados`
--
ALTER TABLE `indicados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `indicados`
--
ALTER TABLE `indicados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `indicados`
--
ALTER TABLE `indicados`
  ADD CONSTRAINT `indicados_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
