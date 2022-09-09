/*

	@author => Adedoyin Emmanuel Adeniyi

*/

//init jquery


$(document).ready(($)=>{
	//prevent libraries conflict
	$.noConflict();

	//create a function to produce a random number
	function randomNumber(max,min){
		return Math.floor(Math.random() * (max - min + 1)) + min;
	}


	
	//get the pulse spinner, and other required items  and store in  constant
	const $pulseSpinner  =  $("#pulseSpinner");
	const $btnSpinner    =  $("#btnSpinner");
	const $getStartedBtn =  $("#getStarted");
	const $cartImg		 =  $("#cartImg");
	const $randomNumber  = randomNumber(5000,3000);

	//check if the user clicked the button

	$getStartedBtn.click(()=>{
		//display the spinner
		$btnSpinner.removeClass("d-none");
		$pulseSpinner.removeClass("d-none");
		$cartImg.addClass("d-none");
	});



	setTimeout(()=>{
		//take the user to the index page after some random time
		location.href = "homePage.php";
	},$randomNumber);
});