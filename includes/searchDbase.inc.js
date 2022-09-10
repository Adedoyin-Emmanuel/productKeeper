//init jquery


$(document).ready(($)=>{

	//clear the console 
	setInterval(()=>{
		//console.clear();
	},1000);

	let $searchErrors = [
		
		"*server returned 0 result*",
		
	];

	//create a function to return random string
	function randomString(array){
		return array[Math.floor(Math.random() * array.length)];
	}
	//check if the user typed in the input
	setInterval(()=>{

		$("#searchProduct").keydown(()=>{
			//get the user search data
			const $searchInput = $("#searchProduct").val();

			//prepare the AJAX call
			const xhttp= new XMLHttpRequest() || new ActiveXObject("Microsoft.XMLHTTP");
			  xhttp.onreadystatechange = ()=>{
			  	//check for response
			  	if(xhttp.readyState == 4 && xhttp.status == 200){
			  	
			  		//get the element container and fill them with the response data
			  		const $dataContainer = $("#product_search_data");
			  		let $data_template;
			  		let $legit_object_from_server;
			  		var $object_from_server  = xhttp.responseText;
			  		var $array = [$object_from_server];

			  		for (var i =0; i < $array.length; i++) {

			  // 			try{
			  // 				console.log($array[i]);
					// $legit_object_from_server = JSON.parse($array[i]);
					// console.log($legit_object_from_server);

			  // 			}catch(e){

			  // 				console.log(e);
			  // 			}


			  // console.log(typeof $array[0]);
			  // return;

					
			  console.log($array);

			  return;
				  			
				  		try{
				  		 var $trimmedString = $array[i].trim();
						 $legit_object_from_server = JSON.parse($trimmedString);

						

				  		}catch(err){
				  			$data_template = randomString($searchErrors);
				  			console.log(err);
				  			$dataContainer.html(`<h6 class='text-capitalize text-center fs-6 text-danger'>${$data_template}</h6>`);

				  			return;

				  		}


				  		console.log($legit_object_from_server[i]);


			  		//constant for the max string to be displayed
			  		const $MAX_STRING = 13;

			  		//check if the product name length is too long, then strip it

			  		var $product_name_length = $legit_object_from_server[i].product_name.length;
			  		var $legit_product_name = $legit_object_from_server[i].product_name.substring(0,$MAX_STRING) + "...";


			  		$data_template =`		
					  		<div class="product_container container-lg my-2">

							<div class="product_1 bg-dark text-light rounded-3 shadow-sm p-2" >
								<!-- product image and text -->
								<div class="product_image d-flex flex-row flex-wrap justify-items-around align-items-center">
									<img src="images/${$legit_object_from_server[i].product_img}" class="rounded-circle" width="40" height="40">
										<!-- product text -->
									<div class="product_test text-capitalize m-auto ">
										<p class="text-capitalize m-auto text-center">${$legit_product_name}</p>
									</div>

										<div class="time_added d-flex">
											<p class="d-block p-2">${$legit_object_from_server[i].date_added}</p>
										</div>

									
						
										</div>

									</div>
							</div>
					`;
					$dataContainer.innerHTML += $data_template;

					}


				
			  		

					
			  	}
			  }
			 xhttp.open("GET",`includes/searchDbase.inc.php?q=${$searchInput}`,true);
			 xhttp.send();
		});

	},500);
});