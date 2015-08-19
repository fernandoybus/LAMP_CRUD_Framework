<?php
session_start();
ob_start();
session_destroy();


require('header.php');

echo "you are logged out.";
echo "<br>";
echo "<br>";

echo "<a href='login.php'>Login</a>";
echo "<br>";
echo "<a href='register.php'>Register</a>";



require('footer.php');
?>



