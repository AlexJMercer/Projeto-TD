create table notificacoes(
  id_notif serial not null,
  titulo_notif varchar(100) not null,
  texto_notif text not null,
  notificar boolean default FALSE,
  Primary Key(id_notif)
);
