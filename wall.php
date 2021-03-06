<!DOCTYPE html>
<html>
<head>
	<title>Form generator</title>
	<link rel="stylesheet" href="login.css">
</head>
<body background="https://st.depositphotos.com/1596326/2653/v/950/depositphotos_26532107-stock-illustration-seamless-rich-floral-background.jpg">

<div style="background-color:black; color:white; top:0px;">
<p><h1>Welcome <?php session_start(); echo $_SESSION['user'];?> to the Form-Generator</h1></p>


<?php
require_once('config.php');

// Create connection for database
$conn = new mysqli($servername, $username, $password);
// Check connection for database
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Create database
$sql = "CREATE DATABASE wallDB;";
$dbname="wallDB";
if ($conn->query($sql) === TRUE) { 

// Create connection for table
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection for table
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//create table
   $sql1="create table myUsers (id int(5) auto_increment primary key,name varchar(20) not null,password varchar(45) not null,uniqueID int(15) unsigned);";
    if ($conn->query($sql1) === FALSE) 
	echo "error creating table myUsers";

    $sql2="create table forms (form_id int(15),field_name varchar(20) not null,field_type varchar(10) not null);";
    if ($conn->query($sql2) === FALSE) 
	echo "error creating table forms";

    $sqle="create table user_forms (userId int(5) not null, formId int(15) not null, form_name varchar(20),form_desc varchar(40), date int(2),month int(2),year int(4));";
        if ($conn->query($sqle) === FALSE) 
  echo "error creating table user_forms";

     $sql3="create table responses (id int(10) auto_increment primary key,form_id int(15) unsigned,field_name varchar(20) not null,field_input varchar(20) not null);";
    if ($conn->query($sql3) === FALSE) 
	echo "error creating table responses";
}
?>
</div>

<br>
<article><h2>Forms</h2>
<h3><p>Forms can be a lot of help when you need to cunduct surveys or get the general opinion of a huge crowd of people. Form-Generators make it easier to create forms and collect the responses for your analysis.</p></h3></article>

<br>
<!-- Button to open the modal login form -->
<center><button onclick="document.getElementById('id01').style.display='block'" style="height:27px;width:10%;align:'right';">Login</button>
	<!-- Button to open the modal login form -->
<button onclick="document.getElementById('id02').style.display='block'" style="height:27px;width:10%;right:'0px';">Sign up</button></center>

<br>
<article><h2>Have an account?</h2>
<h3><p>Click the Login button to create forms. </p>
	<h2>Don't have an account?</h2>
<h3><p>Click the Sign up button to create an account and then login.<p></h3></article>

<!-- The Login Modal -->
<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" 
class="close" title="Close Modal">&times;</span>

<form class="modal-content animate" action="login.php" method="post">
  <div class="imgcontainer">
    <img src="https://tse1.mm.bing.net/th?id=OIP.GqIjTJaOCVoVTD_TaIErnwHaIJ&pid=Api&P=0&w=300&h=300" alt="Avatar" class="avatar">
  </div>
  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>
    <br>
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
    <br>
<?php
session_start();
   $rand=rand();
   $_SESSION['rand']=$rand;

  ?>
<input type="hidden" value="<?php echo $rand; ?>" name="randcheck" />
    <button type="submit" name="submitbtn" style="height:35px;width:80%;">Login</button>
    <br>
<p id="pd"></p>
  </div>

</form>
</div>
<!-- -->

<!-- The Sign up Modal2 -->
<div id="id02" class="modal">
  <span onclick="document.getElementById('id02').style.display='none'" 
class="close" title="Close Modal">&times;</span>
<form class="modal-content animate" action="addlogin.php" method="post">
  <div class="imgcontainer">
    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTiJtBGGbC_GpE-XWFW3AT0h6Yph2XQlyNrRvBTyBnaBBJECG0T" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label for="Nuname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="Nuname" required>
    <br>
    <label for="Npsw1"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="Npsw1" required>
    <br>
     <label for="Npsw2"><b>Confirm Password</b></label>
    <input type="password" placeholder="Re-Enter Password" name="Npsw2" required>
    <br>
    <button type="submit" style="height:27px;width:100%">Login</button>
    <br>
  </div>
</form>
<!-- -->
</body>
</html>
