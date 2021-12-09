<?php
    require_once (dirname(__FILE__)).'/../db_essentials/db_class.php';

    class TechnicalMember extends db_connection {
        public function create($isOldplayer, $role, $isPartTime, $member_ID, $yearsOfService){
            // sql query
            $sql = "INSERT INTO `technical_team`(`isOldplayer`,`role`, `member_ID`, `isPartTime`, `yearsOfService`) VALUES ('$isOldplayer','$role', '$member_ID', '$isPartTime', '$yearsOfService')";

            // run query
            return $this->db_query($sql);
        }

        public function getTMs(){
            //sql query
            $sql = "SELECT * FROM `technical_team` JOIN `members` ON (technical_team.member_ID = members.member_ID)";

            //run query
            return $this->db_query($sql);
        }

        public function getSingleTM($tt_ID){
            // sql query
            $sql = "SELECT * FROM `members` JOIN `technical_team` ON (members.member_ID = technical_team.member_ID) WHERE `tt_ID`= '$tt_ID'";

            // run query
            return $this->db_query($sql);
        }

        public function update($tt_ID, $first_name,	$last_name,	$dob, $country, $contract_status, $date_signed, $contract_exp_date,$salary, $isOldplayer, $role, $isPartTime, $yearsOfService){
            // sql query
            $sql = "UPDATE `technical_team` JOIN `members` ON (technical_team.member_ID = members.member_ID) SET `first_name`='$first_name',`last_name`='$last_name', `dob`='$dob',`country`='$country', `contract_status`='$contract_status',`date_signed`='$date_signed', `contract_exp_date`='$contract_exp_date',`salary`='$salary', `isOldplayer`='$isOldplayer',`role`='$role', `isPartTime`='$isPartTime',`yearsOfService`='$yearsOfService' WHERE `tt_ID`='$tt_ID'";

            // run query
            return $this->db_query($sql);

        }

        public function delete($tt_ID){
            // sql query
            $sql = "DELETE `technical_team`, `members`
            FROM `technical_team` JOIN `members` ON (technical_team.member_ID = member.member_ID) WHERE `tt_ID` ='$tt_ID'";
            
            // run query
            return $this->db_query($sql);
        }
    }


    ?>