<?php
require_once 'config.php'; global $conn;
$id		= $_GET['id'];
$name	= $_GET['name'];
$age	= $_GET['age'];
$email	= $_GET['email'];
$delete	= $_GET['delete'];
	
if(empty($name) || empty($age) || empty($email)){
	echo "Fill in the REQUIRED fields!";
}else{
	$sql	= "UPDATE users SET name=:name, age=:age, email=:email";	
	$sql	= isset($delete) ? $sql . ", is_active=1 " : $sql . '';
	$sql	= $sql . " WHERE id=:id";
	try{
		$query	= $conn->prepare($sql);
			$query->bindparam(':name', $name);
			$query->bindparam(':age', $age);
			$query->bindparam(':email', $email);
			$query->bindparam(':id', $id);
		$query->execute();
		print "User "; print isset($delete) ? "DELETED" : "UPDATED";
	}catch(PDOExeption $e){
		echo 'ERROR';
	}
}
?>