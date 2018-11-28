<?php 
	include 'config/connect.php';
	class homeModel extends connectDB{
		public function getHomepage() {
			$sql = "SELECT a.MaTour, b.ngaykhoihanh,a.TenTour, a.tgian, a.GiaNguoiLon, a.AnhTour, a.NoiDungTour, a.DiemKhoiHanh, a.GiaTreEm from tour as a  inner JOIN khoihanh as b on a.MaTour = b.MaTour ";
		    $result1 = mysqli_query($this->connect(), $sql);
			return $result1;
		}
		public function getHomepage1() {
			$sql = "SELECT * FROM sales";
		    $result2 = mysqli_query($this->connect(), $sql);
			return $result2;
		}
	}
?>