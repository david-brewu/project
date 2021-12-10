<?php
include_once("./../club_news/news_controller.php");
$errors = array();
session_start();

$isArchive = 'No';

if (isset($_POST["submit"])) {
    // fetch parameters from POST

    $date = $_POST["date"];
    $title = $_POST["title"];

    $body = $_POST["body"];

    if (empty($title)) {
        array_push($errors, "title is required");
    }

    if (empty($body)) {
        array_push($errors, "body is required");
    }
}



if (strlen($title) > 101) {
    array_push($errors, "last name must be less than 100 characters");
}
if (strlen($body) > 20000) {
    array_push($errors, "body cannot be greate than 20000 characters");
}

// image validation
$target_dir = "./images/";
// file path
$target_file = $target_dir . basename($_FILES['image']['name']);
// image file type
$image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


if (empty($_FILES["image"]["name"])) {
    array_push($errors, "file cannot be empty");
} else {
    // check if its an actual image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check == false) {
        array_push($errors, "file is not an image");
    }

    // limit file size to 5MB
    if ($_FILES["image"]["size"] > 5000000) {
        array_push($errors, "upload an image less than 5MB");
    }

    // limit file type
    if ($image_file_type != "jpg" && $image_file_type != "png" && $image_file_type != "jpeg") {
        array_push($errors, "Sorry, only JPG, PNG & GIF files are allowed");
    }
}
// add news if errors == 0
if (count($errors) == 0) {
    $upload_image = move_uploaded_file($_FILES["image"]["tmp_name"], './' . $target_file);

    if ($upload_image) {

        $newNews = createNews($date, $title, $target_file, $body, $isArchive);
        if ($newNews) {
            echo "Publish Success";
        } else {
            echo "Publish Failed";
        }
    }
} else {
    session_start();
    // store the errors inside session
    $_SESSION["errors"] = $errors;
    header("location: ./club_news.php");
    echo "there was an error";
}
