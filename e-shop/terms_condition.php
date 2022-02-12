<?php 

//$active='shop';

include("includes/db.php");

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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="font-awsome/font-awesome.min.css">


</head>

<body>


    <div class="container">
        <div class="terms_conditions">

            <div class="term_title text-center">
                <h4>Term and condition</h4>
                <h6 class="text-muted">General Terms and Conditions of Use of the Marketplace for Buyers and Sellers</h6>
            </div>

            <div class="row">
                <div class="col-4">
                    <div class="list-group" id="list-tab" role="tablist">

                        <?php 
 
                        $get_term = "select * from terms_conditions LIMIT 0,1";
                    
                        $run_term = mysqli_query($db,$get_term);
                    
                        while($row_term=mysqli_fetch_array($run_term)){
                    
                            $term_title = $row_term['term_title'];
                            
                         ?>

                        <a href="#" class="list-group-item list-group-item-action active" data-toggle="list" role="tab">
                            <?php echo $term_title; ?>
                        </a>


                        <?php } ?>

                        <?php
                        
                        $count_term = "select * from terms_conditions";
                        $run_count_term = mysqli_query($db,$count_term);
                        $count = mysqli_num_rows($run_count_term);
                        
                        $get_term = "select * from terms LIMIT 1,$count";
                        
                        $run_term = mysqli_query($db,$get_term);
                        
                        while($row_term=mysqli_fetch_array($run_term)){
                      
                            $term_title = $row_term['term_title'];
                    
                        ?>

                        <a href="#" class="list-group-item list-group-item-action" data-toggle="list" role="tab">

                            <?php echo $term_title; ?>

                        </a>

                        <?php } ?>

                    </div>

                </div>

                <div class="col-8">
                    <div class="tab-content">

                        <?php 
                        
                            $get_term = "select * from terms LIMIT 0,1";
                    
                            $run_term = mysqli_query($db,$get_term);
                    
                            while($row_term=mysqli_fetch_array($run_term)){
                                
                            $term_title = $row_term['term_title'];
                            
                            

                            
                        ?>

                        <div class="tab-pane fade show active" id="<?php echo $term_desc; ?>" role="tabpanel">

                            <?php echo $term_desc; ?>

                        </div>


                        <?php } ?>


                        <?php
                        
                        $count_term = "select * from terms";
                        $run_count_term = mysqli_query($db,$count_term);
                        $count = mysqli_num_rows($run_count_term);
                        
                        $get_term = "select * from terms LIMIT 1,$count";
                        
                        $run_term = mysqli_query($db,$get_term);
                        
                        while($row_term=mysqli_fetch_array($run_term)){
                    
                            $term_title = $row_term['term_title'];
                            
                            $term_desc = $row_term['term_desc'];                    
                        
                        ?>

                        <div class="tab-pane fade" id="<?php echo $term_desc; ?>" role="tabpanel">

                            <?php echo $term_content; ?>

                        </div>

                        <?php } ?>

                    </div>


                </div>
            </div>


        </div>

    </div>



    <script src="js/jquery-331.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>
