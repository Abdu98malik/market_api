create database market;

drop table products;
drop table categories;
drop table amounts; -- kg,

create table categories(
    category varchar(20),
    primary key (category)

);

create table amounts(
    amount varchar(20),
    primary key(amount)
);

create table products(
    ID numeric(16,0),
    name varchar(20),
    cost numeric(12,2),
    category varchar(20),
    amount varchar(20),    
    primary key(ID),
    foreign key (category) references categories(category),
    foreign key (amount) references amounts(amount)

);

