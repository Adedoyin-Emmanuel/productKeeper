<?php

#get the form values from their respective class
$product_name = $_POST['productName'];
$product_description=$_POST['productDesc'];
$product_img=$_FILES['productImg'];

#connection to the database
require_once "conn.inc.php";
#get the controllers
require_once '../controllers/productController.controller.php';

#create a new product model
$product = new Product($product_name,$product_description,$product_img);

#create a new array to store the errors
$errors = array();
$error_to_user = '';

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
	echo $error_to_user;
	die();
	#array_push($errors,$file_success);
}else if($file_success == 0 AND !empty($errors)){
	#do nothing
	$errors[0] =$file_success;
	$error_to_user = $errors[0];
	echo $error_to_user;

	die();
}


$legit_product_name = $product->get_product_name();
$legit_product_desc = $product->get_product_desc();
$legit_product_img  = $product->get_product_img();



#transfer the file to the permanent location on the server
$file_transfer_status = $product->upload_file_permanent();

#check if there was an error
if(!$file_transfer_status){
	$errors[0] = "An error occured with file upload";
	$error_to_user = $errors[0];
	echo $error_to_user;

	die();
}else{
	echo "file upload successful";
	#since file upload was successful, we can insert the data in our DB

	#insert the properties into the connection mode
	$connectionModel->insert_record($legit_product_name,$legit_product_desc,$legit_product_img);

}

?>