<?php
include('upload/gallery-upload.inc.php');
if(!isset($_SESSION['done'])){
    header("location: login.php");
}

include('server.php');
if(!isset($_SESSION['nameError'])){
    $_SESSION['nameError']="";
    $_SESSION['passError']="";
    $_SESSION['passError2']="";
}

if(isset($_POST['username'])){
    $u=$_POST['username']; 
}
else{
    $u=$_SESSION['user']; 
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Your Account</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    
</head>
<body>
    <div class="containerEdit">
        <div class="edit">
            <form method="post" action="editAccount.php" enctype="multipart/form-data" >

                <input type="file" id="real-file" name="real-file" style="display: none" /><br/>
                <button type="button" id="uploadButton" name="uploadButton">Change Profile Picture</button>
                <label id="fileNameShow">No content choosen yet</label><br/>

                <label id="usernameLabel">Username</label><br/>
                <input type="text" id="usernameEdit" name="username" value="<?php echo $u;?>"/>
                <label id="warningsEdit0"><?php echo $_SESSION["nameError"];?></label><br/>
                <label>Email</label><br/>
                <input type="text" id="email" name="email" value="<?php
                $e=$_SESSION['email']; echo $e; ?>" disabled/><br/>
                <label>Current Password</label><br/>
                <input type="password" id="passwordEdit" name="passwordEdit" placeholder="Enter your password..."/>
                <label id="warningsEdit1"><?php echo $_SESSION["passError"];?></label><br/>
                <label>New Password</label><br/>
                <input type="password" id="conpassEdit" name="conpassEdit" placeholder="Enter your password..."/><label id="warningsEdit2"><?php echo $_SESSION["passError2"];?></label><br/>
                <button type="submit" id="saveEdit" name="saveEdit">Save</button><label><?php echo $_SESSION["con"];?></label>
            </form><br/>
            <a href="User.php">Back To My Account</a>
        </div>
    </div>

    <script type="text/javascript">
        let realFile = document.getElementById('real-file');
        let uploadBtn = document.getElementById('uploadButton');
        let labelFile = document.getElementById('fileNameShow');
        let submitBtn = document.getElementById('submitFile');

        uploadBtn.addEventListener("click", function(){
            realFile.click();
        });

        realFile.addEventListener("change", function(){
            if(realFile.value){
                labelFile.innerHTML = realFile.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];
                
            }
            else{
                labelFile.innerHTML = "No content choosen yet";
            }
        });
    </script>

</body>
</html>