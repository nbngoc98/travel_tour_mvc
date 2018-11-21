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
			mysqli_set_charset($this->connect, 'utf8' );	
			return $this->connect;
			
		}
	}
	
?>