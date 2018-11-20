<?php 
	class userModel extends connectDB{
		public function listUser() {
			
			$sql = "SELECT * FROM admin";
		    $result = mysqli_query($this->connect(), $sql);
		    mysqli_set_charset($this->connect(),"utf8");	
			return $result;
		}
	}
?>