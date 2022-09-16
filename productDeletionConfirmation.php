<?php


require_once './controllers/connectionController.controller.php';

$connectionModel4 = new ConnectionModel();




$legit_id = mysqli_real_escape_string($connectionModel4->conn,htmlspecialchars($_GET["ID"]));


$deletion_result = $connectionModel4->delete_product($legit_id);

if($deletion_result == true){
	#echo 'product failed to delete'.$deletion_result;
	session_destroy();
	unset($_SESSION["data_id"]);
	echo '<script>

		location.href = "homePage.php";

	</script>';
}else{
	echo '<script>

			location.href = "index.php";
		

		</script>';
}

?>