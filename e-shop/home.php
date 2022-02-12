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

    <!------------ header ------------->

    <?php
		include('includes/header.php')
	?>

    <!------------ header -------------
    <div class="loader_bg">
        <div class="loader"></div>
    </div>-->


    <!------------ slide ------------->
    <div class="container-fluid p-0">
        <div class="slider">

            <div id="myCarousel" class="carousel slide" data-ride="carousel">

                <!-- The slideshow -->

                <div class="carousel-inner">
                    <!-- carousel-inner Begin -->


                    <?php 
                
                   
                   $sql = "select * from slider LIMIT 0,1";
                   
                   $result=$db->query($sql);
                   
                   while($row_slides=$result->fetch_assoc()){
                       
                       $slide_name = $row_slides['slide_name'];
                       $slide_image = $row_slides['slide_image'];
                       $slide_url = $row_slides['slide_url'];
                       
                       echo "
                       
                       <div class='carousel-item active'>
                       
                       <a href='$slide_url'>
                       
                            <img src='images/slides_images/$slide_image'>
                       
                       </a>
                       
                       </div>
                       
                       ";
                       
                   }
                   
                   $sql = "select * from slider LIMIT 1,3";
                   
                   $result=$db->query($sql);
                   
                   while($row_slides=$result->fetch_assoc()){
                       
                       $slide_name = $row_slides['slide_name'];
                       $slide_image = $row_slides['slide_image'];
                       $slide_url = $row_slides['slide_url'];
                       
                       
                       echo "
                       
                       <div class='carousel-item'>
                       
                       <a href='$slide_url'>
                       
                            <img src='images/slides_images/$slide_image'>
                       
                       </a>
                       
                       </div>
                       
                       ";
                       
                   }
                   
                   ?>

                </div>


                <!-- Left and right controls -->

                <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </a>

                <a class="carousel-control-next" href="#myCarousel" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>

                </a>

            </div>
        </div>

    </div>


    <!-- Promotion -->

    <section class="section promotion">
        <div class="title">
            <h2>Shop Collections</h2>
            <span>Select from the premium product and save plenty money</span>
        </div>

        <div class="promotion-layout container-fluid">
            <div class="promotion-item">
                <img src="images/promo1.jpg" alt="" />
                <div class="promotion-content">
                    <h5>FOR MEN</h5>
                    <a href="">SHOP NOW</a>
                </div>
            </div>

            <div class="promotion-item">
                <img src="images/promo2.jpg" alt="" />
                <div class="promotion-content">
                    <h5>CASUAL SHOES</h5>
                    <a href="">SHOP NOW</a>
                </div>
            </div>

            <div class="promotion-item">
                <img src="images/promo3.jpg" alt="" />
                <div class="promotion-content">
                    <h5>FOR WOMEN</h5>
                    <a href="">SHOP NOW</a>
                </div>
            </div>

            <div class="promotion-item">
                <img src="images/promo4.jpg" alt="" />
                <div class="promotion-content">
                    <h5>LEATHER BELTS</h5>
                    <a href="">SHOP NOW</a>
                </div>
            </div>

            <div class="promotion-item">
                <img src="images/promo5.jpg" alt="" />
                <div class="promotion-content">
                    <h5>DESIGNER BAGS</h5>
                    <a href="">SHOP NOW</a>
                </div>
            </div>

            <div class="promotion-item">
                <img src="images/promo6.jpg" alt="" />
                <div class="promotion-content">
                    <h5>WATCHES</h5>
                    <a href="">SHOP NOW</a>
                </div>
            </div>
        </div>
    </section>


    <!----------- product ------------>
    <div class="container-fluid">
        <div class="product-title class-col-md-12">
            <h1>Features products</h1>
            <hr class="divider">

        </div>
    </div>

    <!-- ADVERT -->
    <section class="section advert">
        <div class="advert-layout container fluid">
            <div class="item ">
                <img src="./images/promo7.jpg" alt="">
                <div class="content left">
                    <span>Exclusive Sales</span>
                    <h3>Spring Collections</h3>
                    <a href="">View Collection</a>
                </div>
            </div>
            <div class="item">
                <img src="./images/promo8.jpg" alt="">
                <div class="content  right">
                    <span>New Trending</span>
                    <h3>Designer Bags</h3>
                    <a href="">Shop Now </a>
                </div>
            </div>
        </div>
    </section>

    <a id="back2Top" title="Back to top" href="#">&#10148;</a>

    <!------------footer----------->

    <?php
    
       include('includes/footer.php')
    ?>


    <script src="js/jquery-331.min.js"></script>

    <script src="js/popper.min.js"></script>

    <script src="js/bootstrap.min.js"></script>


</body>

</html>


<script type="text/javascript">
    /*Scroll to top when arrow up clicked BEGIN*/
    $(window).scroll(function() {
        var height = $(window).scrollTop();
        if (height > 100) {
            $('#back2Top').fadeIn();
        } else {
            $('#back2Top').fadeOut();
        }
    });
    $(document).ready(function() {
        $("#back2Top").click(function(event) {
            event.preventDefault();
            $("html, body").animate({
                scrollTop: 0
            }, "slow");
            return false;
        });

    });

    /*Scroll to top when arrow up clicked END*/

    /*loader BEGIN*/

    setTimeout(function() {
        $('.loader_bg').fadeToggle();
    }, 1000);

    /*loader BEGIN*/

</script>
