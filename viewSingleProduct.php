<!DOCTYPE html>
<html>
<head>
	<?php require_once "includes/component.inc.php";?>

	<?php require_once "includes/style.inc.php";?>
	

	<!-- inject the script -->
	
	<title>View Product</title>
</head>

<body class="p-0 " id="body">
<?php require_once "includes/logo.inc.php";?>
<!-- container div bootstrap class -->
	<div class="container-fluid d-flex">
		

		<div class="container-lg m-auto my-1" id="main_container">
		

		<div class="alert bg-dark text-danger text-center text-capitalize form m-auto my-3 d-none" id="error_msg">

				<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-wifi-off" viewBox="0 0 16 16">
								  <path d="M10.706 3.294A12.545 12.545 0 0 0 8 3C5.259 3 2.723 3.882.663 5.379a.485.485 0 0 0-.048.736.518.518 0 0 0 .668.05A11.448 11.448 0 0 1 8 4c.63 0 1.249.05 1.852.148l.854-.854zM8 6c-1.905 0-3.68.56-5.166 1.526a.48.48 0 0 0-.063.745.525.525 0 0 0 .652.065 8.448 8.448 0 0 1 3.51-1.27L8 6zm2.596 1.404.785-.785c.63.24 1.227.545 1.785.907a.482.482 0 0 1 .063.745.525.525 0 0 1-.652.065 8.462 8.462 0 0 0-1.98-.932zM8 10l.933-.933a6.455 6.455 0 0 1 2.013.637c.285.145.326.524.1.75l-.015.015a.532.532 0 0 1-.611.09A5.478 5.478 0 0 0 8 10zm4.905-4.905.747-.747c.59.3 1.153.645 1.685 1.03a.485.485 0 0 1 .047.737.518.518 0 0 1-.668.05 11.493 11.493 0 0 0-1.811-1.07zM9.02 11.78c.238.14.236.464.04.66l-.707.706a.5.5 0 0 1-.707 0l-.707-.707c-.195-.195-.197-.518.04-.66A1.99 1.99 0 0 1 8 11.5c.374 0 .723.102 1.021.28zm4.355-9.905a.53.53 0 0 1 .75.75l-10.75 10.75a.53.53 0 0 1-.75-.75l10.75-10.75z"/>
								</svg>
			an error occured

		</div>


	<?php
	
	require_once './controllers/connectionController.controller.php';

	extract($_GET);

	$product_id = @htmlspecialchars($_GET["p_ID"]);


	if(isset($product_id)){
		$_SESSION["product_ID"] = $product_id;	


	}else{
		echo '<script>location.href="homePage.php";</script>';

	}



	#create a new connection mode;
	$connectionModel2= new ConnectionModel();


	#get the product information
	$retrive_data =@$connectionModel2->fetch_records_using_id($_SESSION["product_ID"]);




	#check for errors
	if($retrive_data == "Server returned 0 result" OR $data_to_user == "args can't be empty"){
			die();
	}else{

		
		if($connectionModel2->record_result->num_rows > 0){
			while ($rows = $connectionModel2->record_result->fetch_assoc()) {
				$product_desc = $rows["product_desc"];

				$data ='

							
			<div class="container-lg single_product_container m-auto bg-dark py-5 rounded-3 shadow form ">
				<div class="back_btn">
					<button class="btn btn-secondary text-center text-capitalize"><a href="homePage.php" class="text-decoration-none text-light">&lt;&lt; back</a></button>
				</div>
				<div class="product_image m-auto d-flex justify-content-center align-items-center">
					<img src="images/'.$rows["product_img"].'" class="rounded-circle my-4" width="120" height="120">
				</div>

				<div class="product_name">
					<h4 class="fs-4 text-capitalize text-center">'.$rows["product_name"].'</h4>
				</div>


				<div class="actions d-flex flex-row align-items-center justify-content-around my-4">
					
				
					<a href="editProduct.php?p_e_ID='.$rows["ID"].' "class="text-decoration-none d-block text-light">
						<div class="action_update">
						<span style="font-weight:600;">

							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
							  <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
							</svg>
						</span>
							<span class="little_text text-capitalize text-center">edit</span>
						</div>
					</a>

				
					<a href="deleteProduct.php?p_d_ID='.$rows["ID"].'" class="text-decoration-none d-block text-danger">
								<div class="action_update">
											<span>


											<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
											  <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
											</svg>

											</span>
									<span class="little_text text-capitalize text-center text-danger">delete</span>
						</div>
					</a>


				</div>




				<div class="product_description">


				<section class="text-capitalize p-2 text-center my-1" style="font-size: 0.9rem;">
						
					'.$rows["product_desc"].'

				</section>

				<span class="date_added py-2 d-block px-3 text-info" style="font-weight: 500; font-size: 0.9rem;">Date-Added:<span class="text-light" style="font-size:0.85rem;">'.$rows["date_added"].'</span>
				</span>

				</div>





			</div>

				';

			echo $data;


			// echo '<script>


			// 	$(docment).ready(($)=>{

			// 		//get the container
			// 		$("#main_container").innerHTML = '.$data.'";
			// 	});	


			// </script>';
			}
		}else{
			die("no records found");
		}
	}

?>
	

	</div>



	</div>

</body>

</html>
