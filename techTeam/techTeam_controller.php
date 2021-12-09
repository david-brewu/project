<?php
//connect to post class
include_once (dirname(__FILE__)).'/techTeam_class.php';

// Inserting a new post
function createTM($isOldplayer, $role, $isPartTime, $member_ID, $yearsOfService){
    // Create new post object
    $tm = new TechnicalMember;

    // Run query
    $runQuery = $tm->create($isOldplayer, $role, $isPartTime, $member_ID, $yearsOfService);

    if($runQuery){
        return $runQuery;
    }else{
        return false;
    }
}


function getTMs(){
    // Create new post object
    $tm = new TechnicalMember;

    // Run query
    $runQuery = $tm->getTMs();

    if($runQuery){
        $technical_members = array();
        $unarchive_tech_member = array();
        while($record = $tm->db_fetch()){
            
            $technical_members[] = $record;
        }

        foreach ($technical_members as $tech_member) {
            if ($tech_member["isArchive"] == "No") {
                $unarchive_tech_member[] = $tech_member;
            }
        }
        return $unarchive_tech_member;
    }else{
        return [];
    }
}



function getSingleTM($tm_ID){
    // Create new post object
    $tm = new TechnicalMember;

    // Run query
    $runQuery = $tm->getSingleTM($tm_ID);

    if($runQuery){

        $technical_member = $tm->db_fetch();
        if(!empty($technical_member)){
            return $technical_member;
        }else{
            return [];
        }
        
    }else{
        return false;
    }
}


function updateTM($tm_ID, $first_name,	$last_name,	$dob, $country, $contract_status, $date_signed, $contract_exp_date,$salary, $isOldplayer, $role, $isPartTime, $yearsOfService){
    // Create new post object
    $tm = new TechnicalMember;

    // Run query
    $runQuery = $tm->update($tm_ID, $first_name, $last_name, $dob, $country, $contract_status, $date_signed, $contract_exp_date,$salary, $isOldplayer, $role, $isPartTime, $yearsOfService);

    if($runQuery){
        return $runQuery;
    }else{
        return false;
    }
}

function deleteTM($tm_ID){
    // Create new post object
    $tm = new TechnicalMember;

    // Run query
    $runQuery = $tm->delete($tm_ID);

    if($runQuery){
        return $runQuery;
    }else{
        return false;
    }
}
?>