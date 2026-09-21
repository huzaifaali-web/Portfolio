<?php 

class DBconnection
{
	private $hostname;
	private $username;
	private $password;
	private $database;
	public $connection;
	
	function __construct()
	{
		$this->hostname = 'localhost';
		$this->username = 'root';
		$this->password = '';
		$this->database = 'beaditdesign';
		$con = new mysqli($this->hostname, $this->username, $this->password, $this->database);
		if ($con->connect_error) {
    		die("Connection failed: " . $con->connect_error);
  		}
  		$this->connection = $con;
  		return $con;

	}


	public function insert($data,$table)
	{

		$columns = array_keys($data);
		$columns = implode('`,`', $columns);
		// $placeholder = array_fill(0, count($data), '?');
		$sql = "INSERT INTO `".$table."`(`".$columns."`) VALUES ('".implode('\',\'',$data)."')";
		if ($this->connection->query($sql) === TRUE) {
		   	return '1';
		}
		else{
		  	return '0';
		}
	}

	public function update($sql)
	{


		if ($this->connection->query($sql) === TRUE) {
		   	return 'Record Update Successfully';
		}
		else{
		  	return 'Record Not Updated';
		}
	}

	public function delete($sql)
	{
		if ($this->connection->query($sql) === TRUE) {
		   	return 'Record Deleted Successfully';
		}
		else{
		  	return 'Record Not Delete';
		}
	}

	public function fetch($sql)
	{
		$result = $this->connection->query($sql);
		$data = array();
		if($result->num_rows > 0) {
		    // Output data of each row
		    while($row = $result->fetch_assoc()) {
		     $data[] = $row;
		    }

		}
		return $data;
	}


}


 ?>