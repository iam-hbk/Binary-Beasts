<?php include "connect.php";

session_start();
$user_id = $_SESSION["user_id"];
$user_name = $_SESSION["user_name"];
$error = "";
if (isset($_POST["submitEdit"])) {
    $newName = $_POST["editedUsername"];
    if ($newName == $user_name) {
        $error = "You entered the same Name, Nothing will be changed ! ";
    } else {
        $ifUsernameExist = "SELECT * FROM users WHERE user_name = '$newName'";
        $resIfUsernameExist = mysqli_query($conn, $ifUsernameExist);
        if (mysqli_num_rows($resIfUsernameExist) > 0) {
            $error = "Sorry $newName has already been taken as a user name.";

        } else {

            $query = "UPDATE users SET user_name = '$newName' WHERE user_id = '$user_id' ";
            $res = mysqli_query($conn, $query);
            if ($res) {
                $error = "Username changed Successfully";
                $_SESSION["user_name"] = $newName;
                $user_name = $_SESSION["user_name"];
            }
        }
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/e005c8a2fd.js"></script>
    <link rel="stylesheet" href="signInAndUp.css">
    <title>Document</title>
</head>
<body>
    <form action="editProfile.php" method="POST">
    <div class="wrapper editProfile">
    <a href="/Binary-Beasts/forum"><i class="fas fa-arrow-left"></i></a>
        <h1 id="pp"><i class="fas fa-user-circle"></i></h1>
        <div class="username">
            <h2><?php echo $user_name ?></h2>
            <input id="editName" type="text" name="editedUsername" placeholder="New Name">
            <i class="fas fa-edit"></i>
            <input id="saveButton" type="submit" name="submitEdit" value="Save">
        </div>
        <div class="info posts">Number of posts: 73</div>
        <div class="info replies">Number of replies: 45</div>
        <div class="info votes">Number of votes: 85</div>
        <div class="errors"><?php echo (strlen($error) > 0) ? $error : ""; ?></div>
    </div>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(()=>{
            $(".fa-edit").click(()=>{
                $(".username h2").toggle();
                $(".username #editName").css("display","inline-block").focus();
                $(".fa-edit").toggle();
                $("#saveButton").css("display","inline-block");
            });
            $("#saveButton").click(()=>{
                setTimeout(() => {
                    $(this).css("display","none");
                    $(".fa-edit").toggle();
                    $(".username h2").toggle();
                }, 3000);
            })
            setTimeout(() => {
                $(".errors").toggle();
            }, 4000);


        });
    </script>
</body>
</html>
