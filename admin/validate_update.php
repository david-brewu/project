<?php
include_once("./../member/member_controller.php");
include_once("./../players/player_controller.php");
include_once("./../techTeam/techTeam_controller.php");
include_once("./../non_techTeam/non_techTeam_controller.php");
require_once ("./../db_essentials/db_credentials.php");
 $db = mysqli_connect(servername,username,password,dbname);

session_start();
$errors = array();
$db = mysqli_connect(servername, username, password, dbname);


if (isset($_POST["submit"])) {
   
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
        $dob = $_POST["dob"];
        $country = $_POST["country"];
        $date_signed = $_POST["date_signed"];
        $contract_exp_date = $_POST["contract_exp_date"];
        $salary = $_POST["salary"];
        $contract_status = $_POST["contract_status"];
        //$isArchive = $_POST["isArchive"];

     if ($_SESSION['view'] == "Player") {
        $previous_team = $_POST["previous_team"];
        $position = $_POST["position"];
        $fromAcademy = $_POST["fromAcademy"];
        $isCaptain = $_POST["isCaptain"];
        $isLoan = $_POST["isLoan"];
        $id = $_SESSION['id'];
     }elseif($_SESSION['view'] == "Technical Member"){
        $yearsOfService = $_POST["yearsOfService"];
        $isOldplayer = $_POST["isOldplayer"];
        $role = $_POST["role"];
        $isPartTime = $_POST["isPartTime"];
        $id = $_SESSION['id'];
     }elseif($_SESSION['view'] == "Non-Technical Member"){
        $yearsOfService = $_POST["yearsOfService"];
        $department = $_POST["department"];
        $isPartTime = $_POST["isPartTime"];
        $id = $_SESSION['id'];

     }
        
    
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



        // image validation
    // if($_POST['image'] != NULL){
    //     $target_dir = "./../images/";
    //     // file path
    //     $target_file = $target_dir . basename($_FILES['image']['name']);
    //     // image file type
    //     $image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


    //     if (empty($_FILES["image"]["name"])) {
    //         array_push($errors, "file cannot be empty");
    //     } else {
    //         // check if its an actual image
    //         $check = getimagesize($_FILES["image"]["tmp_name"]);
    //         if ($check == false) {
    //             array_push($errors, "file is not an image");
    //         }

    //         // limit file size to 5MB
    //         if ($_FILES["image"]["size"] > 5000000) {
    //             array_push($errors, "upload an image less than 5MB");
    //         }

    //         // limit file type
    //         if ($image_file_type != "jpg" && $image_file_type != "png" && $image_file_type != "jpeg") {
    //             array_push($errors, "Sorry, only JPG, PNG & GIF files are allowed");
    //         }
    //     }
    // }

        if (count($errors) == 0) {
           // $upload_image = move_uploaded_file($_FILES["image"]["tmp_name"], './' . $target_file);

           // if ($upload_image) {
               

                //$newMember = createMember($first_name, $last_name, $dob, $country, $contract_status, $date_signed, $contract_exp_date, $salary, $isArchive, $target_file);


               // if ($newMember) {
                    if($_SESSION['view'] == "Player"){
                    $updatePlayer = updatePlayer($id,$first_name, $last_name, $dob, $country, $contract_status, $date_signed, $contract_exp_date,$salary, $previous_team, $position, $fromAcademy, $isCaptain, $isLoan);
                    if ($updatePlayer) {
                        echo "player update success";
                    } else echo "player update failed";
                }elseif($_SESSION['view'] == "Technical Member"){
                    $updateTechical = updateTM ($id,$first_name, $last_name, $dob, $country, $contract_status, $date_signed, $contract_exp_date,$salary, $isOldplayer, $role, $isPartTime, $yearsOfService);
                    if ($updateTechical) {
                        echo "Technical Member update success";
                    } else echo "Technical Member update failed";
                }
                elseif($_SESSION['view'] == "Non-Technical Member"){
                    $updateNonTechnical = updateNTM($id,$first_name, $last_name, $dob, $country, $contract_status, $date_signed, $contract_exp_date,$salary, $isPartTime, $department, $yearsOfService);
                //    $sql = "INSERT INTO `non_technical_team`(`member_ID`, `isPartTime`, `department`, `yearsOfService`) VALUES ('$newMember', '$isPartTime', '$department', '$yearsOfService')";
                //    $newNonTechnical =  mysqli_query($db, $sql);

                    if ($updateNonTechnical) {
                        echo "Non-Technical member update success";
                    } else{ echo "Non-Technical member update failed" . "<br>";
                       // echo $newMember;
                    }
                }else{echo "nothing is set";
                    echo $_SESSION['view'];
                }
              //  } else echo "Failed to create a new member";
           // } else echo "upload failed";
        }else {
            session_start();
            // store the errors inside session
            $_SESSION["errors"] = $errors;
            header("location: ./../admin/add.php");
            echo "there was an error";
        }
    }
