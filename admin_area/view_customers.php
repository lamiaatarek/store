<?php

if(!isset($_SESSION['admin_email'])){
    echo"<script>window.open('login.php?not_admin=you are not admin','_self')</script>";
}else{
?>
   

   <form action="" method="post">
    <table  width="795"  bgcolor="pink">
       
        <tr align="center">
           <th>Customer Name</th>
            <th>Customer image</th>
            <th>Customer Email</th>
          
            <th>Delete</th>  
               
        </tr>
        <?php
        include 'includes/db.php';
         $get_pro='SELECT * FROM `customers` ';
     $run_pro=mysqli_query($con,$get_pro);
  
    while($row_pro=mysqli_fetch_array($run_pro)){
        $c_id=$row_pro['customer_id'];
        $c_name=$row_pro['customer_name'];
          $c_img=$row_pro['customer_image'];
          $c_email=$row_pro['customer_email'];
    
        ?>
        
        <tr align="center">
            
            <td><?=   $c_name?></td>
           
            <td><img src="../customer/customer_images/<?= $c_img?> " width="60" height="60"> </td>
            <td><?= $c_email?></td>
            <td><a href="index.php?delete_c=<?=  $c_id?>">Delete</a></td>

        </tr>
        <?php } ?>
    </table>
</form>
<?php } ?>