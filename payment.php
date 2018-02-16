<?php 
include 'includes/db.php';
 
    $total_price=0;
     $ip =getIp();
    $query="SELECT * FROM `cart` WHERE ip_address='$ip'";
    $run_proo=mysqli_query($con, $query );
    while($row=mysqli_fetch_assoc($run_proo)){
        
        $pro_id=$row['product_id'];
    $check_pro="SELECT * FROM `products` WHERE product_id='$pro_id'";
     $run_pro=mysqli_query($con,$check_pro);
    while($row_pro=mysqli_fetch_assoc($run_pro)){
        $pro_name=$row_pro['product_title'];
         $pro_price=array($row_pro['product_price']);
        $values=array_sum( $pro_price);
         $total_price+=$values;
   }
   }  
    
 ?>
  <div>
      <h2 align="center">Pay with Paypal</h2>
     <!-- <p  style="text-align:center;"><img src="images/Paypal.jpg" width="300" height="150"></p>-->
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">

  <!-- Identify your business so that you can collect the payments. -->
  <input type="hidden" name="business" value="">

  <!-- Specify a Buy Now button. -->
  <input type="hidden" name="cmd" value="_xclick">

  <!-- Specify details about the item that buyers will purchase. -->
  <input type="hidden" name="item_name" value="<?= $pro_name?>">
  <input type="hidden" name="amount" value="<?= $pro_price?>">
  <input type="hidden" name="currency_code" value="USD">
   <input type="hidden" name="return" value="https://shopping-on-line.000webhostapp.com/store">
  
  

  <!-- Display the payment button. -->
  <p  style="text-align:center;"><input type="image" name="submit" border="0"
  src="images/pay2.jpg" 
                                        alt="Buy Now"></p>
  <img alt="" border="0" width="1" height="1"
  src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

</form>
  </div>

      
      
  