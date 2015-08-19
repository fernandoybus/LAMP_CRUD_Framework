<?php
session_start();
ob_start();
?>

<!DOCTYPE html>
<html>
<head>
  <title>New SubCategory</title>
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
  $category = htmlspecialchars($_POST["category"]);
  $subcategory = htmlspecialchars($_POST["subcategory"]);
  
$regex = "/^[a-zA-Z.]{3,255}$/"; 
echo "<br>";
if (preg_match($regex, $subcategory) === 1) {
    echo '<div class="error">Subcategory must be between 3 and 255</div>';
   
}else{

$con = mysql_connect($server, $username, $password) or die ("Could not connect: " . mysql_error());
mysql_select_db($database, $con);

//echo "Category: " .  $category;
//echo "subcategory: " .  $subcategory;


         $sql = "INSERT INTO SubCategory (Category_ID, SubCategoryName) VALUES ('$category', '$subcategory')";
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



<form action="new_subcategory.php" method="post">

Choose Category: <select name="category">
<?php
$con = mysql_connect($servername,$username,$password) or die('Could not connect:'.mysql_error());
mysql_select_db($database, $con) or die('Could not select database.');

$result = mysql_query("SELECT * FROM Category");


while($row = mysql_fetch_array($result)) {
echo '<option   value="'.$row[1].'">'.$row[0].'</option>';
}
echo "</select>";

echo "<br>";

?>

New Subcategory: <input type="text" name="subcategory" size="50">
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

$result = mysql_query("SELECT * FROM SubCategory");

echo '<table class="table">';
echo "<tr>";
echo "<th>Subcategory</th>";
echo "<th>Category</th>";


echo "</tr>";
while($row = mysql_fetch_array($result)) {
echo "<tr>";
echo "<td>". $row[0] . "</td>";
         //NOW GETTING CATEGORY
         $result1 = mysql_query("SELECT CategoryName FROM Category WHERE Category_ID = " . $row[2] . " LIMIT 1");
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