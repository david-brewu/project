<?php
include_once("./../supporters/supporter_controller.php");

session_start();

$supporter = getSingleSupporter($_SESSION['fan_id']);
if (!isset($_SESSION['first_name']) || !isset($_SESSION['isAdmin'])) {
    header("location: ./root.php");
}
?>

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


    <!-- fonts from CodingLab -->
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
                <a href="./../index.php">
                    <i class='bx bx-news'></i>
                    <span class="links_name">Club News</span>
                </a>
            </li>

            <li>
                <a href="./../pages/members_page.php?view=Player">
                    <i class='bx bx-football'></i>
                    <span class="links_name">Players</span>
                </a>
            </li>

            <li>
                <a href="./../pages/members_page.php?view=Technical Member">
                    <i class='bx bxs-group'></i>
                    <span class="links_name">Technical Team</span>
                </a>
            </li>

            <li>
                <a href="./../pages/members_page.php?view=Non-Technical Member">
                    <i class='bx bx-pie-chart-alt-2'></i>
                    <span class="links_name">Non-Technical Team</span>
                </a>
            </li>
            <li>
                <a href="./fan_profile.php" class="active">
                    <i class='bx bx-user'></i>
                    <span class="links_name">Profile</span>
                </a>
            </li>


            <li class="log_out">
                <a href="./fan_profile.php?logout=true">
                    <i class='bx bx-log-out'></i>
                    <span class="links_name">Log out</span>
                </a>
            </li>


        </ul>
    </div>
    <section class="home-section">
        <nav>
            <div class="sidebar-button">

                <span class="dashboard">Profile </span>
            </div>
            <div>


            </div>
        </nav><br>



        <div class="row">
            <div class="column">
                <img src="<?php echo $supporter["default_avatar"] ?>" style="margin-top: 45px;" height="320px" width="320px" alt="">

                <div class="edit_archive2">
                    <ul>

                        <li id="cardName">
                            <a style="text-decoration: none;" id="more" href="./fan_profile.php?update=true">Update</a>
                        </li>
                    </ul><br>
                </div>

            </div><br>
            <div style="background-color: white; margin-top:50px; padding-top:50px; padding-bottom:40px" class="column">
                <ul>
                    <li id="cardName">FIRST NAME: </li>
                    <li id="cardValue"><?php echo $supporter["first_name"] ?></li>
                </ul><br>
                <ul>
                    <li id="cardName">LAST NAME: </li>
                    <li id="cardValue"><?php echo $supporter["last_name"] ?></li>
                </ul><br>
                <ul>
                    <li id="cardName">Email: </li>
                    <li id="cardValue"><?php echo $supporter["email"]; ?></li>
                </ul><br>
                <ul>
                    <li id="cardName">Admin: </li>
                    <li id="cardValue"><?php echo $supporter["isAdmin"] ?></li>
                </ul><br>



            </div>
        </div>
        <?php
        if (isset($_GET['update'])) {
            
        ?>

            <div class="container">

                <h2 style="color: white; font-weight:bold;">Update Profile</h2>
                <form class="form" id="form" method="GET" action="" enctype="multipart/form-data" onsubmit="return validateForm(event);">

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
                        <label id="label" for="first_name">First Name</label>
                        <input type="text" name="first_name" value="<?php echo $supporter['first_name'] ?>" class="form-control" id="first_name" required>
                        <small id='usernameError'></small>
                    </div>
                    <div class="form-control">
                        <label id="label" for="last_name"><b>Last Name</b></label>
                        <input type="text" value="<?php echo $supporter['last_name'] ?>" name="last_name" id="last_name" required>
                        <small id='firstNameError'></small>
                    </div>
                    <div class="form-control">
                        <label id="label" for="email">Email</label>
                        <input type="text" name="email" value="<?php echo $supporter['email'] ?>" id="email" required>
                        <small id='usernameError'></small>
                    </div>

                    <button style="color:white;background-color:#75137e" type="submit" class="btn btn-primary" name="submit">Update</button>
                </form>
            </div>
        <?php
        }
        ?>
        <?php
        if (isset($_GET["submit"])) {
            $errors = array();
            // Grab form inputs
            $first_name = $_GET["first_name"];
            $last_name = $_GET["last_name"];
            $email = $_GET["email"];


            if (empty($email)) {
                array_push($errors, "email is required");
            }
            if (empty($first_name)) {
                array_push($errors, "first name is required");
            }
            if (empty($last_name)) {
                array_push($errors, "last name is required");
            }

            //validate email with regex
            $regex = "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix";

            // set error if not an email
            if (!preg_match($regex, $email)) {
                array_push($errors, "enter a valid email");
            }

            // check if email is in database
            $verify_email = verify_email($email);
            if ($verify_email) {
                array_push($errors, "email does not exist in our database");
            }

            if (count($errors) == 0) {
                $update_fan = updateSupporter($_SESSION['fan_id'], $first_name, $last_name, $email);
                if ($update_fan) {
                   
                    echo '<h2 style="color:white; text-align:center; margin-top:15%">update success</h2>';
                    header("location: ./fan_profile.php");
                } else {
                    echo '<h2 style="color:white; text-align:center; margin-top:15%">update failed</h2>';
                }
            } else {
                // store errors inside session
                $_SESSION["errrors"] = $errors;
               header("location: ./fan_profile.php?update=true");
            }
        }


        ?>


    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="./../js/add_js.js"></script>
</body>

</html>