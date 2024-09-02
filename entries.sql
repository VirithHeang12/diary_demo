create database diary_app;

create table entries
(
    id int auto_increment primary key,
    title varchar(100) not null,
    date date not null,
    message text not null
)