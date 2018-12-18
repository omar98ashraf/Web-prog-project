<?php

include ("config.php");
$sql="insert into subscription(email) value('$_POST[email]')";
if (!mysqli_query($con,$sql))
{
	echo "Error: ".mysql_error($con);
}
else
{
	header( "Location: http://localhost:8888/Gorilla%20Brand/index.php" );
}
?>
