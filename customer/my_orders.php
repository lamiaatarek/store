
      <div id="products">
          <form action="" method="Post" enctype="multipart/form-data">
			<table align="center" width="700" border="2" bgcolor="orange">
			
			<tr align="center">
				<th>Remove</th>
				<th>Products</th>
				<th>Quantity</th>
				<th>Total Price</th>
			</tr>
            <?php
                 global $con;
    $total_price=0;
     $ip =getIp();
    $query="SELECT * FROM `cart` WHERE ip_address='$ip'";
    $run_proo=mysqli_query($con, $query );
    while($row=mysqli_fetch_assoc($run_proo)){
        
        $pro_id=$row['product_id'];
    $check_pro="SELECT * FROM `products` WHERE product_id='$pro_id'";
     $run_pro=mysqli_query($con,$check_pro);
    while($row_pro=mysqli_fetch_assoc($run_pro)){
         $pro_price=array($row_pro['product_price']);
        $pro_img=$row_pro['product_image'];
        $pro_title=$row_pro['product_title'];
        $single_price=$row_pro['product_price'];
        $values=array_sum( $pro_price);
         $total_price+=$values;
        
                ?>
                <tr align="center">
                    <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id;?>"></td>
                    <td><?php echo $pro_title;?>
                        <br>
                      <?php echo "<img src='../admin_area/product_images/$pro_img' width=50 height=50>";?></td>
                    <td><input type="text" size="4" name="qty" ></td>
                  <?php
                    /*if(isset($_POST['update_cart'])){
                      $qty  =$_POST['qty'];
                        $update_qty="update cart set quantity='$qty'";
                        $run_qty=mysqli_query($con,$update_qty);
                   $_SESSION['qty']=$qty;
                    
                    }*/
                    ?>
                   <td><?= $single_price?></td>
                </tr>
               <?php  }
   } ?> 
             <tr align="center" >
                <td><input type="submit" name="update_cart" value="update cart"></td>
                <td><input type="submit" name="continue" value="continue shopping"></td>
              
                <td><button><a href="checkout.php">checkout</a></button></td>
                 
             </tr>
              </table>
          </form>