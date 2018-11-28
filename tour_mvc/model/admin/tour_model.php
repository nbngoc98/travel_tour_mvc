<?php 
	class tourModel extends connectDB {
		public function list_tour() {
			
			$sql = "SELECT tour.MaTour,loaitour.TenLoai,tour.TenTour,tour.tgian,khoihanh.ngaykhoihanh,tour.NoiDungTour,tour.AnhTour,tour.GiaNguoiLon,tour.GiaTreEm,tour.DiemKhoiHanh,TOUR.NgayThem FROM `tour` inner join khoihanh on tour.MaTour=khoihanh.MaTour INNER join loaitour on tour.MaLoai = loaitour.MaLoai";
		    $result = mysqli_query($this->connect(), $sql);
		    mysqli_set_charset($this->connect(),"utf8");	
			return $result;
		}
		public function delete_tour($id){
			$sql = "DELETE FROM tour WHERE MaTour = $id";
			mysqli_query($this->connect(), $sql);
			header("Location: admin.php?controller=tour&action=listTour");
		}
		public function addLoaiTour(){
			$sql = "SELECT * FROM loaitour";
		    $result = mysqli_query($this->connect(), $sql);
			return $result;
		}
		public function edittourr($id){
			$sql = "SELECT * FROM tour WHERE MaTour = $id";
        	$resultt = mysqli_query($this->connect(), $sql);
        	return $resultt;
		}
        public function edittour($id){
        	
			$sql = "SELECT * FROM loaitour";
        	$result = mysqli_query($this->connect(), $sql);
			return $result;
		}
	
		public function edit_tour($MaTour,$MaLoai,$TenTour,$tgian,$NoiDungTour,$imageUpload,$GiaNguoiLon,$GiaTreEm,$DiemKhoiHanh,$id){
			$sql = "UPDATE tour SET MaTour=$MaTour,MaLoai=$MaLoai,TenTour='$TenTour',tgian='$tgian',NoiDungTour='$NoiDungTour',AnhTour='$imageUpload',GiaNguoiLon=$GiaNguoiLon,GiaTreEm=$GiaTreEm,DiemKhoiHanh='$DiemKhoiHanh' WHERE MaTour=$id";
			mysqli_query($this->connect(), $sql);
			header("Location: admin.php?controller=tour&action=listTour");
		}
		public function add_tour($MaTour,$MaLoai,$TenTour,$tgian,$NoiDungTour,$AnhTour,$GiaNguoiLon,$GiaTreEm,$DiemKhoiHanh,$NgayThem){
			$sql = "INSERT INTO tour(`MaTour`, `MaLoai`, `TenTour`, `tgian`, `NoiDungTour`, `AnhTour`, `GiaNguoiLon`, `GiaTreEm`, `DiemKhoiHanh`, `NgayThem`) VALUES ($MaTour,$MaLoai,'$TenTour','$tgian','$NoiDungTour','$AnhTour','$GiaNguoiLon','$GiaTreEm','$DiemKhoiHanh','$NgayThem')";
			mysqli_query($this->connect(), $sql);
			header("Location: admin.php?controller=tour&action=listTour");
		}
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