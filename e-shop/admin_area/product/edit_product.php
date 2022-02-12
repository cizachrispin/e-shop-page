<?php 

    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['edit_product'])){
        
        $edit_id = $_GET['edit_product'];
        
        $get_p = "select * from products where product_id='$edit_id'";
        
        $run_edit = mysqli_query($db,$get_p);
        
        $row_edit = mysqli_fetch_array($run_edit);
        
        $p_id = $row_edit['product_id'];
        
        $p_title = $row_edit['product_title'];
        
        $p_cat = $row_edit['p_cat_id'];
        
        $cat = $row_edit['cat_id'];

        $m_id = $row_edit['manufacturer_id'];
        
        $p_image1 = $row_edit['product_img1'];
        
        $p_image2 = $row_edit['product_img2'];
        
        $p_image3 = $row_edit['product_img3'];
        
        $p_price = $row_edit['product_price'];
        
        $sale_price = $row_edit['sale_price'];
        
        $p_keywords = $row_edit['product_keywords'];
        
        $p_desc = $row_edit['product_desc'];
        
        $p_feature = $row_edit['product_features'];
        
        $p_video = $row_edit['product_video'];
        
        $p_brand = $row_edit['product_brand'];
        
        $p_qty = $row_edit['product_qty'];
        
        $colour = $row_edit['colour'];
        
        $p_label = $row_edit['product_label'];
        
        
        
        
    }
        
        $get_manufacturer = "select * from manufacturers where manufacturer_id='$m_id'";
        
        $run_manufacturer = mysqli_query($db,$get_manufacturer);
        
        $row_manufacturer = mysqli_fetch_array($run_manufacturer);
        
        $manufacturer_id = $row_manufacturer['manufacturer_id'];
        
        $manufacturer_title = $row_manufacturer['manufacturer_title'];
        
        $get_p_cat = "select * from product_categories where p_cat_id='$p_cat'";
        
        $run_p_cat = mysqli_query($db,$get_p_cat);
        
        $row_p_cat = mysqli_fetch_array($run_p_cat);
        
        $p_cat_title = $row_p_cat['p_cat_title'];
        
        $get_cat = "select * from categories where cat_id='$cat'";
        
        $run_cat = mysqli_query($db,$get_cat);
        
        $row_cat = mysqli_fetch_array($run_cat);
        
        $cat_title = $row_cat['cat_title'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Insert Products </title>
</head>

<body>

    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class=""><a href="index.php?view_products"> View Products </a></li>
                <li class=""><a href="index.php?insert_product">Insert Product</a></li>
                <li class="active">Insert Product</li>
            </ol>
        </div>
    </div>

    <form method="post" class="form-horizontal" enctype="multipart/form-data">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="fa fa-money fa-fw"></i> Edit: <?php  echo $p_title; ?>

                        </h3>

                    </div>
                    <div class="panel-body">

                        <div class="form-group text-muted">
                            <label class="col-md-3 control-label"> Product Title </label>

                            <div class="col-md-6">

                                <input name="product_title" type="text" class="form-control" required value="<?php echo $p_title; ?>">
                                <small>This should include the actual product name, colour (if available), edition and speciality. DO NOT INCLUDE BRAND NAME HERE Example: Bell Sleeved Dress - White. Please see naming templates here --http://t.ly/WKuM</small>

                            </div>
                        </div>

                        <div class="form-group text-muted">

                            <label class="col-md-3 control-label"> Product Keywords </label>

                            <div class="col-md-6">

                                <input name="product_keywords" type="text" class="form-control" required value="<?php echo $p_keywords; ?>">

                            </div>

                        </div>

                        <div class="form-group text-muted">

                            <label class="col-md-3 control-label"> brand </label>

                            <div class="col-md-6">
                                <input name="product_brand" type="text" class="form-control" required value=" <?php echo $p_brand?>">
                                <small>Brand of the product. Example: Sony, Binatone. Open http://t.ly/2AYm for more information</small>

                            </div>
                        </div>

                        <div class="form-group text-muted">
                            <label class="col-md-3 control-label"> Category </label>

                            <div class="col-md-6">
                                <select name="cat" class="form-control">
                                    <option disabled value="Select Category">Select Category</option>

                                    <option value="<?php echo $cat; ?>"> <?php echo $cat_title; ?> </option>

                                    <?php 
                              
                              $get_cat = "select * from categories";
                              $run_cat = mysqli_query($db,$get_cat);
                              
                              while ($row_cat=mysqli_fetch_array($run_cat)){
                                  
                                  $cat_id = $row_cat['cat_id'];
                                  $cat_title = $row_cat['cat_title'];
                                  
                                  echo "
                                  
                                  <option value='$cat_id'> $cat_title </option>
                                  
                                  ";
                                  
                              }
                              
                              ?>

                                </select>

                            </div>

                        </div>

                        <div class="form-group text-muted">
                            <label class="col-md-3 control-label"> Product Category </label>

                            <div class="col-md-6">

                                <select name="product_cat" class="form-control">

                                    <option disabled value="Select Product Category">Select Product Category</option>

                                    <option value="<?php echo $p_cat; ?>"> <?php echo $p_cat_title; ?> </option>

                                    <?php 
                              
                              $get_p_cats = "select * from product_categories";
                              $run_p_cats = mysqli_query($db,$get_p_cats);
                              
                              while ($row_p_cats=mysqli_fetch_array($run_p_cats)){
                                  
                                  $p_cat_id = $row_p_cats['p_cat_id'];
                                  $p_cat_title = $row_p_cats['p_cat_title'];
                                  
                                  echo "
                                  
                                  <option value='$p_cat_id'> $p_cat_title </option>
                                  
                                  ";
                                  
                              }
                              
                              ?>

                                </select>

                            </div>
                        </div>

                        <div class="form-group text-muted">
                            <label class="col-md-3 control-label"> Manufacturer </label>

                            <div class="col-md-6">
                                <select name="manufacturer" class="form-control">

                                    <option disabled value="Select Manufacturer">Select Manufacturer</option>

                                    <option selected value="<?php echo $manufacturer_id; ?>"> <?php echo $manufacturer_title; ?> </option>

                                    <?php 
                              
                              $get_manufacturer = "select * from manufacturers";
                              $run_manufacturer = mysqli_query($db,$get_manufacturer);
                              
                              while ($row_manufacturer=mysqli_fetch_array($run_manufacturer)){
                                  
                                  $manufacturer_id = $row_manufacturer['manufacturer_id'];
                                  $manufacturer_title = $row_manufacturer['manufacturer_title'];
                                  
                                  echo "
                                  
                                  <option value='$manufacturer_id'> $manufacturer_title </option>
                                  
                                  ";
                                  
                              }
                              
                              ?>

                                </select><!-- form-control Finish -->

                            </div><!-- col-md-6 Finish -->

                        </div>

                        <div class="form-group text-muted">

                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-3">
                                <label class=" "> Product Price</label>
                                <input name="product_price" type="text" class="form-control shadow-none" required value="<?php echo $p_price ?>">

                            </div>

                            <div class="col-md-3">
                                <label class=""> sale price</label>
                                <input name="sale_price" type="text" class="form-control" required value="<?php echo $sale_price ?>">

                            </div>

                        </div>

                        <div class="form-group text-muted">

                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-2">
                                <label class=" "> quantity </label>
                                <input name="product_qty" type="text" class="form-control shadow-none" required value="<?php echo $p_qty; ?>">

                            </div>

                            <div class="col-md-4">
                                <label class=""> Color</label>
                                <input name="colour" type="text" class="form-control" required value="<?php echo $colour; ?>">
                                <small>Add a generalization of the main color, to help customers find the product using the provided color-filter in the shop Example: Blue, Green, Red</small>

                            </div>

                        </div>

                        <div class="form-group text-muted">
                            <label class="col-md-3 control-label"> Product Descriptions *</label>

                            <div class="col-md-6">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a data-toggle="tab" href="#descriptions" class="tab_link">
                                            Product Descriptions
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#features" class="tab_link">
                                            Product Features
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#videos" class="tab_link">
                                            Product Videos
                                        </a>
                                    </li>
                                </ul>


                                <div class="tab-content">

                                    <div class="tab-pane fade in active" id="descriptions">
                                        <textarea name="product_desc" id="descriptions" class="form-control"><?php echo $p_desc ?></textarea>
                                        <small>The product description should give the customer useful information about the product to ensure a purchase. Paste http://t.ly/2AYm into your browser for more information.Example: JTC Full HD 24"" LED CD TV combines great features and design. It has a diagonal screen size 61 cm (24 inch), with integrated DVD player and a built-in tuner. It also receives satellite, cable, DVB-T and DVB-T2 signals without the need for a receiver.</small>

                                    </div>
                                    <div class="tab-pane fade in" id="features">

                                        <textarea name="product_features" id="features" class="form-control"><?php echo $p_feature ?></textarea>
                                        <small>Enter short major highlights of the product, to make the purchase decision for the customer easier. Paste http://t.ly/2AYm into your browser for more information
                                            Example: Best expierience ever - super fast and easy navigation - better control</small>

                                    </div>

                                    <div class="tab-pane fade in" id="videos">

                                        <textarea name="product_video" id="videos" class="form-control"><?php echo $p_video ?></textarea>

                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="form-group text-muted">
                            <label class="col-md-3 control-label"> Product Label * </label>

                            <div class="col-md-6">
                                <select name="product_label">

                                    <option selected disabled> <?php echo $p_label; ?> </option>

                                    <option value="new">New Product</option>

                                    <option value="sale">Sale Product</option>

                                </select>

                            </div>

                        </div>

                    </div>



                </div>

            </div>

        </div>

        <div class="content-image text-muted">
            <h3 class="text-muted">Images *</h3>
            <div class="images">
                <div class="imag-box">
                    <input type='file' name="product_img1" onchange="img1(this);" />
                    <img id="blah" class="responsive" src="../images/product_images/<?php echo $p_image1; ?>" />

                </div>

                <div class="imag-box">
                    <input type='file' name="product_img2" onchange="img2(this);" />
                    <img id="blah2" class="responsive" src="../images/product_images/<?php echo $p_image2; ?>" />

                </div>

                <div class="imag-box">
                    <input type='file' name="product_img3" onchange="img3(this);" />
                    <img id="blah3" class="responsive" src="../images/product_images/<?php echo $p_image3; ?>" />

                </div>

                <div class="imag-box">
                    <input type='file' onchange="img4(this);" />
                    <img id="blah4" class="responsive" src="../images/product_images/<?php echo $p_image4; ?>" />

                </div>
            </div>

            <input name="update" value="Update Product" type="submit" class="btn btn-primary shadow-none">
        </div>

    </form>

    <script src="js/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea'
        });

    </script>
