<?php
    session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="./../css/login_signup_CSS.css" rel="stylesheet">

    <title>Login to Sankofa FC</title>
</head>

<body style="background-color: black;"><br>
    <div class="row">
        <div class="column">

            <img src="./../images/sankofa.jpg" height="670" width="600" alt="Welcome Image">
        </div>

        <div class="column">
            <form id="form" class="form" action="./../supporters/supporterLogin.php" method="POST" enctype="multipart/form-data" >

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
                <div class="imgcontainer">
                    <img src="./../images/default_avatar.png" alt="Avatar" class="avatar">
                </div>

                <div class="container">
                    <label id= "label" for="email"><b>Email</b></label>
                    <input type="text" placeholder="Enter Email" name="email" required>

                    <label id= "label" for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="password" required>

                    <button class="normal" type="submit" name="submit">Login</button>
                    <label id= "label">
                        <input type="checkbox" checked="checked" name="remember"> Remember me
                    </label>
                </div>

                <div class="row">
                </div>
                    <div class="column2">

                    <a href="./signupPage.php"><button type="button" class="cancelbtn">Signup</button></a>
                    </div>
                    <div class="column2">

                    <span class="psw"><b>Don't have an account? </b></span>
                    
                </div>


            </form>
        </div>

    </div>

</body>

</html>