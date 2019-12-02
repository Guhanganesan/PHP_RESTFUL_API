<form action="" method="PUT">
name:<input name="name"><br>
     <input type="submit">
</form>
<?php
  echo $_SERVER['REQUEST_METHOD'];
  if(!empty($_PUT))
  {
	  if($_SERVER['REQUEST_METHOD']=="GET")
	  {
		parse_str(file_get_contents('php://input'), $_PUT);
        print_r($_PUT);		
	  }		
	  
	  else
	  {
		  $_PUT=array();
	  }
  }
?>