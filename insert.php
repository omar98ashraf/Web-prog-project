<?php

include("config.php");
$sql="Insert into userdata (username ,name,  email, password) values
('$_POST[username]','$_POST[name]','$_POST[email]','$_POST[password]')";

if(! mysqli_query($con,$sql))
{
	echo "Error ".mysqli_error($con);
}
else
	echo "1 row added";

?>
