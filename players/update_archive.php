<?php

include_once("./../member/member_controller.php");
session_start();

    if(isset($_GET['archive_ID']) && isset($_GET['job'])){
            $_SESSION['job'] = $_GET['job'];
        if($_SESSION['job'] == 'archive'){
        $archive_ID = $_GET['archive_ID'];
        $update_Archive = archive($archive_ID, "Yes");
        if($update_Archive){
            echo '<p style="color:black;">archive update success';
           
        }
        else{
            echo '<p style="color:black;">archive update failed';
        }}elseif($_SESSION['job'] == 'unarchive'){
            $archive_ID = $_GET['archive_ID'];
        $update_Archive = archive($archive_ID, "No");
        if($update_Archive){
            echo '<p style="color:black;">archive update success';
           
        }
        else{
            echo '<p style="color:black;">archive update failed';
        }
        }
    }
    
    ?>
