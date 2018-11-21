<?php 
	class userModel extends connectDB{
		public function listUser() {
			
			$sql = "SELECT * FROM admin";
		    $result = mysqli_query($this->connect(), $sql);
			return $result;
		}
	}
?>