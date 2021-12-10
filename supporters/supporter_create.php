<?php
//connect to post controller
include_once ("supporter_controller.php");


$errors = Array();
$isAdmin = "Yes";
$isArhieve = "No";
$default_avatar = "./../images/default_avatar.png";


if(isset($_POST["submit"])){
    // Grab form inputs
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    //$image = $_POST["image"];
    


    if (empty($first_name)) {
        array_push($errors, "first name is required");
    }
    if (empty($last_name)) {
        array_push($errors, "last name is required");
    }
    if (empty($email)) {
        array_push($errors, "email is required");
    }
    if (empty($password)) {
        array_push($errors, "passsword is required");
    }
    if (empty($confirm_password)) {
        array_push($errors, "confirm passsword is required");
    }


    if (strlen($first_name) > 50) {
        array_push($errors, "first name must be less than 50 characters");
    }
    if (strlen($last_name) > 50) {
        array_push($errors, "last name must be less than 50 characters");
    }
    if (strlen($email) > 50) {
        array_push($errors, "email must be less than 50 characters");
    }
    //check if passwords are the same
    if ($password != $confirm_password) {
        array_push($errors, "passwords need to match");
    }
    //validate email with regex
    $regex = "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix";
    // set error if not an email
    if (!preg_match($regex, $email)) {
        array_push($errors, "enter a valid email");
    }


    $verify_email = verify_email($email);
    if(!$verify_email){
        array_push($errors, "email already exists");
    }


    if (count($errors) == 0) {
       
            $password = md5($password);
            // register supporter
            $newSupporter = createSupporter($first_name, $last_name,$email, $password, "Yes", "NO", $default_avatar);

            //eheck if supporter is registered
            if ($newSupporter) {
                header("location: ./../pages/loginPage.php");
            } else {echo "failed";}
       
        
    }else{
        session_start();
        // store errors inside session
        $_SESSION["errrors"] = $errors;
      //  print_r($errors);
      header("location: ./../pages/signupPage.php");
}
}
    // create post if not empty
//     $newSupporter = createSupporter($first_name, $last_name, $dob, $country, $contract_status, $date_signed, $contract_exp_date,$salary);
//     if($newMember){
//         echo "success";
//         //header("location: ../index.php");
//     }
//     else echo "failed";
// }else echo "submit not set";


//http://localhost/webtech/functions/post_create.php?title=Hey&body=Hi+there&submit=
//http://localhost/project/member/create_member.php?first_name=David&last_name=Brewu&dob=1998-05-05&country=Ghana&contract_status=Active&date_signed=1998-05-05&contract_exp_date=1998-05-05&salary=2000&submit=