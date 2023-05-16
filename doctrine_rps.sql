drop database if exists rps;
create database rps;
use rps;

create table if not exists symbol
(
    pk_symbolID  int auto_increment primary key,
    symbolPlayed char(2)
    );

create table if not exists game
(
    pk_gameID  int auto_increment primary key,
    date      timestamp,
    player1    varchar(255),
    player2    varchar(255),
    fk_symbol1 int,
    fk_symbol2 int,
    foreign key (fk_symbol1) references symbol (pk_symbolID),
    foreign key (fk_symbol2) references symbol (pk_symbolID)
    );

insert into symbol(symbolPlayed)
values ('ro'),
       ('pa'),
       ('sc');

insert into game(date, player1, player2, fk_symbol1, fk_symbol2)
values ('2021-7-25 12:00:00', 'Moritz', 'Chrisi', 1, 2),
       ('2021-3-31 12:00:00', 'Cyp', 'Gabriel', 3, 1),
       ('2023-2-12 12:00:00', 'Nico', 'Hansi', 2, 2),
       ('2022-10-5 12:00:00', 'Nico', 'Chrisi', 3, 2),
       ('2022-10-5 12:00:00', 'Chrisi', 'Hansi', 3, 3),
       ('2022-09-5 12:00:00', 'Chrisi', 'Gabriel', 2, 1)