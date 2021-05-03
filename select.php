<?php
require_once 'config.php'; global $conn;
$id		= $_GET['id'];

$sql	= "SELECT name, IF(is_active, 'true', 'false') as 'ACTIVE ?' from users";
	$sql= isset($id) ? $sql . " WHERE id=" . $id : $sql;
try{
	$query	= $conn->prepare($sql);
		$query->execute();
	echo "\n" . json_encode($query->fetchAll(PDO::FETCH_ASSOC));
}catch(PDOExeption $e){
	echo 'ERROR';
}
?>

