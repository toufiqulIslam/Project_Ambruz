//<script type="text/javascript">

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
            document.getElementById("commentsPer").innerHTML += commentPhoto;
        }
    }
    ajax.send();
}

    //</script>