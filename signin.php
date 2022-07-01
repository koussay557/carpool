<?php
$email=$_POST['email'];
$pwd=$_POST['pwd'];
$conn= mysqli_connect("localhost", "root","","carpooldb") or die (mysqli_error());

if($email !== "" && $password!== "")
    {
        $requete = "SELECT * FROM driver where 
              email = '".$email."' and password = '".$password."' ";
        $exec_requete = mysqli_query($carpooldb,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
        if($count!=0)
        {
           $_SESSION['email'] = $email;
           header('Location: signin.php');
        }
        else
        {
           header('Location: post2.php?erreur=1'); 
        }
    }
    else
    {
       header('Location: post2.php?erreur=2'); 
    }
else
{
   header('Location: post2.php');
}
$conn->close();
?>