
<?php
include 'includes/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
   <?php
    if(isset($_GET['edit_pro'])){
        $pro_id=$_GET['edit_pro'];
          $get_pro="SELECT * FROM `products` WHERE product_id='$pro_id'";
     $run_pro=mysqli_query($con,$get_pro);
  
$row_pro=mysqli_fetch_array($run_pro);
        
    
     $pro_cat=$row_pro['product_cat'];
     $pro_brand=$row_pro['product_brand'];
        
     $pro_title=$row_pro['product_title'];
     $pro_price=$row_pro['product_price'];
     $pro_image=$row_pro['product_image'];
     $pro_desc=$row_pro['product_desc'];
     $pro_key=$row_pro['product_keywords'];
    
   
       $select_cat="select * from categories where cat_id='$pro_cat'";
        $run_cat=mysqli_query($con, $select_cat);
        $row=mysqli_fetch_array( $run_cat);
        $pro_cat=$row['cat_title'];
       $select_brand="select * from brands where brand_id='$pro_brand'";
        $run_brand=mysqli_query($con, $select_brand);
        $row=mysqli_fetch_array( $run_brand);
        $pro_brand=$row['brand_title'];
     }
    ?>
    <form action="" method="Post" enctype="multipart/form-data">
			<table align="center" bgcolor="skyblue">
			
				<h2 align="center">Update Product  </h2>
			
            
             <tr>
            <th align="center">Product Title : </th>
	<td><input type="text" name='product_title' size="20" value="<?= $pro_title ?>" required/></td>
			</tr>
          
           
            <tr>
            <th align="center">Product Category : </th>
	<td><select  name="product_cat"  required >
            	<option><?= $pro_cat ?></option>
            	
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
            	<option><?= $pro_brand ?></option>
            	
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
			<td><input type="file" name='product_image' ><img src="product_images/<?= $pro_image?>" width='60' height='60' required /></td>
			</tr>
            
            <tr>
            <th align="center">Product Price : </th>
			<td><input type="text" name='product_price' value="<?= $pro_price ?>" required /></td>
			</tr>
            
            <tr>
            <th align="center">Product Description : </th>
	<td><textarea cols="80" rows="6" name="product_desc"> <?= $pro_desc?></textarea> </td>
			</tr>
            
            <tr>
            <th align="center">Product KeyWords : </th>
	<td><input type="text" name='product_keywords' size='20' value="<?= $pro_key?>" required /></td>
			</tr>
          
          

            <tr>
<td colspan="2"><input type="submit" name='update_product' value="UPdate Product"/></td>
			</tr>
 
        </table>
    </form>
    
    <?php
    if(isset($_POST['update_product'])){
       // $proo_id=$pro_id;
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
        $update_pro="update products set product_title=' $product_title',product_cat='$product_cat',product_brand='$product_brand',product_price='$product_price',product_desc='$product_desc',
       product_keywords='$product_keywords',product_image='$product_image' where product_id='$pro_id'";
        $run_prod=mysqli_query($con,$update_pro);
       if($run_prod){
           echo"<script>alert('table updated successfully')</script>";
           echo"<script>window.open('index.php?view_pro','_self')</script>";
       }
        
    
        
    }// isset
    ?>
</body>
</html>