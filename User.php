<?php include ('upload/gallery-upload.inc.php');
if(!isset($_SESSION['done'])){
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ambruz| User</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="styleBanner.css">
    <link rel="stylesheet" type="text/css" href="font-awesome/css/all.css">
    <link rel="stylesheet" href="css/bootstrap.css">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
    .mySlides {display:none;}
</style>

<script type="text/javascript">

    /*$(window).scroll(function(){
        if($(window).scrollTop()>=1){
            $('nav').addClass('fixed-header');
            $('nav div').addClass('visible-title');
        }
        else{
            $('nav').removeClass('fixed-header');
            $('nav div').removeClass('visible-title');
        }
    });*/

    function modal(id,name){
    //document.querySelector('.bg-modal').style.top = window.scrollY;
    document.querySelector('.bg-modal').style.display = 'flex';
    document.documentElement.scrollTop=800;
    document.getElementById("bg-modal").style.top = 380+"px";
    
    document.body.style.overflow = 'hidden';
    document.getElementsByTagName('html')[0].style.overflow = "hidden";

    document.getElementById('modalIMG').src= id;
    
    document.querySelector('.closeIMG').addEventListener('click',function(){
    document.querySelector('.bg-modal').style.display = 'none';
    document.body.style.overflow = 'visible';
    document.getElementsByTagName('html')[0].style.overflowY = "scroll";
    document.body.style.overflow = 'hidden';

        location.reload();
    });

    document.getElementById("likeTab").innerHTML = "&nbsp"+document.getElementById(id+"likeShow").innerHTML;
    document.getElementById("commentTab").innerHTML = "&nbsp"+document.getElementById(id+"commentShow").innerHTML;

    commentShow(name);
}

function commentShow(id){
   let ajax = new XMLHttpRequest();
   ajax.open("GET", "ajax_like.php?idTest="+"commentShow"+"&idPhoto="+id);

   ajax.onload = function(){
    if(this.readyState == 4 && this.status == 200){
        let commentPhoto = JSON.parse(this.responseText);

        for (var i = 0; i < commentPhoto.length; i++) {
            document.getElementById("commentsPer").innerHTML +=  commentPhoto[i]+"<br/>";
        }  

    }
}
ajax.send();
}

function deletePhoto(name){
    let ajax = new XMLHttpRequest();
   ajax.open("GET", "ajax_like.php?idTest="+"delete"+"&idPhoto="+name);

   ajax.onload = function(){
    if(this.readyState == 4 && this.status == 200){
        let deletePhoto = JSON.parse(this.responseText);
        
        if(deletePhoto=="true"){
            alert("One Photo Removed");
            location.reload();
        }
        else {
            alert("Error Occured");
        }

    }
    }
    ajax.send();
}

function validateUpload(){
    let filenameJ = document.getElementById("filename");
    let titleJ = document.getElementById("filetitle");
    let descJ = document.getElementById("filedesc");
    let typeJ = document.getElementById("contenttype").selectedIndex;

    let warning0 = document.getElementById("warningsLabel0");
    let warning1 = document.getElementById("warningsLabel1");
    let warning2 = document.getElementById("warningsLabel2");
    let warning3 = document.getElementById("warningsLabel3");

    if(filenameJ.value.trim()==""){
        warning0.style.display = "inline-block";  
    }
    if(titleJ.value.trim()==""){
        warning1.style.display = "inline-block"; 
    }
    if(descJ.value.trim()==""){
        warning2.style.display = "inline-block";
    }
    if(typeJ=="0"){
        warning3.style.display = "inline-block";   
    }
    if(titleJ.value.trim()!="" && descJ.value.trim()!="" && typeJoption.value!="null"){
        warning0.style.display = "none";
        warning1.style.display = "none";
        warning2.style.display = "none";
        warning3.style.display = "none";
        return true;
    }
    else {
        return false;
    }
}

function contribution(){
    let ajax = new XMLHttpRequest();
   ajax.open("GET", "ajax_total.php",true);

   ajax.onload = function(){
    if(this.readyState == 4 && this.status == 200){
        let total = JSON.parse(this.responseText);

            document.querySelector(".infos").innerHTML =  total;

        }
    }
    ajax.send();
    }

</script>

</head>

<body onload="contribution()">
    <div class="main">
        <nav>
            <p><a href="index.php"><b><i>Ambruz</i></b></a></p>
            <ul>
                <li><a href="shots.php">Shots</a></li>
                <li><a href="design.php">Designs</a></li>
                <li><a href="#">Community</a></li>
                <li><a href="license.php">Learn</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="logout.php" id="logout" class="logoutMenu">Log out</a></li>
                <li><a href="editAccount.php" class="editAccountMenu">Edit Account</a></li>
            </ul>
        </nav>

        <div id="slider"> 
            <img class="mySlides" src="img/slide1.jpg" height="500" width="50%">
            <img class="mySlides" src="img/user3.jpeg" height="500" width="50%">
            <img class="mySlides" src="img/slide5.jpeg" height="500" width="50%">
            <img class="mySlides" src="img/slide4.jpg" height="500" width="50%">
            <img class="mySlides" src="img/slide23.jpg" height="500" width="50%">
            <img class="mySlides" src="img/user.jpg" height="500" width="50%">
        </div>
        <div class="image1">
            <h1><font color="white">Creative Works Are Always Fabolous</font size="4"></h1><h3><font color="#EC5E17">We beleive in your creativity and <br/>We appericiate it.</font><br/><font color="black" size="5">Contribute Now and<br/> Join The Biggest Community of Creative Workers.</font><br/></h3>
        </div>


        <!-- User Info -->
        <div class="team-area">
            <div class="container">
                <div class="single-member text-center">
                    <div class="team-heading">
                        <div class="member-img">
                            <img src="<?php echo "USERS/".$_SESSION['user']."/profile_IMG/".$_SESSION['prf']; ?>">
                        </div>
                        <div class="member-data">
                            <div class="member-info">
                                <h2><?php 
                                echo "<h2>".$_SESSION['user']."</h2>"."<h3>".$_SESSION['email']."</h3>";
                                ?></h2>
                            </div>
                            <div class="member-social">
                                <a href="#" class="color-1">
                                    <i class="fab fa-facebook"></i>
                                </a>
                                <a href="#" class="color-2">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" class="color-3">
                                    <i class="fab fa-google-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        if(isset($_SESSION['done'])){
            if(isset($_SESSION['error'])){
                $error=$_SESSION['error'];
                unset($_SESSION['error']);
            }
            else{
                $error="";
                unset($_SESSION['error']);
            }

            echo '<div id="upload">
            <form onsubmit="return validateUpload()" action="User.php" method="POST" enctype="multipart/form-data">
            <input type="text" id="filename" name="filename" placeholder="File name...">
            <label id="warningsLabel0">Empty filename, default filename will be given!!</label><br/>
            <input type="text" id="filetitle" name="filetitle" placeholder="Image title...">
            <label id="warningsLabel1">Please write a content title</label><br/>
            <input type="text" id="filedesc" name="filedesc" placeholder="Image description...">
            <label id="warningsLabel2">Please write a content description</label><br/>
            <select id="contenttype" name="contenttype" onchange="typeSelect()">
            <option value="null" selected>Select type of the content</option>
            <option value="A Photograph">A Photograph</option>
            <option value="A Design">A Design</option>
            </select>
            <label id="warningsLabel3">Please select a content type</label>
            <input type="file" id="real-file" name="real-file" hidden="hidden" /><br/>
            <input type="submit" id="submitFile" name="submitFile" hidden="hidden"/>
            <button type="button" id="uploadButton" name="uploadButton">Upload Your Creative Work</button>
            <label id="fileNameShow">No content choosen yet</label>'?>
            <label id="warningsLabel4"><?php
            if($error=="Content upload successful"){
             echo '<font color="#28A745">'."$error"."</font>";}
             else{
                echo "$error";
            }
            ?> </label><?php
            echo '</form>
            </div>';
        }
        ?>
        <div class="infoUser">
            <p class="infos">Lorem</p>
        </div>
        <div class="visit_Gallery">
            <section class="gallery-links-shots">
                <div class="wrapper">
                    <h2>Trending Works</h2>

                    <div class="gallery-container-shots">
                        <?php 
                        include_once 'upload/dbh.inc.php';
                        $user = $_SESSION['user'];

                        $sql = "SELECT * FROM gallery WHERE Owner='$user' ORDER BY OrderGallery DESC";
                        $stmt = mysqli_stmt_init($con);
                        if(!mysqli_stmt_prepare($stmt,$sql)){
                            echo "Server did not respond!!!";
                        }else{
                            mysqli_stmt_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);

                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>

                                <div>
                                    <img id="<?php echo "USERS/".$row['Owner']."/photo/".
                                    $row['PhotoPath'];?>" name="<?php echo $row['ID']; ?>" onclick="modal(id, name); return false;"   src="<?php echo "USERS/".$row['Owner']."/photo/".
                                    $row['PhotoPath'];?>"/>
                                    <!-- <p class="deleteIMG">+</p> -->
                                    <a name="<?php echo $row['ID']; ?>" onclick="deletePhoto(name);"><i id="deleteIMG" class="fas fa-trash-alt"></i></a>

                                    <i class="fa fa-eye" aria-hidden="true" id="view"></i>
                                    <i id="<?php echo "USERS/".$row['Owner']."/photo/".
                                    $row['PhotoPath']."likeShow";?>" class="fa fa-thumbs-up" aria-hidden="true"><?php echo $row['Likes'] ?></i>
                                    <i id="<?php echo "USERS/".$row['Owner']."/photo/".
                                    $row['PhotoPath']."commentShow";?>" class="fa fa-comment" aria-hidden="true"><?php echo $row['Comments'] ?></i>


                                    <h3><?php echo strtoupper($row["Title"]); ?></h3>
                                    <p><?php echo $row["Description"]."<br/>".$row["Type"]; ?></p>

                                </div>
                                <?php
                            }
                        }
                        ?>

                    </div>
                </div>
            </section>
        </div>


        <div class="bg-modal" id="bg-modal">
            <div class="modal-content">
                <div class="closeIMG">+</div>
                <div class="test" id="test">
                    <img id="modalIMG" src="">
                </div>
                <div class="comments" id="comments">
                    <p id="commentsPer"><b><font color="#00C851">Comments: </font></b><br/></p>
                </div>
                <div class="btnModal" id="btnModal">
                    <i id="likeTab" class="fa fa-thumbs-up" aria-hidden="true"></i>
                    <i id="commentTab" class="fa fa-comment" aria-hidden="true"></i>
                </div>
            </div>
        </div>

        <footer id="footer">
            <p><font color="white"><br/>&copy AMBRUZ 2019 All rights reserved</font></p>
        </footer>
    </div>

    <script src="jquery-ui.min.js"></script>
    <script type="text/javascript">

        var myIndex = 0;


        function carousel() {
          var i;
          var x = document.getElementsByClassName("mySlides");
          for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";  
        }
        myIndex++;
        if (myIndex > x.length) {myIndex = 1}    
          x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 2000); // Change image every 2 seconds
}
carousel();

