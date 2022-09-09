<?php

require_once "conn.inc.php";
//get the request data from the url

extract($_GET);

$user_input =@$q;

#sanitize the user inputs using the connection model sanitize method
$legit_data =@mysqli_real_escape_string($connectionModel->conn,$connectionModel->custom_input_sanitizer($user_input));


#fetch all the dbase records
$data_to_user = @$connectionModel->fetch_records_using_search($legit_data);

#ecode the data as a javascript object
if($data_to_user == "Server returned 0 result" OR $data_to_user == "args can't be empty"){
	echo "nonesense data";
}else{


	// foreach ($data_to_user as $data => $val) {

	// 	echo json_encode($data_to_user[$data]);
		
	// }

	// for ($i=0; $i < count($data_to_user); $i++) { 
	// 	echo json_encode($data_to_user[$i]);
	// }


	foreach ($data_to_user as $data => $val) {
		// print($data_to_user);
		$test = $data_to_user;


		json_encode($test);


		print($test);
	}

}




?>