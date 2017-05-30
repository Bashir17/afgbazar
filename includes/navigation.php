<?php

$sql = "SELECT * FROM categories WHERE parent = 0";
$parent_query = mysqli_query($db, $sql);

// We dont need the IF statement this works as it is because we queried for categories WHERE the parent_id = 0

?>

<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<a href="index.php" class="navbar-brand">AFGHAN BAZAR</a>
			<ul class="nav navbar-nav">
				<?php while($row = mysqli_fetch_assoc($parent_query)) : ?>
				<?php
					$parent_id = $row['id'];
					$sql2 = "SELECT * FROM categories WHERE parent = '" . $parent_id . "' ";
					$child_query = mysqli_query($db, $sql2);
				?>

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $row['category']; ?><span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<?php while($child = mysqli_fetch_assoc($child_query)) : ?>
						<li><a href="category.php?cat=<?=$child['id'];?>"><?php echo $child['category']; ?></a></li>
					<?php endwhile; ?>
					</ul>
				</li>
				<?php endwhile; ?>
			</ul>
		</div>
	</nav>
