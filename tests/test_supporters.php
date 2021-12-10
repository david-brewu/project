<?php
use PHPUnit\Framework\TestCase;
require_once (dirname(__FILE__)).'/../supporters/supporter_controller.php';
require_once (dirname(__FILE__)).'/../member/member_controller.php';

class test_supporters extends TestCase{

    // test if a supporter can be created
    public function testCreateSupporter(){
        
        $response = createSupporter("David", "Sampa", "sampa@gmail.com", "davidsampa", "Yes", "No","./../images/default_avatar.png");
        $this->assertTrue($response);

    }

   // test if a supporter can be updated
     public function testUpdateSupporter(){
        
         $response = updateSupporter("1","David", "Ebo","ebo@gmail.com");
         $this->assertTrue($response);
     }

     // test if all Supporters can be fetched 
     public function testGetSupporters(){
        
         $response = getSupporters();
         $this->assertIsArray($response);
     }

     // test if a single supporter can be fetched
     public function testgetSingleSupporter(){

         $response = getSingleSupporter("2");
         $this->assertArrayHasKey('id', $response);
     }

     // test if a supporter can be archived
     public function testarchveSupporter(){

         $response = archive_supporter("5", "Yes");
         $this->assertTrue($response);
     }

    
}