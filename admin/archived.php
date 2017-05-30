<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/afghanbazar/core/init.php');
if(!is_logged_in()){
  loggin_error_redirect();
}

include('includes/head.php');
include('includes/navigation.php');



//restore product
if(isset($_GET['restore'])){
  $id = sanitize($_GET['restore']);
  $db->query("UPDATE products SET deleted = 0 WHERE id = '$id'");
  header('location: archived.php');

}
$pResults= $db->query("SELECT * FROM producst WHERE deleted = 1 ORDER BY title");
?>
<h2 class="text-center"> Archived Products</h2><hr>
<table class="table table-condensed table-striped table-bordered">
  <thead><th></th><th>Prodcut</th><th>Price</th><th>Category</th><th>Sold</th></thead>
  <tbody
    <?php while ($product = mysqli_fetch_assoc($pResults)):
     $child_id=$product['categories'];
     $childQuery=$db->query("SELECT * FROM categories WHERE id = '$child_id'");
     $child=mysqli_fetch_assoc($childQuery);
     $parent_id= $child['parent'];
     $parentQuery=$db->query("SELECT * FROM categories WHERE id = '$parent_id'");
     $parent=mysqli_fetch_assoc($parentQuery);
?>

<tr>

 <td>
  <a href="archived.php?restore=<?php echo $product['id']; ?>" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-repeat"></span></a>
 </td> <!-EDIT OR REMOVE ->

 <td><?php echo $product['title']; ?></td> <!-- TITLE -->

 <td><?php echo money($product['price']); ?></td> <!-- PRICE -->

 <td><?php echo $category; ?></td> <!-- Categories -->

 <td><a href="products.php?featured=<?php echo (($product['featured'] == 0)?'1':'0'); ?>&id=<?php echo $product['id']; ?>" class="btn btn-xs btn-<?php echo (($product['featured'] == 1)?'warning':'success'); ?>">
 <span class="glyphicon glyphicon-<?php echo (($product['featured'] == 1)?'minus':'plus'); ?>"></span>
 </a>&nbsp; <?php echo (($product['featured'] == 1)?'Remove Featured':'Add Featured'); ?></td> <!-- FEATURED PRODUCT -->

 <td>0</td> <!-- SOLD -->
</tr>
<?php endwhile ; ?>
</tbody>

</table>


<?php include 'includes/footer.php'; ?>
