create table permissions(
  id_perm serial not null,
  user_id integer not null,
  noticias boolean not null default false,
  cardapios boolean not null default false,
  cursos boolean not null default false,
  monitorias boolean not null default false,
  eventos boolean not null default false,
  setores boolean not null default false,
  assistencia boolean not null default false,
  categorias boolean not null default false,
  locais boolean not null default false,
  estagios boolean not null default false,
  primary key(id_perm),
  foreign key(user_id) references usuarios

  ON UPDATE CASCADE ON DELETE CASCADE
);
