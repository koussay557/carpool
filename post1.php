<?php
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$pwd=$_POST['pwd'];
$birthday=$_POST['birthday'];
$gender=$_POST['gender'];

$conn= mysqli_connect("localhost", "root","","carpooldb") or die (mysqli_error());
$msg_erreur = "Error! The following fields must be filled in :";
$message = $msg_erreur;

if (empty($firstname))
  $message .= "your firstname<br/>";
if (empty($lastname))
  $message .= "your last name<br/>";
if (empty($email))
  $message .= "your email<br/>";
if (empty($pwd))
  $message .= "your password<br/>";
if (empty($birthday))
  $message .= "your birthday<br/>";
if (empty($gender))
  $message .= "your gender<br/>";

if (strlen($message) > strlen($msg_erreur)) {
header('location: post1.html');
}
else{
$req="INSERT INTO driver (firstname,lastname,email,password,birthday,gender) VALUES ('$firstname','$lastname','$email','$pwd','$birthday','$gender')";

$res=mysqli_query($conn,$req);
header('location:post2.html');
}
$conn->close();
?>