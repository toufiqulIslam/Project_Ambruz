<?php 
include_once 'upload/dbh.inc.php';
session_start();

$imgID = $_GET["idTest"];
$user = $_SESSION['user'];

if($imgID=="liked"){

	$imgID2 = $_GET["idPhoto"];
	$sql = "SELECT * FROM likes WHERE U_id = '$user' and IMG_id='$imgID2'";
	$stmt = mysqli_stmt_init($con);
	if(!mysqli_stmt_prepare($stmt,$sql)){
		echo "Server did not respond!!!";
	}else{
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);

		if(mysqli_num_rows($result)>0)
			$liked = "true";
	}
	echo json_encode($liked);
	
}
else if($imgID=="delete"){

	$liked="false";
	$imgID2 = $_GET["idPhoto"];

	$sql = "DELETE FROM gallery WHERE ID = '$imgID2'";
	$stmt = mysqli_stmt_init($con);
	if(!mysqli_stmt_prepare($stmt,$sql)){
		echo "Server did not respond!!!";
	}else{
		mysqli_query($con,$sql);
		$sql = "DELETE FROM likes WHERE IMG_id = '$imgID2'";
		$stmt = mysqli_stmt_init($con);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			echo "Server did not respond!!!";
		}else{
			mysqli_query($con,$sql);
			$sql = "DELETE FROM comments WHERE IMG_id = '$imgID2'";
			$stmt = mysqli_stmt_init($con);
			if(!mysqli_stmt_prepare($stmt,$sql)){
				echo "Server did not respond!!!";
			}else{
				mysqli_query($con,$sql);
				$liked = "true";
			}
		}
	}

	echo json_encode($liked);
	
}

//Comment
else if($imgID=="comment"){
	$imgID2 = $_GET["idPhoto"];
	$comment = $_GET["comment"];

	$sql = "INSERT INTO comments(U_id, IMG_id, Comment) VALUES('$user', '$imgID2','$comment')";
	$stmt = mysqli_stmt_init($con);
	if(!mysqli_stmt_prepare($stmt,$sql)){
		echo "Server did not respond!!!";
	}else{
		mysqli_query($con,$sql);
	}

	$sql = "UPDATE gallery SET Comments=Comments+1 WHERE ID = '$imgID2'";
	$stmt = mysqli_stmt_init($con);
	if(!mysqli_stmt_prepare($stmt,$sql)){
		echo "Server did not respond!!!";
	}else{
		mysqli_query($con,$sql);
	}

	$sql = "SELECT * FROM gallery WHERE ID = '$imgID2'";
	$stmt = mysqli_stmt_init($con);
	if(!mysqli_stmt_prepare($stmt,$sql)){
		echo "Server did not respond!!!";
	}else{
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);

		while ($row = mysqli_fetch_assoc($result)) {
			$commentCount = $row['Comments'];

		}
	}

	$comments = "<b>".$user."</b>".": ".$comment."%$#".$commentCount;

	echo json_encode($comments);
}
else if ($imgID=="commentShow") {
	$imgID2 = $_GET["idPhoto"];

	$sql = "SELECT * FROM comments WHERE IMG_id='$imgID2'";
	$stmt = mysqli_stmt_init($con);
	if(!mysqli_stmt_prepare($stmt,$sql)){
		echo "Server did not respond!!!";
	}
	else{
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);

		if(mysqli_num_rows($result)>0)
		{
			$commentsArr = array();
			while ($row = mysqli_fetch_assoc($result)) {
				array_push($commentsArr, "<b>".$row['U_id']."</b>".": ".$row['Comment']);
				//$commentArr = "<b>".$row['U_id']."</b>".": ".$row['Comment'];
			}
		}
	}
	echo json_encode($commentsArr);
}

//Visit
else if ($imgID=="visit") {
	$userID = $_GET["idUser"];

	$sql = "SELECT * FROM accounts WHERE Name='$userID'";
	$stmt = mysqli_stmt_init($con);
	if(!mysqli_stmt_prepare($stmt,$sql)){
		echo "Server did not respond!!!";
	}
	else{
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);

		if(mysqli_num_rows($result)>0)
		{
			while ($row = mysqli_fetch_assoc($result)) {
				$_SESSION["userVisit"] = $row['Name'];
				$_SESSION['emailVisit'] = $row['Email'];
				$_SESSION['prfVisit'] = $row['Profile_Photo'];
			}
		}
	}

	echo json_encode($user);
}


else{

	$sql = "SELECT * FROM likes WHERE U_id = '$user' and IMG_id='$imgID'";
	$stmt = mysqli_stmt_init($con);
	if(!mysqli_stmt_prepare($stmt,$sql)){
		echo "Server did not respond!!!";
	}else{
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);

		if(mysqli_num_rows($result)>0)
		{
			$sql = "DELETE FROM likes WHERE U_id = '$user' and IMG_id='$imgID'";
			$stmt = mysqli_stmt_init($con);
			if(!mysqli_stmt_prepare($stmt,$sql)){
				echo "Server did not respond!!!";
			}
			else{
				mysqli_query($con,$sql);

				$sql = "UPDATE gallery SET Likes=Likes-1 WHERE ID = '$imgID'";
				$stmt = mysqli_stmt_init($con);
				if(!mysqli_stmt_prepare($stmt,$sql)){
					echo "Server did not respond!!!";
				}else{
					mysqli_query($con,$sql);
				}
			}

			$test = "-";

		}
		else{

			$sql = "INSERT INTO likes(U_id, IMG_id) VALUES('$user', '$imgID')";
			$stmt = mysqli_stmt_init($con);
			if(!mysqli_stmt_prepare($stmt,$sql)){
				echo "Server did not respond!!!";
			}else{
				mysqli_query($con,$sql);
			}

			$sql = "UPDATE gallery SET Likes=Likes+1 WHERE ID = '$imgID'";
			$stmt = mysqli_stmt_init($con);
			if(!mysqli_stmt_prepare($stmt,$sql)){
				echo "Server did not respond!!!";
			}else{
				mysqli_query($con,$sql);
			}

			$test = "+";

		}

		$sql = "SELECT * FROM gallery WHERE ID = '$imgID'";
		$stmt = mysqli_stmt_init($con);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			echo "Server did not respond!!!";
		}else{
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);

			while ($row = mysqli_fetch_assoc($result)) {
				$test = $test.$row['Likes'];

			}
		}

		$myarray = array($test);

		echo json_encode($myarray);
	}
}
?>