<!DOCTYPE html>
<html>
<head>
	<?php require_once "includes/component.inc.php";?>

	<title>Edit Product</title>
	<?php require_once "includes/style.inc.php"?>
	<script src="includes/processFormEdit.inc.js"></script>
</head>
<body class="container-fluid p-0">

	<?php
		error_reporting(0);
		extract($_GET);
		require_once 'controllers/connectionController.controller.php';
		#create a new connection model 
		$connectionModel = new ConnectionModel();
		$data_id = $connectionModel->custom_input_sanitizer($_GET["p_e_ID"]);

		if(isset($data_id)){
			session_start();
			$_SESSION['data_id'] = $data_id;


		

		}else{
			echo '<script>location.href="homePage.php"; </script>';
		}



		#prepare to get data from Dbase

		$get_data_result = $connectionModel->fetch_records_using_id($_SESSION["data_id"]);

		if(!empty($get_data_result)){
			die("an error occured ".$connectionModel->conn->error);
		}else{
			if($connectionModel->record_result->num_rows > 0){
				$row = $connectionModel->record_result->fetch_assoc();


				#get the data from the row 
				$product_id   = $row["ID"];
				$product_name = $row["product_name"];
				$product_desc = $row["product_desc"];
				$product_img  = $row["product_img"];
				$date_added   = $row["date_added"];




			}else{
				die("server returned 0 result");
			}
		}

		

	?>
		<div  id="spinner" class="">

			<div class="dot-pulse text-danger"></div>

		</div>

	<?php require_once "includes/logo.inc.php"; ?>
	<div class="container-lg form">

		<h3 class="fs-3 text-capitalize py-5 mx-2 text-danger" id="addNewProduct">Edit product</h3>
		<div>

		<button class="btn btn-secondary text-capitalize fw-2 my-3"><a href="homePage.php" class="text-decoration-none text-light " >&lt;&lt; back</a></button>
	</div>
		<form class=" p-5 bg-dark rounded-3  m-auto" method="post" action="" id="form" autocomplete="off" enctype="multipart/form-data">
			<h4 class="fs-4 text-center text-capitalize py-2">edit product ⚡</h4>
			<div class="text-light fw-2 text-center d-flex align-items-center justify-content-center m-auto rounded-3 p-2 d-none" id="error_alert" style="background: tomato; ">
				<!-- *This is an error message* -->
			</div>
			<div class="form-group my-4">
				<label for="productName" class="text-capitalize py-2">product name</label>
				<input type="text" name="productName" class="form-control text-light text-capitalize rounded-3" value="<?php echo $product_name?>" id="productName" placeholder="Enter new product name" autocomplete="off" required />
			</div>

			<div class="form-group my-4">
				<label for="productDescription" class="text-capitalize py-2">product description</label>
				<input type="text" name="productDesc" class="form-control text-light text-start text-capitalize" style="background:#343a40;" id="productDesc" value="<?php echo $product_desc?>"  placeholder="Enter new product description." autocomplete="off" required />
				
			</div>

			<div class="form-group my-4">
				<label for="productPicture" class="text-capitalize py-2">product picture</label>
				<input type="file" name="productImg" class="form-control text-light" style="background: #343a40;" id="productImg" value="" required>
			</div>

			<input type="text" name="product_id" hidden value="<?php echo $_SESSION['data_id']?>">

			<div class="form-group my-2">
				
					<button class="btn btn-primary text-center text-capitalize" name="submit" id="submit">
					<span class="spinner-border spinner-border-sm  bg-primary d-none" id="spinner"></span>	
					Save changes!
					</button>
				

			</div>
		</form>	
	</div> 

	<?php require_once "includes/footer.inc.php"?>
</body>
</html>