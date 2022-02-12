<?php 

$aCat = array();

if(isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])){

    foreach($_REQUEST['cat'] as $sKey=>$sVal){

        if((int)$sVal!=0){

            $aCat[(int)$sVal] = (int)$sVal;

        }

    }

}

?>


<div class="sidebar">
    <ul>
        <h6>Categories</h6>

        <?php 
        
                $get_cat = "select * from categories";
                $run_cat = mysqli_query($db,$get_cat);

                while($row_cat=mysqli_fetch_array($run_cat)){

                    $cat_id = $row_cat['cat_id'];
                    $cat_title = $row_cat['cat_title'];
                    //$cat_image = $row_cat['cat_image'];

                    echo "
                    <li class='checkbox checkbox-warning'>

                        <a>

                        <label>

                            <input ";
                            
                            if(isset($aCat[$cat_id])){
                                echo "checked='checked'";
                            }
                            
                            echo " value='$cat_id' type='checkbox' class='get_cat' name='cat'>

                            <span>
                            $cat_title
                            
                            </span>

                        </label>

                        </a>
                    
                    </li>
                    ";

                }
                
                ?>
    </ul>
    <hr>

    <div class="price">

    </div>

    <hr>

    <div>
        <h6>Brand</h6>
        <div class="input-group">
            <input type="text" class="form-control-sm shadow-none mb-3" id="myInput" onkeyup="myFunction()" placeholder="Search for brand.." title="Type in a name">
        </div>

        <div class="overflow-auto">
            <ul class="overflow-auto">
                <li>
                    <input type="checkbox" name="" id="">
                    <label for="">
                        <span>Gucci</span>
                        <small>(10)</small>
                    </label>
                </li>

                <li>
                    <input type="checkbox" name="" id="">
                    <label for="">
                        <span>Burberry</span>
                        <small>(7)</small>
                    </label>
                </li>

                <li>
                    <input type="checkbox" name="" id="">
                    <label for="">
                        <span> Accessories</span>
                        <small>(3)</small>
                    </label>
                </li>

                <li>
                    <input type="checkbox" name="" id="">
                    <label for="">
                        <span>Valentino</span>
                        <small>(3)</small>
                    </label>
                </li>

                <li>
                    <input type="checkbox" name="" id="">
                    <label for="">
                        <span>Dolce & Gabbana</span>
                        <small>(3)</small>
                    </label>
                </li>

                <li>
                    <input type="checkbox" name="" id="">
                    <label for="">
                        <span>Hogan</span>
                        <small>(3)</small>
                    </label>
                </li>

                <li>
                    <input type="checkbox" name="" id="">
                    <label for="">
                        <span>Moreschi</span>
                        <small>(3)</small>
                    </label>
                </li>

            </ul>

        </div>

    </div>
</div>
