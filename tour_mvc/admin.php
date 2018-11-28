<?php
session_start();
?>  

<?php include 'controller/admin_controller.php'; ?>
<?php 
	$handleRequest = new HomeController();
	$handleRequest->handleReqquest();
?>
