
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
                        user_level,
                        user_email
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
                $_SESSION['user_email'] = $row['user_email'];
            }

            header("Location: http:/Binary-Beasts/forum/");
            exit();
            // echo 'Welcome, ' . $_SESSION['user_name'] . '. <a href="index.php">Proceed to the forum overview</a>.';
        }
    }
}
/* signUp backend */
if (isset($_POST["signUpSubmit"])) {
    //the form has been posted without, so save it
    //notice the use of mysql_real_escape_string, keep everything safe!
    //also notice the sha1 function which hashes the password
    $username = mysqli_real_escape_string($conn, $_POST['user_name']);
    $password = sha1($_POST['user_pass']);
    $confPass = sha1($_POST['user_pass_check']);
    $userEmail = mysqli_real_escape_string($conn, $_POST['user_email']);

    if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
        $name_error = "The entered email is invalid ! please enter something valid.";
        $warningIconReg = (empty($name_error)) ? "" : "<i class='fas fa-exclamation-triangle'></i>";
    } else if ($password!=$confPass) {
        $name_error = "The two passwords did not match";
        $warningIconReg = (empty($name_error)) ? "" : "<i class='fas fa-exclamation-triangle'></i>";

    } else {
        $sqlCheckUsername = "SELECT * FROM users WHERE user_name = '$username'";
        $sqlCheckEmail = "SELECT * FROM users WHERE user_email = '$userEmail'";

        $resCheckUsername = mysqli_query($conn, $sqlCheckUsername);
        $resCheckEmail = mysqli_query($conn, $sqlCheckEmail);

        if (mysqli_num_rows($resCheckUsername) > 0) {
            $name_error = "Sorry $username has already been taken as a user name";
            $warningIconReg = (empty($name_error)) ? "" : "<i class='fas fa-exclamation-triangle'></i>";
        } else if (mysqli_num_rows($resCheckEmail) > 0) {
            $name_error = "Sorry $userEmail has already been taken as a user email";
            $warningIconReg = (empty($name_error)) ? "" : "<i class='fas fa-exclamation-triangle'></i>";
        } else {
            $sql = "INSERT INTO
                users(user_name, user_pass, user_email ,user_date, user_level)
            VALUES('$username',
                    '$password',
                    '$userEmail',
                    NOW(),
                    1)";
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                //something went wrong, display the error
                echo 'Something went wrong while registering. Please try again later.';
                //echo mysql_error(); //debugging purposes, uncomment when needed
            } else {
                // echo 'Successfully registered. You can now Sign In and start posting! :-)';
                $sql = "SELECT
                        user_id,
                        user_name,
                        user_level,
                        user_email
                    FROM
                        users
                    WHERE
                        user_email = '$userEmail'
                    AND
                        user_pass = '$password'";

                $result = mysqli_query($conn, $sql) or die("SIGN IN :".mysqli_error($conn));
                $_SESSION['signed_in'] = true;

                //we also put the user_id and user_name values in the $_SESSION, so we can use it at various pages
                while ($row = mysqli_fetch_assoc($result)) {
                    $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['user_name'] = $row['user_name'];
                    $_SESSION['user_level'] = $row['user_level'];
                    $_SESSION['user_email'] = $row['user_email'];
                }

                header("Location: http:/Binary-Beasts/forum/forgotPswd.php?user_id=".$_SESSION['user_id']);
                // $_SESSION["isTopicCreated"] = true;
                // header("Location: http:/Binary-Beasts/forum/signInAndUp.php");
                exit();
            }
        }

    }

    
}

$warningIcon = (empty($error_message)) ? "" : "<i class='fas fa-exclamation-triangle'></i>";
$warningIconReg = (empty($name_error)) ? "" : "<i class='fas fa-exclamation-triangle'></i>";

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/e005c8a2fd.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js"></script>
    <link rel="stylesheet" href="signInAndUp.css">
    <title>Sign In | Sign Up</title>
