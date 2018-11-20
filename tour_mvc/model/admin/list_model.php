<?php 
	class listModel extends connectDB {
		public function listProduct() {
			$sql = "SELECT * FROM product";
		    $result = mysqli_query($this->connect(), $sql);
			return $result;
		}
		public function deleteList($id){
			$sql = "DELETE FROM product WHERE id = $id";
			mysqli_query($this->connect(), $sql);
			header("Location: admin.php?controller=list&action=listProduct");
		}

		public function addList($name, $price, $description,$imageName){
			mysqli_set_charset($this->connect(),"utf8");
			$sql = "INSERT INTO product (name,description, price, image) 
			        VALUES('$name', '$description', '$price','$imageName')";
			mysqli_query($this->connect(), $sql);
			header("Location: admin.php?controller=list&action=listProduct");
		}

		public function editList($name, $price, $description,$image,$id){
			if($name!=''){
				$sql = "UPDATE product SET name='$name' WHERE id=$id";
				mysqli_query($this->connect(), $sql);
			}
			if($price!=''){
				$sql = "UPDATE product SET price='$price' WHERE id=$id";
				mysqli_query($this->connect(), $sql);
			}
			if($description!=''){
				$sql = "UPDATE product SET description='$description' WHERE id=$id";
				mysqli_query($this->connect(), $sql);
			}

			 $imageUpload  = $_FILES['image'];
			  if (!$imageUpload['error']) {
			        $image =  uniqid().'-'.$imageUpload['name'];
			        $pathSave = 'public/uploads/';
			        move_uploaded_file($imageUpload['tmp_name'], $pathSave.$image);
			        // Remove anh cu khoi UPLOADS folder
			        // unlink($imageEdit);
			        $sql = "UPDATE product SET image='$image' WHERE id=$id";
					mysqli_query($this->connect(), $sql);
			      }
			
			if (mysqli_query($this->connect(), $sql) == TRUE) {
			    header("Location: admin.php?controller=list&action=listProduct");
			}		
		}
	}
?>