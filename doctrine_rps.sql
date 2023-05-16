drop database if exists rps;
create database rps;
use rps;

create table if not exists player
(
    pk_playerID  int auto_increment primary key,
    name         varchar(255),
    symbolPlayed char(2)
    );

create table if not exists game
(
    pk_gameID  int auto_increment primary key,
    datum       timestamp,
    fk_player1 int,
    fk_player2 int,
    foreign key (fk_player1) references player (pk_playerID),
    foreign key (fk_player2) references player (pk_playerID)
    );

insert into player(name, symbolPlayed)
values ('Moritz', 'sc'),
       ('Chrisi', 'pa'),
       ('Cyp', 'ro'),
       ('Gabriel', 'pa'),
       ('Nico', 'ro'),
       ('Hansi', 'sc');

insert into game(datum, fk_player1, fk_player2)
values ('2021-7-25 12:00:00', 1, 2),
       ('2021-3-31 12:00:00', 3, 4),
       ('2023-2-12 12:00:00', 5, 6),
       ('2022-10-5 12:00:00', 5, 2),
       ('2022-10-5 12:00:00', 2, 6),
       ('2022-09-5 12:00:00', 2, 4)

