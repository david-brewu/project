<?php
//connect to database class
require_once (dirname(__FILE__)).'/../db_essentials/db_class.php';

class Supporter extends db_connection {
    public function create($first_name, $last_name, $email, $password, $isAdmin, $isArchive, $default_avatar){
        // sql query
        $sql = "INSERT INTO `supporters`(`first_name`, `last_name`, `email`,`password`,`isAdmin`, `isArchive`, `default_avatar`) VALUES ('$first_name', '$last_name', '$email','$password','$isAdmin', '$isArchive', '$default_avatar')";

        // run query
        return $this->db_query($sql);
    }

    public function verify_email($email){
        $sql = "SELECT * FROM `supporters` WHERE `email`='$email'";
        return $this->db_query($sql);
    }

    public function getSupporters(){
        //sql query
        $sql = "SELECT * FROM `supporters`";

        //run query
        return $this->db_query($sql);
    }
    
    public function getSingleSupporter($id){
        // sql query
        $sql = "SELECT * FROM `supporters` WHERE `id`='$id'";

        // run query
        return $this->db_query($sql);
    }

    public function getSingleSupporterWithEmail($email){
        // sql query
        $sql = "SELECT * FROM `supporters` WHERE `email`  LIKE '$email%'";

        // run query
        return $this->db_query($sql);
    }
    
    public function update($id, $first_name, $last_name, $email){
        // sql query
        $sql = "UPDATE `supporters` SET `first_name`='$first_name',`last_name`='$last_name',`email`='$email' WHERE `id`='$id'";

        // run query
        return $this->db_query($sql);
    }

    public function Archive($id, $archive){
        $sql = "UPDATE `supporters` SET `isArchive`='$archive' WHERE `id`='$id'";

        // run query
        return $this->db_query($sql);

    }

    public function delete($id){
        // sql query
        $sql = "DELETE FROM `customers` WHERE `id`='$id'";
      
        // run query
        return $this->db_query($sql);
    }
}

?>