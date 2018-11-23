<?php 
	include 'model/admin/admin_model.php';
	include 'model/admin/comment_model.php';
	include 'model/admin/user_model.php';
	include 'model/admin/phanhoi_model.php';
	include 'model/admin/sales_model.php';
	include 'model/admin/login_model.php';
	include 'model/admin/tour_model.php';

	class HomeController {
		//public function xulyYeucau();
		public function handleReqquest() {
			$controller = isset($_GET['controller'])?$_GET['controller']:'login';
			$action = isset($_GET['action'])?$_GET['action']:'login';
			if ($controller == 'login') {
				switch ($action) {
					case 'login':
						if(isset($_POST["Submit"])){
							//Validate form
							$user_name = $_POST['username'];
							$errUsername ="";	
							$pass = $_POST['password'];
							$errPass ="";
							$check = true;
							if($user_name == ""){
								$check = false;
								$errUsername = "Bạn chưa nhập Username!";
							} else {
								$errUsername ="";
							}
							if($pass == ""){
								$check = false;
								$errPass = "Bạn chưa nhập Password!";
							} else {
								$errPass ="";
							}
						    if ($check) {
						    		$pass1 = md5($pass);
						    		$loginModel = new loginModel();
									$result = $loginModel->login($user_name, $pass1);
									if ($result->num_rows == 0) {
									?><script type="text/javascript">alert("Đăng nhập không thành công - Mời kiểm tra lại!")</script>;<?php
									} else {
						     				?>
												<script language="javascript">
												window.alert("Chúc mừng bạn đã đăng nhập thành công!");
												window.location="admin.php?controller=home&action=home"
												</script>
											<?php
												$_SESSION['e']=  $user_name;
												$_SESSION['b']= $pass1;
												exit();
											}
								}
						}
						include 'views/pages/admin/login/login.php';
						break;
					case 'logout':
  						include 'views/pages/admin/login/logout.php';
						break;
					default:
						# code...
						break;
				}
			}elseif($controller == 'home') {
				switch ($action) {
					case 'home':
						// lay thong tin trang chu
						// Model lay thong tin trang chu
						$adminModel = new adminModel();
						$result = $adminModel->getAdminpage();
						//Do du lieu ra views
						include 'views/pages/admin/home_admin.php';
						break;
					default:
						# code...
						break;
				}
			} elseif($controller == 'comment') {
				switch ($action) {
					case 'listComment':
						$commentModel = new commentModel();
						$result = $commentModel->listComment();
						include 'views/pages/admin/comment/list_comment.php';
						break;
					case 'reply':
						if (isset($_POST['reply_cmt'])) {
					    $id = $_GET['id'];
						$reply = $_POST['reply'];
						$commentModel = new commentModel();
						$commentModel->replyComment($reply,$id);
						}
						include 'views/pages/admin/comment/reply.php';
						break;
					case 'delete':
						# code...
						$id = $_GET['id'];
						$commentModel = new commentModel();
						$commentModel->deleteComment($id);
						break;
					
					default:
						# code...
						break;
				}
			} elseif($controller == 'user') {
				switch ($action) {
					case 'listUser':
						$userModel = new userModel();
						$result = $userModel->listUser();
						include 'views/pages/admin/user/list_user.php';
						break;
					default:
						# code...
						break;
				}
			}  elseif($controller == 'phanhoi') {
				switch ($action) {
					case 'listPhanhoi':
						$phanhoiModel = new phanhoiModel();
						$result = $phanhoiModel->listPhanhoi();
						include 'views/pages/admin/phanhoi/list_phanhoi.php';
						break;
					case 'delete':
						# code...
						$id = $_GET['id'];
						$phanhoiModel = new phanhoiModel();
						$phanhoiModel->deletePhanhoi($id);
						break;
					default:
						# code...
						break;
				}
			} elseif($controller == 'sales') {
				switch ($action) {
					case 'listSales':
						$salesModel = new salesModel();
						$result = $salesModel->listSales();
						include 'views/pages/admin/sales/list_sale.php';
						break;
					case 'add':
						if (isset($_POST['add_sale'])) {
							$MaSale = $_POST['MaSale'];
						    $title = $_POST['title'];
						    $tgian = $_POST['tgian'];
						    $noidung = $_POST['noidung'];
						    $gianguoilon = $_POST['gianguoilon'];
						    $giatreem = $_POST['giatreem'];
						    $ngaykhoihanh = $_POST['ngaykhoihanh'];
						    $giokhoihanh = $_POST['giokhoihanh'];
						    $diemkhoihanh = $_POST['diemkhoihanh'];
						    $startSale = $_POST['startSale'];
						    $stopSale = $_POST['stopSale'];
						    $MaLoai = $_POST['MaLoai'];

						    //đổi định dạng Date
						    $ngaykhoihanh_moi = date("Y-m-d", strtotime($ngaykhoihanh));
						    $startSale_new = date("Y-m-d", strtotime($startSale));
						    $stopSale_new = date("Y-m-d", strtotime($stopSale));
							//lấy ngày hiện tại
						    $created = date("Y-m-d h:i:s");
						    //Ảnh chính
						    $imageUpload = $_FILES['image'];
						    // 1. lay duoc ten anh de luu vao database
						    $imageName = uniqid().'-'.$imageUpload['name'];
						    $pathSave = 'public/uploads/sales/';
						    move_uploaded_file($imageUpload['tmp_name'], $pathSave.$imageName);

						    //ảnh slideshow
						    $imageUploadd = $_FILES['slideshow'];
						    // 1. lay duoc ten anh de luu vao database
						    $imageNamee = uniqid().'-'.$imageUploadd['name'];
						    $pathSavee = 'public/uploads/sales/shows/';
						    move_uploaded_file($imageUploadd['tmp_name'], $pathSavee.$imageNamee);

							$salesModel = new salesModel();
							$salesModel->doaddSales($MaSale, $MaLoai, $title, $tgian, $noidung, $imageName, $gianguoilon, $giatreem, $ngaykhoihanh_moi, $giokhoihanh, $diemkhoihanh, $created, $imageNamee, $startSale_new, $stopSale_new);
						}
						$salesModel = new salesModel();
						$result = $salesModel->addSales();
						include 'views/pages/admin/sales/add_sale.php';
						break;
					case 'delete':
						# code...
						$id = $_GET['id'];
						$salesModel = new salesModel();
						$salesModel->deleteSales($id);
						break;
					// case 'edit':
					// 	$id = $_GET['id'];
					// 	$salesModel = new salesModel();
					// 	$result = $salesModel->editSales($id);
					// 	include 'views/pages/admin/sales/edit_sale.php';
					// 	break;
					case 'edit':
						if (isset($_POST['edit_sale'])) {
							$id = $_GET['id'];
							$MaSale = $_POST['MaSale'];
						    $title = $_POST['title'];
						    $tgian = $_POST['tgian'];
						    $noidung = $_POST['noidung'];
						    $gianguoilon = $_POST['gianguoilon'];
						    $giatreem = $_POST['giatreem'];
						    $ngaykhoihanh = $_POST['ngaykhoihanh'];
						    $giokhoihanh = $_POST['giokhoihanh'];
						    $diemkhoihanh = $_POST['diemkhoihanh'];
						    $startSale = $_POST['startSale'];
						    $stopSale = $_POST['stopSale'];
						    $MaLoai = $_POST['MaLoai'];

						    //đổi định dạng Date
						    $ngaykhoihanh_moi = date("Y-m-d", strtotime($ngaykhoihanh));
						    $startSale_new = date("Y-m-d", strtotime($startSale));
						    $stopSale_new = date("Y-m-d", strtotime($stopSale));

							$imageUpload  = $_FILES['image'];
							$imageName = uniqid().'-'.$imageUpload['name'];

							$imageUploadd  = $_FILES['slideshow'];
							$imageNamee = uniqid().'-'.$imageUploadd['name'];
							
							$salesModel = new salesModel();
							$result = $salesModel->doeditSales( $MaSale, $MaLoai, $title, $tgian, $noidung, $imageName, $gianguoilon, $giatreem, $ngaykhoihanh_moi, $giokhoihanh, $diemkhoihanh, $imageNamee, $startSale_new, $stopSale_new, $id);
						}
						$id = $_GET['id'];
						$salesModel = new salesModel();
						$result = $salesModel->editSales($id);
						$resultt = $salesModel->editSaless($id);
						include 'views/pages/admin/sales/edit_sale.php';
						break;
					default:
						# code...
						break;
				}
			}elseif($controller == 'tour') {
				switch ($action) {
					case 'listDate':
						$tourModel = new tourModel();
						$result = $tourModel->listDate();
						include 'views/pages/admin/tour/date.php';
						break;
					case 'addDate':
						if (isset($_POST['add_date'])) {
							$MaTour = $_POST['MaTour'];
						    $ngaykhoihanh = $_POST['ngaykhoihanh'];
						    //đổi định dạng Date
						    $ngaykhoihanh_moi = date("Y-m-d", strtotime($ngaykhoihanh));

							$tourModel = new tourModel();
							$tourModel->doaddDate($MaTour, $ngaykhoihanh_moi);
						}
						$tourModel = new tourModel();
						$result = $tourModel->addDate();
						include 'views/pages/admin/tour/add_date.php';
						break;
					case 'deleteDate':
						# code...
						$id = $_GET['id'];
						$tourModel = new tourModel();
						$tourModel->deleteDate($id);
						break;
					// case 'edit':
					// 	$id = $_GET['id'];
					// 	$salesModel = new salesModel();
					// 	$result = $salesModel->editSales($id);
					// 	include 'views/pages/admin/sales/edit_sale.php';
					// 	break;
					case 'editDate':
						if (isset($_POST['edit_date'])) {
							$id = $_GET['id'];
							$MaTour = $_POST['MaTour'];
						    $ngaykhoihanh = $_POST['ngaykhoihanh'];

						    //đổi định dạng Date
						    $ngaykhoihanh_moi = date("Y-m-d", strtotime($ngaykhoihanh));
							
							$tourModel = new tourModel();
							$result = $tourModel->doeditDate($MaTour, $ngaykhoihanh_moi, $id);
						}
						$id = $_GET['id'];
						$tourModel = new tourModel();
						$result = $tourModel->editDate($id);
						$resultt = $tourModel->editDatee($id);
						include 'views/pages/admin/tour/edit_date.php';
						break;
					default:
						# code...
						break;
				}
			}
		}
	}
?>