<?php

$pass = $_POST['password_1'];
$conPass = $_POST['password_2'];

if ((strlen($pass))<8) {
    array_push($errors, "Password must have at least 8 characters");
    array_push($validPass, "&#10006");
}  
else {
    for ($i=0; $i <strlen($pass) ; $i++){
        if (ord($pass[$i]) == 64 || ord($pass[$i]) == 35 || 
            ord($pass[$i]) == 36 || ord($pass[$i]) == 37){

            if($pass!=$conPass){
                $valid=0;
                array_push($errors, "Passwords didn't match with previous password"."<br/>");
                array_push($validPass, "&#10006");
            }
            else
                $valid=1;

            break; 
        }
        else
            $valid=0;
    }
    if($valid==0){
        array_push($errors, "Password must contain one of the special Characters(@, #, $, %)"."<br/>");
        array_push($validPass, "&#10006");
    }
    else
    {
     array_push($validPass, "&#10004"); 
    
    }

}

?>