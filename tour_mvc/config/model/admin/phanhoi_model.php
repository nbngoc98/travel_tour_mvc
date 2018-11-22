<?php 
	class phanhoiModel extends connectDB{
		public function listPhanhoi() {
			$sql = "SELECT * FROM phanhoi";
		    $result = mysqli_query($this->connect(), $sql);
			return $result;
		}
		public function deletePhanhoi($id){
			$sql = "DELETE FROM phanhoi WHERE MaPH = $id";
			mysqli_query($this->connect(), $sql);
			header("Location: admin.php?controller=phanhoi&action=listPhanhoi");
		}
	}
?>