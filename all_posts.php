<?php
session_start();
ob_start();
?>


<head>
  <title>ALL POSTS</title>

</head>


<?php

require('header.php');

// SHOW PAGE IF USER IS LOGGED IN ////////////////////////////////////////////////////////////////////////////////////////
if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['username1']))
{

?>






<h1>All POSTS</h1>



<?php
// CALL TO PARTIALS - DISPLAY ALL POSTS
require('all_posts_partial.php');


?>



<?php

}
//CASE USER IS NOT LOGGED IN /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
else{
echo "Please, login to see this page.";
echo "<br>";

}
require('footer.php');

?>

</html>