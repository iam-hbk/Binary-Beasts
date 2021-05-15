<?php

include "header.php";
?>
<style>
#userbar{
    display: none;
}
</style>
<?php
session_destroy();
echo 'You have been logged out. <a href="index.php">Home</a>';

include "footer.php";


?>
