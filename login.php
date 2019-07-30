<?php include('server.php');

if(isset($_SESSION['done'])){
    if(isset($_SESSION['register']))
    {
        header('location:logout.php');
    }
    else if($_SESSION['done']==2)
        header('location:admin.php');
    else
        header('location:User.php');
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Ambruz| Login</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="font-awesome/css/all.css">
    <script type="text/javascript" src="jquery.js"></script>
    <script type="text/javascript">
        function validate(){
            var name=document.getElementById("username");
            var pass=document.getElementById("password_1").value;
            var error = document.getElementById("error");
            let id = document.getElementById("username").value;

            let ajax = new XMLHttpRequest();
            ajax.open("GET", "ajax_username.php?username="+id+"&pass="+pass+"&type="+"validate");

            ajax.onload = function(){
                if(this.readyState == 4 && this.status == 200){
                    let exist = JSON.parse(this.responseText);

                    if(name.value.trim()=="" || pass.trim()==""){
                        document.querySelector(".errorMsg1").innerHTML = "We couldn't find an account matching the email and password you entered. Please check your email and";
                        document.querySelector(".errorMsg2").innerHTML = "password and try again";
                        document.getElementById("password_1").value="";
                        document.documentElement.scrollTop=0;
                        error.style.display="inline-block";
                        
                    }
                    else if(exist == "true"){
                        error.style.display="none";
                        window.location = "User.php";
                        
                    }
                    else if(exist == "true2"){
                        error.style.display="none";
                        window.location = "admin.php";
                        
                    }
                    else if(exist == "true3"){
                        document.querySelector(".errorMsg1").innerHTML = "Your Account Was <font color='#ffff00'><b>Banned</b></font>. Please Contact To Our Help Center Or To Any Admin";
                        document.querySelector(".errorMsg2").innerHTML = "";
                        document.getElementById("password_1").value="";
                        document.documentElement.scrollTop=0;
                        error.style.display="inline-block";
                        
                    }
                    else{
                        document.querySelector(".errorMsg1").innerHTML = "We couldn't find an account matching the email and password you entered. Please check your email and";
                        document.querySelector(".errorMsg2").innerHTML = "password and try again";
                        document.getElementById("password_1").value="";
                        document.documentElement.scrollTop=0;
                        error.style.display="inline-block";
                        
                    }
                }
            }
            ajax.send();
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
                    }
                    else{
                        document.getElementById("forgetPass").style.display = 'none';
                    }
                }
            }
            ajax.send();
        }

        function forgetPassword(){
            document.querySelector('.forgetPass-modal').style.top = window.scrollY;
            document.querySelector('.forgetPass-modal').style.display = 'flex';
            document.body.style.overflow = 'hidden';

            document.querySelector('.closeIMG').addEventListener('click',function(){
                document.querySelector('.forgetPass-modal').style.display = 'none';
                document.body.style.overflow = 'visible';

                location.reload();
            });

            document.getElementById("enterEmail").onkeyup = function(){
                let id = document.getElementById("enterEmail").value;

                let ajax = new XMLHttpRequest();
                ajax.open("GET", "ajax_username.php?email="+id+"&type="+"email");

                ajax.onload = function(){
                    if(this.readyState == 4 && this.status == 200){
                        let exist = JSON.parse(this.responseText);
                        if(exist == "true"){
                            document.getElementById("enterPass").style.display = 'inline';
                            document.getElementById("enterPassLabel").style.display = 'inline';
                            document.getElementById("confirmPass").style.display = 'inline';
                            document.getElementById("confirmPassLabel").style.display = 'inline';
                            document.getElementById("submitPass").style.display = 'inline';
                        }
                        else{
                            document.getElementById("enterPass").style.display = 'none';
                            document.getElementById("enterPassLabel").style.display = 'none';
                            document.getElementById("confirmPass").style.display = 'none';
                            document.getElementById("confirmPassLabel").style.display = 'none';
                            document.getElementById("submitPass").style.display = 'none';
                        }
                    }
                }
                ajax.send();
            }

            document.getElementById("submitPass").addEventListener("click", function(){

                let id = document.getElementById("enterPass").value;
                let id2 = document.getElementById("confirmPass").value;
                let email = document.getElementById("enterEmail").value;

                let ajax = new XMLHttpRequest();
                ajax.open("GET", "ajax_username.php?pass="+id+"&conPass="+id2+"&email="+email+"&type="+"save");

                ajax.onload = function(){
                    if(this.readyState == 4 && this.status == 200){
                        let exist = JSON.parse(this.responseText);
                        if(exist == "Password Recovery Successful"){
                            alert(exist);
                            document.querySelector('.closeIMG').click();
                        }
                        else{
                            document.getElementById("enterPass").value="";
                            document.getElementById("confirmPass").value="";
                            alert(exist);

                        }
                    }
                }
                ajax.send();

            });

        }

    </script>
</head>
<body>
    <div class="error" id="error">
        <p class="errorMsg1">We couldn't find an account matching the email and password you entered. Please check your email and</p><p class="errorMsg2"> password and try again</p>
    </div>
    <div class="login">
        <h2 align="center"><a href="index.php" class="nameLogin">Ambruz</a></h2>
        <h3 align="center">Sign in</h3>
        <div class="socialLogin">
            <a href="https://www.twitter.com" class="twitter"><i class="fab fa-twitter" aria-hidden="true"></i> Sign in with Twitter </a><br/>
            <a href="https://www.facebook.com" class="facebook"><i class="fab fa-facebook-square" aria-hidden="true"></i> Sign in with Facebook </a><br/>
            <a href="https://www.google.com" class="google"><i class="fab fa-google" aria-hidden="true"></i> Sign in with Google </a><br/>
        </div>

        <div class="formLogin">
            <!-- <form onsubmit="return validate()" method="post" action="login.php"> -->

                <!-- <?php //include('errors.php');?> -->
                <label>Username</label><br/>
                <input type="text" id="username" onkeyup="validUsername()" name="username" placeholder="Username" ><br/><br/>
                <label>Password</label> <label id="forgetPass"><a class="forget" href="#" onclick="forgetPassword()" >Forget Password?</a></label><br/>
                <input type="password" placeholder="Password" name="password_1" id="password_1"><br/><br/>
                <button id="log" onclick="validate()" type="submit" name="login" class="btnLogin">Sign in</button><br/>

                <p><label>Not yet member? <a id="signupnow" href="register.php">Sign up now</a><br/></label><p>
                    <!-- </form> -->
                </div>

                <div class="forgetPass-modal" id="forgetPass-modal">
                    <div class="forgetPassmodal-content">
                        <div class="closeIMG">+</div>
                        <div class="inputs">
                            <label id="enterEmailLabel">Enter Your Email</label>
                            <input id="enterEmail" onkeyup="" type="text" placeholder="Enter Your Email">
                            <label id="enterPassLabel" hidden="hidden">Enter New Password</label>
                            <input id="enterPass" type="password" placeholder="Enter Password" hidden="hidden">
                            <label id="confirmPassLabel" hidden="hidden">Confirm Password</label>
                            <input id="confirmPass" type="password" placeholder="Confirm Password" hidden="hidden">
                            <button id="submitPass" hidden="hidden">Submit</button>
                        </div>
                    </div>
                </div>

            </body>
            </html>

