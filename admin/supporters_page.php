<?php
include_once("./../supporters/supporter_controller.php");

session_start();
if (!isset($_SESSION['first_name']) || !isset($_SESSION['isAdmin'])) {
    header("location: ./../pages/loginPage.php");
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
    <link rel="stylesheet" href="./../css/player_CSS.css">
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
                <a href="./supporters_page.php" class="active">
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

                <span class="dashboard">Supporters</span>
            </div>
            <div class="search-box">
                <form class="search-box" action="./supporters_page.php">
                    <input type="text" placeholder="Search a supporter by name..." name="search" <?php if (isset($_GET['search'])) { ?> value=" <?php echo $_GET['search']; ?>" <?php } ?>>
                    <button type="submit"><i class='bx bx-search'></i></button>
                </form>

            </div>

        </nav><br>

        </div>
        </nav><br>



        </div>
        </nav><br>


        <?php

        if (isset($_GET['search']) && $_GET['search'] != NULL) {
            $_SESSION['search'] = $_GET['search'];
            $archived_Supporters = getSupporters();



            $count = 0;
            foreach ($archived_Supporters as $supporter) {
                $firstName = strtolower($supporter['first_name']);
                $lastName = strtolower($supporter['last_name']);
                $search = strtolower($_SESSION['search']);
                if (strpos($firstName, $search ) !== false || strpos($lastName, $search) !== false) {
                    $count = $count + 1;
                    $id = $supporter['id'];
        ?>
                    <div class="row">
                        <div class="column">
                            <img src="<?php echo $supporter["default_avatar"] ?>" style="margin-top: 45px;" height="320px" width="320px" alt="">
                            <?php
                            if ($supporter['isArchive'] == 'No') {
                            ?>
                                <div class="edit_archive2">
                                    <ul>

                                        <li id="cardName">
                                            <a id="more" href="<?php echo './../supporters/archive_supporter.php?job=archive&id=' . $id; ?>"> Archive</a>
                                        </li>
                                    </ul><br>
                                </div>
                                

                            <?php
                            } elseif ($supporter['isArchive'] == 'Yes') {
                            ?>
                            
                            <div class="edit_archive2">
                               
                                    <ul>

                                        <li id="cardName">
                                            <a id="more" href="<?php echo './../supporters/archive_supporter.php?job=unarchive&id=' . $id; ?>"> Unarchive</a>
                                        </li>
                                    </ul><br>
                       
                                </div>
                            <?php
                            }
                            ?>

                        </div><br>
                        <div style="background-color: white; margin-top:50px" class="column">
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
                            <ul>
                                <li id="cardName">Archived: </li>
                                <li id="cardValue"><?php echo $supporter["isArchive"] ?></li>
                            </ul><br>

                        <?php

                    }
                        ?>


                        </div>
                    </div>

                <?php




                //else 
                //

            }
            if ($count == 0) {
                echo '<h2 style="color:white; text-align:center; margin-top:15%">No result matches your search</h2>';
            } else {
                echo '<h2 style="color:white; text-align:center; margin-top:5%">End of search results</h2>';
            }
        } else {

            $supporters = getSupporters();

            foreach ($supporters as $supporter) {

                $id = $supporter['id'];

                ?>


                    <div class="row">
                        <div class="column">
                            <img src="<?php echo $supporter["default_avatar"] ?>" style="margin-top: 45px;" height="320px" width="320px" alt="">
                            
                            <?php
                            if ($supporter['isArchive'] == 'No') {
                            ?>
                                <div class="edit_archive2">
                                    <ul>

                                        <li id="cardName">
                                            <a id="more" href="<?php echo './../supporters/archive_supporter.php?job=archive&id=' . $id; ?>"> Archive</a>
                                        </li>
                                    </ul><br>
                                </div>
                                

                            <?php
                            } elseif ($supporter['isArchive'] == 'Yes') {
                            ?>
                            
                            <div class="edit_archive2">
                               
                                    <ul>

                                        <li id="cardName">
                                            <a id="more" href="<?php echo './../supporters/archive_supporter.php?job=unarchive&id=' . $id; ?>"> Unarchive</a>
                                        </li>
                                    </ul><br>
                       
                                </div>
                            <?php
                            }
                            ?>

                        </div><br>

                        <div style="background-color: white; margin-top:50px" class="column">
                            <ul>
                                <li id="cardName">FIRST NAME: </li>
                                <li id="cardValue"><?php echo $supporter["first_name"] ?></li>
                            </ul><br>
                            <ul>
                                <li id="cardName">LAST NAME: </li>
                                <li id="cardValue"><?php echo $supporter["last_name"] ?></li>
                            </ul><br>
                            <ul>
                                <li id="cardName">EMAIL: </li>
                                <li id="cardValue"><?php echo $supporter["email"]; ?></li>
                            </ul><br>
                            <ul>
                                <li id="cardName">Admin: </li>
                                <li id="cardValue"><?php echo $supporter["isAdmin"] ?></li>
                            </ul><br>
                            <ul>
                                <li id="cardName">Archived: </li>
                                <li id="cardValue"><?php echo  $supporter["isArchive"] ?></li>
                            </ul><br>

                        </div>
                    </div>
            <?php }
        } ?>
    </section>
</body>

</html>