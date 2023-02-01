//init jquery


$(document).ready(($)=>{

	
	//custom error array
	let $searchErrors = [
		
		"*no products available*",
		
	];

	//create a function to return random string
	function randomString(array){
		return array[Math.floor(Math.random() * array.length)];
	}



	setInterval(()=>{
		

			//prepare the ajax

			let xhttp = new XMLHttpRequest() || new ActiveXObject("Microsoft.XMLHTTP");

			xhttp.onreadystatechange = ()=>{
				if(xhttp.readyState == 4 && xhttp.status == 200){
					//get the template parent div and inject data via PHP :)
					const $allProductContainer = $("#all_product_container");
					//check if the server returned an error. that's an empty search.
					if(xhttp.responseText == ""){

						$data_template = randomString($searchErrors);
				  		$allProductContainer.html(`
				  		
				  		<div class="m-auto text-center">

				  				<div class="text-warning d-block">

								<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-wifi-off" viewBox="0 0 16 16">
								  <path d="M10.706 3.294A12.545 12.545 0 0 0 8 3C5.259 3 2.723 3.882.663 5.379a.485.485 0 0 0-.048.736.518.518 0 0 0 .668.05A11.448 11.448 0 0 1 8 4c.63 0 1.249.05 1.852.148l.854-.854zM8 6c-1.905 0-3.68.56-5.166 1.526a.48.48 0 0 0-.063.745.525.525 0 0 0 .652.065 8.448 8.448 0 0 1 3.51-1.27L8 6zm2.596 1.404.785-.785c.63.24 1.227.545 1.785.907a.482.482 0 0 1 .063.745.525.525 0 0 1-.652.065 8.462 8.462 0 0 0-1.98-.932zM8 10l.933-.933a6.455 6.455 0 0 1 2.013.637c.285.145.326.524.1.75l-.015.015a.532.532 0 0 1-.611.09A5.478 5.478 0 0 0 8 10zm4.905-4.905.747-.747c.59.3 1.153.645 1.685 1.03a.485.485 0 0 1 .047.737.518.518 0 0 1-.668.05 11.493 11.493 0 0 0-1.811-1.07zM9.02 11.78c.238.14.236.464.04.66l-.707.706a.5.5 0 0 1-.707 0l-.707-.707c-.195-.195-.197-.518.04-.66A1.99 1.99 0 0 1 8 11.5c.374 0 .723.102 1.021.28zm4.355-9.905a.53.53 0 0 1 .75.75l-10.75 10.75a.53.53 0 0 1-.75-.75l10.75-10.75z"/>
								</svg>
								</div>

					  			<h4 class='text-capitalize text-center fs-6 text-mute my-3 py-3'>

					  				no products found
					  			</h4>

					  			

				  		</div>

				  			`);

				  		//$("#warning_alert").removeClass("d-none");
				  		
				  		return;
					}else{
						//get the string from the server

						$allProductContainer.html(xhttp.responseText);
						
					}
					
				}	
			}


			 xhttp.open("GET","includes/getAllProduct.inc.php",true);
			 xhttp.send();
	



	},200);
	
});
