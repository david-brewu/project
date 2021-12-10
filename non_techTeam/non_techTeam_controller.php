<?php
//connect to post class
include_once (dirname(__FILE__)).'/non_techTeam_class.php';

// Inserting a new non technical member
function createNTM($member_ID, $isPartTime, $department, $yearsOfService){
    // Create new non technical member object
    $ntm = new NonTechnicalMember;

    // Run query
    $runQuery = $ntm->create($member_ID, $isPartTime, $department, $yearsOfService);

    if($runQuery){
        return $runQuery;
    }else{
        return false;
    }
}


function getNTMs(){
    // Create new non technical member object
    $ntm = new NonTechnicalMember;

    // Run query
    $runQuery = $ntm->getNTMs();

    if($runQuery){
        $non_technical_members = array();
        $unarchive_NTMs = array();
        while($record = $ntm->db_fetch()){
            $non_technical_members[] = $record;
        }
        foreach ($non_technical_members as $NTM) {
            if ($NTM["isArchive"] == "No") {
                $unarchive_NTMs[] = $NTM;
            }
        }

        return $unarchive_NTMs;
    }else{
        return [];
    }
}



function getSingleNTM($ntm_ID){
    // Create new non technical member object
    $ntm = new NonTechnicalMember;

    // Run query
    $runQuery = $ntm->getSingleNTM($ntm_ID);

    if($runQuery){

        $non_technical_member = $ntm->db_fetch();
        if(!empty($non_technical_member)){
            return $non_technical_member;
        }else{
            return [];
        }
        
    }else{
        return [];
    }
}


function updateNTM($ntm_ID, $first_name,	$last_name,	$dob, $country, $contract_status, $date_signed, $contract_exp_date,$salary, $isPartTime, $department, $yearsOfService){
    // Create new non technical member object
    $ntm = new NonTechnicalMember;

    // Run query
    $runQuery = $ntm->update($ntm_ID, $first_name, $last_name, $dob, $country, $contract_status, $date_signed, $contract_exp_date,$salary, $isPartTime, $department, $yearsOfService);

    if($runQuery){
        return $runQuery;
    }else{
        return false;
    }
}

?>