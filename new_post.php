<?php
session_start();
ob_start();
?>


<!DOCTYPE html>
<html>
<head>
  <title>NEW POST</title>
<style>
  table,th, tr,td {border: #000 1px solid;}
 
</style>
</head>
<?php

require('header.php');


if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['username1']))
{

?>


<body>


<form action="post.php" method="post" enctype="multipart/form-data">
<br>

Sub-category: <select name="sub_category">
<?php
$con = mysql_connect("localhost","deepl541_lamp2","test123") or die('Could not connect:'.mysql_error());
mysql_select_db("deepl541_lamp2", $con) or die('Could not select database.');

$fetch = mysql_query("SELECT * FROM SubCategory");


while($row = mysql_fetch_array($fetch)) {
echo '<option value="' . $row[1] . '">'.$row[0].'</option>';
}
echo "</select>";

       //CLOSE DATABASE CONNECTION
       mysql_close($con);

?>

<br><br>

Location: <select name="location">
<?php
$con = mysql_connect("localhost","deepl541_lamp2","test123") or die('Could not connect:'.mysql_error());
mysql_select_db("deepl541_lamp2", $con) or die('Could not select database.');

$fetch = mysql_query("SELECT * FROM Location");


while($row = mysql_fetch_array($fetch)) {
echo '<option value="'. $row[1] .'">'.$row[0].'</option>';
}
echo "</select>";

       //CLOSE DATABASE CONNECTION
       mysql_close($con);

?>
<br><br>

Title: <input type="text" name="title" size="100">
<br><br>
Price: <input type="text" name="price" size="8">
<br><br>

Description:
<br>
<textarea name="description" rows="10" cols="60">
</textarea>
<br><br>

Email: <input type="email" name="email" size="45">
<br><br>
Confirm Email: <input type="email" name="confirm_email" size="45" autocomplete="off">
<br><br>

<input type="checkbox" name="agree" value="agree"> I agree with terms and conditions<br>
<br><br>

Image 1 (max size 5M)<input type="file" name="fileToUpload1" id="fileToUpload1">
<br>
Image 2 (max size 5M)<input type="file" name="fileToUpload2" id="fileToUpload2">
<br>
Image 3 (max size 5M)<input type="file" name="fileToUpload3" id="fileToUpload3">
<br>
Image 4 (max size 5M)<input type="file" name="fileToUpload4" id="fileToUpload4">
<br>
<br>
<input type="submit"><input type="reset">
</form>



</body>
<?php

}
else{
echo "Please, login to see this page.";
echo "<br>";

}
require('footer.php');

?>

</html>