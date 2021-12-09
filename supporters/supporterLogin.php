<?php
//connect to supporter controller
include_once("supporter_controller.php");

$errors = array();                        // track errors
session_start();                          // start session

if (isset($_POST["submit"])) {
    // Grab form inputs
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (empty($email)) {
        array_push($errors, "email is required");
    }
    if (empty($password)) {
        array_push($errors, "passsword is required");
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

    // get the supporter with the email provided
    $getSupporter = getSingleSupporterWithEmail($email);

    // check if getSupporter returned an actual supporter
    if ($getSupporter != [] || $getSupporter != false) {
        // check if email and password of getSupporter match that of the form && check the admin status
        if ($getSupporter['email'] == $email && $getSupporter['password'] == md5($password) && $getSupporter['isAdmin'] == 'No') {
            // set sessions 
            $_SESSION['email'] = $email;
            $_SESSION['isAdmin'] = $getSupporter['isAdmin'];
            $_SESSION['first_name'] = $getSupporter['first_name'];
            $_SESSION['fan_id'] = $getSupporter['id'];
        } elseif ($getSupporter['email'] == $email && $getSupporter['password'] == md5($password) && $getSupporter['isAdmin'] == 'Yes') {
            $_SESSION['email'] = $email;
            $_SESSION['isAdmin'] = $getSupporter['isAdmin'];
            $_SESSION['first_name'] = $getSupporter['first_name'];
            $_SESSION['fan_id'] = $getSupporter['id'];
        } else {
            // if form data don't match that of getSupporter
            array_push($errors, "email or password is incorrect");
        }
    }

    if (count($errors) == 0) {
        header("location: ./../root.php");
    } else {
        // store errors inside session
        $_SESSION["errrors"] = $errors;
        header("location: ./../pages/loginPage.php");
    }
}
