<!DOCTYPE html>
<html>
<head>
	<?php require_once "includes/component.inc.php";?>
	<title>Add New Product</title>
	<?php require_once "includes/style.inc.php"?>
	<script src="includes/processForm.inc.js"></script>
</head>
<body class="container-fluid p-0">
	
	<div class="container-lg ">

		<h3 class="fs-3 text-capitalize py-5">Add new product</h3>
		<div>

		<button class="btn btn-secondary text-capitalize fw-2 my-3"><a href="index.php" class="text-decoration-none text-light " >&lt;&lt; back</a></button>
	</div>
		<form class="form p-5 bg-dark rounded-3 shadow-lg m-auto" method="post" action="" id="form" autocomplete="off">
			<h4 class="fs-4 text-center text-capitalize py-2">add product</h4>
			<div class="text-light fw-2 text-center d-flex align-items-center justify-content-center m-auto rounded-3 p-2" id="error_alert" style="background: tomato;">
				<!-- *This is an error message* -->
			</div>
			<div class="form-group my-4">
				<label for="productName" class="text-capitalize py-2">product name</label>
				<input type="text" name="productName" class="form-control text-light text-capitalize" id="productName" placeholder="Enter product name" autocomplete="off" />
			</div>

			<div class="form-group my-4">
				<label for="productDescription" class="text-capitalize py-2">product description</label>
				<input name="productDesc" class="form-control text-light text-start text-capitalize" style="background:#343a40;" id="productDesc"  placeholder="Enter product description." autocomplete="off"/>
				
			</div>

			<div class="form-group my-4">
				<label for="productPicture" class="text-capitalize py-2">product picture</label>
				<input type="file" name="productImg" class="form-control text-light" style="background: #343a40;" id="productImg"required>
			</div>

			<div class="form-group my-2">
				
					<button class="btn btn-primary text-center text-capitalize" name="submit" id="submit">
					<span class="spinner-border spinner-border-sm  bg-primary d-none" id="spinner"></span>	
					add product
					</button>
				

			</div>
		</form>	
	</div> 

	<?php require_once "includes/footer.inc.php"?>
</body>
</html>