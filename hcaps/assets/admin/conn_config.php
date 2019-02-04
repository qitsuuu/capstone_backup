<?php
$servername = 'localhost';
$username = 'root';
$password = '051798qv';
$database = 'healthcasesps_db';

	try{
		$dbConn = new PDO("mysql:host =$servername;dbname=$database", $username, $password);

		  $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		  // echo "Connected successfully"; 
	}catch (PDOExeption $e){
		echo "Connection failed: " . $e->getMessage();
	}
?>