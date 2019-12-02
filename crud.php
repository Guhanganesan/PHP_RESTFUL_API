<?php
$method=$_SERVER['REQUEST_METHOD'];
$array=array();
switch($method)
{ 
  case "GET":
  $resp=doGET();
  response($resp);
  break;
  
  case "POST":
  $resp=doPOST();
  response($resp);
  break;
  
  case "PUT":
  $resp=doPUT();
  response($resp);
  break;
  
  case "DELETE":
  $resp=doDELETE();
  response($resp);
  break;
	
}

function doGET()
{
	include("db.php");
	if($_GET['id'])
	{
		$where=" where id='".$_GET['id']."'";
	}
	else
	{
       $where="";
	}
	
	$query="select * from user".$where;
	$sql=mysqli_query($con,$query);
	while($row=mysqli_fetch_assoc($sql))
	{
	//echo json_encode($array);
	   $response[]= array("id"=>$row["id"], "name"=>$row["name"],
                   	      "email"=>$row["email"],"pass"=>$row["pass"]);
	}
	return $response;
}

function doPOST()
{
	echo "POST Method is Called";
	include("db.php");
	$query="insert into user(name,email,pass) values('".$_POST['name']."',
	                                                 '".$_POST['email']."',
	                                                 '".$_POST['pass']."')";
	$sql=mysqli_query($con,$query);
	if($sql)
	{
		$response=array("messaage"=>"success");
	}
	else
	{
		$response=array("message"=>"Failed to Register");
	}
	return $response;
}


function doPUT()
{
	echo "Update Method is Called";
	include("db.php");
    
	parse_str(file_get_contents("php://input"),$_PUT);
	if($_PUT)
	{
		$query="update user set name='".$_PUT['name']."',email='".$_PUT['email']."',pass='".$_PUT['pass']."' where id='".$_PUT['id']."'";
		$sql=mysqli_query($con,$query);
		if($sql)
		{
			$response=array("messaage"=>"successfully Updated");
		}
		else
		{
			$response=array("message"=>"Failed to Update");
		}
	}
	return $response;
	
}

function doDELETE()
{
	echo "Delete Method is Called";
	include("db.php");
	$query="delete from user where id='".$_DELETE['id']."'";
	$sql=mysqli_query($con,$query);
	if($sql)
	{
		$response=array("messaage"=>"successfully deleted");
	}
	else
	{
		$response=array("message"=>"Failed to delete");
	}
	return $response;
	
}

function response($resp)
{
	echo json_encode(array("status"=>"200","data"=>$resp));
}

?>