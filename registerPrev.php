<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
</head>
<body>
    <table width="100%">
        <tr><td align="center">
        <img src="img/signup.jpg" height="150" width="300">
    </td></tr>
    </table>
    <h2 align="center">Register</h2>

    <form align="center" method="post" action="register.php">

        <?php include('errors.php');?>
        <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Username&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
        <input type="text" name="username" value="<?php echo $username; ?>">&nbsp;&nbsp;&nbsp;&nbsp;
        <?php foreach ($validName as $validN) : ?>
        <?php echo $validN ?>
        <?php endforeach ?> <br/><br/>

        <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
        <input type="text" name="email" value="<?php echo $email; ?>">&nbsp;&nbsp;&nbsp;&nbsp;
        <?php foreach ($validEmail as $validE) : ?>
        <?php echo $validE ?>
        <?php endforeach ?><br/><br/>

        <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
        <input type="password" name="password_1">&nbsp;&nbsp;&nbsp;&nbsp;<?php foreach ($validPass as $validP) : ?>
        <?php echo $validP ?>
        <?php endforeach ?><br/><br/>

        <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Confirm Password</label>
        <input type="password" name="password_2">&nbsp;&nbsp;&nbsp;&nbsp;<?php foreach ($validPass as $validP) : ?>
        <?php echo $validP ?>
        <?php endforeach ?><br/><br/>
        
        <button type="submit" name="register" class="btn">Register</button>
        <p>Already a member? <a href="login.php">Sign in<br/><a href="index.php">Back to Home</a></a></p>
    </form>

</body>
</html>