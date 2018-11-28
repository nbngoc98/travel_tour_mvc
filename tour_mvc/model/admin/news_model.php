<?php 
	class news extends connectDB{
		public function list_news() {
			
			$sql = "SELECT * FROM `tintuc`";
		    $result = mysqli_query($this->connect(), $sql);
		    mysqli_set_charset($this->connect(),"utf8");	
			return $result;
		}
		public function delete_news($id){
			$sql = "DELETE FROM tintuc WHERE MaTinTuc = $id";
			mysqli_query($this->connect(), $sql);
			header("Location: admin.php?controller=tintuc&action=list_tintuc");
		}
		public function edit_news($id){
			$sql = "SELECT * FROM tintuc WHERE MaTinTuc = $id";
        	$resultt = mysqli_query($this->connect(), $sql);
        	return $resultt;
		}
		public function edit_newss($MaTinTuc,$TenTinTuc,$imageName,$NoiDung,$id){
			 $sql = "UPDATE tintuc SET MaTinTuc=$MaTinTuc, TenTinTuc='$TenTinTuc',NoiDung = '$NoiDung' WHERE MaTinTuc = $id";

			$imageUpload  = $_FILES['image'];
		    if (!$imageUpload['error']) {
		        $imageName = uniqid().'-'.$imageUpload['name'];
		        $pathSave = 'public/uploads/tintuc/';
		        move_uploaded_file($imageUpload['tmp_name'], $pathSave.$imageName);
		        $image = $imageName;
		        //Remove anh cu khoi UPLOADS folder
		        // unlink($imageEdit);
		        $sql = "UPDATE tintuc SET AnhTT='$imageName' WHERE MaSale=$id";
				mysqli_query($this->connect(), $sql);
		    }
		if (mysqli_query($this->connect(), $sql) == TRUE) {
			header("Location: admin.php?controller=tintuc&action=list_tintuc");
		}	
		}
		public function add_news($MaTinTuc,$TenTinTuc,$AnhTT,$NoiDung,$NgayGuiTT){
			$sql = "INSERT INTO `tintuc`(MaTinTuc,TenTinTuc,AnhTT,NoiDung,NgayGuiTT) VALUES ($MaTinTuc,'$TenTinTuc','$AnhTT','$NoiDung','$NgayGuiTT')";
			mysqli_query($this->connect(), $sql);
			header("Location: admin.php?controller=tintuc&action=list_tintuc");
		}
	}
?>