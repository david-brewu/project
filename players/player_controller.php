<?php
//connect to player class
include_once (dirname(__FILE__)) . '/player_class.php';

// Inserting a new player
function createPlayer($previous_team,    $position, $fromAcademy, $isCaptain, $isLoan, $member_ID)
{
    // Create new player object
    $player = new Player;

    // Run query
    $runQuery = $player->create($previous_team,    $position, $fromAcademy, $isCaptain, $isLoan, $member_ID);

    if ($runQuery) {
        return $runQuery;
    } else {
        return false;
    }
}


function getPlayers()
{
    // Create new player object
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
    // Create new player object
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


function updatePlayer($player_ID, $first_name,    $last_name,    $dob, $country, $contract_status, $date_signed, $contract_exp_date, $salary, $previous_team,    $position, $fromAcademy, $isCaptain, $isLoan)
{
    // Create new player object
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
    // Create new player object
    $player = new Player;

    // Run query
    $runQuery = $player->delete($member_ID);

    if ($runQuery) {
        return $runQuery;
    } else {
        return false;
    }
}
