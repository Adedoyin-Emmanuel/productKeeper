
<?php
error_reporting(0);
#get the form values from their respective class
$product_name = $_POST['productName'];
$product_description=$_POST['productDesc'];
$product_img=$_FILES['productImg'];

#connection to the database
require_once "conn.inc.php";

#get the controllers
require_once '../controllers/productController.controller.php';

#get the error handler
require_once '../models/errorHandlers.model.php';

#create a new product model
$product = new ProductController($product_name,$product_description,$product_img);

#create a new array to store the errors
$errors = array();
$error_to_user = '';

#create a new error handler

$error_handler = new ErrorHandler();


#check if any args are empty
if($product->args_empty() == true){
	$errors[0]= "*fields must be complete*";
}

#sanitize the inputs
$product->sanitize_user_input();
#check for file errors
$file_success = $product->handle_file();

if($file_success != true AND empty($errors)){
	$errors[0] = $file_success;
	$error_to_user = $errors[0];
	$error_handler->set_error($error_to_user);
	echo $error_handler->error;
	
	die();
	#array_push($errors,$file_success);
}else if($file_success == 0 AND !empty($errors)){
	#do nothing
	$errors[0] =$file_success;
	$error_to_user = $errors[0];
	$error_handler->set_error($error_to_user);
	echo $error_handler->error;

	die();
}


$legit_product_name = $product->get_product_name();
$legit_product_desc = $product->get_product_desc();
$legit_product_img  = $product->get_product_img();



#transfer the file to the permanent location on the server
$file_transfer_status = $product->upload_file_permanent();

#check if there was an error
if($file_transfer_status === false){
	$errors[0] = "*File upload error*";
	$error_to_user = $errors[0]; 
	$error_handler->set_error($error_to_user);
	echo $error_handler->error;
	
	die();
}else{
	
	#since file upload was successful, we can insert the data in our DB

	#insert the properties into the connection model
	if(!empty($legit_product_name) AND !empty($legit_product_desc) AND !empty($legit_product_img)){
			$insert_data = $connectionModel->insert_record($legit_product_name,$legit_product_desc,$legit_product_img);

		if($connectionModel->conn->query($connectionModel->sql) == TRUE){
			echo "*Record inserted successfully*";
			die();
			#redirect the user
		}else{ 	
			echo $insert_data;
			die();
		}
	}else{
		die("*Please fill in necessary fields*");
	}
	
	



}

?>