<?php
/*
db:mydb;
table:user;
query:create table user(id int auto_increment, primary key(id),
                        name varchar(30), email varchar(30), pass varchar(30)
						);
*/
header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: GET,PUT,POST,DELETE,PATCH,OPTIONS');

if($_SERVER['REQUEST_METHOD']=="POST")
{
	include("create.php");
	create();
}
else if($_SERVER['REQUEST_METHOD']=="GET")
{
	include("view.php");
	view();
}
else if($_SERVER['REQUEST_METHOD']=="PUT")
{
    include("update.php");
	update();
}
else if($_SERVER['REQUEST_METHOD']=="DELETE")
{
	include("delete.php");
	remove();
}
?>