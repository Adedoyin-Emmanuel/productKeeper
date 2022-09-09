<style>

			.form{

			}

			#action{
				transform: translateY(85%);
				cursor:pointer;
			}
		

			@media (min-width:667.98px){
				.form{
					width:50%
				}

				
			}

			#searchProduct,.form-control{
				border:none;
				outline:none;
				font-weight:300;
			}

			#addNewProduct{
				font-weight: 600;
			}

			.time_added{
				font-size:10px;
			}

			label{
				font-size:0.9rem;
			}

			input[type="text"],input[type="file"]{
				font-size:0.9rem;
			}

			#logo{
				width:25%;
				height:25%;
				display: flex;
				padding:20px;
				text-align: center;
				align-items: center;
				justify-content: center;
			}

			/*declare the bg-dark-c class for the custom dark class*/
			.bg-dark-c{
				background: #121117;
			}

			#allProduct,#footerText{
				font-weight:600;
			}

			#my_name{
				font-weight:500;
			}

			#addProductBtn{
				border-radius:50%;
				width:40px;
				height:40px;
				text-align: center;
				display: flex;
				align-items:center;
				justify-content: center;
				margin:auto;
				font-weight:500;
			}

			
			
			.bg-dark {
  				background-color: #212529 !important;
			}

			#footer_text{
				font-size:0.9rem;
				padding
			}

			/*create animation for the error div*/
			#error_alert{
				animation: error_grow 0.5s 1;
			}

			@keyframes error_grow{
				from{
					transform:scale(0);
				}
				to{
					transform:scale(1);
				}
			}
		
</style>