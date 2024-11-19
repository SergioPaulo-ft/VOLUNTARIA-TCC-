
USE id22128108_voluntaria_bd;

CREATE TABLE `id22128108_voluntaria_bd`.`vagas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nomeVaga` VARCHAR(45) NOT NULL,
  `descricao` VARCHAR(120) NOT NULL,
  `horario` TIME NOT NULL,
  `localizacao` VARCHAR(45) NOT NULL,
  `inscritos` INT,
  PRIMARY KEY (`id`))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;

CREATE TABLE `id22128108_voluntaria_bd`.`ongcad` (
  `idong` INT NOT NULL AUTO_INCREMENT,
  `imagem` BLOB,
  `nomeOng` VARCHAR(45) NOT NULL,
  `emailOng` VARCHAR(60) NOT NULL,
  `senhaOng` VARCHAR(12) NOT NULL,
  `telefone` VARCHAR(9) NOT NULL,
  `cep` VARCHAR(8) NOT NULL,
  `numero` VARCHAR(8) NOT NULL,
  `descricao` VARCHAR(200),
  PRIMARY KEY (`idong`),
  UNIQUE INDEX `email_UNIQUE` (`emailOng` ASC))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;

CREATE TABLE `id22128108_voluntaria_bd`.`Adm` (
  `idAdm` INT NOT NULL AUTO_INCREMENT,
  `imagem` BLOB,
  `nomeAdm` VARCHAR(45) NOT NULL,
  `emailAdm` VARCHAR(60) NOT NULL,
  `senhaAdm` VARCHAR(12) NOT NULL,
  PRIMARY KEY (`idAdm`),
  UNIQUE INDEX `email_UNIQUE` (`emailAdm` ASC))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;

CREATE TABLE `id22128108_voluntaria_bd`.`voluntariocad` (
  `idvolunt` INT NOT NULL AUTO_INCREMENT,
  `imagem` BLOB,
  `nomeVol` VARCHAR(45) NOT NULL,
  `emailVol` VARCHAR(60) NOT NULL,
  `senhaVol` VARCHAR(12) NOT NULL,
  `celular` VARCHAR(9) NOT NULL,
  `cep` VARCHAR(8) NOT NULL,
  `numero` INT NOT NULL,
  `dataNasc` DATE,
  `descricao` VARCHAR(200),
  PRIMARY KEY (`idvolunt`),
  UNIQUE INDEX `email_UNIQUE` (`emailVol` ASC),
  UNIQUE INDEX `celular_UNIQUE` (`celular` ASC))
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


