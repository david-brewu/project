<?php

include_once("./../players/player_controller.php");
include_once("./../techTeam/techTeam_controller.php");
include_once("./../non_techTeam/non_techTeam_controller.php");

session_start();
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
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../css/register_page.css">
    <title><?php echo "Update " . $member["first_name"] . "\n" . $member['last_name'] ?></title>
</head>

<body>

    <div class="container">
        <form id="form" class="form" action="./validate_update.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm(event);">
            <h1 id="register_title"><?php echo "Update " .  $member["first_name"] . "\n" . $member['last_name'] ?></h1>
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
            <div id="register_control">
                <label for="first_name">First Name</label>
                <input type="text" value="<?= $member['first_name'] ?>" id="first_name" name="first_name">
                <small id='usernameError'></small>
            </div>
            <div id="register_control">
                <label for="last_name">Last Name</label>
                <input type="text" value="<?= $member['last_name'] ?>" id="last_name" name="last_name">
                <small id='emailError'></small>
            </div>
            <div id="register_control">
                <label for="dob">Date of Birth</label>
                <input type="date" value="<?= $member['dob'] ?>" id="dob" name="dob">
                <small id='passwordError'></small>
            </div>
            <div id="register_control">
                <label for="country">Nationality</label>
                <input type="text" value="<?= $member['country'] ?>" id="country" name="country">
                <small id='password2Error'></small>
            </div>


            <div id="register_control">
                <label for="date_signed">Date Signed</label>
                <input type="date" value="<?= $member['date_signed'] ?>" id="date_signed" name="date_signed">
                <small id='emailError'></small>
            </div>

            <div id="register_control">
                <label for="contract_exp_date">Contract Expiring Date</label>
                <input type="date" value="<?= $member['contract_exp_date'] ?>" id="contract_exp_date" name="contract_exp_date">
                <small id='emailError'></small>
            </div>

            <div id="register_control">
                <label for="salary">Salary in USD</label>
                <input type="text" value="<?= $member['salary'] ?>" id="salary" name="salary">
                <small id='password2Error'></small>
            </div>

            <?php

            if ($_SESSION['view'] == "Player") {
            ?>
                <div id="register_control">
                    <label for="previous_team">Previous Team</label>
                    <input type="text" value="<?= $member['previous_team'] ?>" id="previous_team" name="previous_team">
                    <small id='usernameError'></small>
                </div>
                <div id="register_control">
                    <label for="position">Position</label>
                    <input type="text" value="<?= $member['position'] ?>" id="position" name="position">
                    <small id='emailError'></small>
                </div>
                <div id="register_control">
                    <label for="fromAcademy">Is player from team academy?</label>
                    <select name="fromAcademy" id="fromAcademy">
                        <option value="<?= $member['fromAcademy'] ?>"><?php echo $member['fromAcademy'] ?></option>
                        <option value="No">No</option>
                        <option value="Yes">Yes</option>
                    </select>
                    <small id='usernameError'></small>
                </div>
                <div id="register_control">
                    <label for="isCaptain">Is player the team captain?</label>
                    <select name="isCaptain" id="isCaptain">
                        <option value="<?= $member['isCaptain'] ?>"><?php echo $member['isCaptain'] ?></option>
                        <option value="No">No</option>
                        <option value="Yes">Yes</option>
                    </select>
                    <small id='usernameError'></small>
                </div>
                <div id="register_control">
                    <label for="isLoan">Is player from loan?</label>
                    <select name="isLoan" id="isLoan">
                        <option value="<?= $member['isLoan'] ?>"><?php echo $member['isLoan'] ?></option>
                        <option value="No">No</option>
                        <option value="Yes">Yes</option>
                    </select>
                    <small id='usernameError'></small>
                </div>
            <?php
            } elseif ($_SESSION["view"] == "Technical Member") {
            ?>
                <div id="register_control">
                    <label for="role">Role</label>
                    <input type="text" value="<?= $member['role'] ?>" id="role" name="role">
                    <small id='usernameError'></small>
                </div>
                <div id="register_control">
                    <label for="yearsOfService">Years of Service</label>
                    <input type="text" value="<?= $member['yearsOfService'] ?>" id="yearsOfService" name="yearsOfService">
                    <small id='emailError'></small>
                </div>
                <div id="register_control">
                    <label for="isOldplayer">Is technical member an old player?</label>
                    <select name="isOldplayer" id="isOldplayer">
                        <option value="<?= $member['isOldplayer'] ?>"><?php echo $member['isOldplayer'] ?></option>
                        <option value="No">No</option>
                        <option value="Yes">Yes</option>
                    </select>
                    <small id='usernameError'></small>
                </div>
                <div id="register_control">
                    <label for="isPartTime">Is technical member a part-time worker?</label>
                    <select name="isPartTime" id="isPartTime">
                        <option value="<?= $member['isPartTime'] ?>"><?php echo $member['isPartTime'] ?></option>
                        <option value="No">No</option>
                        <option value="Yes">Yes</option>
                    </select>
                    <small id='usernameError'></small>
                </div>
            <?php
            } elseif ($_SESSION['view'] == "Non-Technical Member") {
            ?>
                <div id="register_control">
                    <label for="yearsOfService">Years of Service</label>
                    <input type="text" value="<?= $member['yearsOfService'] ?>" id="yearsOfService" name="yearsOfService">
                    <small id='emailError'></small>
                </div>
                <div id="register_control">
                    <label for="department">Select Department</label>
                    <select name="department" id="department">
                        <option value="<?= $member['department'] ?>"><?php echo $member['department'] ?></option>
                        <option value="Medical Team">Medical Team</option>
                        <option value="Fitness Trainer">Fitness Trainer</option>
                    </select>
                    <small id='usernameError'></small>
                </div>
                <div id="register_control">
                    <label for="isPartTime">Is non-technical member a part-time worker?</label>
                    <select name="isPartTime" id="isPartTime">
                        <option value="<?= $member['isPartTime'] ?>"><?php echo $member['isPartTime'] ?></option>
                        <option value="No">No</option>
                        <option value="Yes">Yes</option>
                    </select>
                    <small id='usernameError'></small>
                </div>
            <?php
            }
            ?>
            <div id="register_control">
                <label for="contract_status">Contract Status</label>
                <select name="contract_status" id="contract_status">
                    <option value="Active">Active</option>
                    <option value="Expired">Expired</option>
                </select>
                <small id='usernameError'></small>
            </div>
          
            <small id='success'></small>
            <button type="submit" id='submitBtn' name="submit">Update</button>
        </form>

        </form>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="./../js/add_js.js"></script>
</body>

</html>