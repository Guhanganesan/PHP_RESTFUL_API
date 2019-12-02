<?php 
echo "Method is:".$_SERVER['REQUEST_METHOD'];

$json=json_decode(file_get_contents("php://input"));

include("db.php");
$query="delete from user where id='".$json->id."'";
$sql=mysqli_query($con,$query);
if($sql)
{
	$result=array("message"=>"Successfully Deleted");
}
else
{
	$result=array("message"=>"Can't be deleted");
}
print_r(json_encode($result));

?>