create database ToDentro;


create table dia(
	id_dia serial not null,
	dia varchar(100) not null,
	primary key(id_dia)
);

INSERT INTO dia (dia) VALUES ('Segunda-Feira');
INSERT INTO dia (dia) VALUES ('Terça-Feira');
INSERT INTO dia (dia) VALUES ('Quarta-Feira');
INSERT INTO dia (dia) VALUES ('Quinta-Feira');
INSERT INTO dia (dia) VALUES ('Sexta-Feira');

create table categorias(
	id_cat serial not null,
	categoria varchar(150) not null,
	primary key(id_cat)

);

create table local(
	id_lo serial not null,
	sala varchar(150) not null,
	Primary key(id)
);

create table status(
	id_sta serial not null,
	status text not null,
	primary key(id_sta)

);

INSERT INTO status (status) VALUES ('Sob Avaliação!');
INSERT INTO status (status) VALUES ('Rejeitado!');
INSERT INTO status (status) VALUES ('Editado!');
INSERT INTO status (status) VALUES ('Publicado!');
INSERT INTO status (status) VALUES ('Publicado e editado!');

create table usertype(
id_us serial not null,
type text not null,
Primary key(id)

ON UPDATE CASCADE ON DELETE CASCADE
);

INSERT INTO usertype (type) VALUES ('Administrador');
INSERT INTO usertype (type) VALUES ('Editor');
INSERT INTO usertype (type) VALUES ('Autor');

create table assistencias(

	id_assist serial not null,
	assist varchar(150) not null,
	texto text not null,
	primary key(id_assist)
);

create table semestre(
	id_sem serial not null,
	semestre text not null,
	Primary key(id_sem)

);

INSERT INTO semestre (semestre) VALUES ('1º Semestre');
INSERT INTO semestre (semestre) VALUES ('2º Semestre');
INSERT INTO semestre (semestre) VALUES ('3º Semestre');
INSERT INTO semestre (semestre) VALUES ('4º Semestre');
INSERT INTO semestre (semestre) VALUES ('5º Semestre');
INSERT INTO semestre (semestre) VALUES ('6º Semestre');
INSERT INTO semestre (semestre) VALUES ('7º Semestre');
INSERT INTO semestre (semestre) VALUES ('8º Semestre');
INSERT INTO semestre (semestre) VALUES ('9º Semestre');
INSERT INTO semestre (semestre) VALUES ('10º Semestre');
INSERT INTO semestre (semestre) VALUES ('11º Semestre');
INSERT INTO semestre (semestre) VALUES ('12º Semestre');

create table eventos(
	id_event serial not null,
	evento varchar(300) not null,
	dataInicio varchar(20),
	dataFim varchar(20),
	texto text not null,
	imagem text,
	primary key(id_event)

);

create table estagios(
	id_est serial not null,
	titulo varchar(200) not null,
	texto text not null,
	categoria integer not null,
	datas date default(now()) not null,
	primary key(id_est),
	foreign key(categoria) references categorias

	ON UPDATE CASCADE ON DELETE CASCADE
);

create table cardapios(
	id_card serial not null,
	dia integer not null,
	data date not null,
	primary key(id),
	foreign key(dia) references dia

	ON UPDATE CASCADE ON DELETE CASCADE
);

create table alimentos(
	id_ali serial not null,
	alimento varchar(150) not null,
	primary key(id)

);

create table alimentos_cardapios(
	id_cad integer not null,
	id_ali integer not null,
	foreign key(id_card) references cardapios,

	ON UPDATE CASCADE ON DELETE CASCADE

	foreign key(id_ali) references alimentos

	ON UPDATE CASCADE ON DELETE CASCADE
);

create table usuarios(
	id_user serial not null,
	username varchar(200) not null,
	email varchar(200) not null,
	senha varchar(200) not null,
	type integer default(3) not null,
	primary key(id),
	foreign key(type) references usertype

	ON UPDATE CASCADE ON DELETE CASCADE
);

INSERT INTO usuarios (username, email, senha, type) VALUES ('admin','admin','admin','1');

create table noticias(
	id_not serial not null,
	titulo varchar(200) not null,
	resumo varchar(350) not null,
	texto text not null,
	data timestamp default(now()) not null,
	autor integer not null,
	status integer not null,
	primary key(id_not),
	foreign key(autor) references usuarios
	ON UPDATE CASCADE ON DELETE CASCADE,
	foreign key(status) references status

	ON UPDATE CASCADE ON DELETE CASCADE
);

create table categorias_noticias(
	cat_id integer not null,
	not_id integer not null,
	foreign key(cat_id) references categorias
	ON UPDATE CASCADE ON DELETE CASCADE,

	foreign key(not_id) references noticias

	ON UPDATE CASCADE ON DELETE CASCADE
);


create table imagens_noticias(
	id_im serial not null,
	imagem text not null,
	noticia integer not null,
	primary key(id_im),
	foreign key(noticia) references noticias

	ON UPDATE CASCADE ON DELETE CASCADE
);

create table programacao(
	id_prog serial not null,
	evento integer not null,
	texto text not null,
	data date not null,
	primary key(id_prog),
	foreign key(evento) references eventos

	ON UPDATE CASCADE ON DELETE CASCADE
);

create table cursos(
	id_curso serial not null,
	nome text not null,
	texto text not null,
	logo text,
	primary key(id)

);

create table disciplinas(
	id_disc serial not null,
	disciplina text not null,
	curso integer not null,
	primary key(id),
	foreign key(curso) references cursos

	ON UPDATE CASCADE ON DELETE CASCADE
);

create table monitorias(
	id_monit serial not null,
	curso_m integer not null,
	semestre_m integer not null,
	sala_m integer not null,
	disciplina_m integer not null,
	info_m text not null,
	primary key(id_monit),
	foreign key(curso_m) references cursos
	ON UPDATE CASCADE ON DELETE CASCADE,
	foreign key(semestre_m) references semestre
	ON UPDATE CASCADE ON DELETE CASCADE,
	foreign key(sala_m) references local
	ON UPDATE CASCADE ON DELETE CASCADE,
	foreign key(disciplina_m) references disciplinas
	ON UPDATE CASCADE ON DELETE CASCADE

);

create table setores(
	id_set serial not null,
	setor varchar(75) not null,
	texto text not null,
	primary key(id_set)
)
