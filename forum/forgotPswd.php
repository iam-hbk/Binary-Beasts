<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
    
    <div class="info">This process will help you recover your password in case you forget it.
    Please ensure that the data you enter is legit to avoid any issue</div>
    <span style="display:none;" class="phpData"><?php echo isset($_GET["forgotPswd"]); ?></span>
    <form action="forgotPswd.php" method="post">
        <input id="email"  placeholder="Please enter your email address..." required type="email" name="email" id="city">
        <script>
            $(document).ready(()=>{
                var phpData = $("span.phpData")
                console.log(phpData);
                if(phpData.html()){
                    $("#email").show();
                }
                else{
                    $("#email").hide();
                    $("#email").removeAttr("required");
                }
            })
        </script>
        <h1>Pick a question</h1>
        <ul>
            <li><input required type="radio" value = "town" name="question" id="q1"><label for="q1">What is the name of the town where you were born?</label></li>
            <li><input required type="radio" value = "mom" name="question" id="q2"><label for="q2">What is your mother's maiden name?</label></li>
            <li><input required type="radio" value = "car" name="question" id="q3"><label for="q3">What was your first car?</label></li>
        </ul>

        <div class="answer">
            <h1>What's the answer ?</h1>
            <input required type="text" name="answer" id="city">
            <input type="submit" name="submit" value="Submit">
        </div>
    </form>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap");
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }
        li{
            list-style-type: none;
        }
        body{
            
            display: grid;
            place-items: center;
            height: 100%;
            width: 100%;
            background: linear-gradient(90deg, #9e1030ff 10%, rgba(0, 0, 0) 100%);
        }
        form{
            border-radius:20px;
            margin-top:10vh;
            background:white;
            border: 2px solid white;
            padding: 20px;
            display: flex;
            flex-direction: column;
            min-height:35vh;
            height:50vh;
            
        }
        div{
            display: flex;
            height: 50px;
            /* justify-content:space-between; */
            flex-direction: column;
        }
        input[type="text"],input[type="email"]{
            border:2px solid #9e1030ff;
            padding:10px;
            border-radius:10px;
        }
        input[name="question"]{
            margin:0 20px;
        }
        input:focus{
            outline:none;
        }
        div input[type=submit]{
            width:30%;
            background: #9e1030ff;
            margin:20px 35%;
            outline:none;
            border:none;
            padding:10px;
            color:white;
            cursor:pointer;
            border-radius:10px;
        }
        div.info{
            border:2px solid #9e1030ff;
            padding:10px;
            border-radius:10px;
            background:white;
            margin-top:20px;
            height:auto;
        }
        div.info#done{
            border:2px solid #00ff20f1;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            align-items: center;
        }
        span#ok{
            color:white;
            background-color: #9e1030ff;
            padding: 5px 10px;
            border-radius: 10px;
        }
    </style>
</body>
</html>
<?php
include "connect.php";
session_start();


if (isset($_GET["forgotPswd"])){
    $_SESSION["forgotPswd"] = $_GET["forgotPswd"];
}


$temp = sha1("Temp@2021");

if (($_POST["email"]) && isset($_POST["submit"])){
    // unset($_SESSION["forgotPswd"]);
    $question = $_POST["question"];
    $answer = $_POST["answer"];
    $user_email = $_POST["email"];

    $query="SELECT forgot_question,forgot_answer,user_pass
            FROM users
            WHERE user_email = '$user_email' ;";
    
    $res = mysqli_query($conn,$query) or die("ERROR:".mysqli_error($conn));
    
    while( $data = mysqli_fetch_assoc($res)){

        $data_question = $data["forgot_question"];
        $data_answer = $data["forgot_answer"];

        if(($data_question == $question) && ($data_answer == $answer)){
            
            $query = "UPDATE users
                    SET user_pass = '$temp'
                    WHERE user_email = '$user_email' ;";
            $res = mysqli_query($conn,$query);
            if(!$res){
                echo <<<EOF
                    <div class='info'>Your question-answer combination did not match any user in our database,
                    ensure your combination is correct and try again
                    </div>
                EOF;
            }else{
                $sql = "SELECT
                        user_id,
                        user_name,
                        user_level,
                        user_email
                    FROM
                        users
                    WHERE
                        user_email = '$user_email'";

                $result = mysqli_query($conn, $sql) or die("SIGN IN :".mysqli_error($conn));
                $_SESSION['signed_in'] = true;

                //we also put the user_id and user_name values in the $_SESSION, so we can use it at various pages
                while ($row = mysqli_fetch_assoc($result)) {
                    $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['user_name'] = $row['user_name'];
                    $_SESSION['user_level'] = $row['user_level'];
                    $_SESSION['user_email'] = $row['user_email'];
                }

                echo <<<EOF
                    <div id='done' class='info'>Your temporary password is <h2>Temp@2021.</h2>
                    Please use this temporary password to log in and update your new password.
                    <span id="ok">Got it !</span>

                    </div>

                    <script>
                        $(document).ready(()=>{
                            $("span#ok").click(()=>{
                                window.location.replace("http:editProfile.php?temp=Temp@2021");
                            })
                        })
                    </script>
                EOF;
            }
        }
        else{
            echo <<<EOF
            <div class='info'>Your question-answer combination did not match any user in our database,
             ensure your combination is correct and try again
            </div>
            EOF;
            $_SESSION["forgotPswd"] = true;
        }
    }

    if(!$res){
        echo "<div class='info'>Something went wrong, please try again later".mysqli_error($conn)."
        </div>";
    }

}/* 
else if(isset($_POST["submit"])){
    $question = $_POST["question"];
    $answer = $_POST["answer"];
    $user_id = $_GET["user_id"];

    $query = "UPDATE users
    SET forgot_question = '$question', forgot_answer = '$answer'
    WHERE user_id = '$user_id' ;";
    $res = mysqli_query($conn,$query);
    if(!$res){
        echo "<div class='info'>Something went wrong, please try again later".mysqli_error($conn)."
        </div>";
    }
    else{
        echo <<<EOF
        <div id='done' class='info'>Everything went well ! welcome to Crimeline</div>
        <script>
            $(document).ready(()=>{
                setTimeout(() => {
                    window.location.replace("http:index.php");
                }, 3000);
            })
        </script>
        EOF;
    }

}
 */

// echo "hello";

?>
