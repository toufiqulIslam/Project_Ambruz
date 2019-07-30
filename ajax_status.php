<?php 
include_once 'upload/dbh.inc.php';
session_start();

$type = $_GET["type"];

$user = $_GET["idUser"];

$sql = "UPDATE accounts SET Status='$type' WHERE ID = '$user'";;
$stmt = mysqli_stmt_init($con);
if(!mysqli_stmt_prepare($stmt,$sql)){
	$send = "Server did not respond!!!";
}else{
	mysqli_query($con,$sql);
	$send = "true";
}

echo json_encode($send);

?>