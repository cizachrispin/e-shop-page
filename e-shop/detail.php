<?php 

  session_start();

  $active='Cart';
  include("includes/db.php");
  include("functions/functions.php");
    
?>

<?php 

if(isset($_GET['pro_id'])){
    
    $product_id = $_GET['pro_id'];
    
    $get_product = "select * from products where product_id='$product_id'";
    
    $run_product = mysqli_query($db,$get_product);
    
    $row_product = mysqli_fetch_array($run_product);
    
    $p_cat_id = $row_product['p_cat_id'];
    
    $pro_title = $row_product['product_title'];
    
    $pro_price = $row_product['product_price'];
    
    $sale_price = $row_product['sale_price'];
    
    $product_qty = $row_product['product_qty'];
    
    $colour = $row_product['colour'];
    
    $pro_desc = $row_product['product_desc'];
    
    $pro_features = $row_product['product_features'];
    
    $pro_img1 = $row_product['product_img1'];
    
    $pro_img2 = $row_product['product_img2'];
    
    $pro_img3 = $row_product['product_img3'];
    
    $product_label = $row_product['product_label'];
                       
    $prod_discount = round(($pro_price - $sale_price)/$pro_price*100);
    
    $get_p_cat = "select * from product_categories where p_cat_id='$p_cat_id'";
    
    $run_p_cat = mysqli_query($db,$get_p_cat);
    
    $row_p_cat = mysqli_fetch_array($run_p_cat);
    
    $p_cat_title = $row_p_cat['p_cat_title'];
    
}

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

    <?php 

    include("includes/header.php"); 

    ?>

    <div class="container-fuid">
        <ul class="sub_header">

            <li><a href="home.php">Home</a></li>

            <li>Details</li>

            <li> <?php echo  $pro_title; ?> </li>

        </ul>
    </div>

    <div class="container-fuid">
        <div class="col-md-12 col-sm-12">
            <div class="detailPage">
                <div class="row">
                    <div class="detailPage-left col-md-5 ">
                        <div class="preview-pic tab-content">
                            <div class="tab-pane active" id="pic-1">
                                <img class="img-responsive" src="images/product_images/<?php echo $pro_img1; ?>">
                            </div>

                            <div class="tab-pane" id="pic-2">
                                <img class="img-responsive" src="images/product_images/<?php echo $pro_img2; ?>">
                            </div>

                            <div class="tab-pane" id="pic-3">
                                <img class="img-responsive" src="images/product_images/<?php echo $pro_img3; ?>">
                            </div>

                        </div>

                        <ul class="preview-thumbnail nav nav-tabs">
                            <li class="active">
                                <a data-target="#pic-1" data-toggle="tab">
                                    <img src="images/product_images/<?php echo $pro_img1; ?>" class="img-responsive">

                                </a>
                            </li>

                            <li>
                                <a data-target="#pic-2" data-toggle="tab">
                                    <img src="images/product_images/<?php echo $pro_img2; ?>" class="img-responsive">
                                </a>
                            </li>

                            <li>
                                <a data-target="#pic-3" data-toggle="tab">
                                    <img src="images/product_images/<?php echo $pro_img3; ?>" class="img-responsive">
                                </a>
                            </li>

                        </ul>




                    </div>

                    <div class="col-md-7 detailPage-right">

                        <h4 class="product-title"><?php echo $pro_title; ?></h4>

                        <?php add_cart(); ?>

                        <form action="detail.php?add_cart=<?php echo $product_id; ?>" class="form-horizontal" method="post">

                            <div class="rating">
                                <div class="stars">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>

                                </div>
                                <span class="review-no text-muted">41 reviews</span>
                            </div>

                            <hr>

                            <div class='price'> KSH <?php echo $sale_price ?>
                                <span class="sale-price">KSH <?php echo $pro_price?></span><br>
                                <span class='discount-label'><?php echo "-$prod_discount%" ; ?></span>
                            </div>

                            <div class="color">
                                <label class="mb-3">Available color: <?php echo $colour ?> </label>
                                <input name="colour" type="text" class="form-control-sm shadow-none" placeholder="select your color*" required>
                                <small class="text-muted">(Pick your color from available color)</small>

                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-sm-4">
                                    <dl class="param param-inline">
                                        <dt>Quantity: </dt>
                                        <dd>
                                            <input name="product_qty" type="number" min="1" max="<?php echo $product_qty?>" class="form-control-sm shadow-none" placeholder="qty*" required>
                                        </dd>
                                    </dl>
                                </div>
                                <div class="col-sm-4">
                                    <dl class="param param-inline">
                                        <dt>Size: </dt>

                                        <select name="product_size" class=" form-control-sm shadow-none" required>

                                            <option disabled selected>Select a Size</option>
                                            <option>Small</option>
                                            <option>Medium</option>
                                            <option>Large</option>

                                        </select>


                                    </dl>
                                </div>
                            </div>


                            <div class="action">
                                <button class="add-to-cart btn btn-outline-warning"> <i class="fa fa-shopping-cart"></i> ADD TO CART</button>

                            </div>


                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- -------------------- product details --------------- -->

    <div class="container-fluid">
        <div class="details">
            <ul class="nav nav-tabs nav-justified mb-3">
                <li class="">
                    <a data-toggle="tab" href="#order" class="nav-link active">
                        Product Details
                    </a>
                </li>
                <li class="">
                    <a data-toggle="tab" href="#features" class="nav-link">
                        product Features
                    </a>
                </li>
                <li class="">
                    <a data-toggle="tab" href="#videos" class="nav-link">
                        Review
                    </a>
                </li>
            </ul>


            <div class="tab-content">
                <div class="tab-pane fade show active" id="order">
                    <p>

                        <?php echo $pro_desc; ?>

                    </p>

                </div>
                <div class="tab-pane fade show" id="features">

                    <?php echo $pro_features; ?>

                </div>

                <div class="tab-pane fade show" id="videos">

                    tab 3

                </div>
            </div>
        </div>

        <div class="col-mid-12 col-sm-12 col-12">
            <div class="row">
                <div class="recommendedprod">
                    <h4>Featured Recommendation</h4>
                    <hr>

                    <div class="row">

                        <?php
                            
                           $get_products = "select * from products order by rand() LIMIT 0,6";
    
                           $run_products = mysqli_query($db,$get_products);
    
                           while($row_products=mysqli_fetch_array($run_products)){
        
                           $pro_id = $row_products['product_id'];
        
                           $pro_title = $row_products['product_title'];
        
                           $pro_price = $row_products['product_price'];
                               
                           $sale_price = $row_products['sale_price'];
        
                           $pro_img1 = $row_products['product_img1'];
                               
                           $product_label = $row_products['product_label'];
                       
                           $prod_discount = round(($pro_price - $sale_price)/$pro_price*100);
        
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
                                 
                        </div>
                    </div>
                                
            ";
        
    }
                            
     ?>




                    </div>

                </div>
            </div>
        </div>
    </div>


    <!------------- footer ------------------->

    <?php
    
		include('includes/footer.php')
    
	?>


    <script src="js/jquery-331.min.js"></script>

    <script src="js/popper.min.js"></script>

    <script src="js/bootstrap.min.js"></script>

</body>

</html>
