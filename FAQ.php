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
	<table cellspacing="0" width="100%">
		<tr bgcolor="#FAFAFA">
			<td><img src="img/FAQ2.jpeg" height="300" width="700"></td>
			<td><h1>I've Got a Question…
			</h1><p>Frequently Asked Questions</p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
		</tr>
	</table>
	<table cellspacing="0">
		<tr>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td>
				<h1>I’m new to Ambruz. What do I need to know?</h1>
				<h2>What is Ambruz? </h2>
				<p><font size="5" color="grey">Ambruz helps designers, bloggers and everyone who is looking for an image to find great photos that you can use everywhere for free.</font></p><br/>

				<h2>What is the license of the photos on Ambruz?</h2>
				<p><font size="5" color="grey">All photos uploaded on Ambruz are licensed under the Ambruz license. This means you can use them for free for personal and commercial purposes. For more information read the following questions, our <a href="license.php">license page</a>.</font></p><br/>

				<h2>Can I sell Ambruz photos?</h2>
				<p><font size="5" color="grey">You can't sell photos licensed under the Pexels License as they are. This also includes selling them as prints (posters, postcards, …) or on physical goods (t-shirts, cups, …). You can only sell them if you edited, modified or otherwise added value. And you're not allowed to sell or upload them on other stock photo or wallpaper platforms.</font></p><br/>

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