</head>
<body>
    <span style="display:none;" id="phpVar"></span>
    <?php
    // echo '<div class="isTopicCreated" id="successfully">
    //         <i class="fas fa-check-circle"></i> 
    //         Your account has been created successfully, you can now SIGN IN !
    //     </div>';
        if($_SESSION["isTopicCreated"]){
            echo '<div class="isTopicCreated" id="successfully">
                    <i class="fas fa-check-circle"></i> 
                    Your account has been created successfully, you can now SIGN IN !
                </div>' ;
            unset($_SESSION["isTopicCreated"]);

          }
    ?>
    <div class="wrapper">
        <a href="/Binary-Beasts/forum"><i class="fas fa-arrow-left"></i></a>
        <div class="title-text">
            <div class="title login">Sign In Form</div>
            <div class="title signup">Sign Up Form</div>
        </div>

        <div class="form-container">
        <div class="slide-controls">
            <input type="radio" name="slider" id="login" >
            <input type="radio" name="slider" id="signup" >
            <label for="login" class="slide login">Sign In</label>
            <label for="signup" class="slide signup">Sign Up</label>
            <div class="slide-tab"></div>
        </div>
            <div class="form-inner">
                <form action="signInAndUp.php" method="POST" class="login">
                    <div class="field">
                        <input type="email" name="user_email" value="" placeholder="Email Address" required autocomplete="off">
                    </div>
                    <div class="field">
                        <input type="password" value="<?php echo $_GET["temp"]; ?>" name="user_pass" id="signInPassword" placeholder="Password" required>
                        <i id="showPassword" class="far fa-eye"></i>
                        <i id="hidePassword" class="far fa-eye-slash"></i>
                    </div>
                    <div class="pass-link"><a 
                    onclick='
                        // document.getElementById("phpVar").innerHTML = "<?php $_SESSION["forgotPswd"]=true ?>";
                        
                        setTimeout(()=>{
                            window.location.replace("http:/Binary-Beasts/forum/forgotPswd.php?forgotPswd=true");
                        },2000)
                        '
                    href="#">Forgot password?</a></div>
                    <div class="field">
                        <input type="submit" name="signInSubmit" value="Sign In">
                    </div>
                    <div class="error"><?php echo "$warningIcon<span class='error'>$error_message </span>"; ?></div>
                    <div class="signup-link">Not a member? <a href="<>">Sign Up Now</a></div>
                </form>
                <form action="signInAndUp.php" method="POST" class="signup">
                    <div class="field">
                        <input type="text" name="user_name" id="" placeholder="User name" required autocomplete="off">
                    </div>
                    <div class="field">
                        <input type="email" name="user_email" id="" placeholder="Email Address" required autocomplete="off">
                    </div>
                    <div class="field form-element">
                        <input type="password" name="user_pass" id="signUpPassword" placeholder="Password" required autocomplete="off">
                        <i id="signUpPasswordShow" class="far fa-eye"></i>
                        <i id="signUpPasswordHide" class="far fa-eye-slash"></i>

                        <div class="password-policies">
                            <div class="policy-length">
                                Has 8 or more Characters
                            </div>
                            <div class="policy-number">
                                Contains Number
                            </div>
                            <div class="policy-uppercase">
                                Contains Uppercase
                            </div>
                            <div class="policy-special">
                                Contains Special Characters
                            </div>
                            <!-- <div class="goodPassword on">
                                You're good to go <i class="fas fa-check-circle"></i>
                            </div> -->
                        </div>

                    </div>
                    <div class="field">
                        <input type="password" name="user_pass_check" id="confirmPassword" placeholder="Confirm Password" required>
                        <i id="confirmPasswordShow" class="far fa-eye"></i>
                        <i id="confirmPasswordHide" class="far fa-eye-slash"></i>
                    </div>
                    <div class="field">
                        <input type="submit" name="signUpSubmit" value="Sign Up">
                    </div>
                    <div class="error"><?php echo "$warningIconReg <span class='error'>$name_error</span>"; ?></div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>

        const loginForm =document.querySelector("form.login");
        const signupForm =document.querySelector("form.signup");
        const loginBtn =document.querySelector("label.login");
        const signupBtn =document.querySelector("label.signup");
        const signupLink =document.querySelector(".signup-link a");
        const loginTitle = document.querySelector(".title-text .login");
        const signupTitle = document.querySelector(".title-text .signup");
        if(Cookies.get('signUp')){
            console.log(Cookies.get());
            console.log("here");
            document.getElementById("signup").checked =true;
            loginForm.style.marginLeft = "-50%";
            loginTitle.style.marginLeft = "-50%";
        }
        else{
            console.log("duh");
        }
        signupBtn.onclick = (()=>{
            loginForm.style.marginLeft = "-50%";
            loginTitle.style.marginLeft = "-50%";
            Cookies.set('signUp','on');
            // console.log(Cookies.get());
        });
        loginBtn.onclick=(()=>{
            loginForm.style.marginLeft = "0%";
            loginTitle.style.marginLeft = "0%";
            Cookies.remove('signUp');
            // console.log(Cookies.get());
        });
        signupLink.onclick = (()=>{
            signupBtn.click();
            return false;
        })

    </script>
    <script src="forum.js"></script>

</body>
</html>
