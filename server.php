    <?php
    if(session_id() == ''){
    //session has not started
        session_start();
    }
    $username="";
    $email="";
    $check="";
    $errors = array();
    $validName = array();
    $validEmail = array();
    $validPass = array();
    $_SESSION['nameError']="";
    $_SESSION['passError2']="";
    $_SESSION['passError']="";
    $_SESSION['con']="";
       //checking from file

    //Registration Validation
if(isset($_POST['register']))
{
    $con=mysqli_connect("localhost","root","","ambruzdb");
    if(!$con){
        die("Connection Error");
    }
    else{
        //$file = fopen('UserData.txt', 'a');
        $username=$_POST['username'];
        $email=$_POST['email'];
        $pass=$_POST['password_1'];
        $conPass=$_POST['password_2'];

        if(empty($username)){
            array_push($errors, "Username is required");
            array_push($validName, "&#10006;");
        }
        else{
            include('nameValidation.php');
        }
        if(empty($email)){
            array_push($errors, "Email is required");
            array_push($validEmail, "&#10006;");
        }
        else{
            include('emailValidation.php');
        }
        if(empty($pass)){
            array_push($errors, "Password is required");
            array_push($validPass, "&#10006;");
        }
        else{
            include('passwordValidation.php');
        }
        if(count($errors)==0){
            /*fwrite($file, "\r\n$username"." pass:"."$pass"."\r\nemail:".
                "$email");
            $_SESSION['register']="true";
            fclose($file);*/
            $sql="INSERT into accounts(Name,Email,Password) VALUES('$username','$email','$pass')";
            if(!mysqli_query($con,$sql)){
                array_push($errors, "Registration Failed | Server did not respond");
            }
            else{
                $curdir = getcwd();

                mkdir($curdir."/USERS/$username", 0777);
                mkdir($curdir."/USERS/$username/photo", 0777);
                mkdir($curdir."/USERS/$username/profile_IMG", 0777);
                $_SESSION['register']="true";
                header('refresh:1;url=logout.php'); //redirected to login page
            }
        }
    }
}

//Login Validation
/*if(isset($_POST['login'])){
    $success=0;
    $con=mysqli_connect("localhost","root","","ambruzdb");
    if(!$con){
        die("Connection Error");
    }
    else{
        $username = $_POST['username'];
        $pass = $_POST['password_1'];
        $check = "$username"." pass:"."$pass";

        if(empty($username)){
            array_push($errors, "Username is required");
            $_SESSION['error']="1";
        }
        if(empty($pass)){
            array_push($errors, "Password is required");
        }
        else
        {
            if($username=="Toufiqul Islam" && $pass=="11119999$"){
                $_SESSION['done'] = 2;
                $_SESSION["user"] = "Toufiqul Islam";
            }
            else{
            $sql="SELECT * FROM accounts WHERE Name='$username' and Password='$pass'";
            $result = mysqli_query($con,$sql);
            if(mysqli_num_rows($result)>0){
                while ($row=mysqli_fetch_array($result)) {
                    $_SESSION['done'] = 1;
                    $_SESSION["user"] = $row['Name'];
                    $_SESSION['email'] = $row['Email'];
                    $_SESSION['passLogin'] = $row['Password'];
                    $_SESSION['prf'] = $row['Profile_Photo'];
                    $success=1;
                }
            }
        }

            /*$file = fopen('UserData.txt', 'r');
            while(!feof($file)){
                $content = str_replace(array("\r","\n"), "", fgets($file));

                if($content==$check){
                    array_push($errors, "Login Successful");
                    //$_SESSION['success'] = 1;
                    $_SESSION['done'] = 1;
                    $_SESSION["user"] = substr($check, 0, strpos($check, " pass:"));
                    $success = 1;
                    header('refresh:1;url=index.php');

                    $email=fgets($file);
                    if(substr($email, 0, strpos($email, ":"))=="email"){
                        $_SESSION['email']= str_replace("email:", "", 
                            $email);
                    }
                }*/
             
            /*}
            if($success==0){
                array_push($errors, "You are not Authorised<br/>Please check your username and password");
                $_SESSION['failed']=1;
                mysqli_close($con);
            }
            else
             mysqli_close($con);

     }
 }*/
 $_SESSION['passError']="";

   //Edit Account Save Info Validation
 if(isset($_POST['saveEdit'])){

    $con=mysqli_connect("localhost","root","","ambruzdb");
    if(!$con){
        die("Connection Error");
    }
    else{
        $realName=$_SESSION['user'];
        $username=$_POST['username'];
        $pass=$_POST['passwordEdit'];
        $conPass=$_POST['conpassEdit'];

        if(empty($username)){
            $_SESSION['nameError']="Username is required";
        }
        else{
            include('nameValidation.php');
        }
        if(empty($pass)){
            $_SESSION['passError']="Password is required";
        }
        else{
            include('editPasswordValidation.php');
        }

        if($_SESSION['nameError']=="" && $_SESSION['passError']=="" && $_SESSION['passError2']==""){
            if($conPass=="")
                $conPass=$pass;

            $sql="UPDATE accounts SET Name='$username' ,Password='$conPass' WHERE Name='$realName' and Password='$pass'";
            if(!mysqli_query($con,$sql)){
                $_SESSION['con']="Connection Error";
            }
            else{
                $_SESSION['con']="Account Update Successful";
                $_SESSION['user']=$username;
                $_SESSION['passLogin']=$conPass;
            }
        }
    }
}

?>