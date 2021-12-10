<?php
    require_once (dirname(__FILE__)).'/../db_essentials/db_class.php';

    class Member extends db_connection {
        public function create($first_name,	$last_name,	$dob, $country, $contract_status, $date_signed, $contract_exp_date,$salary,$isArchive,$image){
            // sql query
            $sql = "INSERT INTO `members`(`first_name`,`last_name`,`dob`, `country`,`contract_status`,`date_signed`,`contract_exp_date`, `salary`, `isArchive`, `image`) VALUES ('$first_name','$last_name','$dob', '$country','$contract_status','$date_signed','$contract_exp_date', '$salary', '$isArchive', '$image')";

            // run query
            return $this->db_query_ID($sql);
        }

        public function archive($member_ID, $archive){
            $sql = "UPDATE `members` SET `isArchive`='$archive' WHERE  `member_ID` = '$member_ID'";
            return $this->db_query($sql);
        }

        public function getMembers(){
            //sql query
            $sql = "SELECT * FROM `members`";

            //run query
            return $this->db_query($sql);
        }

        public function getSingleMember($member_ID){
            // sql query
            $sql = "SELECT * FROM `members` WHERE `member_ID`='$member_ID'";

            // run query
            return $this->db_query($sql);
        }

        public function update($member_ID, $first_name,	$last_name,	$dob, $country, $contract_status, $date_signed, $contract_exp_date,$salary){
            // sql query
            $sql = "UPDATE `members` SET `first_name`='$first_name',`last_name`='$last_name', `dob`='$dob',`country`='$country', `contract_status`='$contract_status',`date_signed`='$date_signed', `contract_exp_date`='$contract_exp_date',`salary`='$salary' WHERE `member_ID`='$member_ID'";

            // run query
            return $this->db_query($sql);
        }

        public function delete($member_ID){
            // sql query
            $sql = "DELETE FROM `members` WHERE `member_ID`='$member_ID'";

            // run query
            return $this->db_query($sql);
        }

        
    }
    ?>