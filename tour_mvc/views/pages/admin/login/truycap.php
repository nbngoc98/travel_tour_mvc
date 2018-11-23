<?php
			include 'config/connect.php';
			include 'function.php';
			if(isset($_SESSION['username']))
			{
				$user_name = $_SESSION['username'];
				$sql = "SELECT * from admin where userAdmin LIKE '".$user_name."' AND status LIKE '1'";
				$result = $connect->query($sql);
			}

?>

<?php
	if(!$_SESSION['username'])
	{
    	redirectPage('index.php');
	}
	if(@$result->num_rows==1)
	{
	redirectPage('add_sp.php');
  } 
?>