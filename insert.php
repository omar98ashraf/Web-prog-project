<?php

include ("config.php");
$sql="insert into user(username,name,email,password) values('$_POST[username]','$_POST[name]','$_POST[email]','$_POST[password]')";
if (!mysqli_query($con,$sql))
{
	echo "Error: ".mysql_error($con);
}
else
{
	header( "Location: http://localhost:8888/Gorilla%20Brand/Login_page.php" );
}
?>
