
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
</head>
<body>
	<?php include 'controller/admin_controller.php'; ?>
	<?php 
		$handleRequest = new HomeController();
		$handleRequest->handleReqquest();
	?>

</body>
</html>
	
