<?php
include_once("./news_controller.php");

session_start();
if (isset($_GET['news_id'])) {
   $news_id = $_GET['news_id'];
    $news = getSingleNews($news_id);
} 

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../css/player_CSS.css">
    <title><?php echo $news["title"]; ?></title>
</head>

<body>

<div>
        <img class="player_image" src="<?php echo './../'. $news['image'] ?>" height="350px" width="350px" alt=""><br><br>
        <h1 class="player_name"><?php echo $news['title'] ?></h1><br>
        <h3 style="color: white; font-weight:bold; text-align:center"><?php echo $news['date'] ?></h3><br>
      </div>
      <div style="margin-left: 200px; margin-right: 200px;text-align:justify">
      <h3 style="color: white; font-weight:500; text-align:left"><?php echo $news['body'] ?></h4><br>
      </div>

</body>
</html>