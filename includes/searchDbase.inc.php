<?php
error_reporting(0);
require_once "conn.inc.php";
//get the request data from the url

extract($_GET);

$user_input =@$q;

#sanitize the user inputs using the connection model sanitize method
$legit_data =@mysqli_real_escape_string($connectionModel->conn,$connectionModel->custom_input_sanitizer($user_input));


#fetch all the dbase records
$data_to_user = @$connectionModel->fetch_records_using_search($legit_data);


if($data_to_user == "Server returned 0 result" OR $data_to_user == "args can't be empty"){
	die();
}else{

 
	#call the connection model to access the connection model properties
	if($connectionModel->query_result->num_rows > 0){
		while($rows = $connectionModel->query_result->fetch_assoc()){



			#create a constant for the max string we can always return
			define("MAX_STRING",12);
			$trimed_product_name= " ";
			if(strlen($rows["product_name"]) > MAX_STRING){

				#get the product name so we can trim it before sending it to the user
				$trimed_product_name = $connectionModel->trim_string($rows["product_name"],MAX_STRING) . "...";

			}else{
				$trimed_product_name = $rows["product_name"];
			}


			$data = '
			<a href="viewSingleProduct.php?p_ID='.$rows["ID"].'" class="text-decoration-none text-light">
			<div class="product_container container-lg my-2">

				<div class="product_1 bg-dark text-light rounded-3 shadow-sm p-2" >
					<!-- product image and text -->
					<div class="product_image d-flex flex-row flex-wrap justify-items-around align-items-center">
						<img src="images/'.$rows["product_img"].'" class="rounded-circle" width="40" height="40">
							<!-- product text -->
						<div class="product_test text-capitalize m-auto ">
							<p class="text-capitalize m-auto text-center">'.$trimed_product_name .'</p>
						</div>

							<div class="time_added d-flex">
								<p class="d-block p-2">'.$rows["date_added"].'</p>
							</div>

						
			
							</div>

						</div>


			</div>
			</a>
			';

			echo $data;
			
		}
	}else{
						  			
		die(false);
	}

}




?>