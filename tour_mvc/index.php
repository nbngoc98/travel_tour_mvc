
<?php
// error_reporting(0);
// session_start();
?>  
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
</head>
<body>
	<?php include 'controller/home_controller.php'; ?>
	<?php 
		$handleRequest = new HomeController();
		$handleRequest->handleReqquest();
	?>

</body>
</html>
	