<?php

  session_start();

  $active='Cart';
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

<body id="shop">
    <!----------------- header ------------------>

    <?php
      include('includes/header.php')
    ?>

    <div class="container-fuid">
        <ul class="sub_header">

            <li><a href="home.php">Home</a></li>
            <li>Shop</li>

        </ul>

    </div>


    <section class="section p-category">
        <div class="p-cat-layout container-fluid">
            <?php
                                        
                $get_manufacturer = "select * from manufacturers where manufacturer_top='yes'";
                    
                $run_manufacturer = mysqli_query($db,$get_manufacturer);
                    
                while($row_manufacturer=mysqli_fetch_array($run_manufacturer)){
                    
                $manufacturer_id = $row_manufacturer['manufacturer_id'];
                            
                $manufacturer_title = $row_manufacturer['manufacturer_title'];
                    
                $cat_id = $row_manufacturer['cat_id'];
                    
                $cat_title = $row_manufacturer['cat_title'];
                    
                $manufacturer_image = $row_manufacturer['manufacturer_image'];
                    
                
                            
                echo "
                    <div class='p-cat-item'>
                       <img src='images/other_images/$manufacturer_image' alt='cat-img' />
                       <div class='p-cat-content'>
                          <h5><a href='shop_products.php?manufacturer=$manufacturer_id'> $manufacturer_title for $cat_title</a></h5>
                       </div>
                    </div>
                                           
                ";              
            }           
        ?>
        </div>
    </section>


    <div class="container-fluid">
        <div class="shopProduct">
            <div class="row">

                <!-----------------products-------------------->

                <div class="col-md-12 col-sm-12 col-12 ">

                    <div class="productItem col-md-12 col-12">
                        <div class="row">

                            <?php 
                    
                    if(!isset($_GET['p_cat'])){
                        
                    if(!isset($_GET['cat'])){
                            
                    $per_page=50; 
                             
                    if(isset($_GET['page'])){
                                
                    $page = $_GET['page'];
                                
                    }else{
                                
                        $page=1;
                                
                    }
                            
                   $start_from = ($page-1) * $per_page;
                        
                   $get_products = "select * from products order by 1 DESC LIMIT $start_from,$per_page";
                             
                   $run_products = mysqli_query($db,$get_products);
                             
                   while($row_products=mysqli_fetch_array($run_products)){
                       
                   $pro_id = $row_products['product_id'];
        
                   $pro_title = $row_products['product_title'];
                       
                   $pro_price = $row_products['product_price'];
                       
                   $sale_price = $row_products['sale_price'];

                   $pro_img1 = $row_products['product_img1'];
                       
                   $product_label = $row_products['product_label'];
                       
                   $product_qty = $row_products['product_qty'];
                       
                   $prod_discount = round(($pro_price - $sale_price)/$pro_price*100);
                       
                    if($product_qty !== 'Out Of Stock'){
                       
                    echo "
                       
                       <div class='col-md-2 col-sm-6 col-6'>
                                    
                            <div class='product-grid'>
                                        
                                <div class='product-image'>
                                        
                                     <a href='detail.php?pro_id=$pro_id'>
                       
                                        <img class='img-responsive' src='images/product_images/$pro_img1'>
                                     </a>
                                     <span class='product-discount-label'>-$prod_discount%</span>
                                     <span class='product-label'>$product_label</span>
                       
                                </div>
         
                                <div class='product-content'>
                                
                                    <h3 class='title'><a href='detail.php?pro_id=$pro_id'> $pro_title </a> </h3>
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
                        
                    }else{
                        
                        echo "
                       
                        <div class='col-md-2 col-sm-6 col-6'>
                                    
                            <div class='product-grid'>
                                        
                                <div class='product-image'>
                                        
                                     <a>
                       
                                        <img class='img-responsive' src='images/product_images/$pro_img1'>
                                     </a>
                                     <span class='product-discount-label'>-$prod_discount%</span>
                                     <span class='product-label'>$product_label</span>
                       
                                </div>
         
                                <div class='product-content'>
                                
                                    <h3 class='title'><a> $pro_title </a> </h3>
                                    <div class='price'> KSH $sale_price <span>KSH $pro_price</span></div>
                                            
                                 </div>
                                 
                                 <div class='text-center'>
                                   
                                      <span class='out-of-stock'>
                                           <i class='fa fa-shopping-cart'></i> Out Of Stock
                                       </span>

                                </div>
                        </div>
                    </div>
                                
            "; 
                           
                       }
                       
                   }
                    
                    ?>

                        </div>


                        <!------------- pagination ------------->

                        <nav aria-label="Page navigation">
                            <ul id="pagination">


                                <?php
                             
                    $query = "select * from products";
                             
                    $result = mysqli_query($db,$query);
                             
                    $total_records = mysqli_num_rows($result);
                             
                    $total_pages = ceil($total_records / $per_page);
                             
                        echo "
                        
                            <span class='pageitem'>
                            
                                <a class='pagelink' href='products.php?page=1'> ".'<'." </a>
                            
                            </span>
                        
                        ";
                             
                        for($i=1; $i<=$total_pages; $i++){
                            
                              echo "
                        
                            <li class='pageitem'>
                            
                                <a  class='pagelink' href='products.php?page=".$i."'> ".$i." </a>
                            
                            </li>
                        
                        ";  
                            
                        };
                             
                        echo "
                        
                            <li class='pageitem'>
                            
                                <a class='pagelink' href='products.php?page=$total_pages'> ".'Next'." </a>
                            
                            </li>
                        
                        ";
                            
                              
                             
					    	}
                            
                        }
                        
					 ?>


                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!------------footer----------->


    <?php
    
       include('includes/footer.php')
    ?>


    <script src="js/jquery-331.min.js"></script>

    <script src="js/popper.min.js"></script>

    <script src="js/bootstrap.min.js"></script>

</body>

</html>
