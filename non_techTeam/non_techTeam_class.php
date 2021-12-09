<?php
    require_once (dirname(__FILE__)).'/../db_essentials/db_class.php';

    class NonTechnicalMember extends db_connection {
        public function create($member_ID, $isPartTime, $department, $yearsOfService){
            // sql query
            $sql = "INSERT INTO `non_technical_team`(`member_ID`, `isPartTime`, `department`, `yearsOfService`) VALUES ('$member_ID' '$isPartTime', '$department', '$yearsOfService')";

            // run query
            return $this->db_query($sql);
        }

        public function getNTMs(){
            //sql query
            $sql = "SELECT * FROM `non_technical_team` JOIN `members` ON (non_technical_team.member_ID = members.member_ID)";

            //run query
            return $this->db_query($sql);
        }

        public function getSingleNTM($ntt_ID){
            // sql query
            $sql = "SELECT * FROM `members` JOIN `non_technical_team` ON (members.member_ID = non_technical_team.member_ID) WHERE `ntt_ID`= '$ntt_ID'";

            // run query
            return $this->db_query($sql);
        }

        public function update($ntt_ID, $first_name,	$last_name,	$dob, $country, $contract_status, $date_signed, $contract_exp_date,$salary, $isPartTime, $department, $yearsOfService){
            // sql query
            $sql = "UPDATE `non_technical_team` JOIN `members` ON (non_technical_team.member_ID = members.member_ID) SET `first_name`='$first_name',`last_name`='$last_name', `dob`='$dob',`country`='$country', `contract_status`='$contract_status',`date_signed`='$date_signed', `contract_exp_date`='$contract_exp_date',`salary`='$salary', `isPartTime`='$isPartTime', `department`='$department', `yearsOfService`='$yearsOfService' WHERE `ntt_ID`='$ntt_ID'";

            // run query
            return $this->db_query($sql);

        }

        public function delete($ntt_ID){
            // sql query
            $sql = "DELETE `non_technical_team`, `members`
            FROM `non_technical_team` JOIN `members` ON (non_technical_team.member_ID = members.member_ID) WHERE `ntt_ID` ='$ntt_ID'";
            
            // run query
            return $this->db_query($sql);
        }
    }


    ?>