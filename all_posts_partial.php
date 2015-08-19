<?php

// CREATE TABLE /////////////////////////////////////////////////////////////////////////////////////////////////////////
$con = mysql_connect($servername,$username,$password) or die('Could not connect:'.mysql_error());
mysql_select_db($database, $con) or die('Could not select database.');

$result = mysql_query("SELECT * FROM Posts");

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

echo "</tr>";
while($row = mysql_fetch_array($result)) {
echo "<tr>";
echo "<td><a href='single_post.php?id=". $row[0] . "'>" . $row[1] . "</a></td>";
//echo "<td>". $row[1] . "</td>";//
echo "<td>". $row[2] . "</td>";

  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // GETTING LOCATION AND REGION
  $result2 = mysql_query("SELECT * FROM Location WHERE Location_ID = " . $row[12] ." LIMIT 1");
  while($row2 = mysql_fetch_array($result2)) {
      echo "<td><a href='single_location.php?id=". $row[12] . "&location=" . $row2[0] ."'>" . $row2[0] . "</a></td>";
      $region = $row2[2];
   }
      // GETTING REGION
      $result21 = mysql_query("SELECT * FROM Region WHERE Region_ID = " . $region ." LIMIT 1");
          while($row21 = mysql_fetch_array($result21)) {
            echo "<td><a href='single_region.php?id=". $region . "&region=" . $row21[0]."'>" . $row21[0] . "</a></td>";
         }


  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // GETTING CATEGORY AND SUBCATEGORY
  $result3 = mysql_query("SELECT * FROM SubCategory WHERE SubCategory_ID = " . $row[11] ." LIMIT 1");
  while($row3 = mysql_fetch_array($result3)) {
      echo "<td><a href='single_subcategory.php?id=". $row[11] . "&subcategory=" . $row3[0] ."'>" . $row3[0] . "</a></td>";
      $category = $row3[2];
   }
      // GETTING CATEGORY
      $result31 = mysql_query("SELECT * FROM Category WHERE Category_ID = " . $category ." LIMIT 1");
          while($row31 = mysql_fetch_array($result31)) {
            echo "<td><a href='single_category.php?id=". $category . "&category=" . $row31[0] ."'>" . $row31[0] . "</a></td>";
         }


echo "<td>". $row[3] . "</td>";
if ($row[7] <> ""){
    echo "<td><div class='col-xs-6 col-md-3'><img src='uploads/". $row[7] . "'/></div></td>";
}
else
{
   echo "<td></td>";
}

if ($row[8] <> ""){
    echo "<td><div class='col-xs-6 col-md-3'><img src='uploads/". $row[8] . "'/></div></td>";
}
else
{
   echo "<td></td>";
}

if ($row[9] <> ""){
    echo "<td><div class='col-xs-6 col-md-3'><img src='uploads/". $row[9] . "'/></div></td>";
}
else
{
   echo "<td></td>";
}

if ($row[10] <> ""){
    echo "<td><div class='col-xs-6 col-md-3'><img src='uploads/". $row[10] . "'/></div></td>";
}
else
{
   echo "<td></td>";
}

echo "</tr>";


}

echo '</table>';

mysql_close($con);

?>