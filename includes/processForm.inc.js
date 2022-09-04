//init the jquery library

$(document).ready(($)=>{
	const $form = document.querySelector("form");
		$("#form").on("submit",(e)=>{
			//prevent the form from submitting
			e.preventDefault();
			
			
			//create a new form data object
			const $formData = new FormData($form);


			//prepare the AJAX 
			const xhttp= new XMLHttpRequest() || new ActiveXObject("Microsoft.XMLHTTP");
			
			xhttp.onreadystatechange=()	=>{
					if(xhttp.readyState == 4 && xhttp.status==200){
						console.log(xhttp.responseText);
						
					}

				}

			
			//send the request to the server.
			xhttp.open("POST","includes/processForm.inc.php",true);
			xhttp.send($formData);
			
		});
});