<?php 
	class connectDB{
		var $server = 'localhost';
		var $username = 'root';
		var $password = ''; 
		var $database = 'travel_tour';
		var $connect = '';
		var $font ='';
		function connect(){
			$this->connect = mysqli_connect($this->server, $this->username, $this->password, $this->database);		
			return $this->connect;
			
		}
		// if(!$connect) {
		// 	echo 'Không thể kết nối Database';
		// } else {
		// 	mysqli_set_charset($connect, 'utf8' );
		// 	date_default_timezone_set('Asia/Ho_Chi_Minh');
		// }
		
	}
	
?>