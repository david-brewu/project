<?php
include_once('./club_news/news_controller.php');

$club_news = getNews();


session_start();
if (!isset($_SESSION['first_name']) || !isset($_SESSION['isAdmin'])) {
  header("location: ./root.php");
}

?>

<?php
if (isset($_GET['logout'])) {
  session_destroy();
  header("location: ./root.php");
}
?>

<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  

  <link rel="stylesheet" href="./css/adminPageCss.css">
  <link rel="stylesheet" href="./css/player_CSS.css">


  <!-- fonts from CodingLab -->
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <!-- framework from CodingLab -->
  <div class="sidebar">
    <div class="logo-details">
      <img style="margin-left: 10px;" src="./images/sankofa.jpg" height="50" width="50" alt="">
      <span style="margin-left: 20px;" class="logo_name">Sankofa FC</span>
    </div>
    <ul class="nav-links">
      <li>
        <a href="./club_news.php" class="active">
          <i class='bx bx-news'></i>
          <span class="links_name">Club News</span>
        </a>
      </li>

      <li>
        <a href="./pages/members_page.php?view=Player">
          <i class='bx bx-football'></i>
          <span class="links_name">Players</span>
        </a>
      </li>

      <li>
        <a href="./pages/members_page.php?view=Technical Member">
          <i class='bx bxs-group'></i>
          <span class="links_name">Technical Team</span>
        </a>
      </li>

      <li>
        <a href="./pages/members_page.php?view=Non-Technical Member">
          <i class='bx bx-pie-chart-alt-2'></i>
          <span class="links_name">Non-Technical Team</span>
        </a>
      </li>
      <li>
        <a href="./supporters/fan_profile.php">
          <i class='bx bx-user'></i>
          <span class="links_name">Profile</span>
        </a>
      </li>


      <li class="log_out">
        <a href="./index.php?logout=true">
          <i class='bx bx-log-out'></i>
          <span class="links_name">Log out</span>
        </a>
      </li>


    </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">

        <span class="dashboard">Club News</span>
      </div>
      <div>


      </div>
    </nav><br>

    <?php

    foreach ($club_news as $news) {
      $news_id = $news['news_ID'];
    ?>


      <div class="row">
        <div class="column">
          <img src="<?php echo $news["image"] ?>" style="margin-top: 45px;" height="320px" width="320px" alt="">

          <div class="edit_archive2">
            <ul>

              <li id="cardName">
                <a style="text-decoration: none;" id="more" href="<?php echo './club_news/full_story.php?news_id=' . $news_id; ?> ">Full Story</a>
              </li>
            </ul><br>
          </div>

        </div><br>
        <div style="background-color: white; margin-top:50px; padding-top:50px; padding-bottom:40px" class="column">
          <ul>
            <li id="cardName">Title: </li>
            <li id="cardValue"><?php echo $news["title"] ?></li>
          </ul><br>
          <ul>
            <li id="cardName">Date: </li>
            <li id="cardValue"><?php echo $news["date"] ?></li>
          </ul><br>
          <ul>
            <li id="cardName">Story: </li>
            <li id="cardValue"><?php echo substr($news["body"], 0, 100) . '...'; ?></li>
          </ul><br>





        </div>
      </div>





    <?php
    }

    ?>




  </section>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="./js/add_js.js"></script>
</body>

</html>