<?php
$con=mysqli_connect('localhost','root','','ecommerce');
function getIp(){

        $ip = $_SERVER['REMOTE_ADDR'];     
        if($ip){
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            }
            return $ip;
        }
        // There might not be any data
        return false;
    }
function cart(){
    global $con;
  
    if(isset($_GET['add_cart'])){
         $ip =getIp();
       $pro_id =$_GET['add_cart'];
        $check_pro="SELECT * FROM `cart` WHERE product_id='$pro_id' AND ip_address='$ip'";
        $run_pro=mysqli_query($con,$check_pro);
        if(mysqli_num_rows( $run_pro)>0){
            echo"";
        }else{
            $insert_pro="INSERT INTO `cart`(`product_id`, `ip_address`) VALUES ('$pro_id' ,'$ip')";
             $run_pro=mysqli_query($con,$insert_pro);
            echo"<script>window.open('index.php','_self')</script>";
        }
    }
}
function total_items(){
    global $con;
    
    if(isset($_GET['add_cart'])){
      $ip =getIp();
        $insert_item="SELECT * FROM `cart` WHERE ip_address='$ip'";
        $run_pro=mysqli_query($con, $insert_item);
        $count_items=mysqli_num_rows( $run_pro);
    }
    else{
        
         $ip =getIp();
        $insert_item="SELECT * FROM `cart` WHERE ip_address='$ip'";
        $run_pro=mysqli_query($con, $insert_item);
        $count_items=mysqli_num_rows( $run_pro);
    }
    echo $count_items;
    
}
function total_price(){
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
        $values=array_sum( $pro_price);
         $total_price+=$values;
   }
   }  
    
    
        echo "$".$total_price;

}

function getCats(){
   global $con;
  $get_cats='SELECT * FROM `categories` ';
  $run_cats=mysqli_query($con,$get_cats);
  
 while($row_cats=mysqli_fetch_array($run_cats)){
     $cat_id=$row_cats['cat_id'];
     $cat_title=$row_cats['cat_title'];
     echo '<li><a href=index.php?cat='.$cat_id.'>'.$cat_title.'</a></li>';
 }
    
}// end getCats()



function getBrands(){
   global $con;
  $get_brands='SELECT * FROM `brands` ';
  $run_brands=mysqli_query($con,$get_brands);
  
 while($row_brands=mysqli_fetch_array($run_brands)){
     $brand_id=$row_brands['brand_id'];
     $brand_title=$row_brands['brand_title'];
     echo '<li><a href=index.php?brand='.$brand_id.'>'.$brand_title.'</a></li>';
 }
    
}// end getBrands()

?>




















<?php
function getProduct(){
    if(!isset($_GET['cat'])){
        if(!isset($_GET['brand'])){
    global $con;
     $get_pro='SELECT * FROM `products` order by RAND() LIMIT 0,6 ';
     $run_pro=mysqli_query($con,$get_pro);
  
    while($row_pro=mysqli_fetch_array($run_pro)){
        
     $pro_id=$row_pro['product_id'];
     $pro_cat=$row_pro['product_cat'];
     $pro_brand=$row_pro['product_brand'];
        
     $pro_title=$row_pro['product_title'];
     $pro_price=$row_pro['product_price'];
     $pro_image=$row_pro['product_image'];
    
     echo "
     <div id='single_product'>
     <h3>$pro_title</h3>
     <img src='admin_area/product_images/$pro_image' width='180'>
     <h4> price:$pro_price &euro;</h4>
     <a href='details.php?pro_id=$pro_id'>Details</a>
     <a href='index.php?add_cart=$pro_id'><button style='float:left'>ADD to Cart</button></a>
     </div>
     ";   
 }//END WHILE
        
        }//if brand
        }//if cat
}//END getProduct



