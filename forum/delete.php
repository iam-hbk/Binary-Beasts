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

print_r(mysqli_fetch_assoc($r));
if(!$r){
    print(mysqli_error($conn));
} else{
    print($username);
    session_destroy();
}






?>