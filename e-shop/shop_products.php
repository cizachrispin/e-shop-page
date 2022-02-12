<?php

  session_start();

  include("includes/db.php");
  include("functions/functions.php");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Eco_shop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-UA-compatible" content="IE=edge">


    <!---style css-->
    <link rel="stylesheet" href="styles/style.css">

    <!--bootstrap-->

    <link rel="stylesheet" href="styles/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">

</head>

<body>
    <!----- header ---------------->
    <?php
    
     include('includes/header.php')
    ?>

    <div class="container-fuid">
        <ul class="sub_header">

            <li><a href="index.php">Home</a></li>

        </ul>
    </div>

    <div class="container-fluid">
        <div class="shopProduct">
            <div class="row">

                <!----- sidebar fiter ------------>
                <div class="col-md-3">
                    <?php
                       include('includes/shop_sidebar.php')
	                 ?>
                </div>


                <!----- products ----------------->
                <div class="col-md-9 col-sm-12 col-12 ">
                    <div class="productItem col-md-12 col-12">
                        <div class="row">

                            <?php
                            
                    if(isset($_GET['search'])){
                   
                    if(!isset($_GET['p_cat'])){
                            
                    if(!isset($_GET['cat'])){
                        
                    if(!isset($_GET['manufacturer()'])){
                             
                    $search_query = $_GET['user_query'];
                             
                    $get_products = "select * from products where product_keywords like '%$search_query%'";
                             
                    $run_products = mysqli_query($db,$get_products);
    
                    $count_product = mysqli_num_rows($run_products);
                             
                    if($count_product==0){
                        
                    echo "
            
                            <div class=' ItemTitle'>
                
                                 <h4 class='text-muted'>There are no results found for <br> <p class='text-danger'>'$search_query'</p> 
                                    <span class='button'><a href='home.php'>Go back To HonePage<a/></span> 
                                 </h4>
  
                            </div>
            
                              ";
            
                    }else{
            
                    echo "
                    
                    <div class='col-md-12 ItemTitle'><h1 id='textchange' class='text-muted'><span style='font-size:18px'>$count_product Results found </span></h1>
                    
                    </div>
            
                    ";
                        
                        
                    while($row_products=mysqli_fetch_array($run_products)){
            
                    $pro_id = $row_products['product_id'];
            
                    $pro_title = $row_products['product_title'];
            
                    $pro_price = $row_products['product_price'];
                        
                    $sale_price = $row_products['sale_price'];
            
                    $pro_desc = $row_products['product_desc'];
            
                    $pro_img1 = $row_products['product_img1'];
                        
                    $pro_label = $row_products['product_label'];
        
                     echo "
                    
                    <div class='col-md-3 col-sm-6 col-6'>            
                        <div class='product-grid'>
                            <div class='product-image'>
                                <a href='detail.php?pro_id=$pro_id'>
                                    <img class='img-responsive' src='images/product_images/$pro_img1'>
                                </a>
                                <a class='product-discount-label'>$pro_label</a>
                            </div>
                               
                            <div class='product-content'>
                                <h3 class='title'><a href='details.php?pro_id=$pro_id'> $pro_title </a> </h3>            
                                <div class='price'> KSH $sale_price <span>KSH $pro_price</span></div>
                            </div>

                           <div class='text-center'>
                               <a class='add-to-cart' href='detail.php?pro_id=$pro_id'>
                                   <i class='fa fa-shopping-cart'></i> Add To Cart
                               </a>
                           </div>
                           
                        </div>
                    </div>
        
                        ";
                    }
                    
                    }
                    
                    }
                    
                    }
                    
                    }
                        
                    }
                            ?>

                            <?php
                            
                               manufacturer();
                            
                               getpcatpro();
                            
                               getcatpro();
                        
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!----- products ----------------->
    <?php
       include('includes/footer.php')
	?>


    <script src="js/jquery-331.min.js"></script>

    <script src="js/popper.min.js"></script>

    <script src="js/bootstrap.min.js"></script>

</body>

</html>
