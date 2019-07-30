<?php include('server.php');

if(isset($_SESSION['done'])){
    if(isset($_SESSION['register']))
    {
        header('location:logout.php');
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script type="text/javascript">
        function validate(){
            var name=document.getElementById("username");
            var email=document.getElementById("email");
            var pass1=document.getElementById("password_1");
            var pass2=document.getElementById("password_2");
            var error = document.getElementById("error");
            if(name.value.trim()=="" || email.value.trim()=="" || pass1.value.trim()=="" || pass2.value.trim()==""){
                error.style.display="inline-block";
                return false;
            }
            else if (document.getElementById("forgetPass").style.display == "inline-block") {
                error.style.display="inline-block";
                return false;
            }
            else
                return true;
        }

        function validUsername(){
            let id = document.getElementById("username").value;

            let ajax = new XMLHttpRequest();
            ajax.open("GET", "ajax_username.php?username="+id+"&type="+"username");

            ajax.onload = function(){
                if(this.readyState == 4 && this.status == 200){
                    let exist = JSON.parse(this.responseText);
                    if(exist == "true"){
                        document.getElementById("forgetPass").style.display = 'inline-block';
                        document.getElementById("username").style.cursor = 'not-allowed';
                    }
                    else{
                        document.getElementById("forgetPass").style.display = 'none';
                        document.getElementById("username").style.cursor = 'text';
                    }
                }
            }
            ajax.send();
        }

    </script>
</head>
<body>
    <div class="error" id="error">
        <p class="errorMsg1">Please Complete The Process By Giving All The Information Correctly, Only Then You Can Proceed</p>
    </div>
   <div class="modal-container" id="modal">

    <div class="modal">
        <h2 align="center"><a href="index.php" class="nameRegister">Ambruz</a></h2>
        <a href="index.php" class="close">X</a>
        <h2 align="center">Register</h2>

        <form onsubmit="return validate()" align="center" method="post" action="register.php">

            <?php include('errors.php');?>
            <label id="forgetPass"><a class="forget" href="#" onclick="forgetPassword()" >Username ALready Exist.<br/>Please Enter a Unique One</a></label>
            <input type="text" onkeyup="validUsername()" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>">&nbsp;&nbsp;&nbsp;&nbsp;
            <?php foreach ($validName as $validN) : ?>
                <font color="#DC1345"><?php echo $validN ?></font>
            <?php endforeach ?>

            <input type="text" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>">&nbsp;&nbsp;&nbsp;&nbsp;
            <?php foreach ($validEmail as $validE) : ?>
                <font color="#DC1345"><?php echo $validE ?></font>
            <?php endforeach ?>

            <input type="password" placeholder="Password" name="password_1" id="password_1">&nbsp;&nbsp;&nbsp;&nbsp;<?php foreach ($validPass as $validP) : ?>
            <font color="#DC1345"><?php echo $validP ?></font>
        <?php endforeach ?>

        <input type="password" placeholder="Confirm Password" name="password_2" id="password_2">&nbsp;&nbsp;&nbsp;&nbsp;<?php foreach ($validPass as $validP) : ?>
        <font color="#DC1345"><?php echo $validP ?></font>
    <?php endforeach ?>

    <button type="submit" name="register" class="btnRegister">Register</button>
    <p><font size="5" color="white">Already a member?</font> <a href="login.php" class="btnsigninRedirect">Sign in</a><br/></p>
</form>
</div>
</div>

</body>
</html>