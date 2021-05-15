<?php
//connect.php
$server = 'localhost';
$username   = 'Crimeline';
$password   = '@crimeline2021';
$database   = 'Crimeline';
$conn = mysqli_connect($server, $username,  $password,$database);
if(!$conn)
{
    exit('Error: could not establish database connection');
}
if(!mysqli_select_db($conn,$database))
{
    exit('Error: could not select the database');
}
?>