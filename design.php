<?php
session_start();
?>
<html>
<head>
    <title>Ambruz | Design</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="styleBanner.css">
    <link rel="stylesheet" type="text/css" href="font-awesome/css/all.css">

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

            document.querySelector('.bg-modal').style.top = window.scrollY;
            document.querySelector('.bg-modal').style.display = 'flex';
            document.body.style.overflow = 'hidden';
            document.getElementById('modalIMG').src= id;

            document.querySelector('.closeIMG').addEventListener('click',function(){
                document.querySelector('.bg-modal').style.display = 'none';
                document.body.style.overflow = 'auto';
                location.reload();
            });

            modalcontrol();
            document.getElementById("likeTab").innerHTML = "&nbsp"+document.getElementById(id+"likeShow").innerHTML;
            document.getElementById("commentTab").innerHTML = "&nbsp"+document.getElementById(id+"commentShow").innerHTML;
            document.getElementById(name+"visit").click();

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
        function visit(name){
            let ajax = new XMLHttpRequest();
            ajax.open("GET", "ajax_like.php?idTest="+"visit"+"&idUser="+name);
            ajax.onload = function(){
                if(this.readyState == 4 && this.status == 200){
                    let nameU = JSON.parse(this.responseText);
                    if(nameU == name){
                        $("#visitTab").attr("href", "User.php");
                    }
                    else{
                        $("#visitTab").attr("href", "UserVisit.php");
                    }
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

    </script>

</head>
<body>
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
    <div class="banner">
        <table cellspacing="0" width="100%">
            <tr bgcolor="#F5EBC9">
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td>
                    <h1><font color="#37055A">Discover the top Creators & Designers</font></h1><font color="#E35C5A"><h3>Ambruz is the leading destination to find & showcase creative work and <br/>home to the best design professionals.</font><br/><font color="black">Sign Up now</font><br/><a href="register.php" class="signupButton">Sign Up</a></h3></td>
                    <td><img src="img/about.png" height="400" width="500"></td>
                </tr>
            </table>
        </div>

        <div class="shots_Gallery">
            <section class="gallery-links-shots">
                <div class="wrapper">
                    <h2>Trending Designs</h2>

                    <div class="gallery-container-shots">
                        <?php 
                        include_once 'upload/dbh.inc.php';

                        $sql = "SELECT * FROM gallery WHERE Type='A Design' ORDER BY OrderGallery DESC";
                        $stmt = mysqli_stmt_init($con);
                        if(!mysqli_stmt_prepare($stmt,$sql)){
                            echo "Server did not respond!!!";
                        }else{
                            mysqli_stmt_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);

                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>

                                <div> 
                                    <button id="<?php echo $row['ID']."visit";?>" name="<?php echo $row['Owner']; ?>" onclick="visit(name)" hidden></button> 
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

        <div class="bg-modal">
            <div class="modal-content">
                <div class="closeIMG">+</div>
                <div class="test" id="test">
                    <img id="modalIMG" src=""><br/>
                    <input id="commentIMG" type="text" name="commentIMG" placeholder="Enter Your Comment">
                </div>
                <button id="commentSubmit" >Comment</button>
                <div class="comments" id="comments">
                    <p id="commentsPer"><!-- this is a comment this is a comment this is a comment this is a comment  --></p>
                </div>
                <div class="btnModal" id="btnModal">
                    <button id="saveModal">Save</button>
                    <button id="likeModal"> Like </button>
                    <i id="likeTab" class="fa fa-thumbs-up" aria-hidden="true"></i>
                    <i id="commentTab" class="fa fa-comment" aria-hidden="true"></i>
                    <a id="visitTab" href="">Visit Content Creator</a>
                </div>
            </div>
        </div>

        <footer id="footer">
            <p><font color="white"><br/>&copy AMBRUZ 2019 All rights reserved</font></p>
        </footer>

        <script src="jquery-ui.min.js"></script>
        <script type="text/javascript">

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