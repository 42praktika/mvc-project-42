CREATE TABLE if not exists users (
    id serial primary key,
    first_name varchar(50),
    second_name varchar(50),
    age int,
    job varchar(300),
    email varchar(100)
)