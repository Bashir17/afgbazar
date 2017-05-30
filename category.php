<?php require_once'core/init.php';
      include 'includes/head.php';
      include 'includes/navigation.php';
     include  'includes/headerpartial.php';
     include 'includes/leftsidebar.php';
     include 'includes/rightbar.php';

if(isset($_GET['cat'])){
	$cat_id = sanitize($_GET['cat']);
}else{
	$cat_id = '';
}

$sql = "SELECT * FROM products WHERE categories = '$cat_id'";
$productQ = mysqli_query($db, $sql);
 $category = get_category($cat_id);

?>

		<!-- main content -->
		<div class="col-md-8">
			<div class="row">
				<h2 class="text-center"> <?=$category['parent'].''. $category['child'];?></h2>
				<?php while($row = mysqli_fetch_assoc($productQ)) : ?>
				<div class="col-md-3">
					<h4><?php echo $row['title']; ?></h4>
					<img src="<?php echo $row['image']; ?>" alt="Levis Jeans" class="img-thumb"/>
					<!-- All these classes so we can target later -->
					<p class="list-price text-danger">List Price: <s>AFN<?php echo $row['list_price']; ?></s></p>
					<p class="price">Our Price: AFN<?php echo $row['price']; ?></p>
					<button type="button" class="btn btn-sm btn-success" onclick="detailsModal(<?php echo $row['id']; ?>)">Details</button>
				</div>
			<?php endwhile; ?>
			</div>
		</div>


<?php include('includes/footer.php'); ?>
