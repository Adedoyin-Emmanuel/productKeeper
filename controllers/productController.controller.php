<?php




#create a product model that would be instanciated

class ProductController{
	#init the class properties
	private $product_name;
	private $product_desc;
	private $product_img;

	#create the constructor method
	public function __construct($product_name,$product_desc,$product_img){
		#set the args to the class properties
		$this->product_name = $product_name;
		$this->product_desc = $product_desc;
		$this->product_img  = $product_img;
	}

	#create a custom method to sanitaize the user input
	public function custom_input_sanitizer($data){
		$this->data = $data;
		#trim user inputs => remove whitespaces
		$this->data = trim($data);
		#remove slashes
		$this->data = stripcslashes($data);
		
		#escape html characters
		$this->data =htmlspecialchars($data);

		return $this->data;
	}

	#create a method to check if the args are empty, would return true if empty else false
	public function args_empty(){
		if(empty($this->product_name) OR empty($this->product_desc) ){
			return true;
		}else{
			return false;
		}
	}

	#create a method to check if the file is empty or not, would return true if empty else would return false
	public function file_empty(){
		
		if(isset($this->product_img)){
			return false;
		}else{
			return true;
		}
	}
	#create a method to sanitaize the user inputs
	public function sanitize_user_input(){
		#sanitize the user inputs
		$this->product_name = $this->custom_input_sanitizer($this->product_name);
		$this->product_desc = $this->custom_input_sanitizer($this->product_desc);
		
	}

	

	#create a method to handle the file
	public function handle_file(){
		$this->upload_file_name = $this->product_img["name"];
		#reference the file upload folder
		$this->upload_dir= "./images/";
		#create a file size constant
		#this is 1mb, the max amount of file size we can accept
		$this->max_file_size=1000000;
		
		$this->striped_file=explode('.',$this->upload_file_name);
		#create an array for the possible type of file allowed for upload
		$this->legit_file_extension=array("png","jpeg","jpg","gif");
		$this->legit_upload_file_ext=strtolower(end($this->striped_file));
		#explode the file name to check for the extension
		
		$this->upload_tmp_name=$this->product_img["tmp_name"];
		$this->upload_file_error=$this->product_img["error"];
		$this->upload_file_size=$this->product_img["size"];
		#the file is not uploaded by default
		$this->file_match_success=false;

		#rename the file
		$this->randomNumber=rand(0,10000000);
		$this->randomTime=time();
		$this->processed_file_name=$this->randomNumber.$this->randomTime.'.'.$this->legit_upload_file_ext;
		$this->target_file_dir=$this->upload_dir.$this->processed_file_name;
		#check if there was an error uploading the file
		if($this->upload_file_error != 0){
			return 'an error occured while processing file';
		}else{

			#check if the uploaded file is above the legit file size
			if($this->upload_file_size > $this->max_file_size){
				return 'whoza, file size too large';
			}else{

				#check if the uploaded file matches the legit file extension
				if(in_array($this->legit_upload_file_ext,$this->legit_file_extension)){
					#the file matches all the required properties
					$this->file_match_success=true;

				
				
				}else{
					return 'invalid file extension, use (png, jpg, gif, jpeg)';
					
				}
			}

		}

		return $this->file_match_success;
	}

	#create a method to upload the file permanently
	public function upload_file_permanent(){
		if($this->file_match_success === true){
			#move the picture to the folder on the server
			#check if there was an error
			if(move_uploaded_file($this->upload_tmp_name,$this->target_file_dir)){
				return true;
			}else{
				return false;
				
			}
		}
	}
	#create a method to get the product name
	public function get_product_name(){
		return $this->product_name;
	}

	#create a method to get the product description
	public function get_product_desc(){
		return $this->product_desc;
	}


	#create a method to get the product image name
	public function get_product_img(){
		return $this->processed_file_name;
	}

	
	


}

?>