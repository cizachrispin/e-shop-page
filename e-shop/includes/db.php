<?php
   $db = new mysqli("localhost","root","","shopping_store");
   if($db->connect_error){
   die("connection Failed!".$db->connect_error);   
  }
?>
