<?php
session_start();
ob_start();
?>

<!DOCTYPE html>
<html>
<head>
  <title>REGION</title>
<style>
  table,th, tr,td {border: #000 1px solid;}
  img {width:150px; height:150px;}
</style>
</head>


<?php

require('header.php');


if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['username1']))
{

?>


<body>



<h1>Showing all for Region <?php echo $_GET["region"]; ?></h1>

<?php

$region_id =$_GET["id"];

if ($region_id <> "") {

$con = mysql_connect($servername,$username,$password) or die('Could not connect:'.mysql_error());
mysql_select_db($database, $con) or die('Could not select database.');


echo '<table class="table table-hover table-bordered">';
echo "<tr>";
echo "<th>Title</th>";
echo "<th>Price</th>";
echo "<th>Location</th>";
echo "<th>Region</th>";
echo "<th>SubCategory</th>";
echo "<th>Category</th>";
echo "<th>Description</th>";
echo "<th>Image1</th>";
echo "<th>Image2</th>";
echo "<th>Image3</th>";
echo "<th>Image4</th>";



// getting LOCATION ID

$result0 = mysql_query("SELECT * FROM Location WHERE Region_ID = " . $region_id);
while($row0 = mysql_fetch_array($result0)) {
    $location_id = $row0[1];



$result = mysql_query("SELECT * FROM Posts WHERE Location_ID = " . $location_id);
echo "</tr>";
while($row = mysql_fetch_array($result)) {
echo "<tr>";
echo "<td><a href='single_post.php?id=". $row[0] . "'>" . $row[1] . "</a></td>";
//echo "<td>". $row[1] . "</td>";//
echo "<td>". $row[2] . "</td>";


  // GETTING LOCATION AND REGION
  $result2 = mysql_query("SELECT * FROM Location WHERE Location_ID = " . $row[12] ." LIMIT 1");
  while($row2 = mysql_fetch_array($result2)) {
      echo "<td>". $row2[0] . "</td>";
      $region = $row2[2];
   }
      // GETTING REGION
      $result21 = mysql_query("SELECT * FROM Region WHERE Region_ID = " . $region ." LIMIT 1");
          while($row21 = mysql_fetch_array($result21)) {
            echo "<td>". $row21[0] . "</td>";
         }


  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // GETTING CATEGORY AND SUBCATEGORY
  $result3 = mysql_query("SELECT * FROM SubCategory WHERE SubCategory_ID = " . $row[11] ." LIMIT 1");
  while($row3 = mysql_fetch_array($result3)) {
      echo "<td>". $row3[0] .  "</td>";
      $category = $row3[2];
   }
      // GETTING CATEGORY
      $result31 = mysql_query("SELECT * FROM Category WHERE Category_ID = " . $category ." LIMIT 1");
          while($row31 = mysql_fetch_array($result31)) {
            echo "<td>". $row31[0] . "</td>";
         }


echo "<td>". $row[3] . "</td>";
if ($row[7] <> ""){
    echo "<td><img src='uploads/". $row[7] . "'/></td>";
}
else{
    echo "<td></td>";
}
if ($row[8] <> ""){
    echo "<td><img src='uploads/". $row[8] . "'/></td>";
}
else{
    echo "<td></td>";
}
if ($row[9] <> ""){
    echo "<td><img src='uploads/". $row[9] . "'/></td>";
}
else{
    echo "<td></td>";
}
if ($row[10] <> ""){
    echo "<td><img src='uploads/". $row[10] . "'/></td>";
}
else{
    echo "<td></td>";
}

echo "</tr>";


}
}

echo '</table>';

echo "<br>";
echo "<br>";


mysql_close($con);


}

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