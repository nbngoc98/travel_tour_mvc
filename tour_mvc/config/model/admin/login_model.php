<?php 
	class loginModel extends connectDB{
		public function login($user_name, $pass1) {
			
			$sql = "SELECT * FROM admin WHERE userAdmin LIKE '".$user_name."' AND passAdmin LIKE '".$pass1."'";
		    $result = mysqli_query($this->connect(), $sql);
			return $result;
		}
	}
?>