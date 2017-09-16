<?php
include 'header.php';

if (isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']))
{
    
    $email = htmlentities($_GET['email']);
    $hash = htmlentities($_GET['hash']);
    $query = "SELECT * FROM registered_users WHERE email='{$email}' AND hash_value = '{$hash}' AND active='0'";
    $result = mysqli_query($link, $query);
    
    if (mysqli_num_rows($result)==0)
    {
        $error="Account has already activated or the URI is ivaild!";
        redirect_to("error.php?error=$error");
    }
    
 else {
    
    $query = "UPDATE registered_users SET active='1' WHERE email='$email'";
    $result=  mysqli_query($link, $query) or die($link);
    $success="Your account  has been activated!";
    redirect_to("login.php?success=$success");

    
 }
}
 else {
    $error="Invaild parameters provided for account verification!";
    redirect_to("error.php?error=$error");
 }

?>
