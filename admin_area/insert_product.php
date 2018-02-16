<?php

if(!isset($_SESSION['admin_email'])){
    echo"<script>window.open('login.php?not_admin=you are not admin','_self')</script>";
}else{

include 'includes/db.php';
?>


    <form action="" method="Post" enctype="multipart/form-data">
			<table align="center" width="600" height="500" border="2" bgcolor="#187eae">
			<tr>
				<td colspan="2" align="center"><h2>Insert New Product Here </h2></td>
			</tr>
            
              <tr>
            <th align="center">Product Title : </th>
	<td><input type="text" name='product_title' size="60" required/></td>
			</tr>
           
           
            <tr>
            <th align="center">Product Category : </th>
	<td><select  name="product_cat" required >
            	<option>Select Category</option>
            	
            	<?php
                    $get_cats="SELECT * FROM `categories`";
                    $run_cats=mysqli_query($con,$get_cats);
        
                    while($row_cats=mysqli_fetch_array($run_cats)){
                     $cat_id=$row_cats['cat_id'];
                    $cat_title=$row_cats['cat_title'];
                        echo "<option value='$cat_id'>$cat_title</option>";
                    }
                ?>
            	
        </select>
                </td>
                </tr>
                
              <tr>
            <th align="center">Product Brand : </th>
	<td><select  name="product_brand" required >
            	<option>Select Brand</option>
            	
            	<?php
                    $get_brands="SELECT * FROM `brands`";
                    $run_brands=mysqli_query($con,$get_brands);
        
                    while($row_brands=mysqli_fetch_array($run_brands)){
                     $brand_id=$row_brands['brand_id'];
                    $brand_title=$row_brands['brand_title'];
                        echo "<option value='$brand_id'>$brand_title</option>";
                    }
                ?>
            	
        </select>
                </td>
                </tr> 
                
                             <tr>
            <th align="center">Product Image : </th>
			<td><input type="file" name='product_image' required /></td>
			</tr>
            
            <tr>
            <th align="center">Product Price : </th>
			<td><input type="text" name='product_price' required /></td>
			</tr>
            
            <tr>
            <th align="center">Product Description : </th>
	<td><textarea cols="100" rows="6" name="product_desc"> </textarea> </td>
			</tr>
            
            <tr>
            <th align="center">Product KeyWords : </th>
	<td><input type="text" name='product_keywords' size='50' required /></td>
			</tr>
          
            
            <tr>
<td colspan="2"><input type="submit" name='insert_product' value="Insert New Product"/></td>
			</tr>
 
        </table>
    </form>
    
    <?php
    if(isset($_POST['insert_product'])){
        
        $product_title=$_POST['product_title'];
        $product_cat=$_POST['product_cat'];
        $product_brand=$_POST['product_brand'];
        $product_price=$_POST['product_price'];
        $product_desc=$_POST['product_desc'];
        $product_keywords=$_POST['product_keywords'];
        
        //image
        $product_image=$_FILES['product_image']['name'];
        $product_image_tmp=$_FILES['product_image']['tmp_name'];
        
        move_uploaded_file($product_image_tmp,"product_images/$product_image");
        
        
        $insert_product="INSERT INTO `products`
        (`product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`)
        VALUES 
 ('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image','$product_keywords')";
      
      $insert_pro  =  mysqli_query( $con,$insert_product);
     if($insert_pro ){
         echo "<script>alert('Product Has been inserted !')</script>";
         echo "<script>window.open('index.php?insert_pro', '_self')</script>";
     }
        else{
            echo "<script>alert('Error !')</script>";
        }
    }// isset
  

 }?>