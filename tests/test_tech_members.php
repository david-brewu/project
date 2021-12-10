<?php
use PHPUnit\Framework\TestCase;
require_once (dirname(__FILE__)).'/../techTeam/techTeam_controller.php';
require_once (dirname(__FILE__)).'/../member/member_controller.php';

class test_tech_members extends TestCase{

    // test if a technical member can be created
    public function testCreateTechnicalMember(){
        
        $response = createTM("Yes", "Head Coach", "No", "17", "5");
        $this->assertTrue($response);

    }

   // test if a technical member can be updated
     public function testUpdateTechnicalMember(){
        
         $response = updateTM("2","David", "Ebo","1975-12-11","Ghana","Active","2020-10-12","2024-06-01","3000","Yes", "Head Coach", "No", "17");
         $this->assertTrue($response);
     }

     // test if all technical members can be fetched 
     public function testGetTechnicalMember(){
        
         $response = getTMs();
         $this->assertIsArray($response);
     }

     // test if a single technical member can be fetched
     public function testgetSingleTechnicalMember(){

         $response = getSingleTM("2");
         $this->assertArrayHasKey('tt_ID', $response);
     }

     // test if a technical member can be archived
     public function testarchveTechnicalMember(){

         $response = archive("17", "Yes");
         $this->assertTrue($response);
     }

    
}