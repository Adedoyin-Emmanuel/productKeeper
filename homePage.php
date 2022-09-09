
<!DOCTYPE html>
<html>
<head>
	<?php require_once "includes/component.inc.php"?>

	<?php require_once "includes/style.inc.php"?>
	<script src="includes/searchDbase.inc.js"></script>
	<title>Product Application</title>
</head>

<body class="container-fluid p-0" id="body">
		<?php require_once "includes/logo.inc.php";?>
	<div class="container-lg p-3 form">
		
			<h3 class="fs-2 py-4 text-danger text-center my-4" id="allProduct">All Products</h3>
			<!-- add new product button -->
	<!-- <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">show modal</button> -->
				<!-- <div class="add_new_product my-2 m-auto" title="Add a new product">
				<button class="btn btn-sm btn-secondary text-capitalize text-center rounded-3"><a href="addProduct.php" class="text-decoration-none text-light text-capitalize"><span class="fs-5">	&#43; </span></a></button>
				</div>
 -->
			<!-- The Modal -->
				<div class="modal fade " id="myModal">
				  <div class="modal-dialog ">
				    <div class="modal-content bg-dark">

				      <!-- Modal Header -->
				      <div class="modal-header">
				        <h4 class="modal-title">Modal Heading</h4>
				        <span type="button btn btn-light fs-4" class="close" data-bs-dismiss="modal">&times;</span>
				      </div>

				      <!-- Modal body -->
				      <div class="modal-body">
				        Welcome comrade 🐸
				      </div>

				      <!-- Modal footer -->
				      <div class="modal-footer">
				        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
				      </div>

				    </div>
				  </div>
				</div>
		<!-- end of modal class -->
			<div class="all-products  m-auto" id="product_table">
				<div class="alert alert-danger text-center text-capitalize my-3 d-none">no
				products available 😢</div>

		
						<div class="search_products my-4 ">
					<form class="" method="post" action="" id="form">
						<input type="text" name="searchProduct" class="form-control bg-dark text-light rounded-3 p-3 " placeholder="Search for a product.. " id="searchProduct">
					</form>

					<div class="product_search_data my-4" id="product_search_data">
							
							<!-- create the products search template -->
					

						<!-- end of search product template -->
					</div>
				</div>

				<!-- create the products template -->
				<div class="product_container container-lg my-">

		
					<div class="product_1 bg-dark text-light rounded-3 shadow-sm p-2">
						<!-- product image and text -->
						<div class="product_image d-flex flex-row flex-wrap justify-items-around align-items-center">
							<img src="rocket_3.jpg" class="rounded-circle" width="40" height="40">
								<!-- product text -->
							<div class="product_test text-capitalize m-auto ">
								<p class="text-capitalize m-auto text-center">peanut burger</p>
							</div>

								<div class="time_added d-flex">
									<p class="d-block p-2">14-09-2022</p>
								</div>


							
				
						</div>

					
					</div>
				</div>

							<!-- create the products template -->
				<div class="product_container container-lg my-2">

					<div class="product_1 bg-dark text-light rounded-3 shadow-sm p-2">
						<!-- product image and text -->
						<div class="product_image d-flex flex-row flex-wrap justify-items-around align-items-center">
							<img src="rocket_3.jpg" class="rounded-circle" width="40" height="40">
								<!-- product text -->
							<div class="product_test text-capitalize m-auto ">
								<p class="text-capitalize m-auto text-center">peanut burger</p>
							</div>

								<div class="time_added d-flex">
									<p class="d-block p-2">14-09-2022</p>
								</div>


							
				
						</div>

					
					</div>
				</div>

					
							<!-- create the products template -->
				<div class="product_container container-lg my-2">

					<div class="product_1 bg-dark text-light rounded-3 shadow-sm p-2">
						<!-- product image and text -->
						<div class="product_image d-flex flex-row flex-wrap justify-items-around align-items-center">
							<img src="rocket_3.jpg" class="rounded-circle" width="40" height="40">
								<!-- product text -->
							<div class="product_test text-capitalize m-auto ">
								<p class="text-capitalize m-auto text-center">peanut burger</p>
							</div>

								<div class="time_added d-flex">
									<p class="d-block p-2">14-09-2022</p>
								</div>


				
						</div>

					
					</div>
				</div>

				<!-- end of products  -->
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


