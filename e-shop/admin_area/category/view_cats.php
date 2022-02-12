<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active"> View Categories</li>
            <li class=""><a href="index.php?insert_cat"> Insert Category </a></li>
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
                            <th> Top Category </th>
                            <th> Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php 
                            
                                $i=0;
          
                                $get_cats = "select * from categories";
          
                                $run_cats = mysqli_query($db,$get_cats);
          
                                while($row_cats=mysqli_fetch_array($run_cats)){
                                    
                                    $cat_id = $row_cats['cat_id'];
                                    
                                    $cat_title = $row_cats['cat_title'];
                                    
                                    $cat_top = $row_cats['cat_top'];
                                    
                                    $i++;
                            
                            ?>

                        <tr>
                            <td> <?php echo $i; ?> </td>
                            <td> <?php echo $cat_title; ?> </td>
                            <td width="300"> <?php echo $cat_top; ?> </td>

                            <td width="120">
                                <div class="action">
                                    <li><a href="index.php?edit_cat= <?php echo $cat_id; ?> "><i class="fa fa-pencil"></i> Edit Details</a></li>
                                </div>

                                <div class="action">
                                    <li><a href="index.php?delete_cat= <?php echo $cat_id; ?> "><i class="fa fa-trash-o"></i>
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
