<?php 
	include 'model/home/home_model.php';
	class HomeController {
		//public function xulyYeucau();
		public function handleReqquest() {
			$controller = isset($_GET['controller'])?$_GET['controller']:'home';
			$action = isset($_GET['action'])?$_GET['action']:'home';
			if ($controller == 'home') {
				switch ($action) {
					case 'home':
						// lay thong tin trang chu
						// Model lay thong tin trang chu
						$homeModel = new homeModel();
						$result = $homeModel->getHomepage();
						//Do du lieu ra views
						include 'views/templates/home/home.php';
						break;
					default:
						# code...
						break;
				}
			} elseif($controller == 'list') {
				switch ($action) {
					case 'listProduct':
						$listModel = new listModel();
						$result = $listModel->listProduct();
						include 'views/templates/list/list_product.php';
						break;
					case 'add':
						if (isset($_POST['add_product'])) {
							$name = $_POST['name'];
							$price = $_POST['price'];
							$description = $_POST['description'];
							$imageUpload = $_FILES['image'];
							// 1. lay duoc ten anh de luu vao database
							$imageName = uniqid().'-'.$imageUpload['name'];
							// $pathSave = 'uploads/'.$avatar;
							// 2. Upload anh len thu muc luu tru
							$pathSave = 'public/uploads/';
							move_uploaded_file($imageUpload['tmp_name'], $pathSave.$imageName);
							$listModel = new listModel();
							$listModel->addList($name, $price, $description,$imageName);
						}
						include 'views/templates/list/add_list.php';
						break;
					case 'delete':
						# code...
						$id = $_GET['id'];
						$listModel = new listModel();
						$listModel->deleteList($id);
						break;
					case 'edit':
						if (isset($_POST['edit_product'])) {
							$id = $_GET['id'];
							$name = $_POST['name'];
							$price = $_POST['price'];
							$description = $_POST['description'];
							$imageUpload  = $_FILES['image'];
							$image = uniqid().'-'.$imageUpload['name'];
							
							$listModel = new listModel();
							$listModel->editList( $name, $price, $description, $image, $id);
						}
						include 'views/templates/list/edit_list.php';
						break;
					default:
						# code...
						break;
				}
			}
		}
	}
?>