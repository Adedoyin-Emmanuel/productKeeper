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
	die();
}else{

 
	#call the connection model to access the connection model properties
	if($connectionModel->query_result->num_rows > 0){
		while($rows = $connectionModel->query_result->fetch_assoc()){
			#convert the result to an object and send it to the view ie(javascript)
		
			// for ($i=0; $i < $connectionModel->query_result->num_rows; $i++) { 
			// 		$data = json_encode($rows[$i]);

			// 		echo $data;

			// }


			foreach ($rows as $row => $val) {
				$data = json_encode($rows) .",";

					echo $data;
			}
		}
	}else{
		echo "Server returned 0 result";
	}

}




?>