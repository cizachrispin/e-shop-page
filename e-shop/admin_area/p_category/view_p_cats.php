<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">View Product Categories </li>
            <li class=""><a href="index.php?insert_p_cat"> Insert Product Category </a></li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="">
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered">

                    <thead>
                        <tr>
                            <th> ID </th>
                            <th> Title </th>
                            <th> category ID </th>
                            <th> Actions </th>

                        </tr>
                    </thead>

                    <tbody>

                        <?php 
                            
                                $i=0;
          
                                $get_p_cats = "select * from product_categories";
          
                                $run_p_cats = mysqli_query($db,$get_p_cats);
          
                                while($row_p_cats=mysqli_fetch_array($run_p_cats)){
                                    
                                    $p_cat_id = $row_p_cats['p_cat_id'];
                                    
                                    $p_cat_title = $row_p_cats['p_cat_title'];
                                    
                                    $cat_id = $row_p_cats['cat_id'];
                                
                                    
                                    $i++;
                            
                            ?>

                        <tr>
                            <td> <?php echo $i; ?> </td>
                            <td> <?php echo $p_cat_title; ?> </td>
                            <td> <?php echo $cat_id; ?> </td>

                            <td width="120">
                                <div class="action">
                                    <li><a href="index.php?edit_p_cat= <?php echo $p_cat_id; ?> "><i class="fa fa-pencil"></i> Edit Details</a></li>
                                </div>

                                <div class="action">
                                    <li><a href="index.php?delete_p_cat= <?php echo $p_cat_id; ?> "><i class="fa fa-trash-o"></i>
                                            Delete</a></li>
                                </div>
                            </td>
                        </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<?php } ?>
