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
    <style>
        body{
            display: flex;
            justify-content: center;
            position: relative;
        }
        div form{
            justify-content: space-around;
            align-items: center;
            display: flex;
            flex-direction: column;
            width: 250px;
            padding: 10px;
            height: 30vh;
            position: absolute;
            top: 40vh;
            right: 40vw;
            border-radius: 10px;
            background-color: white;
            backdrop-filter: blur(5px);
        }div form input[type="submit"]{
            width: 100px;
            cursor: pointer;
            color: white;
            border: none;
            border-radius: 5px;
            background-color: #9e1030ff;

        }
        div form input,div form input:focus{
            outline: none;
            width: 230px;
            border: none;
            border-bottom: 2px solid black;
            padding: 5px 10px;
            margin: 10px;
        }
        a#linkDelAcc:hover{
            color: #9e1030ff;
            transform: none;
        }
        div#bg{
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #22222266;
        }
        h3#delete{
            width: 100%;
            margin: 10px;
            text-align: center;
            font-family: poppins;
            border-bottom: 2px solid   #9e1030ff;
        }


    </style>
    <a id="redirect" href="/Binary-Beasts/forum"><i class="fas fa-arrow-left"></i></a>
        <h1 id="pp"><i class="fas fa-user-circle"></i></h1>
        <div class="username">
            <h2><?php echo $user_name ?></h2>
            <input id="editName" type="text" name="editedUsername" placeholder="New Name">
            <i class="fas fa-edit"></i>
            <input id="saveButton" type="submit" name="submitEdit" value="Save">
        </div>
        <div class="updatePassword">Change Password <i class="fas fa-key"></i></div>
        <div class="info posts">Number of posts: 73</div>
        <div class="info replies">Number of replies: 45</div>
        <div class="info votes">Number of votes: 85</div>
        <a id="linkDelAcc" href="#"><div id="deleteAcc">Delete account <i class="fas fa-trash"></i></div></a>
        <?php if (strlen($error) > 0) {echo '<div class="errors">' . $error . '</div>';}?>
    </div>
    </form>
    <div id="bg">
    <div id="changePasswordPopUp">
        <form action="changePassword.php" method="post">
            <h3 id="delete">Change Password</h3>
            <input type="password" name="oldPassword" id="oldPassword">
            <input type="password" name="NewPassword" id="NewPassword">
            <input type="submit" value="Change">
        </form>
    </div>
    </div>
    
  
    
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
            $("#deleteAcc").click(()=>{
                var user_name = "<?php echo $_SESSION["user_name"] ?>";
                if(confirm("Do you really want to delete your account forever ?")){
                    
                    
                    $.post("delete.php",{'user_name':user_name},(data)=>{
                        console.log(data);
                        $(".wrapper").addClass("AccDeleted");
                        $(".AccDeleted").html("You have been <em>LOGGED OUT</em> and your account has been <em>SUCCESSFULLY DELETED</em>.");
                        $(".AccDeleted").css("text-align","center");
                        $(".AccDeleted em").css({
                            "font-style":"normal","color":"#9e1030ff","font-weight":"bold"
                        });
                        setTimeout(() => {
                            $("#linkDelAcc").attr("href","/Binary-Beasts/forum");
                            window.location.replace("http:index.php");
                        }, 3000);
                    });
                }else{
                    $("#linkDelAcc").attr("href","#");
                }
            })
        });
    </script
</body>
</html>
