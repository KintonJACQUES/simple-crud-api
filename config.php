<?php
$host 		= 'localhost';
$db_name 	= 'test';
$username	= 'root';
$password	= 'root';

try{
	$conn	= new PDO('mysql:host=' . $host . ';dbname=' . $db_name . ';charset=utf8', $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
}catch(PDOException $e){
	echo $e->getMessage();
}