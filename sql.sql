CREATE TABLE utilizadores(
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	nome VARCHAR UNIQUE,
	pass VARCHAR,
	email VARCHAR UNIQUE);

CREATE TABLE  noticias(
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	data VARCHAR,
	id_autor INTEGER,
	titulo VARCHAR,
	introducao VARCHAR,
	conteudo VARCHAR,
	url VARCHAR
);

CREATE TABLE permissoes (
	tipo VARCHAR
	email VARCHAR REFERENCES utilizadores(email)
	);

CREATE TABLE  comentarios(
	id INTEGER PRIMARY KEY AUTOINCREMENT,
	id_noticia INTEGER,
	id_autor VARCHAR,
	texto VARCHAR);
	
INSERT INTO utilizadores (nome,pass,email) VALUES ('admin','admin','admin@admin.xxx');