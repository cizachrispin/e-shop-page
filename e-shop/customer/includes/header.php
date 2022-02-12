<header>
    <div class="container-fluid">
        <div class="row">
            <div class="top-header col-md-12">
                <div class="top-header-content">
                    <section class="langform text pull-left">
                        <select class="form-control-lang">
                            <option selected="">Englesh</option>
                            <option>Frensh</option>
                            <option class="form">Swahili</option>
                            <option>Spanish</option>
                        </select>
                    </section>

                    <ul class="text pull-right">


                        <li>

                            <a href="#" class="links" data-toggle="dropdown">

                                <?php if (!isset($_SESSION['customer_email'])){
    
                                  echo "Account";
    
                                }else{
    
                                $customer_session = $_SESSION['customer_email'];
    
                                $get_customer = "select * from customers where customer_email='$customer_session'";
        
                                $run_customer = mysqli_query($db,$get_customer);
        
                                $row_customer = mysqli_fetch_array($run_customer);
        
                                $customer_id = $row_customer['customer_id'];
        
                                $customer_name = $row_customer['customer_name'];
        
                                $customer_email = $row_customer['customer_email'];
    
                                echo "Hi,"." "."$customer_name"; 

                                }
                                
                                ?>
                            </a>

                            <div class="dropdown-menu">

                                <!-----profile--->

                                <?php if (!isset($_SESSION['customer_email'])){
                                   
                                   echo " <a class='dropdown-item' href='checkout.php'><i class='fa fa-user-o'></i> Account</a>";
                                             
                                                                      
                               }else{
                                   
                                   echo " <a class='dropdown-item' href='customer_account.php?customer_profile'><i class='fa fa-user-o'></i> Account </a>";
                                   
                               }
                                 
                               
                             ?>


                                <!-----Message--->

                                <?php if (!isset($_SESSION['customer_email'])){
                                   
                                   echo " <a class='dropdown-item' href='checkout.php'><i class='fa fa-fw fa-envelope'></i> Message</a>";
                                             
                                                                      
                               }else{
                                   
                                   echo " <a href='customer_account.php?message' class='dropdown-item'> <i class='fa fa-fw fa-envelope'></i> Message</a>";
                                   
                               }
                                 
                               
                             ?>

                                <!-----order--->

                                <?php
                               if (!isset($_SESSION['customer_email'])) {
                                   
                                   echo " <a class='dropdown-item' href='checkout.php'><i class='fa fa-fw fa-book'></i> order</a>";
                                                                      
                               }else{
                                   
                                   echo " <a href='customer_account.php?my_orders' class='dropdown-item'><i class='fa fa-fw fa-book'></i> order</a>";
                                   
                               }
                                 
                               
                             ?>



                                <div class="dropdown-divider"></div>

                                <!-----log in, log out--->


                                <?php if (!isset($_SESSION['customer_email'])){
    
                                  echo " <a class='login' href='../checkout.php'><i class='fa fa-fw fa-power-off'></i>Login </a>
                                  
                                  <p class='or'>OR</p><br>
                                  
                                  <a class='register' href='../customer_register.php'>REGISTER</a> 

                                  "
       
                                  ;
    
                             }else{
    
                                   echo " <a class='logout' href='../logout.php'><i class='fa fa-fw fa-power-off'></i>Logout </a>"; 
    
                                    }
                             
                             ?>


                            </div>
                        </li>

                        <li><a class="links" href="../contact_us.php" target="_blank">Help</a></li>

                        <li class="icons">
                            <span>
                                <a class="links" href="../cart.php"> Cart</a>
                                <small class="count d-flex"><?php items(); ?></small>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>

    <!--- Navigation--->
    <nav class="nav bg-white">
        <div class="container-fluid">
            <div class="wrapper">

                <a class="" href="../home.php"><img src="../images/logo_images/LOGO1.jpg"></a>
                <div class="col-sm">
                    <form class="input-group mr-auto ml-3 " method="get" action="../shop_products.php" enctype="multipart/form-data">
                        <input type="text" required name="user_query" class="form-control-sm mr-sm-2 shadow-none" placeholder="What Are You looking For..." />

                        <input class="imputbutton" name="search" value="SEARCH" type="submit" />
                    </form>
                </div>

                <ul class="nav-list mr-auto ml-3">
                    <li><a class="link" href="../products.php"> Products</a></li>

                    <li>
                        <a href="" class="desktop-item link"> <i class="fa fa-bars"></i> ALL CATEGORIES<span> </span></a>
                        <div class="mega-box">
                            <div class="content">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <h6>Man's Fashions</h6>
                                            <hr>
                                            <?php
                                        
                                        $get_p_cat = "select * from product_categories where cat_id=1";
                    
                                        $run_p_cat = mysqli_query($db,$get_p_cat);
                    
                                        while($row_p_cat=mysqli_fetch_array($run_p_cat)){
                    
                                        $p_cat_id = $row_p_cat['p_cat_id'];
                            
                                        $p_cat_title = $row_p_cat['p_cat_title'];
                            
                                        echo "
                            
                                            <ul>
                                               <li><a href='../shop_products.php?p_cat=$p_cat_id'> $p_cat_title </a></a></li>
                                            </ul>   
                            
                                         ";
                            
                                        }
                    
                                     ?>
                                        </div>

                                        <div class="col-md-3">
                                            <h6>Woman's Fashions</h6>
                                            <hr>
                                            <?php
                                        
                                        $get_p_cat = "select * from product_categories where cat_id=2";
                    
                                        $run_p_cat = mysqli_query($db,$get_p_cat);
                    
                                        while($row_p_cat=mysqli_fetch_array($run_p_cat)){
                    
                                        $p_cat_id = $row_p_cat['p_cat_id'];
                            
                                        $p_cat_title = $row_p_cat['p_cat_title'];
                            
                                        echo "
                            
                                            <ul>
                                               <li><a href='../shop_products.php?p_cat=$p_cat_id'> $p_cat_title </a></a></li>
                                            </ul>   
                            
                                         ";
                            
                                        }
                    
                                     ?>
                                        </div>

                                        <div class="col-md-3">
                                            <h6>Kid's Fashions</h6>
                                            <hr>
                                            <?php
                                        
                                        $get_p_cat = "select * from product_categories where cat_id=3";
                    
                                        $run_p_cat = mysqli_query($db,$get_p_cat);
                    
                                        while($row_p_cat=mysqli_fetch_array($run_p_cat)){
                    
                                        $p_cat_id = $row_p_cat['p_cat_id'];
                            
                                        $p_cat_title = $row_p_cat['p_cat_title'];
                            
                                        echo "
                            
                                            <ul>
                                               <li><a href='../shop_products.php?p_cat=$p_cat_id'> $p_cat_title </a></a></li>
                                            </ul>   
                            
                                         ";
                            
                                        }
                    
                                     ?>

                                            <div class="mt-3">
                                                <h6>other Fashion</h6>
                                                <hr>
                                                <?php
                                        
                                        $get_p_cat = "select * from product_categories where cat_id=5";
                    
                                        $run_p_cat = mysqli_query($db,$get_p_cat);
                    
                                        while($row_p_cat=mysqli_fetch_array($run_p_cat)){
                    
                                        $p_cat_id = $row_p_cat['p_cat_id'];
                            
                                        $p_cat_title = $row_p_cat['p_cat_title'];
                            
                                        echo "
                            
                                            <ul>
                                               <li><a href='../shop_products.php?p_cat=$p_cat_id'> $p_cat_title </a></a></li>
                                            </ul>   
                            
                                         ";
                            
                                        }
                    
                                     ?>
                                            </div>


                                        </div>

                                        <div class="col-md-3">

                                            <h6>baby</h6>
                                            <hr>
                                            <?php
                                        
                                        $get_p_cat = "select * from product_categories where cat_id=4";
                    
                                        $run_p_cat = mysqli_query($db,$get_p_cat);
                    
                                        while($row_p_cat=mysqli_fetch_array($run_p_cat)){
                    
                                        $p_cat_id = $row_p_cat['p_cat_id'];
                            
                                        $p_cat_title = $row_p_cat['p_cat_title'];
                            
                                        echo "
                            
                                            <ul>
                                               <li><a href='../shop_products.php?p_cat=$p_cat_id'> $p_cat_title </a></a></li>
                                            </ul>   
                            
                                         ";
                            
                                        }
                    
                                     ?>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                </ul>

            </div>
        </div>
    </nav>


</header>
