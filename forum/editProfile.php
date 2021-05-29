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
        div.username{
            border-bottom: .5px solid #9e1030ff;
            margin-bottom:20px;
        }
        div form{
            justify-content: space-around;
            align-items: center;
            display: flex;
            flex-direction: column;
            width: 350px;
            padding: 10px;
            height: auto;
            position: absolute;
            top: 30vh;
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
            border: none;
            border-bottom: 1px solid black;
            padding: 5px 10px;
            margin: 10px;
        }
        a#linkDelAcc:hover{
            color: #9e1030ff;
            transform: none;
        }
        div#bg{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #222222c6;
        }
        h3#delete{
            font-weight: 300;
            width: 100%;
            margin: 10px;
            text-align: center;
            font-family: poppins;
            margin:15px 0 25px 0;
            padding-bottom: 10px;
            border-bottom: .5px solid   #9e1030ff;
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
        <style>
            .updatePassword{
                display: grid;
                place-items: center;
                color: #9e1030ff;
            }
            .cpb{
                opacity: 0;
                transition: .5s;
            }
            i.fa-key{
                cursor: pointer;
                font-size: 1.5em;
            }
            i.fa-key:hover ~ .cpb{
                display: inline-block;
                opacity: 1;
            }
        </style>
        <div class="updatePassword"><i class="fas fa-key"></i><span class="cpb">Change Password</span></div>
        <div class="info posts">Number of posts: 73</div>
        <div class="info replies">Number of replies: 45</div>
        <div class="info votes">Number of votes: 85</div>
        <a id="linkDelAcc" href="#"><div id="deleteAcc">Delete account <i class="fas fa-trash"></i></div></a>
        <?php if (strlen($error) > 0) {echo '<div class="errors">' . $error . '</div>';}?>
    </div>
    </form>
    <div id="bg">
    <div id="changePasswordPopUp">
        <form>
            <h3 id="delete">Change Password</h3>
            <div class="contains oldP">
                <input type="password" required placeholder="Old Password..." name="oldPassword" id="oldPassword">
                <i id="oldPasswordShow" class="far fa-eye"></i>
                <i id="oldPasswordHide" class="far fa-eye-slash"></i>
            </div>
            <div class="contains newP">
                <input type="password" required placeholder="New Password..." name="newPassword" id="newPassword">
                <i id="newPasswordShow" class="far fa-eye"></i>
                <i id="newPasswordHide" class="far fa-eye-slash"></i>
            </div>
            <div class="contains ConfP">
                <input type="password" required placeholder="Confirm Password..." name="confirmPassword" id="confirmPasswordCP">
                <i id="confirmShow" class="far fa-eye"></i>
                <i id="confirmHide" class="far fa-eye-slash"></i>
            </div>
            <div class="buttonsCP"><span id="cancelCP" class="cancel">Cancel</span><span id="ChangeCP" class="cancel">Change</span></div>
            <div class="errorOnchangePassword">an error, the two passwords do not match</div>
            <style>
                div.contains{
                    display: flex;
                    position: relative;
                    align-items: center;
                }
                span.cancel{
                    border: 2px solid #9e1030ff;
                    padding: 4px 10px;
                    border-radius: 10px;
                    cursor: pointer;
                    margin: 15px;
                }
                span.cancel#ChangeCP{
                    background-color: #9e1030ff;
                    color: white;
                }
                div.errorOnchangePassword{
                    margin-top: 10px;
                    background-color: white;
                    width: 100%;
                    text-align: center;
                    padding: 10px;
                    color: #9e1030ff;
                }
            </style>
            <script>

            </script>
        </form>
        
    </div>
    </div>
    
  
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(()=>{
            $("#bg").css("display","none");
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
            /* Old password */
            $("#oldPasswordShow").click(() => {
                $("#oldPasswordHide").toggle();
                $("#oldPasswordShow").toggle();
                $("#oldPassword").prop({ type: "text" });
            });
            $("#oldPasswordHide").click(() => {
                $("#oldPasswordHide").toggle();
                $("#oldPasswordShow").toggle();
                $("#oldPassword").prop({ type: "password" });
            });
            /* New password*/
            $("#newPasswordShow").click(() => {
                $("#newPasswordShow").toggle();
                $("#newPasswordHide").toggle();
                $("#newPassword").prop({ type: "text" });
            });
            $("#newPasswordHide").click(() => {
                $("#newPasswordHide").toggle();
                $("#newPasswordShow").toggle();
                $("#newPassword").prop({ type: "password" });
            });
            /* 3 confirm password */
            $("#confirmShow").click(() => {
                $("#confirmShow").toggle();
                $("#confirmHide").toggle();
                $("#confirmPasswordCP").prop({ type: "text" });
            });
            $("#confirmHide").click(() => {
                $("#confirmHide").toggle();
                $("#confirmShow").toggle();
                $("#confirmPasswordCP").prop({ type: "password" });
            });

            $("#cancelCP").click(()=>{
                $("#bg").fadeToggle(300);
            })
            $("i.fa-key").click(()=>{
                $("#bg").fadeToggle(300);
            })

        });
    </script
</body>
</html>
