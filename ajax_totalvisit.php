<?php 
include_once 'upload/dbh.inc.php';
session_start();

$user = $_SESSION['userVisit'];

	$sql = "SELECT * FROM gallery WHERE Owner = '$user'";
	$stmt = mysqli_stmt_init($con);
	if(!mysqli_stmt_prepare($stmt,$sql)){
		echo "Server did not respond!!!";
	}else{
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);

		if(mysqli_num_rows($result)>0)
		{
			$total=mysqli_num_rows($result);
			$like = 0;
			$comment = 0;
			while ($row = mysqli_fetch_assoc($result)) {
				$like += (int)$row['Likes'];
				$comment += (int)$row['Comments'];
			}
		}
	}

	$send = "<b>Total Photos : </b> ".$total."<br/> <b>Likes: </b> ".$like." <br/> <b>Comments: </b> ".$comment;

	echo json_encode($send);

?>