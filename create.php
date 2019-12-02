<?php
function create()
{   
	echo $_SERVER['REQUEST_METHOD'];
	include("db.php");
	$json=json_decode(file_get_contents("php://input"));
	
	$query="insert into user(name,email,pass) values('".$json->name."','".$json->email."','".$json->pass."')";
	$sql=mysqli_query($con,$query);
	if($sql)
	{
		$result=array("message"=>"Successfully Registered");
	}
	else
	{
		$result=array("message"=>"Can't Registered");
	}
	print_r(json_encode($result));
}
?>