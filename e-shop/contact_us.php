<?php 

session_start();

include("includes/db.php");
//include("functions/functions.php");

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
    <header class="contactusHeader">
        <div class="container-fluid p-0">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="home.php"><img src="images/logo_images/LOGO1.jpg"></a>
                <div class="">
                    <form>
                        <select class="form-control-lang">
                            <option selected="">ENG</option>
                            <option>FR</option>
                            <option>SWAHILI</option>
                            <option>SPANISH</option>
                        </select>
                    </form>
                </div>

                <div class="" id="">
                    <ul class="navbar-links">
                        <li class="">

                            <?php if (!isset($_SESSION['customer_email'])){
    
                                  echo "<a class='nav-link' href='checkout.php'>Login</a>";
    
                             }else{
    
                                    echo $_SESSION['customer_email'] . "";}


                                 ?>


                        </li>

                        <li>
                            <?php if (!isset($_SESSION['customer_email'])){
    
                                  echo "<a class='nav-link' href='register.php'>Register</a> ";
    
                             }else{
    
                                    echo " ";}


                                 ?>

                        </li>
                    </ul>
                </div>
            </nav>

        </div>
    </header>

    <div class="container-fluid p-0">
        <div class="help-centertitle">
            <img src="images/photos_hero_support_2x.jpg" class="responsive" style="">
            <h1>how ca we help you</h1>
            <form class="input-group">
                <input type="text" class="form-control-sm no-border shadow-none form-control-sm" placeholder="your emil" aria-label="Your email" aria-describedby="basic-addon2" />
                <div class="input-group-append">
                    <button class="btn btn-sm btn-outline-warning my-0 shadow-none" type="button"> Sign up</button>
                </div>
            </form>
        </div>
    </div>

    <div class="container-fluid p-0">
        <div class="help-centerbody">

            <h3> Popular Question</h3>

            <div class="row">
                <div class="col-4">
                    <div class="list-group" id="list-tab" role="tablist">
                        <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">How to register</a>
                        <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">How to make an order</a>
                        <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">How to change the password</a>
                        <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">How to track my order</a>
                    </div>
                </div>
                <div class="col-8">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, quibusdam eligendi mollitia rerum. Quia voluptatem assumenda beatae odio quisquam, ad, tenetur, quidem, labore illum fugiat doloribus error facere quibusdam voluptatibus!

                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, quibusdam eligendi mollitia rerum. Quia voluptatem assumenda beatae odio quisquam, ad, tenetur, quidem, labore illum fugiat doloribus error facere quibusdam voluptatibus!

                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, quibusdam eligendi mollitia rerum. Quia voluptatem assumenda beatae odio quisquam, ad, tenetur, quidem, labore illum fugiat doloribus error facere quibusdam voluptatibus!

                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, quibusdam eligendi mollitia rerum. Quia voluptatem assumenda beatae odio quisquam, ad, tenetur, quidem, labore illum fugiat doloribus error facere quibusdam voluptatibus!

                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, quibusdam eligendi mollitia rerum. Quia voluptatem assumenda beatae odio quisquam, ad, tenetur, quidem, labore illum fugiat doloribus error facere quibusdam voluptatibus!</div>
                        <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, quibusdam eligendi mollitia rerum. Quia voluptatem assumenda beatae odio quisquam, ad, tenetur, quidem, labore illum fugiat doloribus error facere quibusdam voluptatibus!</div>
                        <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, quibusdam eligendi mollitia rerum. Quia voluptatem assumenda beatae odio quisquam, ad, tenetur, quidem, labore illum fugiat doloribus error facere quibusdam voluptatibus!</div>
                        <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, quibusdam eligendi mollitia rerum. Quia voluptatem assumenda beatae odio quisquam, ad, tenetur, quidem, labore illum fugiat doloribus error facere quibusdam voluptatibus!</div>

                    </div>
                </div>
            </div>
            <br>


        </div>

        <br>

        <h2 class="mb-5 font-weight-bord text-center"> Contact us</h2>

        <div class="contactform">
            <div class="row ">

                <div class="col-lg-6 col-md-12">
                    <div class="wow fadeInUp contact-info" data-wow-delay="0.4s">
                        <div class="section-title text-left">
                            <h2>Contact Info</h2>
                            <p class="">For questions or comments about your order or our products, please get in touch.If you have a query about your order please ensure that you include your order number in your message so we can respond to you quickly & effectively. For additional support, send us an email: support@myshop.com</p>
                        </div>

                        <p><i class="fa fa-map-marker"></i> 456 Street 22000, nairob, keny</p>
                        <p><i class="fa fa-comment"></i> <a href="mailto:info@company.com">info@company.com</a></p>
                        <p><i class="fa fa-phone"></i> 071-919-7723</p>
                    </div>
                </div>


                <div class="col-lg-6 col-md-12">
                    <h4 class="SubmitTile text-center">Submit Your Form Here</h4>
                    <p>We aim to respond to all inquiries within 48 hours. Please note, we are closed on weekends.</p>
                    <form class="" id="contact-form" action="#" method="get">
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                            </div>
                            <input name="" class="form-control" placeholder="Fist name" type="text">
                        </div>

                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                            </div>
                            <input name="email" class="form-control" placeholder="Email address" type="email" required="">
                        </div>
                        <br>
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-tag prefix grey-text"></i> </span>
                            </div>
                            <input name="subject" class="form-control" placeholder="subject" type="text">
                        </div>

                        <div class="form-group">
                            <textarea name="txtMsg" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;"></textarea>
                        </div>

                        <div class="text-center">
                            <button class="btn btn-primary"> Send <i class="fa fa-paper-plane-o ml-2"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>







    <script src="js/jquery-331.min.js"></script>

    <script src="js/popper.min.js"></script>

    <script src="js/bootstrap.min.js"></script>


</body>

</html>
