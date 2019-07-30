<?php
if(isset($_FILES['file'])){
    $file = $_FILES['file'];

    $filename = $_FILES['file']['name'];
    $filesize = $_FILES['file']['size'];
    $fileExt = explode('.',$filename);
    $fileActualExt = strtolower(end($fileExt));

    $AllowedExt = array('jpeg', 'jpg', 'png');

    if(!in_array($fileActualExt, $AllowedExt) ){
        echo "Invalid File extension";
    } 
    elseif($filesize>4000000)
        echo "Your File size is too Large";
    else
        echo "Upload Successful";
}

?>