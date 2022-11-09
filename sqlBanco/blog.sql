CREATE TABLE usuario (
    usuario_id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100),
    senha VARCHAR(50),
    sexo VARCHAR(1)
);

CREATE TABLE post (
    post_id INT PRIMARY KEY AUTO_INCREMENT,
    descricao VARCHAR(265),
    usuario_id INT,
    FOREIGN KEY (usuario_id) REFERENCES usuario(usuario_id)
)

INSERT INTO usuario(nome, senha, sexo) values 
('Ruan', '1234', 'M'),
('Carmen', 'minhasenha', 'F'),
('Walter', 'JKzrr1', 'M');

INSERT INTO post(descricao, usuario_id) values 
('minha primeira postagem no blog novo', 1),
('Conheci um blog novo muito legal', 2),
('Quero ficar famoso nesse blog', 1),
('Como logo nesse blog?', 3);


