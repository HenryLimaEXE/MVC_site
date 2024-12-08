create database escola;

create table users(
user_id int(11) not null auto_increment,
user_name varchar(250) not null,
user_email varchar (250) not null,
user_password int(30)not null,
user_birth date not null,
sala_user varchar(20),
ident varchar(30),
primary key (user_id)
)

create table log(
log_id int(11) not null primary key auto_increment,
log_name varchar(250) not null,
log_password int(30)not null,
log_email varchar(250) not null
)