</body>

</html>


<?php 

if(isset($_POST['update'])){
    
    $product_title = $_POST['product_title'];
    $product_keywords = $_POST['product_keywords'];
    $product_brand = $_POST['product_brand'];
    $cat = $_POST['cat'];
    $product_cat = $_POST['product_cat'];
    $manufacturer_id = $_POST['manufacturer'];
    $product_price = $_POST['product_price'];
    $sale_price = $_POST['sale_price'];
    $product_qty = $_POST['product_qty'];
    $colour = $_POST['colour']; 
    $product_desc = $_POST['product_desc'];
    $product_features = $_POST['product_features'];
    $product_video = $_POST['product_video'];
    $product_label = $_POST['product_label'];

    if(is_uploaded_file($_FILES['file']['tmp_name'])){

            // work for upload / update image
        
        $product_img1 = $_FILES['product_img1']['name'];
        $product_img2 = $_FILES['product_img2']['name'];
        $product_img3 = $_FILES['product_img3']['name'];
    
        $temp_name1 = $_FILES['product_img1']['tmp_name'];
        $temp_name2 = $_FILES['product_img2']['tmp_name'];
        $temp_name3 = $_FILES['product_img3']['tmp_name'];
    
        move_uploaded_file($temp_name1,"../images/product_images/$product_img1");
        move_uploaded_file($temp_name2,"../images/product_images/$product_img2");
        move_uploaded_file($temp_name3,"../images/product_images/$product_img3");
        
        $update_product = "update products set p_cat_id='$product_cat',cat_id='$cat',manufacturer_id='$manufacturer_id',date=NOW(),product_title='$product_title',product_brand='$product_brand',product_qty='$product_qty',colour='$colour',product_img1='$product_img1',product_img2='$product_img2',product_img3='$product_img3',product_price='$product_price',sale_price='$sale_price',product_keywords='$product_keywords',product_desc='$product_desc',product_features='$product_features',product_video='$product_video',product_label='$product_label' where product_id='$p_id'";
        
        $run_product = mysqli_query($db,$update_product);
        
        if($run_product){
            
        echo "<script>alert('Your product has been updated Successfully')</script>"; 
            
        echo "<script>window.open('index.php?view_products','_self')</script>"; 
            
        }
        
       }else{

        // work when no update image
        
        $update_product = "update products set p_cat_id='$product_cat',cat_id='$cat',manufacturer_id='$manufacturer_id',date=NOW(),product_title='$product_title',product_brand='$product_brand',product_qty='$product_qty',colour='$colour',product_img1='$product_img1',product_img2='$product_img2',product_img3='$product_img3',product_price='$product_price',sale_price='$sale_price',product_keywords='$product_keywords',product_desc='$product_desc',product_features='$product_features',product_video='$product_video',product_label='$product_label' where product_id='$p_id'";
        
        $run_product = mysqli_query($db,$update_product);
        
        if($run_product){
            
        echo "<script>alert('Your product has been updated Successfully')</script>"; 
            
        echo "<script>window.open('index.php?view_products','_self')</script>"; 
            
        }
    }
    
}

?>


<?php } ?>
