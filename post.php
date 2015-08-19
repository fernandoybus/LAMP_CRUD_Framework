<head>
  <title>PROCESSING FORM</title>
<style>
  
 
</style>

<?php 


require('header.php');


//detect error
$error = 0;


if ($_SERVER["REQUEST_METHOD"] == "POST") {


  $post = new Post();
  
  
  $post->setSub_Category(htmlspecialchars($_POST["sub_category"]));
  $post->setLocation(htmlspecialchars($_POST["location"]));
  $post->setTitle(htmlspecialchars($_POST["title"]));
  $post->setPrice(htmlspecialchars($_POST["price"]));
  $post->setDescription(htmlspecialchars($_POST["description"]));
  $post->setEmail(htmlspecialchars($_POST["email"]));
  $post->setConfirm_Email(htmlspecialchars($_POST["confirm_email"]));
  $post->setAgree(htmlspecialchars($_POST["agree"]));
  $post->setImage1(htmlspecialchars($_POST["fileToUpload1"]));
  $post->setImage2(htmlspecialchars($_POST["fileToUpload2"]));
  $post->setImage3(htmlspecialchars($_POST["fileToUpload3"]));
  $post->setImage4(htmlspecialchars($_POST["fileToUpload4"]));



  //$sub_category = htmlspecialchars($_POST["sub_category"]);
  //$location = htmlspecialchars($_POST["location"]);
  //$title = htmlspecialchars($_POST["title"]);
  //$price = htmlspecialchars($_POST["price"]);
  //$description = htmlspecialchars($_POST["description"]);
  //$email = htmlspecialchars($_POST["email"]);
  //$confirm_email = htmlspecialchars($_POST["confirm_email"]);
  //$agree = htmlspecialchars($_POST["agree"]);
  //$fileToUpload1 = htmlspecialchars($_POST["fileToUpload1"]);
  //$fileToUpload2 = htmlspecialchars($_POST["fileToUpload2"]);
  //$fileToUpload3 = htmlspecialchars($_POST["fileToUpload3"]);
  //$fileToUpload4 = htmlspecialchars($_POST["fileToUpload4"]);
  //$file1 = $_FILES["fileToUpload1"]["name"];
  //$file2 = $_FILES["fileToUpload2"]["name"];
  //$file3 = $_FILES["fileToUpload3"]["name"];
  //$file4 = $_FILES["fileToUpload4"]["name"];
  
}






if ($post->getSub_Category() != ""){
    echo "SubCategory: " . $post->getSub_Category();
    $subcategory = $post->getSub_Category();

}
else{
    echo "No SubCategory selected.";
    $error =1;
}

//////////////////////////////////////////////////////////////////////////////////////////////////
echo "<br>";
if ($post->getLocation() != ""){
    echo "Location: " . $post->getLocation();
    $location = $post->getLocation();

}
else{
    echo "<div class='error'>No Location selected.</div>";
    $error =1;
}

//////////////////////////////////////////////////////////////////////////////////////////////////
echo "<br>";
if ($post->getTitle() != ""){
    echo "Title: " . $post->getTitle();
    $title = $post->getTitle();
}
else{
    echo "<div class='error'>No Title selected.</div>";
    $error =1;
}



$regex = "/^[a-zA-Z.]{2,255}$/"; 
echo "<br>";
if (preg_match($regex, $title) === 1) {
    echo '<div class="error">Title must be between 2 and 255</div>';
    $error =1;
}


//////////////////////////////////////////////////////////////////////////////////////////////////
echo "<br>";
if ($post->getPrice() != ""){
    echo "Price: " . $post->getPrice();
}
else{
    echo '<div class="error">No Price entered.</div>';
    $error =1;
}
$regex = "/^[0-9]*(\.)?[0-9]+$/"; 
echo "<br>";
if (preg_match($regex, $post->getPrice()) === 1) {
    echo "Price is valid";
    $price = htmlspecialchars($_POST["price"]);
}
else{
    echo "<div class='error'>Price is not valid</div>";
}
echo "<br>";


