<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['edit_p_cat'])){
        
        $edit_p_cat_id = $_GET['edit_p_cat'];
        
        $edit_p_cat_query = "select * from product_categories where p_cat_id='$edit_p_cat_id'";
        
        $run_edit = mysqli_query($db,$edit_p_cat_query);
        
        $row_edit = mysqli_fetch_array($run_edit);
        
        $p_cat_id = $row_edit['p_cat_id'];
        
        $p_cat_title = $row_edit['p_cat_title'];
        
        
    }

?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li><a href="index.php?view_p_cats"> View Product Categories </a></li>
            <li><a href="index.php?insert_p_cat"> Insert Product Category </a></li>
            <li class="active"> Edit Product Category </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">

                    <i class="fa fa-pencil fa-fw"></i> Edit Product Category

                </h3>
            </div>

            <div class="panel-body">
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="" class="control-label col-md-3 text-muted">Title</label>
                        <div class="col-md-6">
                            <input value=" <?php echo $p_cat_title; ?> " name="p_cat_title" type="text" class="form-control">
                        </div>

                    </div>

                    <div class="form-group text-muted">
                        <label class="col-md-3 control-label"> Category </label>

                        <div class="col-md-6">

                            <select name="cat" class="form-control">

                                <option disabled value="Select Category">Select Category</option>

                                <option value="<?php echo $cat; ?>"> <?php echo $cat_id; ?> </option>

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

                    <div class="form-group">

                        <label for="" class="control-label col-md-3">

                        </label>
                        <div class="col-md-6">

                            <input value="Update Product Category" name="update" type="submit" class="form-control btn btn-primary">

                        </div>

                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<?php  

   if(isset($_POST['update'])){
              
   $p_cat_title = $_POST['p_cat_title'];
              
   $cat = $_POST['cat'];

   $update_p_cat = "update product_categories set p_cat_title='$p_cat_title',cat='$cat' where p_cat_id='$p_cat_id'";
       
   $run_p_cat = mysqli_query($db,$update_p_cat);
                
   if($run_p_cat){
                    
        echo "<script>alert('Your Product Category Has Been Updated')</script>";
                    
        echo "<script>window.open('index.php?view_p_cats','_self')</script>";
                    
                }

              }
              

?>



<?php } ?>
