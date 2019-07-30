<?php 
session_start();
?>
<html>
<head>
    <title>Ambruz| Visit User</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="styleBanner.css">
    <link rel="stylesheet" type="text/css" href="font-awesome/css/all.css">
    <link rel="stylesheet" href="css/bootstrap.css">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
    .mySlides {display:none;}
</style>

<script type="text/javascript">

    function modalcontrol(){
        <?php
        if(!isset($_SESSION['user'])){
            ?>
            document.getElementById("commentIMG").style.display = "none";
            document.getElementById("comments").style.display = "none";
            document.getElementById("btnModal").style.display = "none";
            document.getElementById("commentSubmit").style.display = "none";
            document.getElementById("modalIMG").style.display = "block";

            return false;
            <?php
        }

        else{
            ?>
            document.getElementById("commentIMG").style.display = "block";
            document.getElementById("comments").style.display = "block";
            document.getElementById("btnModal").style.display = "block";
            document.getElementById("commentSubmit").style.display = "block";
            document.getElementById("modalIMG").style.display = "block";

            return true;
            <?php
        }
        ?>
    }

    function modal(id, name){

        document.querySelector('.bg-modal').style.display = 'flex';
        document.getElementById("bg-modal").style.top = 420+"px";
        document.querySelector('.gallery-container-shots').scrollIntoView();

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

        modalcontrol();
        document.getElementById("likeTab").innerHTML = "&nbsp"+document.getElementById(id+"likeShow").innerHTML;
        document.getElementById("commentTab").innerHTML = "&nbsp"+document.getElementById(id+"commentShow").innerHTML;

        document.getElementById("likeModal").addEventListener("click", function(){

            likesCount(id, name);

        });
        document.getElementById("commentSubmit").addEventListener("click", function(){

            userComment(name);

        });

        commentShow(name);

    }
    function likedUser(id){
        let ajax = new XMLHttpRequest();
        ajax.open("GET", "ajax_like.php?idTest="+"liked"+"&idPhoto="+id);

        ajax.onload = function(){
            if(this.readyState == 4 && this.status == 200){
                let likesV = JSON.parse(this.responseText);
                if(likesV == "true"){
                    document.getElementById(id).style.background="#FF1493";
                    document.getElementById(id).style.color="white";}
                }
            }
            ajax.send();
        }

        function likesCount(name, id2){
            <?php
            if(!isset($_SESSION['user'])){
                ?>
                modal("img/login_E.png");
                <?php
            }
            ?>
            if(modalcontrol()){
                let ajax = new XMLHttpRequest();
                ajax.open("GET", "ajax_like.php?idTest="+id2);

                ajax.onload = function(){
                    if(this.readyState == 4 && this.status == 200){
                        let likesV = JSON.parse(this.responseText);
                        if(likesV[0].charAt(0)=="+"){
                            document.getElementById(id2).style.background="#FF1493";
                            document.getElementById(id2).style.color="white";
                            likesV[0] = likesV[0].replace("+","");
                        }
                        else if (likesV[0].charAt(0)=="-") {
                            document.getElementById(id2).style.background="#D3D3D3";
                            document.getElementById(id2).style.color="#676665";
                            likesV[0] = likesV[0].replace("-","");
                        }
                        document.getElementById(name+"likeShow").innerHTML = likesV[0];
                        document.getElementById("likeTab").innerHTML = likesV[0];
                    }
                }
                ajax.send();
            }
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


    function userComment(id){
        let commentPhoto = document.getElementById("commentIMG").value;

        let ajax = new XMLHttpRequest();
        ajax.open("GET", "ajax_like.php?idTest="+"comment"+"&idPhoto="+id+"&comment="+commentPhoto);

        ajax.onload = function(){
            if(this.readyState == 4 && this.status == 200){
                let commentPhoto = JSON.parse(this.responseText);
                commentCount= (commentPhoto.substring(commentPhoto.indexOf("%$#"), commentPhoto.length)).replace("%$#","");
                commentPhoto = commentPhoto.substring(0,commentPhoto.indexOf("%$#"));

                document.getElementById("commentsPer").innerHTML += commentPhoto;
                document.getElementById("commentTab").innerHTML = "&nbsp"+commentCount;
            }
        }
        ajax.send();
    }
    function contribution(){
        let ajax = new XMLHttpRequest();
        ajax.open("GET", "ajax_totalvisit.php",true);

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
                <li><a href="login.php" id="signin" class="signinMenu">Sign In</a></li>
                <li><a href="register.php" class="signupMenu">Sign Up</a></li>
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
                            <img src="<?php echo "USERS/".$_SESSION['userVisit']."/profile_IMG/".$_SESSION['prfVisit']; ?>">
                        </div>
                        <div class="member-data">
                            <div class="member-info">
                                <h2><?php 
                                echo "<h2>".$_SESSION['userVisit']."</h2>"."<h3>".$_SESSION['emailVisit']."</h3>";
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
                        $user = $_SESSION['userVisit'];

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
                                    $row['PhotoPath'];?>" name="<?php echo $row['ID']; ?>" onclick="modal(id, name); return false;" onload="likedUser(name)"  src="<?php echo "USERS/".$row['Owner']."/photo/".
                                    $row['PhotoPath'];?>"/>
                                    <button id="save">Save</button>
                                    <button name="<?php echo "USERS/".$row['Owner']."/photo/".
                                    $row['PhotoPath'];?>" id="<?php echo $row['ID']; ?>" onclick="likesCount(name, id)"> Like </button>

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
                    <img id="modalIMG" src=""><br/>
                    <input id="commentIMG" type="text" name="commentIMG" placeholder="Enter Your Comment">
                </div>
                <button id="commentSubmit" >Comment</button>
                <div class="comments" id="comments">
                    <p id="commentsPer"><b><font color="#00C851">Comments: </font></b><br/></p>
                </div>
                <div class="btnModal" id="btnModal">
                    <button id="saveModal">Save</button>
                    <button id="likeModal"> Like </button>
                    <i id="likeTab" class="fa fa-thumbs-up" aria-hidden="true"></i>
                    <i id="commentTab" class="fa fa-comment" aria-hidden="true"></i>
                </div>
            </div>
        </div>

        <footer id="footer">
            <p><font color="white"><br/>&copy AMBRUZ 2019 All rights reserved</font></p>
        </footer>
    </div>

    <script type="text/javascript" src="jquery-3.3.1.js"></script>
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

function LoggedIN(){
    <?php
    if(isset($_SESSION['user'])){
        ?>
        var id= document.getElementById('signin');
        id.text="<?php echo $_SESSION['user'];?>";
        <?php
    }
    else
        echo $_SESSION['user'];
    ?>
}

LoggedIN();

</script>

</body>
</html>