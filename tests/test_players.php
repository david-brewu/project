<?php
use PHPUnit\Framework\TestCase;
require_once (dirname(__FILE__)).'/../players/player_controller.php';
require_once (dirname(__FILE__)).'/../member/member_controller.php';

class test_players extends TestCase{

    // test if a player can be created
    public function testCreatePlayer(){
        
        $response = CreatePlayer("Asante Kotoko", "Defender", "No", "No", "No", "6");
        $this->assertTrue($response);

    }

    // test if a player can be updated
     public function testPlayerUpdate(){
        
         $response = updatePlayer("5","David", "Sampa","1975-12-11","Ghana","Active","2020-10-12","2024-06-01","3000","Hearts of Oak","Stiker","No","Yes","No");
         $this->assertTrue($response);
     }

     // test if all players can be fetched 
     public function testGetPlyaers(){
        
         $response = getPlayers();
         $this->assertIsArray($response);
     }

     // test if a single player can be fetched
     public function testgetSinglePlayer(){

         $response = getSinglePlayer("7");
         $this->assertArrayHasKey('player_ID', $response);
     }

     // test if a player can be archived
     public function testarchvePlayer(){

         $response = archive("2", "Yes");
         $this->assertTrue($response);
     }

    
}