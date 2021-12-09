<?php
include_once("./../players/player_controller.php");
include_once("./../techTeam/techTeam_controller.php");
include_once("./../non_techTeam/non_techTeam_controller.php");
include_once("./../member/member_controller.php");
session_start();
$_SESSION['accessor'] = 'admin';
if(!isset($_SESSION['first_name']) || !isset($_SESSION['isAdmin'])){
  header("location: ./../pages/loginPage.php");
}
if (isset($_GET['view'])) {
  $_SESSION['view'] = $_GET['view'];
}
?>

<?php
if (isset($_GET['logout'])) {
  session_destroy();
  header("location: ./../root.php");
}
?>

<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <!--<title> Responsiive Admin Dashboard | CodingLab </title>-->
  <link rel="stylesheet" href="./../css/adminPageCss.css">
  <!-- Boxicons CDN Link -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <div class="sidebar">
    <div class="logo-details">
      <img style="margin-left: 10px;" src="./../images/sankofa.jpg" height="50" width="50" alt="">
      <span style="margin-left: 20px;" class="logo_name">Sankofa FC</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="./dashboard.php">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Dashboard</span>
        </a>
      </li>

      <li>
        <a href="./players_page.php?view=Player" <?php if ($_SESSION['view'] == 'Player') { ?> class="active" <?php } ?>>

          <i class='bx bx-football'></i>
          <span class="links_name">Players</span>
        </a>
      </li>
      <li>
        <a href="./players_page.php?view=Technical Member" <?php if ($_SESSION['view'] == 'Technical Member') { ?> class="active" <?php } ?>>
          <i class='bx bxs-group'></i>
          <span class="links_name">Technical Team</span>
        </a>
      </li>
      <li>
        <a href="./players_page.php?view=Non-Technical Member" <?php if ($_SESSION['view'] == 'Non-Technical Member') { ?> class="active" <?php } ?>>
          <i class='bx bx-pie-chart-alt-2'></i>
          <span class="links_name">Non-Technical Team</span>
        </a>
      </li>
      <li>
        <a href="./supporters_page.php">
          <i class='bx bx-group'></i>
          <span class="links_name">Supporters</span>
        </a>
      </li>
      <li>
      <a href="./players_page.php?view=archive" <?php if ($_SESSION['view'] == 'archive') { ?> class="active" <?php } ?>>

          <i class='bx bx-archive-out'></i>
          <span class="links_name">Archieves</span>
        </a>
      </li>
      <li>
        <a href="./../club_news/club_news.php">
          <i class='bx bx-news'></i>
          <span class="links_name">Publish Club News</span>
        </a>
      </li>
     

      <li class="log_out">
        <a href="./players_page.php?logout=true">
          <i class='bx bx-log-out'></i>
          <span class="links_name">Log out</span>
        </a>
      </li>
    </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <?php
        if ($_SESSION['view'] == 'Player') { ?>
          <span class="dashboard">Players</span>
          </div>
          <div class="search-box">
          <form class="search-box"  action="./players_page.php">
          <input type="text"  placeholder="Search a player by name..." name = "search" <?php if(isset($_GET['search'])){ ?> value=" <?php echo $_GET['search']; ?>" <?php } ?>>
          <button type="submit"><i class='bx bx-search'></i></button>
          </form>
          
        </div>
    </nav><br>
        <?php

        } elseif ($_SESSION['view'] == 'Technical Member') {
        ?>
          <span class="dashboard">Technical Members</span>
          </div>
          <div class="search-box">
          <form class="search-box"  action="./players_page.php">
          <input type="text"  placeholder="Search a technical member by name..." name = "search" <?php if(isset($_GET['search'])){ ?> value=" <?php echo $_GET['search']; ?>" <?php } ?>>
          <button type="submit"><i class='bx bx-search'></i></button>
          </form>
          
        </div>
    </nav><br>
        <?php

        } elseif ($_SESSION['view'] == 'Non-Technical Member') {
        ?>
          <span class="dashboard">Non-Technical Members</span>
          </div>
          <div class="search-box">
          <form class="search-box"  action="./players_page.php">
          <input type="text"  placeholder="Search a non-technical member name..." name="search" <?php if(isset($_GET['search'])){ ?> value=" <?php echo $_GET['search']; ?>" <?php } ?> >
          <button  type="submit"><i class='bx bx-search'></i></button>
          </form>
          
        </div>
    </nav><br>
        <?php
        }elseif ($_SESSION['view'] == 'archive') {
          ?>
            <span class="dashboard">Archives</span>
            </div>
        <div class="search-box">
          <form class="search-box"  action="./players_page.php">
          <input type="text"  placeholder="Search through archives by name..." name = "search" <?php if(isset($_GET['search'])){ ?> value=" <?php echo $_GET['search']; ?>" <?php } ?>>
          <button><i class='bx bx-search'></i></button>
          </form>
          
        </div>
      </nav><br>
          <?php
          }

        ?>

      

    <?php
    if (isset($_GET['search']) && $_GET['search'] != NULL) {
      if($_SESSION['view'] == 'archive'){
      $_SESSION['search'] = $_GET['search'];
      $archived_members = getArchivedMembers();
      }elseif($_SESSION['view'] == 'Player'){
        $_SESSION['search'] = $_GET['search'];
      $archived_members = getPlayers();
      }elseif($_SESSION['view'] == 'Technical Member'){
        $_SESSION['search'] = $_GET['search'];
      $archived_members = getTMs();
      }
      elseif($_SESSION['view'] == 'Non-Technical Member'){
        $_SESSION['search'] = $_GET['search'];
      $archived_members = getNTMs();
      }
      
      $count = 0;
      foreach($archived_members as $player){
        $firstName = strtolower($player['first_name']);
                $lastName = strtolower($player['last_name']);
                $search = strtolower($_SESSION['search']);
                if (strpos($firstName, $search ) !== false || strpos($lastName, $search) !== false) {
         $count = $count +1;
         // echo '<h2 style="color:white; text-align:center; margin-top:5%">Search results for '. $_SESSION['search'] . '</h2>';
          if ($_SESSION['view'] == 'Player') {
            $id = $player['player_ID'];
          } elseif ($_SESSION['view'] == 'Technical Member') {
            $id = $player['tt_ID'];
          } elseif ($_SESSION['view'] == 'Non-Technical Member') {
            $id = $player['ntt_ID'];
          
        } elseif ($_SESSION['view'] == 'archive') {
          $id = $player['member_ID'];
        }
?>
          <div class="row">
        <div class="column">
          <img src="<?php echo $player["image"] ?>" style="margin-top: 45px;" height="460" width="450" alt="">
          <?php 
          if($_SESSION['view'] == 'archive'){
                ?>
          <form action="./view_archives.php" , method="GET">
                <button id="more" type="submit" name="id" value="<?php echo $id ?>"> More</button>
                </form>
              
              <?php
              }else{
            ?>
 <form action="./../players/view_player.php" , method="GET">
                <button id="more" type="submit" name="id" value="<?php echo $id; ?>"> More</button>
                </form>
            <?php
              }
            ?>
         
        </div><br>
        <div style="background-color: white; margin-top:50px" class="column">
          <ul>
            <li id="cardName">FIRST NAME: </li>
            <li id="cardValue"><?php echo $player["first_name"] ?></li>
          </ul><br>
          <ul>
            <li id="cardName">LAST NAME: </li>
            <li id="cardValue"><?php echo $player["last_name"] ?></li>
          </ul><br>
          <ul>
            <li id="cardName">DATE OF BIRTH: </li>
            <li id="cardValue"><?php echo $player["dob"]; ?></li>
          </ul><br>


          <ul>
            <li id="cardName">COUNTRY: </li>
            <li id="cardValue"><?php echo $player["country"] ?></li>
          </ul><br>
          <ul>
            <li id="cardName">CONTRACT EXPIRING DATE: </li>
            <li id="cardValue"><?php echo $player["contract_exp_date"] ?></li>
          </ul><br>
          <ul>
            <li id="cardName">SALARY: </li>
            <li id="cardValue"><?php echo "$" . $player["salary"] ?></li>
          </ul><br>
          <?php if ($_SESSION['view'] == 'Player') {
          ?>
            <ul>
              <li id="cardName">POSITION: </li>
              <li id="cardValue"><?php echo $player["position"] ?></li>
            </ul><br>
            <ul>
              <li id="cardName">TEAM CAPAIN: </li>
              <li id="cardValue"><?php echo $player["isCaptain"]; ?></li>
            </ul>
          <?php
          } elseif ($_SESSION['view'] == 'Technical Member') {
          ?>
            <ul>
              <li id="cardName">Role: </li>
              <li id="cardValue"><?php echo $player["role"] ?></li>
            </ul><br>
            <ul>
              <li id="cardName">PART-TIME WORKER: </li>
              <li id="cardValue"><?php echo $player["isPartTime"] ?></li>
            </ul>
          <?php
          } elseif ($_SESSION['view'] == 'Non-Technical Member') {
          ?>
            <ul>
              <li id="cardName">Department: </li>
              <li id="cardValue"><?php echo $player["department"] ?></li>
            </ul><br>
            <ul>
              <li id="cardName">PART-TIME WORKER: </li>
              <li id="cardValue"><?php echo $player["isPartTime"] ?></li>
            </ul>
          <?php

          } elseif ($_SESSION['view'] == 'archive') {
            ?>
              <ul>
                <li id="cardName">Date Signed: </li>
                <li id="cardValue"><?php echo $player["date_signed"] ?></li>
              </ul><br>
              <ul>
                <li id="cardName">Archived: </li>
                <li id="cardValue"><?php echo $player["isArchive"] ?></li>
              </ul>
            <?php
  
            }
          ?>


        </div>
      </div>

    <?php
    
    

        }
        //else 
       //
    
    }if($count == 0){
      echo '<h2 style="color:white; text-align:center; margin-top:15%">No result matches your search</h2>';
    }else{ echo '<h2 style="color:white; text-align:center; margin-top:5%">End of search results</h2>';}
  
  }else{
    if ($_SESSION['view'] == 'Player') {
      $allPlayers = getPlayers();
    } elseif ($_SESSION['view'] == 'Technical Member') {
      $allPlayers = getTMs();
    } elseif ($_SESSION['view'] == 'Non-Technical Member') {
      $allPlayers = getNTMs();
    }
   elseif ($_SESSION['view'] == 'archive') {
    $allPlayers = getArchivedMembers();
  }
    foreach ($allPlayers as $player) {
      if ($_SESSION['view'] == 'Player') {
        $id = $player['player_ID'];
      } elseif ($_SESSION['view'] == 'Technical Member') {
        $id = $player['tt_ID'];
      } elseif ($_SESSION['view'] == 'Non-Technical Member') {
        $id = $player['ntt_ID'];
      
    } elseif ($_SESSION['view'] == 'archive') {
      $id = $player['member_ID'];
    }



      //$_SESSION['player_ID'] = $player['player_ID'];
      //$player_ID = $_SESSION['player_ID'];

    ?>


      <div class="row">
        <div class="column">
          <img src="<?php echo $player["image"] ?>" style="margin-top: 45px;" height="460" width="450" alt="">
          <?php 
          if($_SESSION['view'] == 'archive'){
                ?>
          <form action="./view_archives.php" , method="GET">
                <button id="more" type="submit" name="id" value="<?php echo $id; ?>"> More</button>
                </form>
              
              <?php
              }else{
            ?>
 <form action="./../players/view_player.php" , method="GET">
                <button id="more" type="submit" name="id" value="<?php echo $id; ?>"> More</button>
                </form>
            <?php
              }
            ?>
         
        </div><br>
        <div style="background-color: white; margin-top:50px" class="column">
          <ul>
            <li id="cardName">FIRST NAME: </li>
            <li id="cardValue"><?php echo $player["first_name"] ?></li>
          </ul><br>
          <ul>
            <li id="cardName">LAST NAME: </li>
            <li id="cardValue"><?php echo $player["last_name"] ?></li>
          </ul><br>
          <ul>
            <li id="cardName">DATE OF BIRTH: </li>
            <li id="cardValue"><?php echo $player["dob"]; ?></li>
          </ul><br>


          <ul>
            <li id="cardName">COUNTRY: </li>
            <li id="cardValue"><?php echo $player["country"] ?></li>
          </ul><br>
          <ul>
            <li id="cardName">CONTRACT EXPIRING DATE: </li>
            <li id="cardValue"><?php echo $player["contract_exp_date"] ?></li>
          </ul><br>
          <ul>
            <li id="cardName">SALARY: </li>
            <li id="cardValue"><?php echo "$" . $player["salary"] ?></li>
          </ul><br>
          <?php if ($_SESSION['view'] == 'Player') {
          ?>
            <ul>
              <li id="cardName">POSITION: </li>
              <li id="cardValue"><?php echo $player["position"] ?></li>
            </ul><br>
            <ul>
              <li id="cardName">TEAM CAPAIN: </li>
              <li id="cardValue"><?php echo $player["isCaptain"]; ?></li>
            </ul>
          <?php
          } elseif ($_SESSION['view'] == 'Technical Member') {
          ?>
            <ul>
              <li id="cardName">Role: </li>
              <li id="cardValue"><?php echo $player["role"] ?></li>
            </ul><br>
            <ul>
              <li id="cardName">PART-TIME WORKER: </li>
              <li id="cardValue"><?php echo $player["isPartTime"] ?></li>
            </ul>
          <?php
          } elseif ($_SESSION['view'] == 'Non-Technical Member') {
          ?>
            <ul>
              <li id="cardName">Department: </li>
              <li id="cardValue"><?php echo $player["department"] ?></li>
            </ul><br>
            <ul>
              <li id="cardName">PART-TIME WORKER: </li>
              <li id="cardValue"><?php echo $player["isPartTime"] ?></li>
            </ul>
          <?php

          } elseif ($_SESSION['view'] == 'archive') {
            ?>
              <ul>
                <li id="cardName">Date Signed: </li>
                <li id="cardValue"><?php echo $player["date_signed"] ?></li>
              </ul><br>
              <ul>
                <li id="cardName">Archived: </li>
                <li id="cardValue"><?php echo $player["isArchive"] ?></li>
              </ul>
            <?php
  
            }
          ?>


        </div>
      </div>

    <?php
    }}
    ?>
    
  </section>
</body>

</html>