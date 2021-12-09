<?php

include_once("./supporter_controller.php");


    if(isset($_GET['id']) && isset($_GET['job'])){
            $job = $_GET['job'];
        if($job == 'archive'){
        $id = $_GET['id'];
        $update_Archive = archive_supporter($id, "Yes");
        if($update_Archive){
            echo '<p style="color:black;">archive update success';
           
        }
        else{
            echo '<p style="color:black;">archive update failed';
        }}elseif($job == 'unarchive'){
            $id = $_GET['id'];
        $update_Archive = archive_supporter($id, "No");
        if($update_Archive){
            echo '<p style="color:black;">archive update success';
           
        }
        else{
            echo '<p style="color:black;">archive update failed';
        }
        }
    }
    
    ?>
