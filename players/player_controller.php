<?php
//connect to post class
include_once (dirname(__FILE__)) . '/player_class.php';

// Inserting a new post
function createPlayer($previous_team,    $position, $fromAcademy, $isCaptain, $isLoan, $member_ID)
{
    // Create new post object
    $player = new Player;

    // Run query
    $runQuery = $player->create($previous_team,    $position, $fromAcademy, $isCaptain, $isLoan, $member_ID);

    if ($runQuery) {
        return $runQuery;
    } else {
        return false;
    }
}

// function verify_email($email){
//     $supporter =new Supporter;

//     $runQuery = $supporter->verify_email($email);

//     if($runQuery){
//         // fetch data from database
//         $user_email = $supporter->db_fetch();
//         if(empty($user_email)){
//             // if empty means the email isn't in the database already
//             return true;
//         }else{
//             return false;
//         }
//     }else{
//         return false;
//     }
// }

function getPlayers()
{
    // Create new post object
    $player = new Player;

    // Run query
    $runQuery = $player->getPlayers();

    if ($runQuery) {
        $players = array();
        $unarchived_player = array();
        while ($record = $player->db_fetch()) {
            $players[] = $record;
        }
        foreach ($players as $player) {
            if ($player["isArchive"] == "No") {
                $unarchived_player[] = $player;
            }
        }


        return $unarchived_player;
    } else {
        return [];
    }
}



function getSinglePlayer($player_ID)
{
    // Create new post object
    $player = new Player;

    // Run query
    $runQuery = $player->getSinglePlayer($player_ID);

    if ($runQuery) {

        $single_player = $player->db_fetch();
        if (!empty($single_player)) {
            return $single_player;
        } else {
            return [];
        }
    } else {
        return false;
    }
}

// function getSingleSupporterWithEmail($email){
//     // Create new post object
//     $supporter = new Supporter;

//     // Run query
//     $runQuery = $supporter->getSingleSupporterWithEmail($email);

//     if($runQuery){

//         $single_supporter = $supporter->db_fetch();
//         if(!empty($single_supporter)){
//             return $single_supporter;
//         }else{
//             return [];
//         }

//     }else{
//         return false;
//     }
// }

function updatePlayer($player_ID, $first_name,    $last_name,    $dob, $country, $contract_status, $date_signed, $contract_exp_date, $salary, $previous_team,    $position, $fromAcademy, $isCaptain, $isLoan)
{
    // Create new post object
    $player = new Player;

    // Run query
    $runQuery = $player->update($player_ID, $first_name, $last_name, $dob, $country, $contract_status, $date_signed, $contract_exp_date, $salary, $previous_team, $position, $fromAcademy, $isCaptain, $isLoan);

    if ($runQuery) {
        return $runQuery;
    } else {
        return false;
    }
}


function deletePlayer($member_ID)
{
    // Create new post object
    $player = new Player;

    // Run query
    $runQuery = $player->delete($member_ID);

    if ($runQuery) {
        return $runQuery;
    } else {
        return false;
    }
}
