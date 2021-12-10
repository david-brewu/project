<?php
use PHPUnit\Framework\TestCase;
require_once (dirname(__FILE__)).'/../non_techTeam/non_techTeam_controller.php';
require_once (dirname(__FILE__)).'/../member/member_controller.php';
require_once (dirname(__FILE__)).'/../db_essentials/db_credentials.php';
 
 

class test_non_tech_members extends TestCase{
    
    

    // test if a non-technical member can be created
    public function testCreateNonTechnicalMember(){
        $db = mysqli_connect(servername,username,password,dbname);
        
        $sql = "INSERT INTO `non_technical_team`(`member_ID`, `isPartTime`, `department`, `yearsOfService`) VALUES ('40','Yes', 'Fitness Trainer', '2')";
        $response =  mysqli_query($db, $sql);
        $this->assertTrue($response);

    }

   // test if a non-technical member can be updated
     public function testUpdateNonTechnicalMember(){
        
         $response = updateNTM("2","David", "Ebo","1975-12-11","Ghana","Active","2020-10-12","2024-06-01","3000","Yes", "Fitness Trainer", "2");
         $this->assertTrue($response);
     }

     // test if all non-technical members can be fetched 
     public function testGetNonTechnicalMembers(){
        
         $response = getNTMs();
         $this->assertIsArray($response);
     }

     // test if a single non-technical member can be fetched
     public function testgetSingleNonTechnicalMember(){

         $response = getSingleNTM("7");
         $this->assertArrayHasKey('ntt_ID', $response);
     }

     // test if a non-technical member can be archived
     public function testarchveNonTechnicalMember(){

         $response = archive("40", "Yes");
         $this->assertTrue($response);
     }

    
}