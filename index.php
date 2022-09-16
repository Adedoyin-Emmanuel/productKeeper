
<!DOCTYPE html>
<html>
<head>
	<?php require_once "includes/component.inc.php"?>

	<?php require_once "includes/style.inc.php"?>
	<?php require_once "includes/style.inc.php"?>



	<script src="includes/searchDbase.inc.js"></script>
	<script src="includes/manageSpinner.inc.js"></script>
	<title>ProKeep</title>
</head>

<body class="container-fluid p-0 d-flex align-items-center justify-content-center m-auto flex-column" id="body">

	<h4 class="text-capitalize text-center my-5 p-5">welcome to prokeep</h4>
	<div class="splash_screen my-4 d-flex align-items-center p-3 justify-content-center" >
	<div class="dot-pulse text-danger d-none" id="pulseSpinner">
		
	</div>
		<img src="shopCart.png" class="img-fluid" height="60" width="60" id="cartImg">

	</div>
	<button class="text-capitalize text-center btn btn-danger my-5 " id="getStarted">
		<span class="spinner-border spinner-border-sm d-none" id="btnSpinner"></span>
	get started</button>

</body>
</html>
<?php 





?>