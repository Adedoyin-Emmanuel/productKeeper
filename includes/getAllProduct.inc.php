<?php


error_reporting(0);


#require the necessary components
require_once "conn.inc.php";

#get all the data from the database using the connectionmodel
$data_from_database = $connectionModel->get_all_data_from_database();


#check if there was an error
if($data_from_database == "Server returned 0 result" OR $data_from_database == "args can't be empty"){
	die();
}else{
	#call the connection model to access the connection model properties
	if($connectionModel->get_all_data_query_result->num_rows > 0){

		while($rows = $connectionModel->get_all_data_query_result->fetch_assoc()){

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
			<a href="viewSingleProduct.php?p_ID='.$rows["ID"].'" class="text-decoration-none text-light" >
			<div class="product_container container-lg my-2">

							<div class="product_1 bg-dark text-light rounded-3 shadow-sm p-2" >
								<!-- product image and text -->
								<div class="product_image d-flex flex-row flex-wrap justify-items-around align-items-center">
									<img src="images/'.$rows["product_img"].'" class="rounded-circle" width="40" height="40">
										<!-- product text -->
									<div class="product_test text-capitalize m-auto text-start">
										<p class="text-capitalize m-auto text-start">'.$trimed_product_name .'</p>
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