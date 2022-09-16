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
						//get the alert div with jquery
						$("#error_alert").removeClass("d-none");
						$("#error_alert").addClass("d-flex");
						$("#error_alert").text(xhttp.responseText);

						//check for successful msg
						if(xhttp.responseText.includes("successfully") || xhttp.responseText == " "){
							$("#error_alert").css({"background":"green"});
							//clear the form
							swal.fire({
								title:"Product Added",
								text:"Product added successfully",
								icon:"success",
								allowOutsideClick:false,
								confirmButtonText:"View Product",
								showCancelButton:true,
								cancelButtonText:"Add Product"

							}).then((willProceed)=>{
								if(willProceed.isConfirmed){
									location.href="homePage.php";
								}else{
									location.reload();
								}
								if(willProceed.isCancelled){
									location.reload();
								}
							});
						}else{
							$("#error_alert").css({"background":"tomato"});
						}
					}

				}

			
			//send the request to the server.
			xhttp.open("POST","includes/processForm.inc.php",true);
			xhttp.send($formData);
			
		});
});