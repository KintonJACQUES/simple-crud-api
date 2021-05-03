<?php
require_once 'config.php';
global 	$conn;
$id		= $_GET['id'];
$name	= $_GET['name'];
$age	= $_GET['age'];
$email	= $_GET['email'];

if(empty($name) || empty($age) || empty($email)){
	echo "Fill in the REQUIRED fields!";
}
else{
	$sql	= "INSERT INTO users(name,age,email,is_active) VALUES (:name, :age,:email,0)";
	try{
		$query	= $conn->prepare($sql);
			$query->bindparam(':name', $name);
			$query->bindparam(':age', $age);
			$query->bindparam(':email', $email);
		$query->execute();
		print "User SAVED";
	}
	catch(PDOExeption $e){
		echo 'ERROR';
	}
}
?>