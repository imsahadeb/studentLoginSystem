<?php
require_once 'session_start.php';
include 'header.php';
include 'main_header.php';
?>

<?php
if (isset($_POST['delete'])){
    
    $confirm_enroll_id=$_SESSION['enid'];
    //Query to delete from registered_users table
    $query = "DELETE FROM registered_users WHERE enrol_id = '{$confirm_enroll_id}' ";
    $result0= mysqli_query($link, $query);
    
    if ($result0){
        
     
    //Query to delete from enrolment_id Tables
    $query1 = "DELETE FROM enrolment_id WHERE enrol_id = '{$confirm_enroll_id}' ";
    $result1= mysqli_query($link, $query1) or die(mysqli_error($link));
    
    if ($result1){
        $succes="Data releted to Enrollment Id: $confirm_enroll_id has been deleted succesfully";
        redirect_to("admin.php?success=$succes");
    }
    
 else {
        $error="Data related to Enrollment Id:$confirm_enroll_id deletion faild!";
        redirect_to("error.php?error=$error");
    }
    
    
    }
 else {
        $error="Data related to Enrollment Id:$confirm_enroll_id deletion faild!";
        redirect_to("admin.php?error=$error");
    }
    
  
    
    
}
else {
    if (isset($_GET['confirm_del_user_id'])){
    
  $enroll_id=  htmlentities($_GET['enrol_id']);
  $_SESSION['enid']=$enroll_id;
    echo "<div id='confrim_delete'>
    <fieldset class='fieldset'>
        <legend class='middle'>Confirm Users Details Before Delete From database</legend>
        <div id='box' class='left'>
            <div id='info_box'>
                <label>
                Name:<text class='cap'>".$_GET['first_name']." ".$_GET['last_name']."</text>
                </label>
            </div>
            <div id='info_box'>
              <label>
               Gender:<text class='cap'>".$_GET['gender']."</text>
            </label>  
            </div>
            <div id='info_box'>
              <label>
                Course:<text class='cap'>".$_GET['course']."</text>
            </label>  
            </div>
            
            
            
            
        </div>
        <div id='box' class='right'>
            <div id='info_box'>
            <label>User Name:<text class='low'>".$_GET['user_name']."</text></label>
            </div>
            <div id='info_box'>
            <label>Enrollment Id:<text class='up'>".$_GET['enrol_id']."</text></label>
            </div>
            <div id='info_box'>
            <label>Subject:<text class='cap'>".$_GET['subject']."</text></label>
            </div>
        </div>
        <form action='confirm_delete.php' method='post'>
        <input type='submit' value='Confirm to Delete ".$_GET['first_name']." ".$_GET['last_name']." Data From Database ' name='delete'>
        </form>
    </fieldset>
</div>
";
}
 else {
    redirect_to("admin.php");
}
}



?>

