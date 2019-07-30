<?php 
session_start();

if(!isset($_SESSION['done'])){
	header("location: login.php");
}
?>
<html>
<head>
	<title>Ambruz| User</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="font-awesome/css/all.css">

	<script type="text/javascript">

		function visit(name,id){

			let ajax = new XMLHttpRequest();
			ajax.open("GET", "ajax_like.php?idTest="+"visit"+"&idUser="+name);
			ajax.onload = function(){
				if(this.readyState == 4 && this.status == 200){
					let nameU = JSON.parse(this.responseText);
					$("#"+id).attr("href", "UserVisit.php");
					document.getElementById(id).click();
				}
			}
			ajax.send();
		}

		function status(id){

			let userID = id.replace("status","");
			let type = document.getElementById(userID+"statusShow").innerHTML.trim();

			let ajax = new XMLHttpRequest();
			ajax.open("GET", "ajax_status.php?type="+type+"&idUser="+userID);

			ajax.onload = function(){
				if(this.readyState == 4 && this.status == 200){
					let status = JSON.parse(this.responseText);
					if(status=="true"){
						if(type == "Ban"){
							document.getElementById(userID+"statusShow").innerHTML = " Active";
						}
						else if(type == "Active"){
							document.getElementById(userID+"statusShow").innerHTML = " Ban";
						}
					}
				}
			}
			ajax.send();

		}

	</script>

</head>
<body>
	<nav>
		<p><a href="index.php"><b><i>Ambruz</i></b></a></p>
		<ul>
			<li><a href="shots.php">Shots</a></li>
			<li><a href="design.php">Designs</a></li>
			<li><a href="#">Community</a></li>
			<li><a href="license.php">Learn</a></li>
			<li><a href="about.php">About</a></li>
			<li><a href="logout.php" id="logout" class="logoutMenu">Log out</a></li>
			<li><a href="register.php" class="signupMenu">Sign Up</a></li>
		</ul>
	</nav>

	<div class="admin">
		<div class="users">
			<?php 

			include_once 'upload/dbh.inc.php';

			function detail($id){
					//include_once 'upload/dbh.inc.php';
				$con = mysqli_connect("localhost", "root", "", "ambruzdb");
				$sql = "SELECT * FROM gallery WHERE Owner = '$id'";
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
					else{
						$total=0;
						$like = 0;
						$comment = 0;
					}
				}

				$send = "<b>Total Photos : </b> ".$total."<br/> <b>Likes: </b> ".$like." <br/> <b>Comments: </b> ".$comment;

				return $send;
			}


			$sql = "SELECT * FROM accounts";
			$stmt = mysqli_stmt_init($con);
			if(!mysqli_stmt_prepare($stmt,$sql)){
				echo "Server did not respond!!!";
			}else{
				mysqli_stmt_execute($stmt);
				$result = mysqli_stmt_get_result($stmt);

				$color = array("#FF8800","#007E33","#0099CC","#2BBBAD","#9933CC","#4a148c","#512da8","#e65100","#aa66cc","#4285F4","#00695c","#4B515D","#3F729B","#880e4f","#8e24aa","#4a148c","#aa00ff","#2196f3");
				$randColor = "#FF8800";

				while ($row = mysqli_fetch_assoc($result)) {
					$send = detail($row['Name']);
					if($row['Status']!="Admin"){

						for ($i=0; $i <4 ; $i++) { 
							if($i%2==0)
								$randColor = $color[rand(0,17)];
							else
								$randColor = $color[rand(9,17)];
						}

						?>
						<a onclick="visit(name,id)" style="background-color: <?php echo $randColor; ?>;" name="<?php echo $row['Name'] ?>" id="<?php echo $row['ID'] ?>" href="#"><p><?php echo "Name : ".$row['Name']."<br/>"."Email : ".$row['Email']."<br/><br/>".$send; ?></p></a>
						<p onclick="status(id)" id="<?php echo $row['ID']."status"; ?>" ><i id="<?php echo $row['ID']."statusShow"; ?>" class="fas fa-ban"> <?php if($row['Status']=="Ban"){echo "Active";} else if ($row['Status']=="Active") {echo "Ban";} ?> </i></p>

						<?php
					}
				}
			}
			?>
		</div>
	</div>
	<footer id="footer">
		<p><font color="white"><br/>&copy AMBRUZ 2019 All rights reserved</font></p>
	</footer>
	<script src="jquery-ui.min.js"></script>

</body>
</html>