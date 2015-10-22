CREATE TABLE utilizadores(
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	nome VARCHAR UNIQUE,
	pass VARCHAR,
	email VARCHAR UNIQUE
	tipo INTEGER);

CREATE TABLE  noticias(
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	data VARCHAR,
	autor VARCHAR,
	titulo VARCHAR,
	introducao VARCHAR,
	conteudo VARCHAR,
	url VARCHAR
);

CREATE TABLE comentarios(
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	id_noticia INTEGER,
	autor VARCHAR,
	data VARCHAR,
	texto VARCHAR);
	
INSERT INTO utilizadores (nome,pass,email,tipo) VALUES ('admin','admin','admin@admin.xxx',2);