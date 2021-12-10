<?php
include_once("./../member/member_controller.php");
session_start();

?>

<?php
// logout
if (isset($_GET['logout'])) {
  session_destroy();
  header("location: ./../root.php");
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="./../css/adminPageCss.css">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

  <!--framework adapted from CodingLab -->
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
        <a href="./players_page.php?view=Player">

          <i class='bx bx-football'></i>
          <span class="links_name">Players</span>
        </a>
      </li>
      <li>
        <a href="./players_page.php?view=Technical Member">
          <i class='bx bxs-group'></i>
          <span class="links_name">Technical Team</span>
        </a>
      </li>
      <li>
        <a href="./players_page.php?view=Non-Technical Member">
          <i class='bx bx-pie-chart-alt-2'></i>
          <span class="links_name">Non-Technical Team</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-group'></i>
          <span class="links_name">Supporters</span>
        </a>
      </li>
      <li>
        <a href="#" class="active">
          <i class='bx bx-archive-out'></i>
          <span class="links_name">Archieves</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-news'></i>
          <span class="links_name">Publish Club News</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-user'></i>
          <span class="links_name">Profile</span>
        </a>
      </li>

      <li class="log_out">
        <a href="">
          <i class='bx bx-log-out'></i>
          <span class="links_name">Log out</span>
        </a>
      </li>
    </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <span class="dashboard">Archives</span>
      </div>
      <div class="search-box">
        <input type="text" placeholder="Search a through archive...">
        <i class='bx bx-search'></i>
      </div>
    </nav><br>

    <?php

    // get and display information in the archive
    $allPlayers = getArchivedMembers();

    foreach ($allPlayers as $player) {

      $id = $player['member_ID'];


    ?>
      <div class="row">
        <div class="column">
          <img src="<?php echo $player["image"] ?>" style="margin-top: 45px;" height="460" width="450" alt="">
          <form action="./../players/view_player.php" , method="GET">
            <button id="more" type="submit" name="id" value="<?php echo $id; ?>"> More</button>
          </form>
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
          <ul>
            <li id="cardName">Department: </li>
            <li id="cardValue"><?php echo $player["department"] ?></li>
          </ul><br>
          <ul>
            <li id="cardName">PART-TIME WORKER: </li>
            <li id="cardValue"><?php echo $player["isPartTime"] ?></li>
          </ul>
        </div>
      </div>

    <?php
    }
    ?>
  </section>
</body>

</html>