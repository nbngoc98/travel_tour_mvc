<!DOCTYPE html>
<html>
<head>
	<title>Admin shop</title>
</head>
<body>
	<?php include 'controller/admin_controller.php';?>
	<?php 
		$handleRequest = new HomeController();
		$handleRequest->handleReqquest();
	?>
</body>
</html>