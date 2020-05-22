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