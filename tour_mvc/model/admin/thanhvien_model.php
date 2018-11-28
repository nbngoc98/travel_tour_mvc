<?php 
	class customer extends connectDB{
		public function list_customer() {
			
			$sql = "SELECT * FROM `thanhvien`";
		    $result = mysqli_query($this->connect(), $sql);
		    mysqli_set_charset($this->connect(),"utf8");	
			return $result;
		}

		public function delete_customer($id){
			$sql = "DELETE FROM thanhvien WHERE MaTV = $id";
			mysqli_query($this->connect(), $sql);
			header("Location: admin.php?controller=thanhVien&action=listTV");
		}
		public function edit_customer($id){
			$sql = "SELECT * FROM thanhvien WHERE MaTV = $id";
        	$resultt = mysqli_query($this->connect(), $sql);
        	return $resultt;
		}
		public function edit_customerr($MaTV,$usename,$passTV,$hoten,$gioitinh,$emailTV,$diachi,$soCMT,$soDt,$id){
			$sql = "UPDATE `thanhvien` SET `MaTV`=$MaTV,`usename`='$usename',`passTV`='$passTV',`hoten`='$hoten',`gioitinh`='$gioitinh' ,`emailTV`='$emailTV',`diachi`='$diachi',`soCMT`=$soCMT,`soDT`=$soDt WHERE `MaTV`=$id";
			mysqli_query($this->connect(), $sql);
			header("Location: admin.php?controller=thanhVien&action=listTV");
			
		}
		// public function add_thanhVien($MaTV,$usename,$passTV,$hoten,$gioitinh,$emailTV,$diachi,$soCMT,$soDt){
		// 	$sql = "INSERT INTO `thanhvien`(`MaTV`, `usename`, `passTV`, `hoten`, `gioitinh`, `emailTV`, `diachi`, `soCMT`, `soDT`) VALUES ($MaTV,'$usename','$passTV','$hoten','$gioitinh','$emailTV','$diachi',$soCMT,$soDt)";
		// 	mysqli_query($this->connect(), $sql);
		// 	header("Location: admin.php?controller=thanhVien&action=listTV");
		// }
	}
?>