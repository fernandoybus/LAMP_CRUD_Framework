<?php
   session_start();
   ob_start();


?>


<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
<style>
  table,th, tr,td {border: #000 1px solid;}
 
</style>
</head>
<body>

<?php



require('header.php');
if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['username1']))
{
        echo 'Welcome to the LAMP CMS!';

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username1 = htmlspecialchars($_POST["username"]);
  $password1 = htmlspecialchars($_POST["password1"]);
  
  
  
//$hashedpassword = password_hash($password1, PASSWORD_BCRYPT);
//echo $username1;
//echo "<br>";
//echo $hashedpassword;
//echo "<br>";
//echo "<br>";



$con = mysql_connect($server, $username, $password) or die ("Could not connect: " . mysql_error());
mysql_select_db($database, $con);


        $fetch_user_name = mysql_query("SELECT * FROM users");

        while($throw_user_name = mysql_fetch_array($fetch_user_name)) {
              
              
              //echo $throw_user_name[1];
              //echo "<br>";
              //echo $throw_user_name[2];
              //echo "<br>";
              $found = password_verify($password1,$throw_user_name[2]);
              //echo $found;
              //echo "<br>";
              
              if ($throw_user_name[1] == $username1 && $found == 1){
                  $session_begin = 1;
                  echo "Welcome " . $username1 . "! You are logged in!" . " Click <a href=all_posts.php> here </a> to see all posts";
                  $_SESSION['username1'] = $username1;
                  $_SESSION['LoggedIn'] = 1;


                  $cookie_name = "LAMPFINALPROJECT";
                  $cookie_value = $username1;
                  setcookie($cookie_name, $cookie_value, time() + (86400 * 30 *30), "/"); // 86400 = 1 MONTH




              }
        }
       

if ($session_begin != 1){
    echo "User or/and password not found";
}


mysql_close($con);
}


?>


<h1>LOGIN</h1>
<form action="login.php" method="post">

Username: <input type="text" name="username" size="50">
<br>
Password: <input type="password" name="password1" size="50">
<br><br>
<input type="submit">
</form>




</body>

<?php
require('footer.php');




?>

</html>