<?php
include_once('./../club_news/news_controller.php');

$news = getNews();
// check if login, else direct to loginpage
session_start();
if (!isset($_SESSION['first_name']) || !isset($_SESSION['isAdmin'])) {
  header("location: ./../pages/loginPage.php");
}

?>
<!-- // logout -->
<?php
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
  <link href="./../css/login_signup_CSS.css" rel="stylesheet">

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
        <a href="./../admin/dashboard.php">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Dashboard</span>

        </a>
      </li>
      <li>
        <a href="./../admin/players_page.php?view=Player">
          <i class='bx bx-football'></i>
          <span class="links_name">Players</span>
        </a>
      </li>

      <li>
        <a href="./../admin/players_page.php?view=Technical Member">
          <i class='bx bxs-group'></i>
          <span class="links_name">Technical Team</span>
        </a>
      </li>

      <li>
        <a href="./../admin/players_page.php?view=Non-Technical Member">
          <i class='bx bx-pie-chart-alt-2'></i>
          <span class="links_name">Non-Technical Team</span>
        </a>
      </li>
      <li>
        <a href="./../admin/supporters_page.php">
          <i class='bx bx-group'></i>
          <span class="links_name">Supporters</span>
        </a>
      </li>
      <li>
        <a href="./../admin/players_page.php?view=archive">
          <i class='bx bx-archive-out'></i>
          <span class="links_name">Archieves</span>
        </a>
      </li>
      <li>
        <a href="./club_news.php" class="active">
          <i class='bx bx-news'></i>
          <span class="links_name">Publish Club News</span>
        </a>
      </li>


      <li class="log_out">
        <a href="./club_news.php?logout=true">
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
    </nav><br><br><br><br>




    <div class="container">

      <h2 style="color: white; font-weight:bold;">Publish Club News</h2>
      <form class="form" id="form" method="POST" action="./validate_news.php" enctype="multipart/form-data" onsubmit="return validateForm(event);">

        <?php
        if (isset($_SESSION["errors"])) {
          $errors = $_SESSION["errors"];
          // loop through errors and display them
          foreach ($errors as $error) {
        ?>
            <small style="color: red"><?= $error . "<br>"; ?></small>
        <?php
          }
        }
        // destroy session after displaying errors
        $_SESSION["errors"] = null;
        ?>

        <div class="form-control">
          <label id="label" for="date" class="form-label">News Date</label>
          <input type="date" name="date" class="form-control" id="date">
          <small id='usernameError'></small>
        </div><br>
        <div class="form-control">
          <label id="label" for="title"><b>News Title</b></label>
          <input type="text" placeholder="Enter news title" name="title">
          <small id='firstNameError'></small>
        </div><br>
        <div class="form-control">
          <label id="label" for="image" class="form-label">News Image</label>
          <input type="file" name="image" class="form-control" id="image">
          <small id='usernameError'></small>
        </div><br>
        <div class="form-control">
          <label id="label" for="body" class="form-label">News Body</label>
          <textarea class="form-control" name="body" id="" cols="30" rows="10"></textarea>
          <small id='usernameError'></small>
        </div><br>
        <button style="color:white;background-color:#75137e" type="submit" class="btn btn-primary" name="submit">Publish</button>
      </form>


    </div>
  </section>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="./../js/add_js.js"></script>
</body>

</html>