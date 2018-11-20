<?php 
	class salesModel extends connectDB {
		public function listSales() {
			$sql = "SELECT a.MaSale,b.TenLoai, a.title, a.gioithieu, a.noidung, a.image, a.gianguoilon, a.giatreem, a.ngaykhoihanh, a.diemkhoihanh, a.ngaythemSale from sales as a  inner JOIN loaitour as b on a.MaLoai = b.MaLoai ";
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

		public function doaddSales($MaSale, $MaLoai, $title, $gioithieu, $noidung, $imageName, $gianguoilon, $giatreem, $ngaykhoihanh, $diemkhoihanh, $created, $imageNamee){
			mysqli_set_charset($this->connect(),"utf8");
			$sql = "INSERT INTO sales (MaSale, MaLoai, title,gioithieu, noidung, image, gianguoilon, giatreem, ngaykhoihanh, diemkhoihanh, ngaythemSale, slideshow) 
            VALUES($MaSale, $MaLoai, '$title', '$gioithieu', '$noidung', '$imageName', '$gianguoilon', '$giatreem', $ngaykhoihanh, '$diemkhoihanh','$created', '$imageNamee')";
            
			mysqli_query($this->connect(), $sql);
			header("Location: admin.php?controller=sales&action=listSales");
		}

        public function editSales($id){
        	$sql = "SELECT * FROM sales WHERE MaSale = $id";
        	$result = mysqli_query($this->connect(), $sql);

			$sql = "SELECT * FROM loaitour";
        	$result = mysqli_query($this->connect(), $sql);
			return $result;
        } 
		public function doeditSales($MaSale, $MaLoai, $title, $gioithieu, $noidung, $imageName, $gianguoilon, $giatreem, $ngaykhoihanh, $diemkhoihanh, $imageNamee, $id){
			 // $sql = "UPDATE sales SET MaSale = $MaSale, MaLoai = $MaLoai, title = '$title', gioithieu = '$gioithieu', noidung = '$noidung', image = '$image', gianguoilon = '$gianguoilon', giatreem = '$giatreem', ngaykhoihanh = '$ngaykhoihanh', diemkhoihanh = '$diemkhoihanh', slideshow = '$slideshow' WHERE MaSale = $id";

			if($MaSale!=''){
				$sql = "UPDATE sales SET MaSale='$MaSale' WHERE MaSale=$id";
				mysqli_query($this->connect(), $sql);
			}
			if($MaLoai!=''){
				$sql = "UPDATE sales SET MaLoai='$MaLoai' WHERE MaSale=$id";
				mysqli_query($this->connect(), $sql);
			}
			if($title!=''){
				$sql = "UPDATE sales SET title='$title' WHERE MaSale=$id";
				mysqli_query($this->connect(), $sql);
			}
			if($gioithieu!=''){
				$sql = "UPDATE sales SET gioithieu='$gioithieu' WHERE MaSale=$id";
				mysqli_query($this->connect(), $sql);
			}
			if($noidung!=''){
				$sql = "UPDATE sales SET noidung='$noidung' WHERE MaSale=$id";
				mysqli_query($this->connect(), $sql);
			}
			if($gianguoilon!=''){
				$sql = "UPDATE sales SET gianguoilon='$gianguoilon' WHERE MaSale=$id";
				mysqli_query($this->connect(), $sql);
			}
			if($giatreem!=''){
				$sql = "UPDATE sales SET giatreem='$giatreem' WHERE MaSale=$id";
				mysqli_query($this->connect(), $sql);
			}
			if($ngaykhoihanh!=''){
				$sql = "UPDATE sales SET ngaykhoihanh='$ngaykhoihanh' WHERE MaSale=$id";
				mysqli_query($this->connect(), $sql);
			}
			if($diemkhoihanh!=''){
				$sql = "UPDATE sales SET diemkhoihanh='$diemkhoihanh' WHERE MaSale=$id";
				mysqli_query($this->connect(), $sql);
			}

			$imageUpload  = $_FILES['image'];
		    if (!$imageUpload['error']) {
		        $imageName = uniqid().'-'.$imageUpload['name'];
		        $pathSave = 'uploads/sales/';
		        move_uploaded_file($imageUpload['tmp_name'], $pathSave.$imageName);
		        // $image = $imageName;
		        // Remove anh cu khoi UPLOADS folder
		        // unlink($imageEdit);
		        $sql = "UPDATE sales SET image='$imageName' WHERE MaSale=$id";
				mysqli_query($this->connect(), $sql);
		    }

		    $imageUploadd  = $_FILES['slideshow'];
		    if (!$imageUploadd['error']) {
		        $imageNamee = uniqid().'-'.$imageUploadd['name'];
		        $pathSavee = 'uploads/sales/shows/';
		        move_uploaded_file($imageUploadd['tmp_name'], $pathSavee.$imageNamee);
		        // $slideshow = $imageNamee;
		        // Remove anh cu khoi UPLOADS folder
		        // unlink($imageEditt);
		        $sql = "UPDATE sales SET slideshow='$imageNamee' WHERE MaSale=$id";
				mysqli_query($this->connect(), $sql);
		    }
		if (mysqli_query($this->connect(), $sql) == TRUE) {
			header("Location: admin.php?controller=sales&action=listSales");
		}	
		}	
	}
?>