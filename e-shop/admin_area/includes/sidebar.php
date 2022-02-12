<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-header">

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">

            <span class="sr-only">Toggle Navigation</span>

            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>

        </button>

        <a href="index.php?dashboard" class="navbar-brand">Admin Area</a>

    </div>

    <ul class="nav navbar-right top-nav">

        <li>
            <div class="thumb-info">
                <img src="../images/admin_images/<?php echo $admin_image; ?>" alt="<?php echo $admin_image; ?>" class="rounded img-responsive ">
            </div>
        </li>

        <li>
            <a href="#" class="link" data-toggle="dropdown">

                <i class="fa fa-user"></i> <?php echo $admin_name;  ?> <b class="caret"></b>

            </a>

            <ul class="dropdown-menu">
                <li>

                    <a href="index.php?user_profile=<?php echo $admin_id; ?>">

                        <i class="fa fa-fw fa-user"></i> Profile

                    </a>
                </li>

                <li>
                    <a href="index.php?view_products">


                        <i class="fa fa-fw fa-envelope"></i> Products

                        <span class="badge"><?php echo $count_products; ?></span>

                    </a>
                </li>

                <li>

                    <a href="index.php?view_customers">


                        <i class="fa fa-fw fa-users"></i> Customeres

                        <span class="badge"><?php echo $count_customers; ?></span>

                    </a>
                </li>

                <li>

                    <a href="index.php?view_cats">


                        <i class="fa fa-fw fa-gear"></i> Product Categories

                        <span class="badge"><?php echo $count_p_categories; ?></span>

                    </a>
                </li>

                <li class="divider"></li>

                <li>

                    <a href="logout.php">


                        <i class="fa fa-fw fa-power-off"></i> Log Out

                    </a>
                </li>

            </ul>

        </li>
    </ul>

    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">

            <!-- Dashboard -->
            <li>
                <a href="index.php?dashboard">

                    <i class="fa fa-fw fa-dashboard"></i> Dashboard

                </a>

            </li>


            <!-- products -->

            <li>
                <a href="index.php?view_products"><i class="fa fa-fw fa-tag"></i> Products </a>
            </li>

            <!-- manufacturer -->

            <li>
                <a href="index.php?view_manufacturers"><i class="fa fa-fw fa-star"></i> Manufacturer </a>

            </li>


            <!-- Products Categories -->
            <li>
                <a href="index.php?view_p_cats"> <i class="fa fa-fw fa-edit"></i> Products Categories </a>

            </li>


            <!-- categories -->
            <li>
                <a href="index.php?view_cats"><i class="fa fa-fw fa-book"></i> Categories</a>
            </li>


            <!-- sliders -->
            <li>
                <a href="index.php?view_slides"><i class="fa fa-fw fa-gear"></i> Slides </a>

            </li>


            <!-- Boxes 
            <li>
                <a href="index.php?view_boxes"><i class="fa fa-fw fa-dropbox"></i> Boxes </a>
            </li>-->


            <!-- View Customers -->
            <li>
                <a href="index.php?view_customers">
                    <i class="fa fa-fw fa-users"></i> View Customers
                </a>
            </li>

            <!-- Terms -->

            <li>
                <a href="index.php?view_terms"> <i class="fa fa-fw fa-table"></i> Terms</a>
            </li>


            <!-- View Orders -->
            <li>
                <a href="index.php?view_orders">
                    <i class="fa fa-fw fa-book"></i> View Orders
                </a>
            </li>


            <!-- View Payments -->
            <li>
                <a href="index.php?view_payments">
                    <i class="fa fa-fw fa-money"></i> View Payments
                </a>
            </li>


            <!-- Users -->
            <li>

                <a href="#" data-toggle="collapse" data-target="#users">

                    <i class="fa fa-fw fa-users"></i> Users
                    <i class="fa fa-fw fa-caret-down"></i>

                </a>

                <ul id="users" class="collapse">
                    <li>
                        <a href="index.php?insert_user"> Insert User </a>
                    </li>
                    <li>
                        <a href="index.php?view_users"> View Users </a>
                    </li>
                    <li>

                        <a href="index.php?user_profile=<?php echo $admin_id; ?>"> Edit User Profile </a>
                    </li>
                </ul>

            </li>


            <!-- css -->

            <li>
                <a href="index.php?edit_css">
                    <i class="fa fa-fw fa-pencil"></i> CSS Edider
                </a>
            </li>


            <!-- Log Out -->
            <li>

                <a href="logout.php">
                    <i class="fa fa-fw fa-power-off"></i> Log Out
                </a>
            </li>

        </ul>
    </div>

</nav>


<?php } ?>
