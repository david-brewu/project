<?php
    require_once (dirname(__FILE__)).'/../db_essentials/db_class.php';

    class Player extends db_connection {
        public function create($previous_team,	$position, $fromAcademy, $isCaptain, $isLoan, $member_ID){
            // sql query
            $sql = "INSERT INTO `players`(`previous_team`,`position`, `fromAcademy`,`isCaptain`,`isLoan`,`member_ID`) VALUES ('$previous_team','$position', '$fromAcademy','$isCaptain','$isLoan','$member_ID')";

            // run query
            return $this->db_query($sql);
        }

        public function getPlayers(){
            //sql query
            $sql = "SELECT * FROM `players` JOIN `members` ON (players.member_ID = members.member_ID)";

            //run query
            return $this->db_query($sql);
        }

        public function getSinglePlayer($player_ID){
            // sql query
            $sql = "SELECT * FROM `members` JOIN `players` ON (members.member_ID = players.member_ID) WHERE `player_ID`= '$player_ID'";

            // run query
            return $this->db_query($sql);
        }

        public function update($player_ID, $first_name,	$last_name,	$dob, $country, $contract_status, $date_signed, $contract_exp_date,$salary, $previous_team,	$position, $fromAcademy, $isCaptain, $isLoan){
            // sql query
            $sql = "UPDATE `players` JOIN `members` ON (players.member_ID = members.member_ID) SET `first_name`='$first_name',`last_name`='$last_name', `dob`='$dob',`country`='$country', `contract_status`='$contract_status',`date_signed`='$date_signed', `contract_exp_date`='$contract_exp_date',`salary`='$salary', `previous_team`='$previous_team',`position`='$position', `fromAcademy`='$fromAcademy',`isCaptain`='$isCaptain', `isLoan`='$isLoan' WHERE `player_ID`='$player_ID'";

            // run query
            return $this->db_query($sql);
        }

        public function delete($player_ID){
            // sql query
            $sql = "DELETE `players`, `memebers`
            FROM `players` JOIN `members` ON (players.member_ID = members.member_ID) WHERE `player_ID` ='$player_ID'";
            
            // run query
            return $this->db_query($sql);
        }
    }
