drop database if exists MVCWebStorage;
create database MVCWebStorage character set utf8 collate utf8_general_ci;
use MVCWebStorage;

create table owner(
owner_id    int not null primary key auto_increment,
username   varchar(30),
password   varchar(32),
firstname  varchar(30),
lastname   varchar(30)
)engine=innodb;

create table private_data(
private_data_id   int not null primary key auto_increment,
owner  int not null,
url varchar(250),
shareable int not null,
share_with  int not null,
see_public int not null
)engine=innodb;


alter table private_data add foreign key(owner) references owner(owner_id);

#1
insert into owner (username, password, firstname, lastname) values ('mkusen', md5('mk'), 'Mario', 'Kušen');
#1
insert into owner (username, password, firstname, lastname) values ('ikusen', md5('ik'), 'Izidora', 'Kušen');