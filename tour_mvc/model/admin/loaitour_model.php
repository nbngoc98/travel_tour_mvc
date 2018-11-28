<?php 
	class loaitour extends connectDB{
		public function list_loaitour() {
			
			$sql = "SELECT * FROM `loaitour`";
		    $result = mysqli_query($this->connect(), $sql);
		    mysqli_set_charset($this->connect(),"utf8");	
			return $result;
		}

		public function delete_loaitour($id){
			$sql = "DELETE FROM loaitour WHERE MaLoai = $id";
			mysqli_query($this->connect(), $sql);
			header("Location: admin.php?controller=loaitour&action=listLoaiTour");
		}
		public function edit_loaitour($id){
			$sql = "SELECT * FROM loaitour WHERE MaLoai = $id";
        	$resultt = mysqli_query($this->connect(), $sql);
        	return $resultt;
		}
		public function edit_loaitourr($MaLoai,$TenLoai,$id){
			$sql = "UPDATE loaitour SET MaLoai=$MaLoai,TenLoai='$TenLoai' WHERE `MaLoai`=$id";
			mysqli_query($this->connect(), $sql);
			header("Location: admin.php?controller=loaitour&action=listLoaiTour");
		}
		
		public function add_loaitour($MaLoai,$TenLoai){
			$sql = "INSERT INTO `loaitour`(`MaLoai`, `TenLoai`) VALUES ($MaLoai,'$TenLoai')";
			mysqli_query($this->connect(), $sql);
			header("Location: admin.php?controller=loaitour&action=listLoaiTour");
		}
		
	}
?>