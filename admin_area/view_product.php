<form action="" method="post">
    <table  width="795"  bgcolor="pink">
       
        <tr align="center">
            <th>S.N</th>
            <th>Title</th>
            <th>Image</th>
            <th>Price</th>
            <th>Edit</th>
            <th>Delete</th>     
        </tr>
        <?php
        include 'includes/db.php';
         $get_pro='SELECT * FROM `products` ';
     $run_pro=mysqli_query($con,$get_pro);
  $i=0;
    while($row_pro=mysqli_fetch_array($run_pro)){
        $pro_id=$row_pro['product_id'];
        $pro_title=$row_pro['product_title'];
     $pro_price=$row_pro['product_price'];
     $pro_image=$row_pro['product_image'];
      $i++;
        ?>
        
        <tr align="center">
            <td><?= $i?></td>
            <td><?= $pro_title ?></td>
            <td><img src="product_images/<?= $pro_image?>" width='60' height="60"></td>
            <td><?=  $pro_price?></td>
            <td><a href="index.php?edit_pro=<?=  $pro_id?>">Edit</a></td>
            <td><a href="index.php?delete_pro=<?=  $pro_id?>">Delete</a></td>
        </tr>
        <?php } ?>
    </table>
</form>

