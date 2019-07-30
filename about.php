<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Ambruz| About</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	
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
			<li><a href="login.php" id="signin" class="signinMenu">Sign In</a></li>
			<li><a href="register.php" class="signupMenu">Sign Up</a></li>
		</ul>
	</nav><br/><br/><br/>
	<script src="jquery-ui.min.js"></script>
	<script>
		function LoggedIN(){

			<?php
			if(isset($_SESSION['user'])){
				?>
				var id= document.getElementById('signin');
				id.text="<?php echo $_SESSION['user'];?>";
				<?php
			}
			else
				echo $_SESSION['user'];
			?>
		}

		LoggedIN();
	</script>
	<table align="center">
		<tr>
			<td><br/><a href="about.php"><b>About Us</b></a></td>
			<td></td>
			<td><br/><a href="license.php"><b>License</b></a></td>
			<td></td>
			<td><br/><a href="FAQ.php"><b>FAQ</b></a></td>
		</tr>
		<tr></tr>
		<tr></tr>
		<tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr>
	</table>
</div>
	<table cellspacing="0" width="100%">
		<tr bgcolor="#DCE0E9">
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>
				<h1>Empowering Creators</h1><p>By providing free stock photos<br/>Ambruz helps millions of creators all over the world to easily create beautiful products and designs.</p></td>
				<td><img src="img/home.jpg" height="300" width="500"></td>
			</tr>
		</table>
		<table cellspacing="0">
			<tr>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td>
					<h1>About Us</h1>
					<p><font size="5">Ambruz provides high quality and completely free stock photos licensed under the Ambruz license. All photos are nicely tagged, searchable and also easy to discover through our discover pages.</font></p><br/>
					<img src="img/iconsGallery.png" height="50" width="60">
					<h1>Photos</h1>
					<p><font size="5">We have hundreds of thousands free stock photos and every day new high resolution photos will be added. All photos are hand-picked from photos uploaded by our users or sourced from free image websites. We make sure all published pictures are high-quality and licensed under the Ambruz license.</font></p><br/>
					<img src="img/cameraIcon.png" height="50" width="60">

					<h1>Photo Sources</h1>
					<p><font size="5">Only free images from our community of photographers and sources like Pixabay, Gratisography, Little Visuals and many more are added to our photo database. We constantly try to deliver as many high quality free stock photos as possible to the creatives who use our website.</font></p><br/>
					<img src="img/iconsTeam.png" height="50" width="60">

					<h1>Team</h1>
					<p><font size="5">Ambruz is run by Bruno Joseph, Ingo Joseph and Daniel Frese. Bruno and Ingo co-founded Ambruz together in 2014 and Daniel joined them in 2015.</font></p><br/>
					<img src="img/iconsMission.png" height="50" width="60">

					<h1>Mission</h1>
					<p><font size="5">We help millions of designers, writers, artists, programmers and other creators to get access to beautiful photos that they can use freely which empowers them to create amazing products, designs, stories, websites, apps, art and other work. We call it: "Empowering Creators"</font></p>

					<h1>Contribute</h1>
					<p><font size="5">Upload your own pictures to support the Ambruz community.<br/>
						<font size="6">And don't forget to share, like and follow Ambruz on <u>Instagram</u>, <u>Facebook</u> and <u>Twitter</u> ;)</font></font></p>
					</td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				</tr>
				<tr bgcolor="black">
					<td ><br/><br/><br/></td>
					<td colspan="2"><font color="white">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&copy AMBRUZ 2019 All rights reserved</font></td>
				</tr>
			</table>
		
		</body>
		</html>