//////////////////////////////////////////////////////////////////////////////////////////////////
echo "<br>";
if ($post->getDescription() != ""){
    echo "Description: " . $post->getDescription();
    $description = htmlspecialchars($_POST["description"]);
}
else{
    echo '<div class="error">No Description entered.</div>';
    $error =1;
}

$regex = "/^[a-zA-Z.]{3,500}$/"; 
echo "<br>";
if (preg_match($regex, $description) === 1) {
    echo '<div class="error">Description must be between 3 and 50</div>';
    $error =1;
}


//////////////////////////////////////////////////////////////////////////////////////////////////
echo "<br>";
if ($post->getEmail() != ""){
    echo "Email: " . $post->getEmail();
}
else{
    echo '<div class="error">No Email entered.</div>';
    $error =1;
}

echo "<br>";

$regex = "/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+$/"; 

if (preg_match($regex, $post->getEmail()) === 1) {
    echo "Email is valid";
}
else{
    echo '<div class="error">Email is not valid</div>';
}
echo "<br>";

if ($post->getConfirm_Email() != ""){
    echo "Email Confirmation: " . $post->getConfirm_Email();
}
else{
    echo '<div class="error">No Confirm email entered.</div>';
    $error =1;
}
echo "<br>";
if (preg_match($regex, $post->getConfirm_Email()) === 1) {
    echo "Email confirmation is valid";
}
else{
    echo '<div class="error">Email confirmation is not valid</div>';
}
echo "<br>";



if (strcmp($post->getConfirm_Email(), $post->getEmail())==0){
   echo "Emails confirmed";
   $email = htmlspecialchars($_POST["email"]);
}
else{
   echo "<div class='error'>Emails don't match</div>";
   $error =1;
}


//////////////////////////////////////////////////////////////////////////////////////////////////
echo "<br>";
echo $post->getAgree();
if ($post->getAgree() === "agree"){
   echo "Agreed: yes ";
   $agree = 1;
}
else{
    echo '<div class="error">No Confirm agreement entered.</div>';
    $error =1;
    $agree = 0;
}
echo "<br>";




if ($error <> 1){
//////////////////////////////////////////////////////////////////////////////////////////////////
//PREPARE TO SAVE IMAGE 1 

$fileToUpload1 = $post->getImage1();
$file = upload_image_function("fileToUpload1");



//////////////////////////////////////////////////////////////////////////////////////////////////
echo "<br>";
//PREPARE TO SAVE IMAGE 2

$fileToUpload2 = $post->getImage2();
$file2 = upload_image_function("fileToUpload2");

//////////////////////////////////////////////////////////////////////////////////////////////////
echo "<br>";
//PREPARE TO SAVE IMAGE 3

$fileToUpload3 = $post->getImage3();
$file3 = upload_image_function("fileToUpload3");


//////////////////////////////////////////////////////////////////////////////////////////////////
echo "<br>";
//PREPARE TO SAVE IMAGE 4

$fileToUpload4 = $post->getImage4();
$file4 = upload_image_function("fileToUpload4");


//////////////////////////////////////////////////////////////////////////////////////////////////

}

//////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////




echo "<br>";
echo "<br>";

echo "<br>";
echo "<br>";





// SAVING TO THE DATABASE
if ($error ==0){
       // if error =0, we can save on database

	$con = mysql_connect($server, $username, $password) or die ("Could not connect: " . mysql_error());
	mysql_select_db($database, $con);
         $sql = "INSERT INTO Posts (Title, Price, Description, Email, Agreement, Image_1, Image_2, Image_3, Image_4, SubCategory_ID, Location_ID ) VALUES('$title', '$price', '$description', '$email', '$agree', '$file', '$file2', '$file3', '$file4', '$subcategory', '$location' )";
         $result = mysql_query($sql) or die ("Query error: " . mysql_error());

mysql_close($con);

       echo "Data Saved";
       echo "<br>";
       echo '<a href="new_post.php">Go back to submit another one.</a>';


       // CALL TO PARTIALS - DISPLAY ALL POSTS
       require('all_posts_partial.php');



}
else{
   echo '<a href="new_post.php">Form with errors. Go back to the form</a>';
}



//FOOTER////////////////////////
require('footer.php');



?>