<?php 

$db = mysqli_connect("localhost","root","","shopping_store");
if(mysqli_errno($db))
{
 echo mysqli_error(); 
}
?>
