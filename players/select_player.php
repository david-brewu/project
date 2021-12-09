<?php
include_once ("player_controller.php");
include_once ("./../member/member_controller.php");

$player = getSinglePlayer(1);
$player_as_member = getPlayers();

echo $player["first_name"];
echo $player_as_member[0]["dob"]



?>