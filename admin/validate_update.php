<?php
include_once("./../member/member_controller.php");
include_once("./../players/player_controller.php");
include_once("./../techTeam/techTeam_controller.php");
include_once("./../non_techTeam/non_techTeam_controller.php");
require_once("./../db_essentials/db_credentials.php");
$db = mysqli_connect(servername, username, password, dbname);

session_start();
$errors = array();
$db = mysqli_connect(servername, username, password, dbname);


if (isset($_POST["submit"])) {
    // extract parameters
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $dob = $_POST["dob"];
    $country = $_POST["country"];
    $date_signed = $_POST["date_signed"];
    $contract_exp_date = $_POST["contract_exp_date"];
    $salary = $_POST["salary"];
    $contract_status = $_POST["contract_status"];


    if ($_SESSION['view'] == "Player") {
        $previous_team = $_POST["previous_team"];
        $position = $_POST["position"];
        $fromAcademy = $_POST["fromAcademy"];
        $isCaptain = $_POST["isCaptain"];
        $isLoan = $_POST["isLoan"];
        $id = $_SESSION['id'];
    } elseif ($_SESSION['view'] == "Technical Member") {
        $yearsOfService = $_POST["yearsOfService"];
        $isOldplayer = $_POST["isOldplayer"];
        $role = $_POST["role"];
        $isPartTime = $_POST["isPartTime"];
        $id = $_SESSION['id'];
    } elseif ($_SESSION['view'] == "Non-Technical Member") {
        $yearsOfService = $_POST["yearsOfService"];
        $department = $_POST["department"];
        $isPartTime = $_POST["isPartTime"];
        $id = $_SESSION['id'];
    }

    // do some validations
    if (empty($first_name)) {
        array_push($errors, "first name is required");
    }
    if (empty($last_name)) {
        array_push($errors, "last name is required");
    }
    if (empty($dob)) {
        array_push($errors, "Date of birth name is required");
    }
    if (empty($country)) {
        array_push($errors, "Country name is required");
    }
    if (empty($contract_exp_date)) {
        array_push($errors, "Contract Expiring Date is required");
    }


    if (strlen($first_name) > 30) {
        array_push($errors, "first name must be less than 50 characters");
    }
    if (strlen($last_name) > 30) {
        array_push($errors, "last name must be less than 50 characters");
    }
    if (strlen($salary) > 7) {
        array_push($errors, "Salary cannot be greate than 8 digits");
    }

    $regex = "/^([0-9\+_\-])/";

    if (!preg_match($regex, $salary)) {
        array_push($errors, "Salary can only be numbers");;
    }




    // update if errors == 0
    if (count($errors) == 0) {
        if ($_SESSION['view'] == "Player") {
            $updatePlayer = updatePlayer($id, $first_name, $last_name, $dob, $country, $contract_status, $date_signed, $contract_exp_date, $salary, $previous_team, $position, $fromAcademy, $isCaptain, $isLoan);
            if ($updatePlayer) {
                echo "player update success";
            } else echo "player update failed";
        } elseif ($_SESSION['view'] == "Technical Member") {
            $updateTechical = updateTM($id, $first_name, $last_name, $dob, $country, $contract_status, $date_signed, $contract_exp_date, $salary, $isOldplayer, $role, $isPartTime, $yearsOfService);
            if ($updateTechical) {
                echo "Technical Member update success";
            } else echo "Technical Member update failed";
        } elseif ($_SESSION['view'] == "Non-Technical Member") {
            $updateNonTechnical = updateNTM($id, $first_name, $last_name, $dob, $country, $contract_status, $date_signed, $contract_exp_date, $salary, $isPartTime, $department, $yearsOfService);

            if ($updateNonTechnical) {
                echo "Non-Technical member update success";
            } else {
                echo "Non-Technical member update failed" . "<br>";
            }
        } else {
            echo "nothing is set";
            echo $_SESSION['view'];
        }
    } else {
        session_start();
        $_SESSION["errors"] = $errors;
        header("location: ./../admin/add.php");
        echo "there was an error";
    }
}
