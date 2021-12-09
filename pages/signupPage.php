<?php
// start session so that errors can be available in this file to print
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./../css/login_signup_CSS.css" rel="stylesheet">
   
    <title>Sign Up</title>
</head>
<style>

</style>
<body style="background-color: black;"><br>
   

    <div class="row">
        <div class="column">

            <img src="./../images/sankofa.jpg" height="670" width="600" alt="Welcome Image">
        </div>

        <div class="column">
            <form id="form" class="form" action="./../supporters/supporter_create.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm(event);">

            <?php
            if(isset($_SESSION["errors"])){
                $errors = $_SESSION["errors"];

                // loop and display errors
                foreach($errors as $error){
                    ?>
                        <small style="color: red"> <?= $error."<br>"; ?> </small>
                    <?php
                }
            }
            // destroy session after displaying errors
            $_SESSION["errors"] = null;
        ?>
                <div  class="imgcontainer">
                    <img src="./../images/default_avatar.png" alt="Avatar" class="avatar">
                </div>

                <div class="container">
                    <div>
                        <label id="label" for="first_name"><b>First Name</b></label>
                        <input type="text" placeholder="Enter First Name" name="first_name">
                        <small id='firstNameError'></small>
                     </div><br>

                    <div >
                        <label id= "label" for="last_name"><b>Last Name</b></label>
                        <input type="text" placeholder="Enter Last Name" name="last_name">
                        <small id='lastNameError'></small>
                    </div><br>
                     
                    <div>
                        <label id= "label" for="email"><b>Email</b></label>
                        <input type="text" placeholder="Enter Email" name="email">
                        <small id='emailError'></small>
                    </div><br>
                    
                    <div>
                        <label id= "label" for="psw"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="password">
                        <small id='passwordError'></small>
                    </div><br>
                    
                    <div>
                        <label id= "label" for="psw2"><b>Repeat Password</b></label>
                        <input type="password" placeholder="Repeat Password" name="confirm_password">
                        <small id='ConfirmpasswordError'></small>
                    </div><br>
                   
                    <!-- <div>
                        <label id= "label" for="image"><b>Choose an Image</b></label>
                        <input type="file" id="form-control-file"  name="image">
                    </div> -->
                   
                    <small id='success'></small>
                    <button class="normal" type="submit" name="submit">Sign Up</button>
                    
                </div>

                <div class="row">
                </div>
                    <div class="column2">

                    <a href="./loginPage.php"><button type="button" class="cancelbtn">Login</button></a>
                    </div>
                    <div class="column2">

                    <span class="psw"><b>Already have an account? </b></span>
                    
                </div>


            </form>
        </div>

    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="./signupJS.js"></script>
</body>

</html>