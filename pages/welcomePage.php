<?php
    session_start();

    if(!isset($_SESSION['first_name']) || !isset($_SESSION['isAdmin'])){
        header("location: ./../pages/loginPage.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sankofa FC</title>
</head>
<body>
    <?php
        if(isset($_GET['logout'])){
            session_destroy();
            header("location: ./../root.php");
        }
    ?>
    <h1>Welcome <?= $_SESSION['first_name'] ?></h1><br><br>
    <form action="./welcomePage.php?logout=logout" method="GET"> 
       <button type="submit" name="logout">Logout</button>
    </form>
</body>
</html>