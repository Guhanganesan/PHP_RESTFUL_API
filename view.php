<?php 
function view()
{   
	echo $_SERVER['REQUEST_METHOD'];
	include("db.php");
	//Don't use json decode for get method 
	if($_GET['id'])
	{
		$query="select * from user where id='".$_GET['id']."'";
	}
	else
	{
	  $query="select * from user";
	}
	$sql=mysqli_query($con,$query);
	/*
	if($row=mysqli_fetch_assoc($sql))
	{
		$result[]=array("id"=>$row["id"],"name"=>$row["name"],"email"=>$row["email"],"pass"=>$row["pass"]);
	}
	*/
	while($row=mysqli_fetch_assoc($sql))
	{
		$result[]=array("id"=>$row["id"],"name"=>$row["name"],"email"=>$row["email"],"pass"=>$row["pass"]);
	}
	print_r(json_encode($result));
}
?>