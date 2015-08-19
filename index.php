<?php
session_start();
ob_start();
?>

<?php


//CHECK IF USER IS LOGGED IN AND REDIRECT/////////////////////////////////////////////////////////////////////////////////////////////////////////////////


// CHECK COOKIES
$cookie_name = "LAMPFINALPROJECT";
if(!isset($_COOKIE[$cookie_name])) {
    //echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
    //echo "Cookie '" . $cookie_name . "' is set!<br>";
    //echo "<br>";
    //echo "Value is: " . $_COOKIE[$cookie_name];
    $_SESSION['LoggedIn'] = 1;
    $_SESSION['username1'] = $_COOKIE[$cookie_name];

}



// CHECK SESSIONS
//echo $_SESSION['LoggedIn'];
if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['username1']))
{ 

     require('all_posts.php');

}
else {

    require('login.php');  
}

?>