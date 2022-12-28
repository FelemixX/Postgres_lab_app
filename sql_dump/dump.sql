create table authors
(
);

alter table authors
    owner to postgres;

create table books
(
);

alter table books
    owner to postgres;

create table visitors
(
);

alter table visitors
    owner to postgres;

create table books_descriptions
(
);

alter table books_descriptions
    owner to postgres;

create table "user"
(
    id         serial
        primary key,
    login      varchar(85) not null
        unique,
    password   varchar(85) not null,
    user_name  varchar(85) not null,
    is_admin   boolean     not null,
    user_email varchar(85) not null
);

alter table "user"
    owner to postgres;

