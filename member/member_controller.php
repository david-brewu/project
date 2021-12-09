<?php
//connect to post class
include_once (dirname(__FILE__)).'/../member/member_class.php';

// Inserting a new post
function createMember($first_name, $last_name, $dob, $country, $contract_status, $date_signed, $contract_exp_date,$salary,$isArchive,$image){
    // Create new post object
    $member = new Member;

    // Run query
    $runQuery = $member->create($first_name, $last_name, $dob, $country, $contract_status, $date_signed, $contract_exp_date,$salary,$isArchive,$image);

    if($runQuery){
        return $runQuery;
    }else{
        return false;
    }
}

function archive($member_ID, $archive){
    $member = new Member;

    // Run query
    $runQuery = $member->archive($member_ID, $archive);

    if($runQuery){
        return $runQuery;
    }else{
        return false;
    }
}


// function getID(){
//     $member = new Member;
//     $id = $member->getID();
//     return $id;
    
// }

function getMembers(){
    // Create new post object
    $member = new Member;

    // Run query
    $runQuery = $member->getMembers();

    if($runQuery){
        $members = array();
        while($record = $member->db_fetch()){
            $members[] = $record;
        }
        return $members;
    }else{
        return false;
    }
}

function getArchivedMembers(){
    // Create new post object
    $member = new Member;

    // Run query
    $runQuery = $member->getMembers();

    if($runQuery){
        $members = array();
        $archive_member = array();
        while($record = $member->db_fetch()){
            $members[] = $record;
        }
        foreach($members as $member){
            if($member['isArchive'] == 'Yes'){
                $archive_member[] = $member;
            }
        }
        return $archive_member;
    }else{
        return [];
}}

function getSingleMember($member_ID){
    // Create new post object
    $member = new Member;

    // Run query
    $runQuery = $member->getSingleMember($member_ID);

    if($runQuery){

        $member = $member->db_fetch();
        if(!empty($member)){
            return $member;
        }else{
            return [];
        }
        
    }else{
        return false;
    }
}

function updateMember($member_ID, $first_name,	$last_name,	$dob, $country, $contract_status, $date_signed, $contract_exp_date,$salary){
    // Create new post object
    $member = new Member;

    // Run query
    $runQuery = $member->update($member_ID, $first_name,	$last_name,	$dob, $country, $contract_status, $date_signed, $contract_exp_date,$salary);

    if($runQuery){
        return $runQuery;
    }else{
        return false;
    }
}

function deletePost($member_ID){
    // Create new post object
    $member = new Member;

    // Run query
    $runQuery = $member->delete($member_ID);

    if($runQuery){
        return $runQuery;
    }else{
        return false;
    }
}

function totalMemberArcheives(){
    $members = getMembers();
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