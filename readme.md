lvalinho TodoList

--Install Notes--

create database:

create user 'todolist'@'localhost' identified by '123456';
create database todolist;
GRANT ALL PRIVILEGES ON todolist.* TO todolist@localhost;
FLUSH PRIVILEGES;

Create schema, 2 options:

1) create schema through artisan (run on root project folder):
	$php artisan migrate

OR 

2) create schema through script createSchema.sql
