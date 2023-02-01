
<!DOCTYPE html>
<html>
<head>
	<?php require_once "includes/component.inc.php"?>

	<?php require_once "includes/style.inc.php"?>
	<script src="includes/searchDbase.inc.js"></script>

	<!-- inject the scripts -->
	<script src="includes/getAllProduct.inc.js"></script>
	
	<title>ProKeep</title>


</head>

<body class="container-fluid p-0" id="body">

	<div  id="spinner" class="">
		<div class="dot-pulse text-danger"></div>

	</div>
		<?php require_once "includes/logo.inc.php";?>

	<div class="container-lg p-3 form ">
		
			<h3 class="fs-2 py-4 text-danger text-center my-4" id="allProduct">All Products</h3>


			<div class="all-products  m-auto" id="product_table">
				<div class="alert   text-center text-capitalize my-3 text-warning d-none" style="border: none" id="warning_alert">no
				products available </div>

		
				<div class="search_products my-4 ">
					<form class="" method="post" action="" id="form" autocomplete="off">
						<input type="text" name="searchProduct" class="form-control bg-dark text-light rounded-3 p-3 " placeholder="Search for a product.. " id="searchProduct" autocomplete="off">
					</form>

					
				</div>

				<div class="container-lg  m-auto d-flex  flex-column justify-content-center product_search_data my-4" id="product_search_data">
							
						<!-- create the products search template -->
					
								<!-- data is populated here accoring to the search from the user. -->

						<!-- end of search product template -->
					</div>
				<!-- create the products template -->
				<div class="product_container container-lg" id="all_product_container">

						<!-- data is fetched from the dabase using AJAX -->
				<!-- end of products  -->

					<div  id="loader" class="d-flex justify-content-center align-items-center text-danger"> 
						<div class="dot-pulse text-danger"></div>

					</div>
			</div>
		</div>
			<!-- add new product  -->
			<div class="add_new_product my-4 m-auto " title="Add a new product">
				<button class="btn btn-sm btn-danger text-capitalize text-center rounded-circle" id="addProductBtn"><a href="addProduct.php" class="text-decoration-none text-light text-capitalize"><span class="fs-3 text-light ">&#43;</span></a></button>
			</div>
	</div>
	<?php require_once "includes/footer.inc.php"?>

	<script>
		
		$(document).ready(($)=>{
			$("#demo").click(()=>{
				$("#myModal").modal({backdrop:true});
			});
		});

	</script>
</body>
</html>


