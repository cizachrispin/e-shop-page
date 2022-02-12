<footer class=" font-small teal pt-3">
    <div class="container-fluid-p0">
        <!-- ---------------------Footer header------------------------ -->
        <div class="headerFooter">
            <div class="row py-3 d-flex">

                <div class="col-md-3 col-12 text-center mb-md-0">
                    <div class="log">
                        <a class="navbar-brand" href="../home.php"><img src="../images/logo_images/LOGO1.jpg"></a>
                    </div>
                </div>

                <div class="col-md-5 col-12 text-left mb-3 mb-md-0 ">
                    <h6 class="mb-0">Get The News</h6>
                    <p class="text-muted"> Don't Miss Our Latest Update Product.</p>

                    <form class="input-group">
                        <input type="text" class="form-control no-border shadow-none form-control-sm" placeholder="your emil" aria-label="Your email" aria-describedby="basic-addon2" />

                        <div class="input-group-append">
                            <button class="btn btn-sm btn-outline-warning my-0 shadow-none" type="button"> Sign up</button>
                        </div>
                    </form>
                </div>

                <div class="col-md-4 col-12  text-center">
                    <h6 class="mb-0">Download App</h6>
                    <p class="text-muted"> Get access to exclusive offers!</p>

                    <div class="DownloadApp">
                        <div class="row ">
                            <div class="AppStore">
                                <a href="DownloadApp.php">
                                    <i class="fa fa-apple btn-icon-prepend"></i>
                                    <span class="d-inline-block text-left">
                                        <small class="font-weight-light d-block">Available on the</small> App Store
                                    </span>

                                </a>
                            </div>

                            <div class="GooglePlay">
                                <a href="DownloadApp.php">
                                    <i class="fa fa-apple btn-icon-prepend"></i>
                                    <span class="d-inline-block text-left">
                                        <small class="font-weight-light d-block">Get it on the</small> Google Play
                                    </span>
                                </a>
                            </div>

                        </div>


                    </div>

                </div>

            </div>

        </div>

        <!-- -----------------Footer links ------------------------>
        <div class="Footerlinks">
            <div class="row py-4 d-flex">

                <div class="col-md-3 mb-4 mb-md-0 ">
                    <h6 class="text-uppercase font-weight-bold">costommer service</h6>

                    <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <div>
                        <li><a href="../register.php"> Registre</a></li>
                        <li><a href="../cart.php">Shopping cart</a></li>
                        <li><a href="../products.php"> Shop </a></li>

                        <!-----log in, log out--->

                        <?php if (!isset($_SESSION['customer_email'])){
    
                                  echo "  <li><a href='checkout.php'>Login </a> </li>";
    
                             }else{
    
                                   echo "  <li><a href='../Logout.php'>Logout </a> </li>"; 
    
                                    }
                             
                             ?>


                    </div>

                </div>


                <div class="aboutUs col-md-3 col-6 mb-4 mb-md-0 ">
                    <h6 class="text-uppercase font-weight-bold">About Us</h6>

                    <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <div>
                        <li><a href="../contact_us.php" target="_blank"> contact us </a></li>
                        <li><a href="../contact_us.php" target="_blank"> help </a></li>
                        <li><a href="#" target="_blank"> About E-shop</a></li>
                        <li><a href="../terms_condition.php" target="_blank"> Terms and condition</a></li>

                    </div>
                </div>

                <div class="contact col-md-3 col-6 mb-4 mb-md-0 ">
                    <h6 class="text-uppercase font-weight-bold">Contact</h6>

                    <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p class="text-muted"><i class="fa fa-home mr-3"></i> RD congo, Rwanda, Kenya</p>
                    <p class="text-muted"><i class="fa fa-envelope mr-3"></i> info@example.com</p>
                    <p class="text-muted"><i class="fa fa-phone mr-3"></i> + 245 234 567 88</p>
                    <p class="text-muted"><i class="fa fa-print mr-3"></i> + 254 234 567 89</p>

                </div>

                <div class="socialMedia col-md-3 col-6 mb-4 mb-md-0 ">

                    <p class="text-uppercase font-weight-bold">follow us :</p>
                    <a href="#" class="fb-ic">
                        <i class="fa fa-linkedin-in white-text"> </i>
                    </a>

                    <a href="#" class="fb-ic">
                        <i class="fa fa-facebook-f white-text mr-4"> </i>
                    </a>

                    <a href="#" class="fb-ic">
                        <i class="fa fa-instagram white-text mr-4"> </i>
                    </a>

                    <a href="#" class="fb-ic">
                        <i class="fa fa-youtube white-text mr-4"> </i>
                    </a>

                </div>

                <div class="PaymentMethod col-md-6 col-6 mb-2 ">
                    <div>
                        <img src="../images/logo_images/paymentM.png" alt="" style="height: 60px; width:220px">
                    </div>
                </div>



            </div>

            <hr>

            <!-- Copyright -->

            <div class="footer-copyright text-center py-3"> Copyright ©2020 | Designed With by
                <a href="http://localhost/shopping/index.php"> lukogo</a>
            </div>

        </div>
    </div>
</footer>
