-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 20/06/2024 às 17:25
-- Versão do servidor: 8.2.0
-- Versão do PHP: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `id22128108_voluntaria_bd`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `adm`
--

DROP TABLE IF EXISTS `adm`;
CREATE TABLE IF NOT EXISTS `adm` (
  `idAdm` int NOT NULL AUTO_INCREMENT,
  `imagem` blob,
  `nomeAdm` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emailAdm` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senhaAdm` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userImage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idAdm`),
  UNIQUE KEY `email_UNIQUE` (`emailAdm`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `adm`
--

INSERT INTO `adm` (`idAdm`, `imagem`, `nomeAdm`, `emailAdm`, `senhaAdm`, `userImage`) VALUES
(1, NULL, 'adm', 'adm@gmail.com', '123456', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `inscricoes`
--

DROP TABLE IF EXISTS `inscricoes`;
CREATE TABLE IF NOT EXISTS `inscricoes` (
  `idInscricao` int NOT NULL AUTO_INCREMENT,
  `idVoluntario` int NOT NULL,
  `idVaga` int NOT NULL,
  `dataInscricao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idInscricao`),
  KEY `idVoluntario` (`idVoluntario`),
  KEY `idVaga` (`idVaga`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `inscricoes`
--

INSERT INTO `inscricoes` (`idInscricao`, `idVoluntario`, `idVaga`, `dataInscricao`) VALUES
(1, 4, 15, '2024-06-18 13:51:10'),
(2, 4, 14, '2024-06-18 13:51:22'),
(3, 4, 16, '2024-06-18 13:54:28');

-- --------------------------------------------------------

--
-- Estrutura para tabela `mensagens`
--

DROP TABLE IF EXISTS `mensagens`;
CREATE TABLE IF NOT EXISTS `mensagens` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mensagem` text NOT NULL,
  `data_` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `mensagens`
--

INSERT INTO `mensagens` (`id`, `nome`, `email`, `mensagem`, `data_`) VALUES
(1, 'Usuário Confuso', 'JoaPedro@gmail.com', 'Olá, estou um pouco perdido aqui no site. Não consigo encontrar onde devo me inscrever para as vagas de voluntariado. Poderia me ajudar?', '2024-06-18 13:39:01'),
(2, 'ONG Ação Social', 'contato@ongsocial.org', 'Boa tarde! Nossa ONG recentemente se cadastrou no site para buscar voluntários, mas estamos com dificuldades em acessar as informações das inscrições. Gostaríamos de saber como podemos acessar esses dados para análise.', '2024-06-18 13:39:01'),
(3, 'ONG Mãos Solidárias', 'contato@maossolidarias.org', 'Prezado Administrador,\n\nGostaríamos de expressar nosso interesse em participar de sua plataforma. Somos a equipe da ONG \"Mãos Solidárias\", dedicada a promover ações sociais e voluntariado em nossa comunidade.\nAo descobrir sua plataforma, ficamos impressionados com a dedicação à causa do voluntariado. Vemos sua plataforma como uma oportunidade valiosa para ampliar nosso alcance e conectar-nos com indivíduos dispostos a fazer a diferença.\nEstamos interessados em nos cadastrar em sua plataforma para compartilhar nossas atividades e oportunidades de voluntariado. Acreditamos que isso nos ajudará a encontrar voluntários comprometidos e apaixonados que possam contribuir significativamente para nossos projetos.\nGostaríamos de obter informações sobre o processo de registro e os próximos passos para nos tornarmos parte ativa de sua comunidade.\nAgradecemos desde já sua atenção e aguardamos ansiosamente seu retorno.\n\nAtenciosamente', '2024-06-18 13:39:01'),
(4, 'Usuário Perdido', 'Fernanda@gmail.com', 'Oi, estou tentando me cadastrar como voluntário, mas estou enfrentando alguns problemas com o formulário. Parece que não estou conseguindo enviar as informações corretamente. Poderia verificar isso para mim?', '2024-06-18 13:39:01');

-- --------------------------------------------------------

--
-- Estrutura para tabela `ongcad`
--

DROP TABLE IF EXISTS `ongcad`;
CREATE TABLE IF NOT EXISTS `ongcad` (
  `idong` int NOT NULL AUTO_INCREMENT,
  `imagem` blob,
  `nomeOng` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emailOng` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senhaOng` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cep` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userImage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idong`),
  UNIQUE KEY `email_UNIQUE` (`emailOng`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `ongcad`
--

INSERT INTO `ongcad` (`idong`, `imagem`, `nomeOng`, `emailOng`, `senhaOng`, `telefone`, `cep`, `numero`, `descricao`, `userImage`) VALUES
(1, NULL, 'ONG Verde Vida', 'ong@gmail.com', '123456', '987654321', '04101010', '456', 'A ONG Verde Vida atua na preservação ambiental e educação ambiental. Buscamos voluntários comprometidos com a causa.', '1.jpg'),
(2, NULL, 'ONG Amor e Ação', 'ong.amoreaacao@gmail.com', '123456', '987654322', '04101010', '789', 'Nossa ONG atua no auxílio a comunidades carentes, oferecendo assistência médica e social. Precisamos de voluntários para nos ajudar a alcançar mais pessoas.', NULL),
(3, NULL, 'ONG Mãos Solidárias', 'ong.maossolidarias@gmail.com', '123456', '987654323', '04101010', '123', 'Trabalhamos com crianças carentes oferecendo atividades educativas e recreativas. Junte-se a nós para fazer a diferença na vida dessas crianças.', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `vagas`
--

DROP TABLE IF EXISTS `vagas`;
CREATE TABLE IF NOT EXISTS `vagas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nomeVaga` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `horario` time NOT NULL,
  `localizacao` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inscritos` int DEFAULT NULL,
  `idong` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `vagas`
--

INSERT INTO `vagas` (`id`, `nomeVaga`, `descricao`, `horario`, `localizacao`, `inscritos`, `idong`) VALUES
(1, 'Assistente de Marketing Digital', 'Vaga aberta para estudantes universitários interessados em adquirir experiência em marketing digital. O candidato será r', '09:00:00', 'São Paulo-SP', NULL, 2),
(2, 'Engenheiro de Software Sênior', 'Esta vaga é voltada para profissionais com ampla experiência em desenvolvimento de software. O candidato ideal terá habi', '14:00:00', 'Campinas-SP', NULL, 3),
(3, 'Assistente Administrativo PCD', 'Procuramos por um profissional com deficiência para atuar como assistente administrativo em nossa empresa. Será responsá', '10:30:00', 'Rio de Janeiro-RJ', NULL, 4),
(4, 'Assistente de Marketing Digital', 'Vaga aberta para estudantes universitários interessados em adquirir experiência em marketing digital. O candidato será r', '09:00:00', 'São Paulo-SP', NULL, 2),
(5, 'Engenheiro de Software Sênior', 'Esta vaga é voltada para profissionais com ampla experiência em desenvolvimento de software. O candidato ideal terá habi', '14:00:00', 'Campinas-SP', NULL, 3),
(6, 'Assistente Administrativo PCD', 'Procuramos por um profissional com deficiência para atuar como assistente administrativo em nossa empresa. Será responsá', '10:30:00', 'Rio de Janeiro-RJ', NULL, 4),
(7, 'Assistente de Marketing Digital', 'Vaga aberta para estudantes universitários interessados em adquirir experiência em marketing digital. O candidato será r', '09:00:00', 'São Paulo-SP', NULL, 2),
(8, 'Engenheiro de Software Sênior', 'Esta vaga é voltada para profissionais com ampla experiência em desenvolvimento de software. O candidato ideal terá habi', '14:00:00', 'Campinas-SP', NULL, 3),
(9, 'Assistente Administrativo PCD', 'Procuramos por um profissional com deficiência para atuar como assistente administrativo em nossa empresa. Será responsá', '10:30:00', 'Rio de Janeiro-RJ', NULL, 4),
(10, 'Assistente de Marketing Digital', 'Vaga aberta para estudantes universitários interessados em adquirir experiência em marketing digital. O candidato será r', '09:00:00', 'São Paulo-SP', NULL, 0),
(11, 'Engenheiro de Software Sênior', 'Esta vaga é voltada para profissionais com ampla experiência em desenvolvimento de software. O candidato ideal terá habi', '14:00:00', 'Campinas-SP', NULL, 0),
(12, 'Assistente Administrativo PCD', 'Procuramos por um profissional com deficiência para atuar como assistente administrativo em nossa empresa. Será responsá', '10:30:00', 'Rio de Janeiro-RJ', NULL, 0),
(13, 'Assistente de Marketing Digital', 'Vaga aberta para estudantes universitários interessados em adquirir experiência em marketing digital. O candidato será r', '09:00:00', 'São Paulo-SP', NULL, 0),
(14, 'Engenheiro de Software Sênior', 'Esta vaga é voltada para profissionais com ampla experiência em desenvolvimento de software. O candidato ideal terá habi', '14:00:00', 'Campinas-SP', 1, 0),
(15, 'Assistente Administrativo PCD', 'Procuramos por um profissional com deficiência para atuar como assistente administrativo em nossa empresa. Será responsá', '10:30:00', 'Rio de Janeiro-RJ', 1, 0),
(17, 'Auxiliar de limpeza de creche', 'voce terá que ajudar a equipe a limpar todas as salas do infantil.', '09:30:00', 'Avenida Portugal 234', NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `voluntariocad`
--

DROP TABLE IF EXISTS `voluntariocad`;
CREATE TABLE IF NOT EXISTS `voluntariocad` (
  `idvolunt` int NOT NULL AUTO_INCREMENT,
  `imagem` blob,
  `nomeVol` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emailVol` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senhaVol` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `celular` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cep` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` int NOT NULL,
  `dataNasc` date DEFAULT NULL,
  `descricao` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userImage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idvolunt`),
  UNIQUE KEY `email_UNIQUE` (`emailVol`),
  UNIQUE KEY `celular_UNIQUE` (`celular`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `voluntariocad`
--

INSERT INTO `voluntariocad` (`idvolunt`, `imagem`, `nomeVol`, `emailVol`, `senhaVol`, `celular`, `cep`, `numero`, `dataNasc`, `descricao`, `userImage`) VALUES
(1, NULL, 'Ana Souza', 'ana.souza@gmail.com', '123456', '987654321', '04101010', 456, '1998-02-20', 'Estudante universitária de Engenharia Ambiental interessada em contribuir para projetos de sustentabilidade.', NULL),
(2, NULL, 'Pedro Lima', 'pedro.lima@gmail.com', '123456', '987654322', '04101010', 789, '1995-10-15', 'Profissional de TI com experiência em desenvolvimento web. Busco oportunidades de voluntariado para ajudar ONGs a desenvolverem suas plataformas online.', NULL),
(3, NULL, 'Carla Santos', 'carla.santos@gmail.com', '123456', '987654323', '04101010', 123, '2000-07-01', 'Estudante de Psicologia interessada em realizar atividades de apoio emocional para comunidades carentes.', NULL),
(4, NULL, 'julia', 'julia@email.com', '123', '947003411', '09110090', 12, '2024-06-11', 'sou proativa e gosto de ajudar as pessoas e animais.', '4.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
