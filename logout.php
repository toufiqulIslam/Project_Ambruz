<?php
include 'server.php';
function destroy(){
    session_destroy();
    unset($_SESSION['done']);
    unset($_SESSION['user']);
    unset($_SESSION['email']);
    unset($_SESSION['register']);
    header('location:login.php');
}
destroy();
    ?> 