let realFile = document.getElementById('real-file');
let uploadBtn = document.getElementById('uploadButton');
let labelFile = document.getElementById('fileNameShow');
let submitBtn = document.getElementById('submitFile');

uploadBtn.addEventListener("click", function(){
    realFile.click();
});

realFile.addEventListener("change", function(){
    if(realFile.value){
        submitBtn.click();
        labelFile.innerHTML = realFile.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];

    }
    else{
        labelFile.innerHTML = "No content choosen yet";
    }
});

function autoWarning(){
    let filenameJ = document.getElementById("filename");
    let titleJ = document.getElementById("filetitle");
    let descJ = document.getElementById("filedesc");

    let warning0 = document.getElementById("warningsLabel0");
    let warning1 = document.getElementById("warningsLabel1");
    let warning2 = document.getElementById("warningsLabel2");

    filenameJ.addEventListener('focus', function(){
        warning0.style.display = "none";
    });
    titleJ.addEventListener('focus', function(){
        warning1.style.display = "none";
    });
    descJ.addEventListener('focus', function(){
        warning2.style.display = "none";
    });

}

autoWarning();

function typeSelect(){
    if(document.getElementById("contenttype").selectedIndex!="0")
    {
        document.getElementById("warningsLabel3").style.display = 'none';
    }  
    else{
        document.getElementById("warningsLabel3").style.display = 'inline-block';
    }
}

</script>

</body>
</html>