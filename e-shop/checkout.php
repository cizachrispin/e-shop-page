<?php 
       session_start();

       $active='Account';
       include("functions/functions.php");
        
?>

<!DOCTYPE html>
<html>

<head>
    <title>Eco_shop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!--bootstrap-->
    <link rel="stylesheet" href="styles/bootstrap.min.css">

    <!---style css-->
    <link rel="stylesheet" href="styles/style.css">


    <!-- Font Awesome -->
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">

</head>

<body>


    <div class="container-fluid">


        <?php if (!isset($_SESSION['customer_email'])){
                   
                include("login.php");
        
            }else{
               
               include("payment_option.php");
        
            }
                                             
            ?>

    </div>




    <script src="js/jquery-331.min.js"></script>

    <script src="js/popper.min.js"></script>

    <script src="js/bootstrap.min.js"></script>

</body>

</html>
