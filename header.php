<?php
//so sessions can work fine
ob_start();
?>
<!DOCTYPE html>
<html>
<head>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

<!-- Custom CSS Styles -->
<link rel="stylesheet" href="style.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

</head>
<body>


<!-- LOGO//////////////////////////////////////////////////////////////////////////////////////// -->
  <div class="container">
    <div class="navbar-header">
      <a href="./" class="navbar-brand">LAMP FINAL PROJECT</a>
    </div>


<!-- // NAVIGATION///////////////////////////////////////////////////////////////////////////////// -->
<div class="container">
<nav class="collapse navbar-collapse bs-navbar-collapse">
<ul class="nav navbar-nav">

<li><a href="all_posts.php">View All Posts</a></li>
<li><a href="new_post.php">New Post</a></li>
<li><a href="new_region.php">New Region</a></li>
<li><a href="new_location.php">New Location</a></li>
<li><a href="new_category.php">New Category</a></li>
<li><a href="new_subcategory.php">New SubCategory</a></li>

<!-- SPECIAL LINKS WITH HEADERS-->
<?php
if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['username1']))
{
  echo '<li><a href="logout.php">Logout</a></li>';
}
else{
   echo '<li><a href="login.php">Login</a></li>';
   echo '<li><a href="register.php">Register</a></li>';
}
?>
</ul>


</nav>


<?php

echo "<br>";
echo "<hr>";
echo "<br>";


// REQUIRE CONFIGS FOR DATABASE AND FUNCTIONS/////////////////////////////////////////////////////////////////////////////////
require('config.php');
require('functions.php');
?>



