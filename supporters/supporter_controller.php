<?php
//connect to post class
include_once (dirname(__FILE__)).'/supporter_class.php';

// Inserting a new post
function createSupporter($first_name, $last_name, $email, $password, $isAdmin, $isArchive, $default_avatar){
    // Create new post object
    $supporter = new Supporter;

    // Run query
    $runQuery = $supporter->create($first_name, $last_name, $email, $password, $isAdmin, $isArchive, $default_avatar);

    if($runQuery){
        return $runQuery;
    }else{
        return false;
    }
}

function verify_email($email){
    $supporter =new Supporter;

    $runQuery = $supporter->verify_email($email);

    if($runQuery){
        // fetch data from database
        $user_email = $supporter->db_fetch();
        if(empty($user_email)){
            // if empty means the email isn't in the database already
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}

function getSupporters(){
    // Create new post object
    $supporter = new Supporter;

    // Run query
    $runQuery = $supporter->getSupporters();

    if($runQuery){
        $supporters = array();
        while($record = $supporter->db_fetch()){
            $supporters[] = $record;
        }
        return $supporters;
    }else{
        return [];
    }
}


function archive_supporter($id, $archive){
    $supporter = new Supporter;

    // Run query
    $runQuery = $supporter->archive($id, $archive);

    if($runQuery){
        return $runQuery;
    }else{
        return false;
    }
}


function getSingleSupporter($id){
    // Create new post object
    $supporter = new Supporter;

    // Run query
    $runQuery = $supporter->getSingleSupporter($id);

    if($runQuery){

        $single_supporter = $supporter->db_fetch();
        if(!empty($single_supporter)){
            return $single_supporter;
        }else{
            return [];
        }
        
    }else{
        return false;
    }
}

function getSingleSupporterWithEmail($email){
    // Create new post object
    $supporter = new Supporter;

    // Run query
    $runQuery = $supporter->getSingleSupporterWithEmail($email);

    if($runQuery){

        $single_supporter = $supporter->db_fetch();
        if(!empty($single_supporter)){
            return $single_supporter;
        }else{
            return [];
        }
        
    }else{
        return false;
    }
}

function updateSupporter($id, $first_name, $last_name, $email){
    // Create new post object
    $supporter = new Supporter;

    // Run query
    $runQuery = $supporter->update($id, $first_name, $last_name, $email);

    if($runQuery){
        return $runQuery;
    }else{
        return false;
    }
}

function deleteSupporter($id){
    // Create new post object
    $supporter = new Supporter;

    // Run query
    $runQuery = $supporter->delete($id);

    if($runQuery){
        return $runQuery;
    }else{
        return false;
    }
}

function totalSupporterArcheives(){
    $members = getSupporters();
    $total_archieves = 0;
    if($members != false){
        foreach ($members as $member){
            if($member["isArchive"] == "Yes"){
                $total_archieves ++;
            }
        }
    }
    return $total_archieves;
    
}
?>