<?php
session_start();
ob_start();
?>

<!DOCTYPE html>
<html>
<head>
  <title>New Location</title>
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
  $location = htmlspecialchars($_POST["location"]);
  

$regex = "/^[a-zA-Z.]{3,255}$/"; 
if (preg_match($regex, $location) === 1) {
    echo '<div class="error">Location must be between 3 and 255</div>';
   
}else{

$con = mysql_connect($server, $username, $password) or die ("Could not connect: " . mysql_error());
mysql_select_db($database, $con);

//echo "Category: " .  $category;
//echo "subcategory: " .  $subcategory;


         $sql = "INSERT INTO Location (Region_ID, LocationName) VALUES ('$region', '$location')";
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



<form action="new_location.php" method="post">
Choose Region: <select name="region">
<?php
$con = mysql_connect($server,$username,$password) or die('Could not connect:'.mysql_error());
mysql_select_db($database, $con) or die('Could not select database.');

$result = mysql_query("SELECT * FROM Region");


while($row = mysql_fetch_array($result)) {
echo '<option   value="'.$row[1].'">'.$row[0].'</option>';
}
echo "</select>";
echo "<br>";

?>
New Location: <input type="text" name="location" size="50">
<br><br>
<input type="submit">
</form>


<?php


////////////////////////////////////////////////////////////////////////////////////////////////
// TABLE WITH LISTING
echo "<br>";
echo "<br>";
echo "<br>";



$con = mysql_connect($servername,$username,$password) or die('Could not connect:'.mysql_error());
mysql_select_db($database, $con) or die('Could not select database.');

$result = mysql_query("SELECT * FROM Location");

echo '<table class="table">';
echo "<tr>";
echo "<th>Location</th>";
echo "<th>Region</th>";


echo "</tr>";
while($row = mysql_fetch_array($result)) {
echo "<tr>";
echo "<td>". $row[0] . "</td>";
         
         //NOW GETTING REGION
         $result1 = mysql_query("SELECT RegionName FROM Region WHERE Region_ID = " . $row[2] . " LIMIT 1");
         while($row1 = mysql_fetch_array($result1)) {
         echo "<td>". $row1[0] . "</td>";
         }

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