<!DOCTYPE html>
<html>
<head>
	<?php require_once "includes/component.inc.php"?>
	<title>Product Application</title>
</head>
<body class="container-fluid p-0">
	<div class="container-lg p-3">
			<h3 class="fs-3 py-3">All Products</h3>
			<div class="all-products" id="product_table">
				<div class="alert alert-danger text-center text-capitalize">no products available</div>
			</div>

			<!-- add new product  -->
			<div class="add_new_product">
				<button class="btn btn-primary text-capitalize text-center"><a href="addProduct.php" class="text-decoration-none text-light text-capitalize">add new product</a></button>
			</div>
	</div>
	<?php require_once "includes/footer.inc.php"?>
</body>
</html>