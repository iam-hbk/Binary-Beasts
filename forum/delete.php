<?php 

include "connect.php";
session_start();

print($_POST["user_name"]);
session_destroy();


?>