function getSearchProduct(){
     if(isset($_GET['search'])){
		 $search_query=$_GET['user_query'];
         global $con;
     $get_pro = "SELECT * FROM products where product_keywords like '%$search_query%' "; 

     $run_pro=mysqli_query($con,$get_pro);
  
    while($row_pro=mysqli_fetch_array($run_pro)){
        
     $pro_id=$row_pro['product_id'];
     $pro_cat=$row_pro['product_cat'];
     $pro_brand=$row_pro['product_brand'];
        
     $pro_title=$row_pro['product_title'];
     $pro_price=$row_pro['product_price'];
     $pro_image=$row_pro['product_image'];
    
     echo "
     <div id='single_product'>
     <h3>$pro_title</h3>
     <img src='admin_area/product_images/$pro_image' width='180'>
     <h4>$pro_price &euro;</h4>
     <a href='details.php?pro_id=$pro_id'>Details</a>
     <a href='index.php?id=$pro_id'><button style='float:left'>ADD to Cart</button></a>
     </div>
     ";   
 }//END WHILE
        
        }//if

}//END getSearchProduct




function getAllProduct(){
    if(!isset($_GET['cat'])){
        if(!isset($_GET['brand'])){
    global $con;
     $get_pro='SELECT * FROM `products` ';
     $run_pro=mysqli_query($con,$get_pro);
  
    while($row_pro=mysqli_fetch_array($run_pro)){
        
     $pro_id=$row_pro['product_id'];
     $pro_cat=$row_pro['product_cat'];
     $pro_brand=$row_pro['product_brand'];
        
     $pro_title=$row_pro['product_title'];
     $pro_price=$row_pro['product_price'];
     $pro_image=$row_pro['product_image'];
    
     echo "
     <div id='single_product'>
     <h4>$pro_title</h4>
     <img src='admin_area/product_images/$pro_image' width='180'>
     <h4>price:$pro_price &euro;</h4>
     <a href='details.php?pro_id=$pro_id'>Details</a>
     <a href='index.php?add_cart=$pro_id'><button style='float:left'>ADD to Cart</button></a>
     </div>
     ";   
 }//END WHILE
        
        }//if brand
        }//if cat
}//END getAllProduct






function getCatProduct(){
    if(isset($_GET['cat'])){
      $cat_id =$_GET['cat'];
         global $con;
        
    $get_cat_pro="SELECT * FROM `products` where product_cat= '$cat_id' ";
     $run_cat_pro=mysqli_query($con,$get_cat_pro);
    $count_cats=mysqli_num_rows($run_cat_pro);
      
        if($count_cats==0){
           echo"<h2>There is no products in this category</h2>";
       } 
        
        
        
    while($row_pro=mysqli_fetch_array($run_cat_pro)){
        
    $pro_id=$row_pro['product_id'];
     $pro_cat=$row_pro['product_cat'];
     $pro_brand=$row_pro['product_brand'];
        
     $pro_title=$row_pro['product_title'];
     $pro_price=$row_pro['product_price'];
     $pro_image=$row_pro['product_image'];
    
     echo "
     <div id='single_product'>
     <h3>$pro_title</h3>
     <img src='admin_area/product_images/$pro_image' width='180'>
     <h4>$pro_price &euro;</h4>
     <a href='details.php?pro_id=$pro_id'>Details</a>
     <a href='index.php?id=$pro_id'><button style='float:left'>ADD to Cart</button></a>
     </div>
     ";   
        
        
    }//end while
    }
}//function









function getBrandProduct(){
    if(isset($_GET['brand'])){
      $brand_id =$_GET['brand'];
         global $con;
        
    $get_brand_pro="SELECT * FROM `products` where product_brand= '$brand_id' ";
     $run_brand_pro=mysqli_query($con,$get_brand_pro);
   
        
        $count_brands=mysqli_num_rows($run_brand_pro);
      
        if($count_brands==0){
           echo"<h2>There is no products in this Brand</h2>";
       } 
        
        
    while($row_pro=mysqli_fetch_array($run_brand_pro)){
        
    $pro_id=$row_pro['product_id'];
     $pro_cat=$row_pro['product_cat'];
     $pro_brand=$row_pro['product_brand'];
        
     $pro_title=$row_pro['product_title'];
     $pro_price=$row_pro['product_price'];
     $pro_image=$row_pro['product_image'];
    
     echo "
     <div id='single_product'>
     <h3>$pro_title</h3>
     <img src='admin_area/product_images/$pro_image' width='180'>
     <h4>$pro_price &euro;</h4>
     <a href='details.php?pro_id=$pro_id'>Details</a>
     <a href='index.php?id=$pro_id'><button style='float:left'>ADD to Cart</button></a>
     </div>
     ";   
        
        
    }//end while
    }
}//function

?>