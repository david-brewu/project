<?php
include_once("./../supporters/supporter_controller.php");
include_once("./../players/player_controller.php");
include_once("./../techTeam/techTeam_controller.php");
include_once("./../non_techTeam/non_techTeam_controller.php");
include_once("./../member/member_controller.php");
session_start();

// if not login direct to the login page
if (!isset($_SESSION['first_name']) || !isset($_SESSION['isAdmin'])) {
  header("location: ./../pages/loginPage.php");
}

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
  <!-- fonts from CodingLab -->
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
        <a href="#" class="active">
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
        <a href="./supporters_page.php">
          <i class='bx bx-group'></i>
          <span class="links_name">Supporters</span>
        </a>
      </li>
      <li>
        <a href="./players_page.php?view=archive">
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
        <a href="./dashboard.php?logout=true">
          <i class='bx bx-log-out'></i>
          <span class="links_name">Log out</span>
        </a>
      </li>
    </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">

        <span class="dashboard">Dashboard</span>
      </div>
      <div>
        <form action="./add.php" method="GET">
          <select name="add" id="add">
            <option value="Player">Player</option>
            <option value="Technical Member">Technical Member</option>
            <option value="Non-Technical Member">Non-Technical Member</option>
          </select>
          <button style="background-color:blueviolet; color:white" type="submit">Add</button>

        </form>

      </div>
    </nav><br>


    <?php
    // display the analytics on the dashboard
    $total_supporters = getSupporters();
    $total_players = getPlayers();
    $total_technicalMembers = getTMs();
    $total_non_technicalMembers = getNTMs();
    $overall_total = count($total_supporters) + count($total_players) + count($total_technicalMembers) + count($total_non_technicalMembers);
    $total_archeives = totalMemberArcheives() + totalSupporterArcheives();
    ?>
    <div class="home-content">
      <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div style="color: white;" class="box-topic">Registered Supporters</div> <br>
            <div style="color: white;" class="number"><?php echo count($total_supporters) ?></div>
          </div>
          <i id="bx-group" class='bx bx-group'></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div style="color: white;" class="box-topic">Registered Players</div><br>
            <div style="color: white;" class="number"><?php echo count($total_players) ?></div>
          </div>
          <i id="bx-group" class='bx bx-football'></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div style="color: white;" class="box-topic">Technical Team</div><br>
            <div style="color: white;" class="number"><?php echo count($total_technicalMembers) ?></div>
          </div>
          <i id="bx-group" class='bx bxs-group'></i>
        </div>
      </div>

      <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div style="color: white;" class="box-topic">Non-Technical Team</div> <br>
            <div style="color: white;" class="number"><?php echo count($total_non_technicalMembers) ?></div>
          </div>
          <i id="bx-group" class='bx bx-pie-chart-alt-2'></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div style="color: white;" class="box-topic">Overall Total</div><br>
            <div style="color: white;" class="number"><?php echo $overall_total ?></div>
          </div>
          <i id="bx-group" class='bx bxs-folder-open'></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div style="color: white;" class="box-topic">Total Archives</div><br>
            <div style="color: white;" class="number"><?php echo $total_archeives ?></div>
          </div>
          <i id="bx-group" class='bx bx-archive-out'></i>
        </div>
      </div>

  </section>
</body>

</html>