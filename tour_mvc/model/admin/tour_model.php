<?php 
	class tourModel extends connectDB {
		public function listDate() {
			$sql = "SELECT a.MaNgaykh,b.TenTour, a.ngaykhoihanh  from khoihanh as a  inner JOIN tour as b on a.MaTour = b.MaTour";
		    $result = mysqli_query($this->connect(), $sql);
			return $result;
		}
		public function deleteDate($id){
			$sql = "DELETE FROM khoihanh WHERE MaNgaykh = $id";
			mysqli_query($this->connect(), $sql);
			header("Location: admin.php?controller=tour&action=listDate");
		}
		public function addDate(){
			$sql = "SELECT * FROM tour";
		    $result = mysqli_query($this->connect(), $sql);
			return $result;
		}

		public function doaddDate($MaTour, $ngaykhoihanh_moi){
			mysqli_set_charset($this->connect(),"utf8");
			$sql = "INSERT INTO khoihanh (MaTour,ngaykhoihanh) 
            VALUES($MaTour, '$ngaykhoihanh_moi')";
            
			mysqli_query($this->connect(), $sql);
			header("Location: admin.php?controller=tour&action=listDate");
		}
        public function editDate($id){
        	
			$sql = "SELECT * FROM tour";
        	$result = mysqli_query($this->connect(), $sql);
			return $result;
        }
         public function editDatee($id){
        	
			$sql = "SELECT * FROM khoihanh";
        	$resultt = mysqli_query($this->connect(), $sql);
			return $resultt;
        }  
		public function doeditDate($MaTour, $ngaykhoihanh_moi, $id){
			 $sql = "UPDATE khoihanh SET MaTour = $MaTour, ngaykhoihanh = '$ngaykhoihanh_moi' WHERE MaNgaykh = $id";
		if (mysqli_query($this->connect(), $sql) == TRUE) {
			header("Location: admin.php?controller=tour&action=listDate");
		}	
		}	
	}
?>