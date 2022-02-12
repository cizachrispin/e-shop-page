<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class=""><a href="index.php?view_p_cats"> View Product Categories </a></li>
            <li class="active"> Insert Product Category </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">

                    <i class="fa fa-money fa-fw"></i> Insert Product Category

                </h3>
            </div>
            <div class="panel-body">
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <!-- form-group begin -->

                        <label for="" class="control-label col-md-3">
                            <!-- control-label col-md-3 begin -->

                            Product Category Title

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6">
                            <!-- col-md-6 begin -->

                            <input name="p_cat_title" type="text" class="form-control">

                        </div><!-- col-md-6 finish -->

                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label text-muted"> Category </label>

                        <div class="col-md-6">

                            <select name="cat" class="form-control">

                                <option selected disabled> -Select a Category- </option>

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

                            <input value="Submit Product Category" name="submit" type="submit" class="form-control btn btn-primary">

                        </div>

                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<?php  

          if(isset($_POST['submit'])){
              
              $p_cat_title = $_POST['p_cat_title'];
              
              $cat = $_POST['cat'];
              
              $insert_p_cat = "insert into product_categories (p_cat_title,cat_id) values ('$p_cat_title','$cat')";
              
              $run_p_cat = mysqli_query($db,$insert_p_cat);
              
              if($run_p_cat){
                  
                  echo "<script>alert('Your New Product Category Has Been Inserted')</script>";
                  
                  echo "<script>window.open('index.php?view_p_cats','_self')</script>";
                  
              }
              
          }

?>



<?php } ?>
