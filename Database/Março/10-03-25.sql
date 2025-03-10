-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 10-Mar-2025 às 11:06
-- Versão do servidor: 8.3.0
-- versão do PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `the_kings_will`
--
CREATE DATABASE IF NOT EXISTS `the_kings_will` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `the_kings_will`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `adms`
--

DROP TABLE IF EXISTS `adms`;
CREATE TABLE IF NOT EXISTS `adms` (
  `adm_id` int NOT NULL AUTO_INCREMENT,
  `adm_username` varchar(20) NOT NULL,
  `adm_password` varchar(20) NOT NULL,
  PRIMARY KEY (`adm_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `adms`
--

INSERT INTO `adms` (`adm_id`, `adm_username`, `adm_password`) VALUES
(1, 'mnt.Dev', 'Miguel.2008');

-- --------------------------------------------------------

--
-- Estrutura da tabela `armas`
--

DROP TABLE IF EXISTS `armas`;
CREATE TABLE IF NOT EXISTS `armas` (
  `wpn_id` int NOT NULL AUTO_INCREMENT,
  `wpn_nome` varchar(255) NOT NULL,
  `wpn_tipo` enum('Espada','Machado','Arco','Lança','Porrete','Adaga','Garras','Escudo','Foice','Bastão','Besta') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `wpn_natureza` varchar(255) NOT NULL,
  `wpn_efeito` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `wpn_dano` int NOT NULL,
  `wpn_velocidade` int NOT NULL,
  `wpn_alcance` int NOT NULL,
  `wpn_descricao` text NOT NULL,
  `wpn_icone` varchar(255) NOT NULL,
  PRIMARY KEY (`wpn_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `armas`
--

INSERT INTO `armas` (`wpn_id`, `wpn_nome`, `wpn_tipo`, `wpn_natureza`, `wpn_efeito`, `wpn_dano`, `wpn_velocidade`, `wpn_alcance`, `wpn_descricao`, `wpn_icone`) VALUES
(1, 'Secreção De Subris', 'Espada', 'Sangue', 'Corrosão', 4, 2, 2, 'Uma espada feita inteiramente de músculos e restos de Subris, em sua extremidade inferior a o globo ocular, por mero capricho, sua empunhadora é feita com o triceps do Subris enrolado por seu intestino delgado, no guarda-punho temos o figado do Subris, bombeando bile até a extremidade vazada da lamina, assim embuindo a arma em uma secreção corrosiva.', 'https://raw.githubusercontent.com/MiguelCSenai/TheKingsWill/refs/heads/main/Armas/Gifs/Espadas/Sangue/secrecao_de_subris.gif'),
(2, 'Espada Longa', 'Espada', 'Base', 'Nenhum', 6, 2, 3, 'Uma espada longa forjada com precisão e equilíbrio. Sua lâmina reta e afiada reflete o brilho do aço temperado, sendo ideal para golpes rápidos e precisos. O guarda-mão em formato de cruz proporciona proteção e estabilidade, enquanto o cabo revestido em couro garante uma pegada firme e confortável. No pomo, um ornamento metálico reforça a estrutura e o peso da arma, tornando-a confiável para qualquer guerreiro. Esta espada representa a simplicidade e eficácia de uma lâmina clássica, sem adornos mágicos ou influência de elementos sobrenaturais.', 'https://raw.githubusercontent.com/MiguelCSenai/TheKingsWill/refs/heads/main/Armas/Gifs/Espadas/Base/espada_base.gif'),
(3, 'Arco Grande', 'Arco', 'Base', 'Nenhum', 3, 4, 8, 'Um arco longo feito de madeira resistente e corda trançada com fibras naturais. Seu design simples e eficiente permite disparos precisos e poderosos, sendo uma escolha confiável para caçadores e guerreiros habilidosos. A empunhadura é suavemente esculpida para proporcionar conforto ao arqueiro, enquanto os extremos do arco são reforçados para garantir maior durabilidade. Uma arma versátil, ideal para combates à distância e emboscadas estratégicas.', 'https://raw.githubusercontent.com/MiguelCSenai/TheKingsWill/refs/heads/main/Armas/Gifs/Arcos/Base/arco_base.gif'),
(4, 'Machado de Duas Mãos', 'Machado', 'Base', 'Nenhum', 9, 1, 4, 'Um machado de batalha forjado com precisão e resistência. Sua lâmina larga e afiada, acompanhada de uma ponta perfurante, permite golpes devastadores e versatilidade em combate. O cabo longo, de madeira reforçada e envolto em couro, proporciona firmeza e equilíbrio, enquanto o reforço metálico na base adiciona durabilidade. Sem adornos mágicos, esta arma representa a força bruta e a eficácia de um armamento clássico.', 'https://raw.githubusercontent.com/MiguelCSenai/TheKingsWill/refs/heads/main/Armas/Gifs/Machados/Duas%20M%C3%A3os/Base/DHMachado_base.gif'),
(5, 'Presa Branca', 'Lança', 'Base', 'Nenhum', 5, 3, 6, 'Uma lança longa e equilibrada, forjada para precisão e versatilidade. Sua haste reforçada garante firmeza, enquanto a ponta principal, afiada e resistente, é ideal para perfurações devastadoras. Duas lâminas menores próximas à base da ponta ampliam seu potencial ofensivo, garantindo dano adicional caso a estocada atinja toda a profundidade. A guarda curva protege a empunhadura, permitindo firmeza no manuseio. Sem adornos mágicos, esta arma representa a letalidade pura e estratégica de uma lança clássica.', 'https://raw.githubusercontent.com/MiguelCSenai/TheKingsWill/refs/heads/main/Armas/Gifs/Lan%C3%A7as/Base/lanca-base.gif'),
(6, 'Ceifadora', 'Foice', 'Base', 'Nenhum', 6, 1, 5, 'Uma foice mortalmente afiada, projetada para cortes amplos e precisos. Sua lâmina curva, forjada em aço temperado, desliza com facilidade, dilacerando qualquer obstáculo em seu caminho. O cabo longo e reforçado proporciona alcance e firmeza no manuseio, enquanto a ponta metálica na base pode ser usada como arma secundária. Simples e letal, a Ceifadora representa a frieza e eficiência de uma lâmina criada para ceifar vidas com um único golpe.', 'https://raw.githubusercontent.com/MiguelCSenai/TheKingsWill/refs/heads/main/Armas/Gifs/Foices/Base/foice_base.gif');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
