<?php
include 'header.php';
include 'header_main.php';

if (isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']))
{
    $email = htmlentities($_GET['email']);
    $hash = htmlentities($_GET['hash']);
    $query = "SELECT * FROM admin_users WHERE admin_email='{$email}' AND hash_value = '{$hash}' AND admin_active='0'";
    $result = mysqli_query($link, $query);
    
    if (mysqli_num_rows($result)==0)
    {
        $error="Account has already activated or the URI is ivaild!";
        redirect_to("error.php?error=$error");
    }
    
 else {
    $error="Your account  has been activated!";
    
    $query = "UPDATE admin_users SET active='1' WHERE admin_email='$email'";
    $result=  mysqli_query($link, $query) or die($link);
    $success="Account has been activated successfuly. Please login";
    redirect_to("admin_login.php?success=$success");
    
 }
}
 else {
    $error="Invaild parameters provided for account verification!";
    redirect_to("error.php?error=$error");
 }

?>
