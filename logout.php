<?php
require_once 'session_start.php';
$title="Logout from syatem";
include 'header.php';
mysqli_close($link);

                unset($_SESSION['user_id']);
                unset($_SESSION['user_name']);
                unset($_SESSION['enrol_id']);
                unset($_SESSION['course']);
                unset($_SESSION['subject']);
                unset($_SESSION['first_name']);
                unset($_SESSION['last_name']);
                unset($_SESSION['email']);
                unset($_SESSION['mobile']);
                unset($_SESSION['father_name']);
                unset($_SESSION['mother_name']);
                unset($_SESSION['add1']);
                unset($_SESSION['city']);
                unset($_SESSION['state']);
                unset($_SESSION['pin']);
                unset($_SESSION['doa']);
                unset($_SESSION['course_length']);
redirect_to('login.php');
?>
