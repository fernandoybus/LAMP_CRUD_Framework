<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
<style>
  table,th, tr,td {border: #000 1px solid;}
 
</style>
</head>
<body>

<?php

require('header.php');

//echo $server;
//echo $username;
//echo $password;
//echo $database;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username1 = htmlspecialchars($_POST["username1"]);
  $password1 = htmlspecialchars($_POST["password1"]);
  

//echo $username1;
//echo $password1;

 $hashedpassword = password_hash($password1, PASSWORD_BCRYPT);
 
 
 //echo $username1;
 //echo  $hashedpassword ;
 
 

$con = mysql_connect($server, $username, $password) or die ("Could not connect: " . mysql_error());
mysql_select_db($database, $con);


        $fetch_user_name = mysql_query("SELECT * FROM users");

        while($throw_user_name = mysql_fetch_array($fetch_user_name)) {
              //echo $throw_user_name[1] ;
              //echo "<br>";
              
              if ($throw_user_name[1] == $username1){

                  echo "This user already exists!";
                  $found =1;

              }
       }
       
              if ($found <> 1){
                 //create new user
                 $sql = "INSERT INTO users (username, password) VALUES ('$username1', '$hashedpassword')";
                 mysql_query($sql);
                 echo "User created. Click <a href='login.php'>here</a> to login" ;



              }


mysql_close($con);
}






?>


<h1>CREATE NEW USER</h1>


<form action="register.php" method="post">

Username: <input type="text" name="username1" size="50">
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