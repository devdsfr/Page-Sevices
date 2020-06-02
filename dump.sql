CREATE TABLE produto
(
    id INT PRIMARY KEY AUTO_INCREMENT,
    marca_id INT NOT NULL,
    nome VARCHAR(200) NOT NULL,
    preco DOUBLE(10,2) NOT NULL,
    quantidade INT NOT NULL,
    descricao TEXT,
    dataCadastro DATETIME DEFAULT NOW()
);

CREATE TABLE marca
(
  id INT PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(200) NOT NULL
);

ALTER TABLE produto
  ADD CONSTRAINT produto_marca_fk
FOREIGN KEY (marca_id) REFERENCES marca (id);

INSERT INTO marca (nome) VALUES ('Samsung'),('Apple'),('Motorola');

INSERT INTO produto (nome,marca_id,preco,quantidade,descricao,dataCadastro) VALUES
  ('Galaxy 1',1,'800.10',1,'Telefone',NOW()),
  ('Galaxy 2',1,'300.10',1,'Telefone',NOW()),
  ('Galaxy 3',1,'300.10',1,'Telefone',NOW()),
  ('Galaxy 4',1,'600.10',1,'Telefone',NOW()),
  ('Galaxy 5',1,'400.10',1,'Telfone',NOW()),
  ('Galaxy 6',1,'200.10',1,'Telefone',NOW()),
  ('Iphone 1',2,'300.10',1,'Telefone',NOW()),
  ('Iphone 2',2,'100.10',1,'Telefone',NOW()),
  ('Iphone 3',2,'500.10',1,'Telefone',NOW()),
  ('Iphone 4',2,'700.10',1,'Telefone',NOW()),
  ('Iphone 5',2,'100.10',1,'Telefone',NOW()),
  ('Iphone 6',2,'100.10',1,'Telefone',NOW()),
  ('MotoX 1',3,'400.10',1,'Telefone',NOW()),
  ('MotoX 2',3,'500.10',1,'Telefone',NOW()),
  ('MotoX 3',3,'100.10',1,'Telefone',NOW()),
  ('MotoX 4',3,'100.10',1,'Telefone',NOW()),
  ('MotoX 5',3,'500.10',1,'Telefone',NOW()),
  ('MotoX 6',3,'800.10',1,'Telefone',NOW());


CREATE TABLE usuario
(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL
);


CREATE TABLE produto
(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(200) NOT NULL,
    status CHAR(1) NOT NULL DEFAULT 1,
    preco DOUBLE(10,2) NOT NULL,
    unidade VARCHAR(30) NOT NULL,
    ean BIGINT NOT NULL,
    descricao TEXT,
    dataCadastro DATETIME DEFAULT NOW()
);


INSERT INTO produto (nome,status,preco,unidade,ean,descricao,dataCadastro) VALUES 
('Tenis Salão','S','800.10','Unidade','3134567891011','Tenis',NOW()),
('Tenis Floresta','S','300.10','Unidade','2234567891011','Tenis',NOW()),
('Tenis Rua','S','300.10','Unidade','3334567891011','Tenis',NOW()),
('Tenis Casa','S','600.10','Unidade','3434567891011','Tenis',NOW()),
('Tenis Futebol','S','400.10','Unidade','3534567891011','Tenis',NOW()),
('Tenis Trabalho','S','200.10','Unidade','3634567891011','Tenis',NOW()),
('Camisa Salão','S','300.10','Unidade','3734567891011','Camisa',NOW()),
('Camisa Trabalho','S','100.10','Unidade','3834567891011','Camisa',NOW()),
('Camisa Polo','S','500.10','Unidade','3934567891011','Camisa',NOW()),
('Camisa Regata','S','700.10','Unidade','4034567891011','Camisa',NOW()),
('Camisa Social','S','100.10','Unidade','4134567891011','Camisa',NOW()),
('Bola','S','100.10','Unidade','4234567891011','Bola',NOW()),
('Bola Tenis','S','400.10','Unidade','4334567891011','Bola',NOW()),
('Raquete','S','500.10','Unidade','4434567891011','Raquete',NOW()),
('Chinelo','S','100.10','Unidade','4534567891011','Chinelo',NOW()),
('Luva de Boxe','S','100.10','Unidade','4634567891011','Luva',NOW()),
('Short','S','500.10','Unidade','4734567891011','Short',NOW()),
('Casaco','S','800.10','Unidade','4834567891011','Casaco',NOW()),
('Casaco Treino','S','100.10','Unidade','4934567891011','Casaco',NOW()),
('Casaco Escalada','S','100.10','Unidade','5034567891011','Casaco',NOW()),
('Casaco Navegação','S','120.10','Unidade','5134567891011','Casaco',NOW()),
('Casaco Social','S','130.10','Unidade','5234567891011','Casaco',NOW()),
('Casaco Esportivo','S','140.10','Unidade','5334567891011','Casaco',NOW()),
('Casaco Neve','S','150.10','Unidade','5434567891011','Casaco',NOW()),
('Casaco Verão','S','600.10','Unidade','5534567891011','Casaco',NOW());