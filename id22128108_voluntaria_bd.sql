-- phpMyAdmin SQL Dump
<<<<<<< HEAD
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 20/06/2024 às 17:25
-- Versão do servidor: 8.2.0
-- Versão do PHP: 8.2.13
=======
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 20-Jun-2024 às 09:21
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26
>>>>>>> 081fced2fae179fd418295c27943843fbae70807

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
<<<<<<< HEAD
-- Estrutura para tabela `adm`
=======
-- Estrutura da tabela `adm`
>>>>>>> 081fced2fae179fd418295c27943843fbae70807
--

DROP TABLE IF EXISTS `adm`;
CREATE TABLE IF NOT EXISTS `adm` (
  `idAdm` int NOT NULL AUTO_INCREMENT,
  `imagem` blob,
<<<<<<< HEAD
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
=======
  `nomeAdm` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `emailAdm` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `senhaAdm` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `userImage` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idAdm`),
  UNIQUE KEY `email_UNIQUE` (`emailAdm`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `adm`
--

INSERT INTO `adm` (`idAdm`, `imagem`, `nomeAdm`, `emailAdm`, `senhaAdm`, `userImage`) VALUES
(1, NULL, 'Maria Silva', 'maria.silva@gmail.com', '123456', NULL),
(2, NULL, 'João Oliveira', 'joao.oliveira@gmail.com', '123456', NULL),
(3, NULL, 'Fernanda Santos', 'fernanda.santos@gmail.com', '123456', NULL),
(4, NULL, 'adm', 'adm@gmail.com', '123456', NULL);
>>>>>>> 081fced2fae179fd418295c27943843fbae70807

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- Estrutura para tabela `inscricoes`
=======
-- Estrutura da tabela `inscricoes`
>>>>>>> 081fced2fae179fd418295c27943843fbae70807
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
<<<<<<< HEAD
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `inscricoes`
--

INSERT INTO `inscricoes` (`idInscricao`, `idVoluntario`, `idVaga`, `dataInscricao`) VALUES
(1, 4, 15, '2024-06-18 13:51:10'),
(2, 4, 14, '2024-06-18 13:51:22'),
(3, 4, 16, '2024-06-18 13:54:28');
=======
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `inscricoes`
--

INSERT INTO `inscricoes` (`idInscricao`, `idVoluntario`, `idVaga`, `dataInscricao`) VALUES
(1, 3, 4, '2024-06-07 09:06:41'),
(2, 4, 4, '2024-06-09 10:36:07'),
(3, 4, 5, '2024-06-09 10:37:18'),
(4, 5, 5, '2024-06-17 02:00:52'),
(5, 5, 3, '2024-06-17 02:00:55'),
(6, 4, 6, '2024-06-17 02:27:46');
>>>>>>> 081fced2fae179fd418295c27943843fbae70807

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- Estrutura para tabela `mensagens`
=======
-- Estrutura da tabela `mensagens`
>>>>>>> 081fced2fae179fd418295c27943843fbae70807
--

DROP TABLE IF EXISTS `mensagens`;
CREATE TABLE IF NOT EXISTS `mensagens` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mensagem` text NOT NULL,
  `data_` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
<<<<<<< HEAD
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `mensagens`
--

INSERT INTO `mensagens` (`id`, `nome`, `email`, `mensagem`, `data_`) VALUES
(1, 'Usuário Confuso', 'JoaPedro@gmail.com', 'Olá, estou um pouco perdido aqui no site. Não consigo encontrar onde devo me inscrever para as vagas de voluntariado. Poderia me ajudar?', '2024-06-18 13:39:01'),
(2, 'ONG Ação Social', 'contato@ongsocial.org', 'Boa tarde! Nossa ONG recentemente se cadastrou no site para buscar voluntários, mas estamos com dificuldades em acessar as informações das inscrições. Gostaríamos de saber como podemos acessar esses dados para análise.', '2024-06-18 13:39:01'),
(3, 'ONG Mãos Solidárias', 'contato@maossolidarias.org', 'Prezado Administrador,\n\nGostaríamos de expressar nosso interesse em participar de sua plataforma. Somos a equipe da ONG \"Mãos Solidárias\", dedicada a promover ações sociais e voluntariado em nossa comunidade.\nAo descobrir sua plataforma, ficamos impressionados com a dedicação à causa do voluntariado. Vemos sua plataforma como uma oportunidade valiosa para ampliar nosso alcance e conectar-nos com indivíduos dispostos a fazer a diferença.\nEstamos interessados em nos cadastrar em sua plataforma para compartilhar nossas atividades e oportunidades de voluntariado. Acreditamos que isso nos ajudará a encontrar voluntários comprometidos e apaixonados que possam contribuir significativamente para nossos projetos.\nGostaríamos de obter informações sobre o processo de registro e os próximos passos para nos tornarmos parte ativa de sua comunidade.\nAgradecemos desde já sua atenção e aguardamos ansiosamente seu retorno.\n\nAtenciosamente', '2024-06-18 13:39:01'),
(4, 'Usuário Perdido', 'Fernanda@gmail.com', 'Oi, estou tentando me cadastrar como voluntário, mas estou enfrentando alguns problemas com o formulário. Parece que não estou conseguindo enviar as informações corretamente. Poderia verificar isso para mim?', '2024-06-18 13:39:01');
=======
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `mensagens`
--

INSERT INTO `mensagens` (`id`, `nome`, `email`, `mensagem`, `data_`) VALUES
(1, 'Usuário Confuso', 'usuario.confuso@example.com', 'Olá, estou um pouco perdido aqui no site. Não consigo encontrar onde devo me inscrever para as vagas de voluntariado. Poderia me ajudar?', '2024-06-05 02:04:21'),
(2, 'ONG Ação Social', 'contato@ongsocial.org', 'Boa tarde! Nossa ONG recentemente se cadastrou no site para buscar voluntários, mas estamos com dificuldades em acessar as informações das inscrições. Gostaríamos de saber como podemos acessar esses dados para análise.', '2024-06-05 02:04:21'),
(3, 'Usuário Perdido', 'usuario.perdido@example.com', 'Oi, estou tentando me cadastrar como voluntário, mas estou enfrentando alguns problemas com o formulário. Parece que não estou conseguindo enviar as informações corretamente. Poderia verificar isso para mim?', '2024-06-05 02:04:21'),
(4, 'Usuário Confuso', 'JoaPedro@gmail.com', 'Olá, estou um pouco perdido aqui no site. Não consigo encontrar onde devo me inscrever para as vagas de voluntariado. Poderia me ajudar?', '2024-06-05 02:16:18'),
(5, 'ONG Ação Social', 'contato@ongsocial.org', 'Boa tarde! Nossa ONG recentemente se cadastrou no site para buscar voluntários, mas estamos com dificuldades em acessar as informações das inscrições. Gostaríamos de saber como podemos acessar esses dados para análise.', '2024-06-05 02:16:18'),
(6, 'ONG Mãos Solidárias', 'contato@maossolidarias.org', 'Prezado Administrador,\n\nGostaríamos de expressar nosso interesse em participar de sua plataforma. Somos a equipe da ONG \"Mãos Solidárias\", dedicada a promover ações sociais e voluntariado em nossa comunidade.\n\nAo descobrir sua plataforma, ficamos impressionados com a dedicação à causa do voluntariado. Vemos sua plataforma como uma oportunidade valiosa para ampliar nosso alcance e conectar-nos com indivíduos dispostos a fazer a diferença.\n\nEstamos interessados em nos cadastrar em sua plataforma para compartilhar nossas atividades e oportunidades de voluntariado. Acreditamos que isso nos ajudará a encontrar voluntários comprometidos e apaixonados que possam contribuir significativamente para nossos projetos.\n\nGostaríamos de obter informações sobre o processo de registro e os próximos passos para nos tornarmos parte ativa de sua comunidade.\n\nAgradecemos desde já sua atenção e aguardamos ansiosamente seu retorno.\n\nAtenciosamente,\n\n[Seu Nome]\n[Cargo na ONG \"Mãos Solidárias\"]\n[Contato: email@maossolidarias.org | (XX) XXXX-XXXX]', '2024-06-05 02:16:18'),
(7, 'Usuário Perdido', 'Fernanda@gmail.com', 'Oi, estou tentando me cadastrar como voluntário, mas estou enfrentando alguns problemas com o formulário. Parece que não estou conseguindo enviar as informações corretamente. Poderia verificar isso para mim?', '2024-06-05 02:16:18');
>>>>>>> 081fced2fae179fd418295c27943843fbae70807

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- Estrutura para tabela `ongcad`
=======
-- Estrutura da tabela `ongcad`
>>>>>>> 081fced2fae179fd418295c27943843fbae70807
--

DROP TABLE IF EXISTS `ongcad`;
CREATE TABLE IF NOT EXISTS `ongcad` (
  `idong` int NOT NULL AUTO_INCREMENT,
  `imagem` blob,
<<<<<<< HEAD
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
=======
  `nomeOng` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `emailOng` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `senhaOng` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cep` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userImage` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idong`),
  UNIQUE KEY `email_UNIQUE` (`emailOng`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `ongcad`
--

INSERT INTO `ongcad` (`idong`, `imagem`, `nomeOng`, `emailOng`, `senhaOng`, `telefone`, `cep`, `numero`, `descricao`, `userImage`) VALUES
(1, NULL, 'ONG Verde Vida', 'ong.verdevida@gmail.com', '123456', '987654321', '04101010', '456', 'A ONG Verde Vida atua na preservação ambiental e educação ambiental. Buscamos voluntários comprometidos com a causa.', NULL),
(2, NULL, 'ONG Amor e Ação', 'ong.amoreaacao@gmail.com', '123456', '987654322', '04101010', '789', 'Nossa ONG atua no auxílio a comunidades carentes, oferecendo assistência médica e social. Precisamos de voluntários para nos ajudar a alcançar mais pessoas.', NULL),
(3, NULL, 'ONG Mãos Solidárias', 'ong.maossolidarias@gmail.com', '123456', '987654323', '04101010', '123', 'Trabalhamos com crianças carentes oferecendo atividades educativas e recreativas. Junte-se a nós para fazer a diferença na vida dessas crianças.', NULL),
(5, NULL, 'ong', 'ong@gmail.com', '123456', '954876826', '09125150', '56', 'Cuidando sempre das pessoas mais vulneráveis, oferecemos um caminho seguro para que jovens com poucas oportunidades possam seguir carreira no esporte, afastando-os das ruas e dos perigos das drogas', '5.jpg'),
(10, NULL, 'aacd', 'aacd@gmail.com', '123456', '', '', '', NULL, NULL),
(11, NULL, 'sdsdf', 'r@gmail.com', '123456', '', '', '', NULL, NULL),
(12, NULL, 'testando', 'testando@gmail.com', '123456', '', '', '', NULL, NULL);
>>>>>>> 081fced2fae179fd418295c27943843fbae70807

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- Estrutura para tabela `vagas`
=======
-- Estrutura da tabela `vagas`
>>>>>>> 081fced2fae179fd418295c27943843fbae70807
--

DROP TABLE IF EXISTS `vagas`;
CREATE TABLE IF NOT EXISTS `vagas` (
  `id` int NOT NULL AUTO_INCREMENT,
<<<<<<< HEAD
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
=======
  `nomeVaga` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `horario` time NOT NULL,
  `localizacao` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `inscritos` int DEFAULT NULL,
  `idong` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `vagas`
>>>>>>> 081fced2fae179fd418295c27943843fbae70807
--

INSERT INTO `vagas` (`id`, `nomeVaga`, `descricao`, `horario`, `localizacao`, `inscritos`, `idong`) VALUES
(1, 'Assistente de Marketing Digital', 'Vaga aberta para estudantes universitários interessados em adquirir experiência em marketing digital. O candidato será r', '09:00:00', 'São Paulo-SP', NULL, 2),
(2, 'Engenheiro de Software Sênior', 'Esta vaga é voltada para profissionais com ampla experiência em desenvolvimento de software. O candidato ideal terá habi', '14:00:00', 'Campinas-SP', NULL, 3),
<<<<<<< HEAD
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
=======
(3, 'Assistente Administrativo PCD', 'Procuramos por um profissional com deficiência para atuar como assistente administrativo em nossa empresa. Será responsá', '10:30:00', 'Rio de Janeiro-RJ', 1, 4),
(4, 'nova vaga', 'sdfsdf', '11:01:00', 'sdfds', 2, 1),
(5, 'Uni Fut ', 'Estamos convocando pessoas para ajudar numa limpeza num campinho comunitario, venha nos ajudar as crianças da comunidade', '07:00:00', 'zona leste SP', 2, 5),
(6, 'nova vaga ', 'preferencial para jovens e pessoas com deficiencias', '10:00:00', 'Taboão/ Sao Bernardo do Campo', 1, 5);
>>>>>>> 081fced2fae179fd418295c27943843fbae70807

-- --------------------------------------------------------

--
<<<<<<< HEAD
-- Estrutura para tabela `voluntariocad`
=======
-- Estrutura da tabela `voluntariocad`
>>>>>>> 081fced2fae179fd418295c27943843fbae70807
--

DROP TABLE IF EXISTS `voluntariocad`;
CREATE TABLE IF NOT EXISTS `voluntariocad` (
  `idvolunt` int NOT NULL AUTO_INCREMENT,
  `imagem` blob,
<<<<<<< HEAD
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
=======
  `nomeVol` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `emailVol` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `senhaVol` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `celular` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cep` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` int NOT NULL,
  `dataNasc` date DEFAULT NULL,
  `descricao` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userImage` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idvolunt`),
  UNIQUE KEY `email_UNIQUE` (`emailVol`),
  UNIQUE KEY `celular_UNIQUE` (`celular`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `voluntariocad`
>>>>>>> 081fced2fae179fd418295c27943843fbae70807
--

INSERT INTO `voluntariocad` (`idvolunt`, `imagem`, `nomeVol`, `emailVol`, `senhaVol`, `celular`, `cep`, `numero`, `dataNasc`, `descricao`, `userImage`) VALUES
(1, NULL, 'Ana Souza', 'ana.souza@gmail.com', '123456', '987654321', '04101010', 456, '1998-02-20', 'Estudante universitária de Engenharia Ambiental interessada em contribuir para projetos de sustentabilidade.', NULL),
(2, NULL, 'Pedro Lima', 'pedro.lima@gmail.com', '123456', '987654322', '04101010', 789, '1995-10-15', 'Profissional de TI com experiência em desenvolvimento web. Busco oportunidades de voluntariado para ajudar ONGs a desenvolverem suas plataformas online.', NULL),
(3, NULL, 'Carla Santos', 'carla.santos@gmail.com', '123456', '987654323', '04101010', 123, '2000-07-01', 'Estudante de Psicologia interessada em realizar atividades de apoio emocional para comunidades carentes.', NULL),
<<<<<<< HEAD
(4, NULL, 'julia', 'julia@email.com', '123', '947003411', '09110090', 12, '2024-06-11', 'sou proativa e gosto de ajudar as pessoas e animais.', '4.png');
=======
(4, NULL, 'sergio', 'sergio@gmail.com', '123456', '985163603', '09061710', 951, '2001-04-18', NULL, NULL),
(6, NULL, 'i', 'i@gmail.com', '123456', '986546462', '09164545', 75, '2000-12-11', NULL, NULL);
>>>>>>> 081fced2fae179fd418295c27943843fbae70807
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
