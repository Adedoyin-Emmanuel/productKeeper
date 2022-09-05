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
		
		#use try catch
		try {
			#init the connection property
			$this->conn = new mysqli($this->server_name,$this->user_name,$this->password,$this->database);
		} catch (Exception $e) {
			die("an error occured ".$e->getMessage());
		}

		



	}


	#create a method to insert records
	public function insert_record($product_name,$product_desc,$product_img){
		#check if the args are empty
		$this->product_name_record =mysqli_real_escape_string($this->conn,$product_name);
		$this->product_desc_record =mysqli_real_escape_string($this->conn,$product_desc);
		$this->product_img_record  =mysqli_real_escape_string($this->conn,$product_img);
		$this->current_date        = date("Y-m-d");

		if(empty($this->product_name_record) OR empty($this->product_desc_record) OR empty($this->product_img_record)){
			return "*All fields must be complete";
			die();
		}else{
			#inset the values into the DB
			$this->sql = "INSERT INTO products_table (product_name,product_desc,product_img,date_added) VALUES ('$this->product_name_record','$this->product_desc_record','$this->product_img_record','$this->current_date')";

			#check if there was an error 
			if($this->conn->query($this->sql) == TRUE){
				return "record inserted successfully";
			}else{
				return 'record wasn`t inserted'.$this->conn->error;
			}

		}
	}

	#create a method to fetch records
	public function fetch_records(){
		#pass
	}
}

?>