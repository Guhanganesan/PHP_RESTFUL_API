<?php 

echo "Method is:".$_SERVER['REQUEST_METHOD'];

$json=json_decode(file_get_contents("php://input"));

include("db.php");
$query="update user set name='".$json->name."',email='".$json->email."',pass='".$json->pass."' where id='".$json->id."'";
$sql=mysqli_query($con,$query);
if($sql)
{
		$result=array("message"=>"Successfully Updated");
}
else
{
		$result=array("message"=>"Can't Updated");
}
print_r(json_encode($result));

?>