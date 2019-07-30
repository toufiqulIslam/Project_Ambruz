<?php

$email = $_POST['email'];
$count=0;
$countLetter=0;
$countLetter2=0;
$valid=1;
$empty=0;
$countDot=0;


    for ($i=0; $i < strlen($email) ; $i++) { 
  
        //@
        if(ord($email[$i])==64){
            if($i<1){
               // echo "Invalid Email g";
                $valid=0;
                break;
            }
            else{
                // dot count
                for ($j=$i; $j<strlen($email) ; $j++) {
                    if(ord($email[$j])==46){
                            $countDot++;
                        for ($k=$j-1; $k>$i ; $k--) 
                        {
                            $countLetter++;
                        }
                        for ($k=$j+1; $k<strlen($email) ; $k++) 
                        {
                            $countLetter2++;
                        }
                }
                }   
                if($countLetter<1 || $countDot>1 || $countLetter2<1){
                    $valid=0;}
            }
        }
        
        elseif(ord($email[$i])==46){
            for ($j=0; $j < strlen($email) ; $j++) { 
                if(ord($email[$j])==64){
                    $count=1;  
                }
            }
            //echo $count;
            if($count!=1){
                //echo "Invalid Email e";
                $count=0;
                $valid=0;
            }
        }  
    }

    //@ & .
    for ($i=0; $i <strlen($email) ; $i++) { 
        if(ord($email[$i])==64 || ord($email[$i])==46){
            $count++;
        }
    }
    if($count==0 && $valid==1){
        //echo "Invalid Email d";
        $valid=0;}

    if ($valid==1 && $count>1 && $countDot==1) {
        array_push($validEmail, "&#10004;");
    }
    elseif($empty==0){
        array_push($errors, "<br/>Invalid Email");
        array_push($validEmail, "&#10006;");
    }

?>