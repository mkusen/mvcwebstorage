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
url varchar(250)
)engine=innodb;

create table shared_data(
shared_data_id int not null primary key auto_increment,
owner int not null,
url varchar(250),
share_with int not null
)engine=innodb;

create table public_data(
public_data_id  int not null primary key auto_increment,
owner int not null,
url varchar(250)
)engine=innodb;

alter table private_data add foreign key(owner) references owner(owner_id);
alter table shared_data add foreign key (owner) references owner(owner_id);
alter table public_data add foreign key (owner) references owner(owner_id);

#1
insert into owner (username, password, firstname, lastname) values ('mkusen', md5('mk'), 'Mario', 'Ku�en');
#2
insert into owner (username, password, firstname, lastname) values ('ikusen', md5('ik'), 'Izidora', 'Ku�en');

#1
insert into private_data (owner, url) values (1,'mario_private_url');
#2
insert into private_data (owner, url) values (2,'izidora_private_url');

#1
insert into shared_data (owner, url, share_with) values (1,'mario_shared_url', 2);
#2
insert into shared_data (owner, url, share_with) values (2,'izidora_shared_url', 1);

#1
insert into public_data (owner, url) values (1,'mario_public_url');
#2
insert into public_data (owner, url) values (2,'izidora_public_url');