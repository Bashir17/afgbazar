<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<a href="/afghanbazar/admin/index.php" class="navbar-brand">AFGHAN BAZAR</a>
			<ul class="nav navbar-nav">
				<li><a href="brands.php">Brands</a></li>
				<li><a href="categories.php">Categories</a></li>
				<li><a href="products.php">Products</a></li>
				<li><a href="archived.php">archived</a></li>
				<?php if(has_permission('admin')) : ?>
				<li><a href ="users.php">Users</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Hello<?= $user_data['first'];?></a>!
					<span class="caret"></span>
					<ul class="dropdown-menu" role="menu">
						<li><a href="change_password.php">Change Password</a></li>
						<li><a href="logout.php">Log Out</a></li>


					</ul>
				</li>

			<?php endif; ?>
			</ul>
		</div>
	</nav>
