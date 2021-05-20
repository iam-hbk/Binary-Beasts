<?php
include "connect.php";

session_start();
session_destroy();
header("Location: http:/Binary-Beasts/");
exit();
?>