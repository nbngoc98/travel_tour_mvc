<?php 
	class salesModel extends connectDB {
		public function listSales() {
			$sql = "SELECT a.MaSale,b.TenLoai, a.title, a.tgian, a.noidung, a.image, a.gianguoilon, a.giatreem, a.ngaykhoihanh, a.diemkhoihanh, a.ngaythemSale, a.startSale, a.stopSale, a.giokhoihanh from sales as a  inner JOIN loaitour as b on a.MaLoai = b.MaLoai ";
		    $result = mysqli_query($this->connect(), $sql);
			return $result;
		}
		public function deleteSales($id){
			$sql = "DELETE FROM sales WHERE MaSale = $id";
			mysqli_query($this->connect(), $sql);
			header("Location: admin.php?controller=sales&action=listSales");
		}
		public function addSales(){
			$sql = "SELECT * FROM loaitour";
		    $result = mysqli_query($this->connect(), $sql);
			return $result;
		}

		public function doaddSales($MaSale, $MaLoai, $title, $tgian, $noidung, $imageName, $gianguoilon, $giatreem, $ngaykhoihanh_moi, $giokhoihanh, $diemkhoihanh, $created, $imageNamee, $startSale_new, $stopSale_new){
			$sql = "INSERT INTO sales (MaSale, MaLoai, title, tgian, noidung, image, gianguoilon, giatreem, ngaykhoihanh, giokhoihanh, diemkhoihanh, ngaythemSale, slideshow, startSale, stopSale) 
            VALUES($MaSale, $MaLoai, '$title', '$tgian', '$noidung', '$imageName', '$gianguoilon', '$giatreem', '$ngaykhoihanh_moi', '$giokhoihanh', '$diemkhoihanh','$created', '$imageNamee', '$startSale_new', '$stopSale_new')";
            // var_dump($MaSale, $MaLoai, $title, $tgian, $noidung, $imageName, $gianguoilon, $giatreem, $ngaykhoihanh_moi, $giokhoihanh, $diemkhoihanh, $created, $imageNamee, $startSale_new, $stopSale_new);
            // exit();
			mysqli_query($this->connect(), $sql);
			header("Location: admin.php?controller=sales&action=listSales");
		}
		public function editSaless($id){
			$sql = "SELECT * FROM sales WHERE MaSale = $id";
        	$resultt = mysqli_query($this->connect(), $sql);
        	return $resultt;
		}
        public function editSales($id){
        	
			$sql = "SELECT * FROM loaitour";
        	$result = mysqli_query($this->connect(), $sql);
			return $result;
        } 
		public function doeditSales($MaSale, $MaLoai, $title, $tgian, $noidung, $imageName, $gianguoilon, $giatreem, $ngaykhoihanh_moi, $giokhoihanh, $diemkhoihanh, $imageNamee, $startSale_new, $stopSale_new, $id){
			 $sql = "UPDATE sales SET MaSale = $MaSale, MaLoai = $MaLoai, title = '$title', tgian = '$tgian', noidung = '$noidung', gianguoilon = '$gianguoilon', giatreem = '$giatreem', ngaykhoihanh = '$ngaykhoihanh_moi', giokhoihanh ='$giokhoihanh' , diemkhoihanh = '$diemkhoihanh', startSale = '$startSale_new', stopSale = '$stopSale_new' WHERE MaSale = $id";

			$imageUpload  = $_FILES['image'];
		    if (!$imageUpload['error']) {
		        $imageName = uniqid().'-'.$imageUpload['name'];
		        $pathSave = 'public/uploads/sales/';
		        move_uploaded_file($imageUpload['tmp_name'], $pathSave.$imageName);
		        $image = $imageName;
		        //Remove anh cu khoi UPLOADS folder
		        unlink($imageEdit);
		        $sql = "UPDATE sales SET image='$imageName' WHERE MaSale=$id";
				mysqli_query($this->connect(), $sql);
		    }

		    $imageUploadd  = $_FILES['slideshow'];
		    if (!$imageUploadd['error']) {
		        $imageNamee = uniqid().'-'.$imageUploadd['name'];
		        $pathSavee = 'public/uploads/sales/shows/';
		        move_uploaded_file($imageUploadd['tmp_name'], $pathSavee.$imageNamee);
		        $slideshow = $imageNamee;
		        //Remove anh cu khoi UPLOADS folder
		        unlink($imageEditt);
		        $sql = "UPDATE sales SET slideshow='$imageNamee' WHERE MaSale=$id";
				mysqli_query($this->connect(), $sql);
		    }
		    // var_dump($MaSale, $MaLoai, $title, $tgian, $noidung, $imageName, $gianguoilon, $giatreem, $ngaykhoihanh_moi, $giokhoihanh, $diemkhoihanh, $imageNamee, $startSale_new, $stopSale_new);
      //       exit();
		if (mysqli_query($this->connect(), $sql) == TRUE) {
			header("Location: admin.php?controller=sales&action=listSales");
		}	
		}	
	}
?>