<?php
session_start();
ob_start();
?>

<!DOCTYPE html>
<html>
<head>
  <title>New Region</title>
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

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $region = htmlspecialchars($_POST["region"]);
  

$regex = "/^[a-zA-Z.]{3,255}$/"; 
if (preg_match($regex, $region) === 1) {
    echo '<div class="error">Region must be between 3 and 255</div>';
   
}else{

$con = mysql_connect($server, $username, $password) or die ("Could not connect: " . mysql_error());
mysql_select_db($database, $con);


         $sql = "INSERT INTO Region (RegionName) VALUES ('$region')";
         $result = mysql_query($sql) or die ("Query error: " . mysql_error());
         
         
//echo $result;
if ($result == 1) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysql_close($con);
}
}

?>



<form action="new_region.php" method="post">
New Region: <input type="text" name="region" size="50">
<br><br>
<input type="submit">
</form>


<?php

// TABLE WITH LISTING
echo "<br>";
echo "<br>";
echo "<br>";



$con = mysql_connect($servername,$username,$password) or die('Could not connect:'.mysql_error());
mysql_select_db($database, $con) or die('Could not select database.');

$result = mysql_query("SELECT * FROM Region");

echo '<table class="table">';
echo "<tr>";
echo "<th>Locations</th>";


echo "</tr>";
while($row = mysql_fetch_array($result)) {
echo "<tr>";
echo "<td>". $row[0] . "</td>";
echo "</tr>";


}

echo '</table>';

mysql_close($con);

?>

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