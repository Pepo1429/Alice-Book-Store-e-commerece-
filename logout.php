<?php
session_start(); 
if(isset($_POST['destroySession'])){
    session_destroy();
    header('Location:home.php');
}

?>