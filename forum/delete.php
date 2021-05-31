<?php 

include "connect.php";
session_start();

$username=$_POST["user_name"];
$remove = "SET FOREIGN_KEY_CHECKS=0";

$rr = mysqli_query($conn,$remove);

$query="DELETE FROM users WHERE user_name = '$username'";

$r = mysqli_query($conn,$query);

$set = "SET FOREIGN_KEY_CHECKS=1";

$rs = mysqli_query($conn,$set);

// echo $username;
if (isset($_POST["user_name"])){

    print_r(mysqli_fetch_assoc($r));
    if(!$r){
        print(mysqli_error($conn));
    } else{
        print($username);
        session_destroy();
    }

}
if (isset(($_POST["name"]))){
    /* check if password exist in the database */
    $username = $_POST["name"];
    $query = "SELECT user_pass FROM users WHERE user_name = '$username'";
    $res = mysqli_query($conn,$query);
    $data = mysqli_fetch_assoc($res);
    $pswd = $data["user_pass"];
    if(!$res){
        print("line 34: ".mysqli_error($conn));
    }else{
        if (mysqli_num_rows($res)<1){
            print("No record");
        }else{
            $user_pass = sha1($_POST["newP"]);
            $oldP = sha1($_POST["oldP"]);

            if($oldP==$pswd){
                $query = 'UPDATE users SET user_pass = '."'$user_pass'".' WHERE user_name = '."'$username'";
                $r = mysqli_query($conn,$query);
                if(!$r){
                    print("line 46 :".mysqli_error($conn));
                }
                else{
                    print("done");
                }

            }
        }
    }


}





?>