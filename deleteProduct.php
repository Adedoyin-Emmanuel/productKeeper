<!DOCTYPE html>
<html>
<head>
	<?php require_once 'includes/component.inc.php' ?>
	<title>Delete Product</title>
</head>
<body id="body">


<?php

require_once './controllers/connectionController.controller.php';

#create a new connection model

$connnectionModel3 = new ConnectionModel();


#get the product_id from query string
$product_id_for_deletion =$connnectionModel3->custom_input_sanitizer($_GET["p_d_ID"]);




$data = '<script>

	swal.fire({

		title:"Delete Product?",
		text:"Are you sure you want to delte this product?",
		icon:"warning",

		showCancelButton:true,
		confirmButtonText:"Delete Product",
		cancelButtonText:"Cancel",

		cancelButtonColor:"tomato",
		allowOutsideClick:false,
		allowEscapeKey:false,
		confirmButtonColor:"dodgerblue"


	}).then((willProceed)=>{
		if(willProceed.isConfirmed){
		   	location.href = "productDeletionConfirmation.php?ID='.$product_id_for_deletion.'";
		
		 }else{
			
			location.href = "homePage.php";

		}
	});


	</script>';


	echo $data;


?>

<script>


</script>
</body>
</html>


