<?php
    session_start();
    if(isset($_SESSION['email']) && isset($_SESSION['isAdmin'])){
        if($_SESSION['isAdmin']=="No"){
            header("location: ./index.php");
        }elseif($_SESSION['isAdmin']=="Yes"){
            header("location: ./admin/dashboard.php");
        }
    }else{
        header("location: ./pages/loginPage.php");
    }
?>
