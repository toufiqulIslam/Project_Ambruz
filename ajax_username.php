<?php 
include_once 'upload/dbh.inc.php';
session_start();

$type = $_GET["type"];

if($type=="username"){
	$user = $_GET["username"];

	$sql = "SELECT * FROM accounts WHERE Name = '$user'";
	$stmt = mysqli_stmt_init($con);
	if(!mysqli_stmt_prepare($stmt,$sql)){
		echo "Server did not respond!!!";
	}else{
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);

		if(mysqli_num_rows($result)>0){
			while ($row = mysqli_fetch_assoc($result)) {
				if ($row['Status']=="Ban") {
					$exist = "false";
				}
				else
					$exist = "true";
			}
		}

		else
			$exist = "false";
	}
	echo json_encode($exist);
}

else if($type=="validate"){
	$user = $_GET["username"];
	$pass = $_GET["pass"];

	$sql = "SELECT * FROM accounts WHERE Name = '$user' and Password = '$pass'";
	$stmt = mysqli_stmt_init($con);
	if(!mysqli_stmt_prepare($stmt,$sql)){
		echo "Server did not respond!!!";
	}else{
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);

		if(mysqli_num_rows($result)>0)
		{
			while ($row = mysqli_fetch_assoc($result)) {

				if($row['Name']=="Toufiqul Islam" && $row['Password']=="11119999$"){

					$_SESSION['done'] = 2;
					$_SESSION["user"] = "Toufiqul Islam";

					$exist = "true2";
				}
				else{
					if($row['Status']=="Ban"){
						$exist = "true3";
					}
					else{
						$_SESSION['done'] = 1;
						$_SESSION["user"] = $row['Name'];
						$_SESSION['email'] = $row['Email'];
						$_SESSION['passLogin'] = $row['Password'];
						$_SESSION['prf'] = $row['Profile_Photo'];

						$exist = "true";
					}
				}
			}
		}
		else
			$exist = "false";
	}
	
	echo json_encode($exist);
}

else if($type == "email"){

	$email = $_GET["email"];

	$sql = "SELECT * FROM accounts WHERE Email = '$email'";
	$stmt = mysqli_stmt_init($con);
	if(!mysqli_stmt_prepare($stmt,$sql)){
		echo "Server did not respond!!!";
	}else{
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);

		if(mysqli_num_rows($result)>0)
			$exist = "true";
		else
			$exist = "false";
	}
	echo json_encode($exist);
}

else if($type == "save"){

	$email=$_GET['email'];
	$pass = $_GET['pass'];
	$conPass = $_GET['conPass'];

	for ($i=0; $i <strlen($pass) ; $i++){
		if (ord($pass[$i]) == 64 || ord($pass[$i]) == 35 || 
			ord($pass[$i]) == 36 || ord($pass[$i]) == 37){

			$valid=1;
		break; 
	}
	else
		$valid=0;
}

if ((strlen($pass))<8) {
	$send="Password must have at least 8 characters";
}
else if($valid==0){
	$send="Password must contain one of the special Characters(@, #, $, %)"."<br/>";
}
else if((strlen($conPass))<8 && (strlen($conPass))>=1) {
	$send="Password must have at least 8 characters";
}
elseif($pass != $conPass){
	$send="Two Password did not matched";
}
else{
	$sql = "UPDATE accounts SET Password='$pass' WHERE Email = '$email'";
	$stmt = mysqli_stmt_init($con);
	if(!mysqli_stmt_prepare($stmt,$sql)){
		echo "Server did not respond!!!";
	}else{
		mysqli_query($con,$sql);
		$send="Password Recovery Successful";
	}

}

echo json_encode($send);
}

?>