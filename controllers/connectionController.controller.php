<?php

/*
	
	@author: Adedoyin Emmanuel Adeniyi

*/
error_reporting(0);
require_once "productController.controller.php";

#create the database connection component class, it performs CRUD operations via the DBase
class ConnectionModel extends ProductController{
	protected $server_name;
	protected $user_name;
	protected $password;
	protected $database;


	#create the contruct method
	public function __construct(){

		/*
			i could have called the parent component class constructor method here but we don't really need anything from it except from the custom sanitize method, calling it here means you should pass the 3 required args

			parent::__construct($product_name,$product_desc,$product_img);
		*/

		$this->server_name = 'containers-us-west-27.railway.app';
		$this->user_name = 'root';
		$this->password = 'IB5awX5sydMSvqdbeA2a';
		$this->database = 'railway';
		$this->port 	= 6127;
		$this->socket   = '';
		
		#use try catch
		try {
			#init the connection property
			$this->conn = new mysqli($this->server_name,$this->user_name,$this->password,$this->database,$this->port);
		} catch (Exception $e) {
			die("an error occured ".$e->getMessage());
		}

		



	}

	#create a method to sanitaize the inputs, extending the product class component would give us the custom sanitize method we need

	/*

		@check line 14, the connection model is extended from the product controller class

	*/
	public function sanitize_search_inputs(){
		#pass
	}


	#create a method to insert records
	public function insert_record($product_name,$product_desc,$product_img){
		#check if the args are empty
		$this->product_name_record =mysqli_real_escape_string($this->conn,$product_name);
		$this->product_desc_record =mysqli_real_escape_string($this->conn,$product_desc);
		$this->product_img_record  =mysqli_real_escape_string($this->conn,$product_img);
		$this->current_date        = date("d-m-Y");

		if(empty($this->product_name_record) OR empty($this->product_desc_record) OR empty($this->product_img_record)){
			return "*All fields must be complete";
			die();
		}else{
			#inset the values into the DB
			$this->sql = "INSERT INTO products_table (product_name,product_desc,product_img,date_added) VALUES ('$this->product_name_record','$this->product_desc_record','$this->product_img_record','$this->current_date')";

			#check if there was an error 
			if($this->conn->query($this->sql) == TRUE){

				die("Product added successfully");
			}else{
				return '*Error, record not inserted*'.$this->conn->error;
			}

		}
	}

	#create a method to close the connection
	public function close_connection(){
		$this->conn->close();
	}

	#create a method to fetch records
	public function fetch_records(){
		#pass
	}

	#create a method to trim a string and return  substring
	public function trim_string($haystack,$needle){

		$this->haystack = $haystack;
		$this->needle   = $needle;


		#the trim index is assumed as 0.

		return substr($this->haystack, 0, $this->needle);
	}

	#create a method to fetch records using the search 
	public function fetch_records_using_search($args){
		#here args is the search data that the user passed through
		if(!empty($args)){
			$this->search_data = $args;
			$search_data_legit =$this->search_data;
			$this->get_search_sql =@"SELECT DISTINCT ID,product_name, product_desc, product_desc, product_img, date_added FROM products_table WHERE product_name LIKE '$search_data_legit%'";
		
			$this->query_result = $this->conn->query($this->get_search_sql);
				#check if the query was successful
			if($this->query_result == TRUE){
				#check if the query returned 0 search results
				if($this->query_result->num_rows > 0){
					#pass
				}else{
					/*
						check if the dbase actually returns some set of rows according to the user's search
						#return $this->query_result->num_rows;
					*/
					
					return "Server returned 0 result";

					
				}
			}
		}else{
			return "args can't be empty";

		}

	}


	#create a public method to get all data from the database

	public function get_all_data_from_database(){

		#prepare the query to get all records
		$this->get_all_data_query = "SELECT * FROM products_table ORDER BY product_name, date_added ASC";

		#run query


		$this->get_all_data_query_result = $this->conn->query($this->get_all_data_query);

		#check if nothing went wrong
		if($this->get_all_data_query_result == TRUE){
				#check if the query returned 0 search results
				if($this->get_all_data_query_result->num_rows > 0){
					#pass
				}else{

					/*
						check if the dbase actually returns some set of rows according to the user's search
						#return $this->get_all_data_query_result->num_rows;
					*/
					
					return "Server returned 0 result";

					
				}
		}
	}


	#product deletion method


	public function delete_product($args){
		#args is the product ID
		if(empty($args)){
			die("args can not be empty");
		}else{
			$this->product_deletion_id = $args;
			$temp_product_deletion_id = $this->product_deletion_id;
			$this->product_delete_sql = "DELETE FROM products_table WHERE ID = '$temp_product_deletion_id'";

			#run query

			$this->query_to_delete = $this->conn->query($this->product_delete_sql);

			#check if query ran well
			if($this->query_to_delete == TRUE){

				#query successful
				return true ;

			}else{
				#query error
				return false.$this->conn->error;
			}
		}
	}



	#create a method to update the records using the id
	public function update_record($product_name,$product_desc,$product_img,$id){
		#check if the args are empty
		$this->update_product_id = mysqli_real_escape_string($this->conn,$id);
		$this->product_name_record_update =mysqli_real_escape_string($this->conn,$product_name);
		$this->product_desc_record_update =mysqli_real_escape_string($this->conn,$product_desc);
		$this->product_img_record_update  =mysqli_real_escape_string($this->conn,$product_img);
		$this->current_date        = date("d-m-Y");

		if(empty($this->product_name_record_update) OR empty($this->product_desc_record_update) OR empty($this->product_img_record_update)){
			return "*All fields must be complete";
			die();
		}else{
			#inset the values into the DB
			$this->update_product_sql ="UPDATE products_table SET product_name = '$this->product_name_record_update', product_desc = '$this->product_desc_record_update', product_img = '$this->product_img_record_update' WHERE ID = '$this->update_product_id' ";


			$this->update_query_result = $this->conn->query($this->update_product_sql);
			#check if there was an error 
			if($this->update_query_result == TRUE){

				die("Product updated successfully");
			}else{
				return '*Error, record not inserted*'.$this->conn->error;
			}

		}
	}


	#create a method to fetch records using the id 
	public function fetch_records_using_id($id){
		#here args is the id passed through
		if(!empty($id)){
			$this->id = $this->custom_input_sanitizer($id);
			$temp_id = $this->id;
			
			$this->get_record_sql =@"SELECT * FROM products_table WHERE ID ='$temp_id'";
		
			$this->record_result = $this->conn->query($this->get_record_sql);
				#check if the query was successful
			if($this->record_result == TRUE){
				#check if the query returned 0 search results
				if($this->record_result->num_rows > 0){
					#pass
				}else{
					/*
						check if the dbase actually returns some set of rows according to the user's search
						#return $this->record_result->num_rows;
					*/
					
					return "Server returned 0 result";

					
				}
			}
		}else{
			return "args can't be empty";

		}

	}
	
}

?>