create database project_2 ;
use project_2;
create table user (
id int primary key auto_increment,
first_name varchar(30),
second_name varchar(20),
email varchar(30),
pass varchar(20)
);

create table product (
id int primary key auto_increment,
product_name varchar(30),
product_price float(20),
img varchar(100) 
);


