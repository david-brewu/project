<?php
include_once("./player_controller.php");
include_once("./../techTeam/techTeam_controller.php");
include_once("./../non_techTeam/non_techTeam_controller.php");
include_once("./../member/member_controller.php");

session_start();
$accessor = $_SESSION['accessor'];
if (isset($_GET['id']) && $_SESSION['view'] == 'Player') {
    $_SESSION['id'] = $_GET['id'];
    $member = getSinglePlayer($_SESSION['id']);
    $id = $member["player_ID"];
    $archive_id = $member["member_ID"];

} elseif (isset($_GET['id']) && $_SESSION['view'] == 'Technical Member') {
    $_SESSION['id'] = $_GET['id'];
    $member = getSingleTM($_SESSION['id']);
    $id = $member["tt_ID"];
    $archive_id = $member["member_ID"];
} elseif (isset($_GET['id']) && $_SESSION['view'] == 'Non-Technical Member') {
    $_SESSION['id'] = $_GET['id'];
    $member = getSingleNTM($_SESSION['id']);
    $id = $member['ntt_ID'];
    $archive_id = $member["member_ID"];
}elseif (isset($_GET['id']) && $_SESSION['view'] == 'archive') {
    $_SESSION['id'] = $_GET['id'];
    $member = getSingleMember($_SESSION['id']);
    $id = $member['member_ID'];
    $archive_id = $member["member_ID"];
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../css/player_CSS.css">
    <title><?php echo $member["first_name"] . "\n" . $member["last_name"] ?></title>
</head>

<body>

    <h1 class="player_name"><?php echo $member["first_name"] . "\n" . $member["last_name"] ?></h1>
    <img class="player_image" src="<?php echo $member["image"] ?>" alt="">

    <div class="player_info">
        <ul>
            <li id="cardName">FIRST NAME: </li>
            <li id="cardValue"><?php echo $member["first_name"] ?></li>
        </ul>
        <ul>
            <li id="cardName">LAST NAME: </li>
            <li id="cardValue"><?php echo $member["last_name"] ?></li>
        </ul>
        <ul>
            <li id="cardName">DATE OF BIRTH: </li>
            <li id="cardValue"><?php echo $member["dob"] ?></li>
        </ul>
        <?php
        if ($_SESSION['view'] == 'Player') {
        ?>

            <ul>
                <li id="cardName">POSITION: </li>
                <li id="cardValue"><?php echo $member["position"] ?></li>
            </ul>
            <ul>
                <li id="cardName">FROM ACADEMY: </li>
                <li id="cardValue"><?php echo $member["fromAcademy"] ?></li>
            </ul>
            <ul>
                <li id="cardName">TEAM CAPAIN: </li>
                <li id="cardValue"><?php echo $member["isCaptain"] ?></li>
            </ul>
            <ul>
                <li id="cardName">PREVIOUS TEAM: </li>
                <li id="cardValue"><?php echo $member["previous_team"] ?></li>
            </ul>
        <?php } elseif ($_SESSION['view'] == 'Technical Member') {
        ?>

            <ul>
                <li id="cardName">OLD PLAYER: </li>
                <li id="cardValue"><?php echo $member["isOldplayer"] ?></li>
            </ul>
            <ul>
                <li id="cardName">ROLE: </li>
                <li id="cardValue"><?php echo $member["role"] ?></li>
            </ul>
            <ul>
                <li id="cardName">PART-TIME WORKER: </li>
                <li id="cardValue"><?php echo $member["isPartTime"] ?></li>
            </ul>
            <ul>
                <li id="cardName">YEARS OF SERVICE: </li>
                <li id="cardValue"><?php echo $member["yearsOfService"] ?></li>
            </ul>

        <?php
        } elseif ($_SESSION['view'] == 'Non-Technical Member') {

        ?>
            <ul>
                <li id="cardName">DEPARTMENT: </li>
                <li id="cardValue"><?php echo $member["department"] ?></li>
            </ul>
            <ul>
                <li id="cardName">PART-TIME WORKER: </li>
                <li id="cardValue"><?php echo $member["isPartTime"] ?></li>
            </ul>
            <ul>
                <li id="cardName">YEARS OF SERVICE: </li>
                <li id="cardValue"><?php echo $member["yearsOfService"] ?></li>
            </ul>

        <?php
        
        }
        ?>
        <ul>
            <li id="cardName">COUNTRY: </li>
            <li id="cardValue"><?php echo $member["country"] ?></li>
        </ul>
        <ul>
            <li id="cardName">CONTRACT EXPIRING DATE: </li>
            <li id="cardValue"><?php echo $member["contract_exp_date"] ?></li>
        </ul>
        <ul>
            <li id="cardName">SALARY: </li>
            <li id="cardValue"><?php echo "$" . $member["salary"] ?></li>
        </ul>

        <ul>
            <li id="cardName">CONTRCT STATUS: </li>
            <li id="cardValue"><?php echo $member["contract_status"] ?></li>
        </ul>

        <ul>
            <li id="cardName">DATE SIGNED: </li>
            <li id="cardValue"><?php echo $member["date_signed"] ?></li>
        </ul>

        <ul>
            <li id="cardName">ARCHIVED: </li>
            <li id="cardValue"><?php echo $member["isArchive"] ?></li>
        </ul><br>
    </div>
    <?php
    if($accessor == 'admin'){
        ?>
        <div class="edit_archive">
        <ul>
            <li id="cardName">
                <a id="more" href="<?php echo './../admin/update.php?id=' . $id; ?>"> Update</a>
            </li>
            <li id="delete_archive">
                <a id="more2" href="<?php echo './update_archive.php?job=archive&archive_ID=' . $archive_id; ?>"> Archive</a>
            </li>
        </ul><br>
    </div>
        <?php
    }
    ?>
    
</body>
</html>