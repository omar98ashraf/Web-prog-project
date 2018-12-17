<?php
header('Content-Type: application/xml; charset=utf-8');

echo '<response>';
$name= $_GET['name'];
$nameArray=array('omar','khaled','sayed','moo7a');
if(in_array($name,$nameArray))
    echo "This ".$name." is not available";
elseif ($name=='')
    echo "wait your nick name";
else
    echo "This ".$name." is available.";

echo '</response>';

?>