CREATE TABLE `id22128108_voluntaria_bd`.`inscricoes` (
  `idInscricao` INT NOT NULL AUTO_INCREMENT,
  `idVoluntario` INT NOT NULL,
  `idVaga` INT NOT NULL,
  `dataInscricao` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idInscricao`),
  FOREIGN KEY (`idVoluntario`) REFERENCES `id22128108_voluntaria_bd`.`voluntariocad`(`idvolunt`),
  FOREIGN KEY (`idVaga`) REFERENCES `id22128108_voluntaria_bd`.`vagas`(`id`)
) ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;

CREATE TABLE `id22128108_voluntaria_bd`.`mensagens` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `mensagem` TEXT NOT NULL,
  `data_` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;




ALTER TABLE vagas ADD idong INT NOT NULL;
ALTER TABLE id22128108_voluntaria_bd.ongcad ADD COLUMN userImage VARCHAR(255);
ALTER TABLE id22128108_voluntaria_bd.voluntariocad ADD COLUMN userImage VARCHAR(255);
ALTER TABLE id22128108_voluntaria_bd.Adm ADD COLUMN userImage VARCHAR(255);

-- Inserts para a tabela vagas
INSERT INTO vagas (id, nomeVaga, descricao, horario, localizacao) VALUES 
(2, 'Assistente de Marketing Digital', 'Vaga aberta para estudantes universitários interessados em adquirir experiência em marketing digital. O candidato será responsável por auxiliar nas estratégias de marketing online da empresa.', '09:00', 'São Paulo-SP'),
(3, 'Engenheiro de Software Sênior', 'Esta vaga é voltada para profissionais com ampla experiência em desenvolvimento de software. O candidato ideal terá habilidades avançadas em linguagens de programação como Java, Python ou C++.', '14:00', 'Campinas-SP'),
(4, 'Assistente Administrativo PCD', 'Procuramos por um profissional com deficiência para atuar como assistente administrativo em nossa empresa. Será responsável por auxiliar em diversas atividades administrativas do dia a dia.', '10:30', 'Rio de Janeiro-RJ');


-- Inserts para a tabela Adm
INSERT INTO Adm (nomeAdm, emailAdm, senhaAdm) VALUES 
('adm', 'adm@gmail.com', '123456');

-- Inserts para a tabela voluntariocad
INSERT INTO voluntariocad (nomeVol, emailVol, senhaVol, celular, cep, numero, dataNasc, descricao) VALUES 
('Ana Souza', 'ana.souza@gmail.com', '123456', 987654321, '04101010', '456', '1998-02-20','Estudante universitária de Engenharia Ambiental interessada em contribuir para projetos de sustentabilidade.'),
('Pedro Lima', 'pedro.lima@gmail.com', '123456', 987654322, '04101010', '789', '1995-10-15','Profissional de TI com experiência em desenvolvimento web. Busco oportunidades de voluntariado para ajudar ONGs a desenvolverem suas plataformas online.'),
('Carla Santos', 'carla.santos@gmail.com', '123456', 987654323, '04101010', '123', '2000-07-01','Estudante de Psicologia interessada em realizar atividades de apoio emocional para comunidades carentes.');

-- Inserts para a tabela ongcad
INSERT INTO ongcad (nomeOng, emailOng, senhaOng, telefone, cep, numero, descricao) VALUES 
('ONG Verde Vida', 'ong@gmail.com', '123456', 987654321, '04101010', '456', 'A ONG Verde Vida atua na preservação ambiental e educação ambiental. Buscamos voluntários comprometidos com a causa.'),
('ONG Amor e Ação', 'ong.amoreaacao@gmail.com', '123456', 987654322, '04101010', '789', 'Nossa ONG atua no auxílio a comunidades carentes, oferecendo assistência médica e social. Precisamos de voluntários para nos ajudar a alcançar mais pessoas.'),
('ONG Mãos Solidárias', 'ong.maossolidarias@gmail.com', '123456', 987654323, '04101010', '123', 'Trabalhamos com crianças carentes oferecendo atividades educativas e recreativas. Junte-se a nós para fazer a diferença na vida dessas crianças.');

-- Inserts para a tabela mensagens
INSERT INTO mensagens (nome, email, mensagem) VALUES 
('Usuário Confuso', 'JoaPedro@gmail.com', 'Olá, estou um pouco perdido aqui no site. Não consigo encontrar onde devo me inscrever para as vagas de voluntariado. Poderia me ajudar?'),
('ONG Ação Social', 'contato@ongsocial.org', 'Boa tarde! Nossa ONG recentemente se cadastrou no site para buscar voluntários, mas estamos com dificuldades em acessar as informações das inscrições. Gostaríamos de saber como podemos acessar esses dados para análise.'),
('ONG Mãos Solidárias', 'contato@maossolidarias.org', 'Prezado Administrador,

Gostaríamos de expressar nosso interesse em participar de sua plataforma. Somos a equipe da ONG "Mãos Solidárias", dedicada a promover ações sociais e voluntariado em nossa comunidade.
Ao descobrir sua plataforma, ficamos impressionados com a dedicação à causa do voluntariado. Vemos sua plataforma como uma oportunidade valiosa para ampliar nosso alcance e conectar-nos com indivíduos dispostos a fazer a diferença.
Estamos interessados em nos cadastrar em sua plataforma para compartilhar nossas atividades e oportunidades de voluntariado. Acreditamos que isso nos ajudará a encontrar voluntários comprometidos e apaixonados que possam contribuir significativamente para nossos projetos.
Gostaríamos de obter informações sobre o processo de registro e os próximos passos para nos tornarmos parte ativa de sua comunidade.
Agradecemos desde já sua atenção e aguardamos ansiosamente seu retorno.

Atenciosamente'),
('Usuário Perdido', 'Fernanda@gmail.com', 'Oi, estou tentando me cadastrar como voluntário, mas estou enfrentando alguns problemas com o formulário. Parece que não estou conseguindo enviar as informações corretamente. Poderia verificar isso para mim?');






