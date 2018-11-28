<?php 
	include 'model/admin/admin_model.php';
	include 'model/admin/comment_model.php';
	include 'model/admin/user_model.php';
	include 'model/admin/phanhoi_model.php';
	include 'model/admin/sales_model.php';
	include 'model/admin/login_model.php';
	include 'model/admin/tour_model.php';
	include 'model/admin/loaitour_model.php';
	include 'model/admin/news_model.php';
	include 'model/admin/thanhvien_model.php';


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
												$_SESSION['u']=  $user_name;
												$_SESSION['p']= $pass1;
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

						    //dổi định dạng 
						    // $vietnam_format_number = number_format($gianguoilon, 2, ',', '.');

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
			}elseif($controller == 'tintuc') {
				switch ($action) {
					case 'list_tintuc':
						$news = new news();
						$news = $news->list_news();
						include 'views/pages/admin/news/list_news.php';
						break;
					case 'them_tintuc':
						if (isset($_POST['them_tintuc'])) {
							$MaTinTuc = $_POST['MaTinTuc'];
						    $TenTinTuc = $_POST['TenTinTuc'];
						    
						    $NoiDung = $_POST['NoiDung'];
						    
			
						    
						    $created1 = date("Y-m-d h:i:s");
						    //đổi định dạng Date
						    
							//lấy ngày hiện tại
						    // $created2 = date("Y-m-d h:i:s");
						    //Ảnh chính
						    $imageUpload = $_FILES['AnhTT'];
						    // 1. lay duoc ten anh de luu vao database
						    $imageName = uniqid().'-'.$imageUpload['name'];
						    $pathSave = 'public/uploads/tintuc/';
						    move_uploaded_file($imageUpload['tmp_name'], $pathSave.$imageName);

						    //ảnh slideshow
						    // $imageUploadd = $_FILES['slideshow'];
						    // // 1. lay duoc ten anh de luu vao database
						    // $imageNamee = uniqid().'-'.$imageUploadd['name'];
						    // $pathSavee = 'public/uploads/sales/shows/';
						    // move_uploaded_file($imageUploadd['tmp_name'], $pathSavee.$imageNamee);

							$news = new news();
							$news->add_news($MaTinTuc,$TenTinTuc,$imageName,$NoiDung,$created1);
						}
						
						include 'views/pages/admin/news/add_news.php';
						break;
					case 'delete':
						# code...
						$id = $_GET['id'];
						$news = new news();
						$news->delete_news($id);
						break;
					// case 'edit':
					// 	$id = $_GET['id'];
					// 	$salesModel = new salesModel();
					// 	$result = $salesModel->editSales($id);
					// 	include 'views/pages/admin/sales/edit_sale.php';
					// 	break;
					case 'edit':
						if (isset($_POST['edit_tintuc'])) {
							$id = $_GET['id'];
							$MaTinTuc = $_POST['MaTinTuc'];
						    $TenTinTuc = $_POST['TenTinTuc'];
						    
						    $NoiDung = $_POST['NoiDung'];
						    
			
						    
						    $created1 = date("Y-m-d h:i:s");
						    //đổi định dạng Date
						    
							//lấy ngày hiện tại
						    // $created2 = date("Y-m-d h:i:s");
						    //Ảnh chính
						    $imageUpload = $_FILES['image'];
						    // 1. lay duoc ten anh de luu vao database
						    $imageName = uniqid().'-'.$imageUpload['name'];
						    $pathSave = 'public/uploads/tintuc/';
						    move_uploaded_file($imageUpload['tmp_name'], $pathSave.$imageName);
							
							$news = new news();
							$news->edit_newss($MaTinTuc,$TenTinTuc,$imageName,$NoiDung,$id);
							
						}
						$id = $_GET['id'];
						$news = new news();
						
						$resultt = $news->edit_news($id);
						include 'views/pages/admin/news/edit_news.php';
						break;
					default:
						# code...
						break;
				}
			}elseif($controller == 'thanhVien') {
				switch ($action) {
					case 'listTV':
						$customer = new customer();
						$result = $customer->list_customer();
						include 'views/pages/admin/thanhVien/list_customer.php';
						break;
					case 'delete':
						# code...
						$id = $_GET['id'];
						$customer = new customer();
						$customer->delete_customer($id);
						break;
					// case 'edit':
					// 	$id = $_GET['id'];
					// 	$salesModel = new salesModel();
					// 	$result = $salesModel->editSales($id);
					// 	include 'views/pages/admin/sales/edit_sale.php';
					// 	break;
					case 'edit':
						if (isset($_POST['edit_customer'])) {
							$id = $_GET['id'];
							$MaTV = $_POST['MaTV'];
						    $usename = $_POST['usename'];
						    $passTV = $_POST['passTV'];
						    $hoten = $_POST['hoten'];
						    $gioitinh = $_POST['gioitinh'];

						    $emailTV = $_POST['emailTV'];
						    $diachi = $_POST['diachi'];
						    $soCMT = $_POST['soCMT'];
						    $soDT = $_POST['soDT'];
							
							$customer = new customer();
							$customer->edit_customerr($MaTV,$usename,$passTV,$hoten,$gioitinh,$emailTV,$diachi,$soCMT,$soDT,$id);
						}
						$id = $_GET['id'];
						$customer = new customer();
						$resultt = $customer->edit_customer($id);
						include 'views/pages/admin/thanhvien/edit_thanhvien.php';
						break;
					default:
						# code...
						break;
				}
			}elseif($controller == 'loaitour') {
				switch ($action) {
					case 'listLoaiTour':
						$loaitour = new loaitour();
						$result = $loaitour->list_loaitour();
						include 'views/pages/admin/loaitour/list_loaitour.php';
						break;
					case 'addLoaiTour':
						if (isset($_POST['add_loaitour'])) {
					    
						$MaLoai = $_POST['MaLoai'];
						$TenLoai = $_POST['TenLoai'];
						$loaitour = new loaitour();
						$loaitour->add_loaitour($MaLoai,$TenLoai);
						}
						
						include 'views/pages/admin/loaitour/add_loaitour.php';
						break;
					case 'edit':
						if (isset($_POST['edit_loaitour'])) {
					    $id = $_GET['id'];
						$MaLoai = $_POST['MaLoai'];
						$TenLoai = $_POST['TenLoai'];
						$loaitour = new loaitour();
						$loaitour->edit_loaitourr($MaLoai,$TenLoai,$id);
						}
						$id = $_GET['id'];
						$loaitour = new loaitour();
						$resultt = $loaitour->edit_loaitour($id);
						include 'views/pages/admin/loaitour/edit_loaitour.php';
						break;
					case 'delete':
						# code...
						$id = $_GET['id'];
						$loaitour = new loaitour();
						$loaitour->delete_loaitour($id);
						break;
					
					default:
						# code...
						break;
				}
			}elseif($controller == 'tour') {
				switch ($action) {
					case 'listTour':
						$tourModel = new tourModel();
						$result = $tourModel->list_tour();
						include 'views/pages/admin/tour/list_tour.php';
						break;
					case 'addTour':
						if (isset($_POST['add_Tour'])) {
							$MaTour = $_POST['MaTour'];
						    $MaLoai = $_POST['MaLoai'];
						    $TenTour = $_POST['TenTour'];
						    $tgian = $_POST['tgian'];
						    $NoiDungTour = $_POST['NoiDungTour'];
						    $GiaNguoiLon = $_POST['GiaNguoiLon'];
						    $GiaTreEm = $_POST['GiaTreEm'];
						    $DiemKhoiHanh = $_POST['DiemKhoiHanh'];
						    $ngaykhoihanh = $_POST['ngaykhoihanh'];
						    
						    $created1 = date("Y-m-d h:i:s");
						    //đổi định dạng Date
						    $ngaykhoihanh_moi = date("Y-m-d", strtotime($ngaykhoihanh));
							//lấy ngày hiện tại
						    // $created2 = date("Y-m-d h:i:s");
						    //Ảnh chính
						    $imageUpload = $_FILES['image'];
						    // 1. lay duoc ten anh de luu vao database
						    $imageName = uniqid().'-'.$imageUpload['name'];
						    $pathSave = 'public/uploads/tour/';
						    move_uploaded_file($imageUpload['tmp_name'], $pathSave.$imageName);

						    //ảnh slideshow
						    // $imageUploadd = $_FILES['slideshow'];
						    // // 1. lay duoc ten anh de luu vao database
						    // $imageNamee = uniqid().'-'.$imageUploadd['name'];
						    // $pathSavee = 'public/uploads/sales/shows/';
						    // move_uploaded_file($imageUploadd['tmp_name'], $pathSavee.$imageNamee);

							$tourModel = new tourModel();
							$tourModel->add_tour($MaTour,$MaLoai,$TenTour,$tgian,$NoiDungTour,$imageName,$GiaNguoiLon,$GiaTreEm,$DiemKhoiHanh,$created1);
						}
						$tourModel = new tourModel();
						$result = $tourModel->addLoaiTour();
						include 'views/pages/admin/tour/add_tour.php';
						break;
					case 'delete':
						# code...
						$id = $_GET['id'];
						$tourModel = new tourModel();
						$tourModel->delete_tour($id);
						break;
					// case 'edit':
					// 	$id = $_GET['id'];
					// 	$salesModel = new salesModel();
					// 	$result = $salesModel->editSales($id);
					// 	include 'views/pages/admin/sales/edit_sale.php';
					// 	break;
					case 'edit':
						if (isset($_POST['edit_tour'])) {
							$id = $_GET['id'];
							$MaTour = $_POST['MaTour'];
						    $MaLoai = $_POST['MaLoai'];
						    $TenTour = $_POST['TenTour'];
						    $tgian = $_POST['tgian'];
						    $NoiDungTour = $_POST['NoiDungTour'];
						    $GiaNguoiLon = $_POST['GiaNguoiLon'];
						    $GiaTreEm = $_POST['GiaTreEm'];
						    $NgayKhoiHanh = $_POST['NgayKhoiHanh'];
						    $DiemKhoiHanh = $_POST['DiemKhoiHanh'];

						    //đổi định dạng Date
							$ngaykhoihanh_moi = date("Y-m-d", strtotime($NgayKhoiHanh));
							
							//anh moi
							$imageUpload = $_FILES['imageee'];
						    // 1. lay duoc ten anh de luu vao database
						    $imageName = uniqid().'-'.$imageUpload['name'];
						    $pathSave = 'public/uploads/tour/';
							move_uploaded_file($imageUpload['tmp_name'], $pathSave.$imageName);
							// $imageE    = 'public/uploads/tour/'.$row['AnhTour'];
							// unlink($imageE);
							$tourModel = new tourModel();
							$tourModel->edit_tour($MaTour,$MaLoai,$TenTour,$tgian,$NoiDungTour,$imageName,$GiaNguoiLon,$GiaTreEm,$DiemKhoiHanh,$id);
						}
						$id = $_GET['id'];
						$tourModel = new tourModel();
						$result = $tourModel->edittour($id);
						$resultt = $tourModel->edittourr($id);
						include 'views/pages/admin/tour/edit_tour.php';
						break;
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