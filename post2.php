<?php
$from=$_POST['from'];
$to=$_POST['to'];
$datetime=$_POST['datetime'];
$carbrand=$_POST['carbrand'];
$passengers=$_POST['passengers'];
$price=$_POST['price'];
$phone=$_POST['phone'];

$conn= mysqli_connect("localhost", "root","","carpooldb") or die (mysqli_error());
$msg_erreur = "Error! The following fields must be filled in :";
$message = $msg_erreur;

if (empty($from))
  $message .= "your from<br/>";
if (empty($to))
  $message .= "your last name<br/>";
if (empty($datetime))
  $message .= "your datetime<br/>";
if (empty($carbrand))
  $message .= "your password<br/>";
if (empty($passengers))
  $message .= "your passengers<br/>";
if (empty($price))
  $message .= "your price<br/>";
if (empty($phone))
  $message .= "your phone<br/>";

if (strlen($message) > strlen($msg_erreur)) {
header('location: post2.html');
}
else{
$req="UPDATE driver
SET from='$from', to='$to', datetime='$datetime',carbrand='$carbrand', passengers='$passengers', price='$price', phone= '$phone'
WHERE (SELECT firstname FROM driver WHERE is_null(from));";

$res=mysqli_query($conn,$req); 
}
$conn->close();
?>