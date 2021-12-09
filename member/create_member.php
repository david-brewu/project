<?php
//connect to post controller
include_once ("member_controller.php");
//include_once (dirname(__FILE__)).'/member_controller.php';


if(isset($_GET['submit'])){
    // Grab form inputs
    $first_name = $_GET['first_name'];
    $last_name = $_GET['last_name'];
    $dob = $_GET['dob'];
    $country = $_GET['country'];
    $contract_status = $_GET['contract_status'];
    $date_signed = $_GET['date_signed'];
    $contract_exp_date = $_GET['contract_exp_date'];
    $salary = $_GET['salary'];
    $isArchive = $_GET['isArchive'];
    $image = $_GET['image'];

    // create post if not empty
    $newMember = createMember($first_name, $last_name, $dob, $country, $contract_status, $date_signed, $contract_exp_date,$salary, $isArchive, $image);
    if($newMember){
        echo "success";
        //header("location: ../index.php");
    }
    else echo "failed";
}else echo "submit not set";


//http://localhost/webtech/functions/post_create.php?title=Hey&body=Hi+there&submit=
//http://localhost/project/member/create_member.php?first_name=David&last_name=Brewu&dob=1998-05-05&country=Ghana&contract_status=Active&date_signed=1998-05-05&contract_exp_date=1998-05-05&salary=2000&submit=