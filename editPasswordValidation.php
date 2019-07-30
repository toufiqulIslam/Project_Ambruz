<?php

$name=$_POST['username'];
$pass = $_POST['passwordEdit'];
$newPass = $_POST['conpassEdit'];
$passReal = $_SESSION['passLogin'];

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
    $_SESSION['passError']="Password must have at least 8 characters";
}
else if($pass!==$passReal){
    $_SESSION['passError']="Wrong Password";
}
else if($valid==0){
    $_SESSION['passError']="Password must contain one of the special Characters(@, #, $, %)"."<br/>";
}
else if((strlen($newPass))<8 && (strlen($newPass))>=1) {
    $_SESSION['passError2']="Password must have at least 8 characters";
}
elseif($pass == $newPass){
    $_SESSION['passError']="New Password can not equal to Current Password";
}
else{
    $_SESSION['passError']="";
    $_SESSION['passError2']="";
}

/*else
{
    while(!feof($file))
    {
        $content = str_replace(array("\r","\n"), "", fgets($file));

        if((substr($content, 0, strpos($content, " pass:")))==$name)
        {
            if((str_replace("$name"." pass:", "", $content))!=$pass)
            {
                array_push($errors, "Incorrect Password");
                array_push($validPass, "&#10006");
            }
            else
            {
                array_push($errors, "Correct Password");
                array_push($validPass, "&#10004");
            }
        }
    }
}
fclose($file);*/
?>