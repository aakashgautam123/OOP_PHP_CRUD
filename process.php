<?php
class Database
{
	public $host = "localhost";
	public $user = "root";
	public $password = "";
	public $db_name = "dancing_yak";

	public $link;
	public $error;
	public function __construct()
	{
		$this->connect();
	}
	private function connect()
	{
		$this->link = new mysqli($this->host,$this->user,$this->password,$this->db_name);
		if(!$this->link)
	{
		$this->error = "Connection Failed";
	}

	}
	

	public function insert($parameter)
	{
		$parameter = (array)$parameter;
		$keys = array_keys($parameter);
		$num_keys = count($keys);
		$values = array();

		for($i=0;$i<$num_keys-1;$i++)
		{
			array_push($values,$parameter[$keys[$i]]);
		}

		

		
		 $sql = "INSERT INTO ".$parameter['tablename'];
		 $sql.= "(";
		 for($x=0;$x<$num_keys-1;$x++)

		 {
		 	if($x < $num_keys-2)
		 	{
		 	$sql.= $keys[$x] . ',';
		 	}
		 	else
		 	{
		 		$sql.= $keys[$x];
		 	}


		 }
		 $sql.= ") VALUES (";

		 for($y=0;$y<$num_keys-1;$y++)
		 {
		 	if($y < $num_keys -2)
		 	{
		 	$sql.= " ' ".$values[$y] . " ' " ." , ";
			 }
			 else
			 {
			 		$sql.= " ' ".$values[$y] . " ' " ;
			 }
		 }
		 $sql.= ")";

		;

		 

		 $result = $this->link->query($sql);

		 if($result)
		 {
		 	$msg = 'Registration Successful';
		 	return $msg;
		 }



		

		

}
}


