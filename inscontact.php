<?php

include ("config.php");
$sql="insert into contact(fname,lname,subject,message) values('$_POST[fname]','$_POST[lname]','$_POST[subject]','$_POST[message]')";
if (!mysqli_query($con,$sql))
{
	echo "Error: ".mysql_error($con);
}
else
{
	header( "Location: http://localhost:8888/Gorilla%20Brand/index.html" );
}
?>
