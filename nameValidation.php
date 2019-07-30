<?php
$name = $_POST['username'];
$valid=0;
$count=0;

if(ord($name[0]) <= 57){
    $_SESSION['nameError']="Name Must start with letter"."<br/>";
    array_push($errors, "Name Must start with letter"."<br/>"); 
    array_push($validName, "&#10006;");
}
elseif(str_word_count($name) <2){
    $_SESSION['nameError']="Name contains at least two words"."<br/>";
    array_push($errors, "Name contains at least two words"."<br/>");
    array_push($validName, "&#10006;");
}
elseif (strlen($name)>19) {
  $_SESSION['nameError']="Name Length must be less than 20";
  array_push($errors, "Name Length must be less than 20"."<br/>");
  array_push($validName, "&#10006;");
}
else{
    for ($i=0; $i <strlen($name) ; $i++){
        if (ord($name[$i]) == 95 || ord($name[$i]) == 32 || 
            ord($name[$i]) == 46 || (ord($name[$i])>=65 && ord($name[$i])<=90) || (ord($username[$i])>=97 && ord($username[$i])<=122)){
            $valid=1;   
    }
    else{
        $valid=0;
        break;
    }
}

if($valid==1){
    $_SESSION['nameError']="";
    array_push($validName, "&#10004;");
}
else{
    $_SESSION['nameError']="Invalid name";
    array_push($errors, "Invalid name");
    array_push($validName, "&#10006;");
}
}

?>