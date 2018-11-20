<?php 
	include 'config/connect.php';
	class homeModel extends connectDB{
		public function getHomepage() {
			$sql = "SELECT * FROM product";
		    $result = mysqli_query($this->connect(), $sql);
			return $result;
		}
	}
?>