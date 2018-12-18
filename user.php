<?php
header('Content-Type: application/xml; charset=utf-8');

echo '<response>';
$name= $_GET['name'];
$con = mysqli_connect('localhost','root','root') or die(mysqli_error());
mysqli_select_db($con,'gorilla_brand') or die("cannot select DB");
$query = mysqli_query($con,"SELECT * FROM user WHERE username = '".$name."'");
$numrows = mysqli_num_rows($query);
        while($row = mysqli_fetch_assoc($query))
        {
          $dbusername = $row['username'];
        }
        if($name=='')
          echo " ";
        elseif($name == $dbusername)
            echo $name." is not available";
        else
            echo $name." is available";

echo '</response>';
?>
