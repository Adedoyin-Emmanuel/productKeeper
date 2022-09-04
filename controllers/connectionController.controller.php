<?php




#create the database connection


class ConnectionModel{
	protected $server_name;
	protected $user_name;
	protected $password;
	protected $database;


	#create the contruct method
	public function __construct(){
		$this->server_name = 'localhost';
		$this->user_name = 'root';
		$this->password = '';
		$this->database = 'crud_app';

		#init the connection property
		$this->conn = new mysqli($this->server_name,$this->user_name,$this->password,$this->database);

		#check if there was an error 
		if($this->conn->connect_error){
			die("an error occured ".$this->conn->connect_error);
		}else{
			#do nothing
			
		}

		



	}


	#create a method to insert records
	public function insert_record($product_name,$product_desc,$product_img){
		#check if the args are empty
		$this->product_name_record = $product_name;
		$this->product_desc_record = $product_desc;
		$this->product_img_record  = $product_img;
		$this->current_date        = date("Y-m-d");

		if(empty($this->product_name_record) OR empty($this->product_desc_record) OR empty($this->product_img_record)){
			return "args are empty";
			die();
		}else{
			#inset the values into the DB
			$this->sql = "INSERT INTO products_table (product_name,product_desc,product_img,date_added) VALUES ('$this->product_name_record','$this->product_desc_record','$this->product_img_record','$this->current_date')";

			#query the DB
			$this->conn->query($this->sql);

			#check if there was an error 
			


		}
	}

	#create a method to fetch records
	public function fetch_records(){
		#pass
	}
}

?>