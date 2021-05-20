
<?php
include "connect.php";
session_start();
/* signIn backend */
$error_message = "";
if (isset($_POST["signInSubmit"])) {

    $user_email = mysqli_real_escape_string($conn, $_POST['user_email']);
    $password = sha1($_POST['user_pass']);
    // echo "$user_email<br>----$password";
    $sql = "SELECT
                        user_id,
                        user_name,
                        user_level
                    FROM
                        users
                    WHERE
                        user_email = '$user_email'
                    AND
                        user_pass = '$password'";

    $result = mysqli_query($conn, $sql);
    if (!$result) {
        //something went wrong, display the error
        echo 'Something went wrong while signing in. Please try again later.';
        //echo mysql_error(); //debugging purposes, uncomment when needed
    } else {
        //the query was successfully executed, there are 2 possibilities
        //1. the query returned data, the user can be signed in
        //2. the query returned an empty result set, the credentials were wrong
        if (mysqli_num_rows($result) == 0) {
            $error_message = 'You have supplied a wrong email/password combination. Please try again.';
        } else {
            //set the $_SESSION['signed_in'] variable to TRUE
            $_SESSION['signed_in'] = true;

            //we also put the user_id and user_name values in the $_SESSION, so we can use it at various pages
            while ($row = mysqli_fetch_assoc($result)) {
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['user_name'] = $row['user_name'];
                $_SESSION['user_level'] = $row['user_level'];
            }

            header("Location: http:/Binary-Beasts/forum");
            exit();
            // echo 'Welcome, ' . $_SESSION['user_name'] . '. <a href="index.php">Proceed to the forum overview</a>.';
        }
    }
}
/* signUp backend */
if (isset($_POST["signUpSubmit"])) {
    $errors = array(); /* declare the array for later use */

    if (isset($_POST['user_name'])) {
        //the user name exists
        if (!ctype_alnum($_POST['user_name'])) {
            $errors[] = 'The username can only contain letters and digits.';
        }
        if (strlen($_POST['user_name']) > 12) {
            $errors[] = 'The username cannot be longer than 30 characters.';
        }
    } else {
        $errors[] = 'The username field must not be empty.';
    }

    if (isset($_POST['user_pass'])) {
        if ($_POST['user_pass'] != $_POST['user_pass_check']) {
            $errors[] = 'The two passwords did not match.';
        }
    } else {
        $errors[] = 'The password field cannot be empty.';
    }

    if (!empty($errors)) /*check for an empty array, if there are errors, they're in this array (note the ! operator)*/ {
        echo 'Uh-oh.. a couple of fields are not filled in correctly..';
        echo '<ul>';
        foreach ($errors as $key => $value) /* walk through the array so all the errors get displayed */ {
            echo '<li>' . $value . '</li>'; /* this generates a nice error list */
        }
        echo '</ul><br><a href="signup.php">Try again</a>';
    } else {
        //the form has been posted without, so save it
        //notice the use of mysql_real_escape_string, keep everything safe!
        //also notice the sha1 function which hashes the password
        $username = mysqli_real_escape_string($conn, $_POST['user_name']);
        $password = sha1($_POST['user_pass']);
        $userEmail = mysqli_real_escape_string($conn, $_POST['user_email']);
        $sql = "INSERT INTO
                    users(user_name, user_pass, user_email ,user_date, user_level)
                VALUES('$username',
                       '$password',
                       '$userEmail',
                        NOW(),
                        1)";
/* CREATE A DROPDOWN TO CHECK IF IT'S AN ADMIN OR NORMAL USER  */
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            //something went wrong, display the error
            echo 'Something went wrong while registering. Please try again later.';
            //echo mysql_error(); //debugging purposes, uncomment when needed
        } else {
            // echo 'Successfully registered. You can now Sign In and start posting! :-)';
            header("Location: http:/Binary-Beasts/forum/signInAndUp.php");
            exit();
        }
    }
}

$warningIcon = (empty($error_message)) ? "" : "<i class='fas fa-exclamation-triangle'></i>";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/e005c8a2fd.js"></script>
    <link rel="stylesheet" href="signInAndUp.css">
    <title>Sign In | Sign Up</title>
</head>
<body>
    <div class="wrapper">
        <div class="title-text">
            <div class="title login">Sign In Form</div>
            <div class="title signup">Sign Up Form</div>
        </div>

        <div class="form-container">
        <div class="slide-controls">
            <input type="radio" name="slider" id="login" checked>
            <input type="radio" name="slider" id="signup">
            <label for="login" class="slide login">Sign In</label>
            <label for="signup" class="slide signup">Sign Up</label>
            <div class="slide-tab"></div>
        </div>
            <div class="form-inner">
                <form action="signInAndUp.php" method="POST" class="login">
                    <div class="field">
                        <input type="email" name="user_email" placeholder="Email Address" required autocomplete="off">
                    </div>
                    <div class="field">
                        <input type="password" name="user_pass" id="signInPassword" placeholder="Password" required>
                        <i id="showPassword" class="far fa-eye"></i>
                        <i id="hidePassword" class="far fa-eye-slash"></i>
                    </div>
                    <div class="pass-link"><a href="#">Forgot password?</a></div>
                    <div class="field">
                        <input type="submit" name="signInSubmit" value="Sign In">
                    </div>
                    <div class="error"><?php echo "$warningIcon<span class='error'>$error_message </span>"; ?></div>
                    <div class="signup-link">Not a member? <a href="#">Sign Up Now</a></div>
                </form>
                <form action="signInAndUp.php" method="POST" class="signup">
                    <div class="field">
                        <input type="text" name="user_name" id="" placeholder="User name" required autocomplete="off">
                    </div>
                    <div class="field">
                        <input type="email" name="user_email" id="" placeholder="Email Address" required autocomplete="off">
                    </div>
                    <div class="field">
                        <input type="password" name="user_pass" id="signUpPassword" placeholder="Password" required>
                        <i id="signUpPasswordShow" class="far fa-eye"></i>
                        <i id="signUpPasswordHide" class="far fa-eye-slash"></i>
                    </div>
                    <div class="field">
                        <input type="password" name="user_pass_check" id="confirmPassword" placeholder="Confirm Password" required>
                        <i id="confirmPasswordShow" class="far fa-eye"></i>
                        <i id="confirmPasswordHide" class="far fa-eye-slash"></i>
                    </div>
                    <div class="field">
                        <input type="submit" name="signUpSubmit" value="Sign Up">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        const loginForm =document.querySelector("form.login");
        const signupForm =document.querySelector("form.signup");
        const loginBtn =document.querySelector("label.login");
        const signupBtn =document.querySelector("label.signup");
        const signupLink =document.querySelector(".signup-link a");
        const loginTitle = document.querySelector(".title-text .login");
        const signupTitle = document.querySelector(".title-text .signup");
        signupBtn.onclick = (()=>{
            loginForm.style.marginLeft = "-50%";
            loginTitle.style.marginLeft = "-50%";
        });
        loginBtn.onclick=(()=>{
            loginForm.style.marginLeft = "0%";
            loginTitle.style.marginLeft = "0%";
        });
        signupLink.onclick = (()=>{
            signupBtn.click();
            return false;
        })

    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="forum.js"></script>

</body>
</html>
