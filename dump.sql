-- Criando a tabela produto
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

-- Criando a tabela marca
CREATE TABLE marca
(
  id INT PRIMARY KEY AUTO_INCREMENT,
  nome VARCHAR(200) NOT NULL
);

-- Atribuindo chave estrangeira
ALTER TABLE produto
  ADD CONSTRAINT produto_marca_fk
FOREIGN KEY (marca_id) REFERENCES marca (id);

-- inserindo valores a tabela marca
INSERT INTO marca (nome) VALUES ('Samsung'),('Apple'),('Motorola');

-- insetindo valores a tabela produto
INSERT INTO produto (nome,marca_id,preco,quantidade,descricao,dataCadastro) VALUES
  ('Touch',2,'800.10',1,'Telefone',NOW()),
  ('Tela',3,'300.10',1,'Telefone',NOW()),
  ('Bateria',1,'300.10',1,'Telefone',NOW());  


-- criando a tabela usuario
CREATE TABLE usuario
(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL
);

--criando a tabela login
CREATE TABLE login
(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    senha VARCHAR(100) NOT NULL
);

-- criando a tabela serviço
CREATE TABLE servico
(
    id INT PRIMARY KEY AUTO_INCREMENT,
    usuario_id INT NOT NULL,    
    preco DOUBLE(10,2) NOT NULL,    
    descricao TEXT,
    dataServico DATETIME DEFAULT NOW()
);

-- atribuir dados na tabela serviços
INSERT INTO `service`.`servico` (`id`, `usuario_id`, `preco`, `descricao`,`dataServico`) VALUES ('1', '1', '100', 'Troca tela',NOW());
 

-- criando a chave estrangeira da tabela servico
ALTER TABLE `service`.`servico` 
ADD CONSTRAINT `servico_usuario_fk`
  FOREIGN KEY (`usuario_id`)
  REFERENCES `service`.`usuario` (`id`);
  

-- criação da tabela produtos
CREATE TABLE produtos
(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(200) NOT NULL,    
    descricao TEXT,
    dataCadastro DATETIME DEFAULT NOW()
);

