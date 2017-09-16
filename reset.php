<?php
$title= "Reset password";
include 'header.php';
include 'main_header.php';
?>

<?php
if (isset($_POST['reset'])){
    $enroll_id=  htmlentities($_POST['enroll_id']);
    $email=  htmlentities($_POST['email']);
    
    $query="SELECT * FROM registered_users WHERE enrol_id='{$enroll_id}' ";
    $result = mysqli_query($link, $query);
    if (mysqli_num_rows($result)==1){
        $query="SELECT * FROM registered_users WHERE enrol_id='{$enroll_id}' AND email='{$email}' ";
        $result=  mysqli_query($link, $query);
        if (mysqli_num_rows($result)==1){
           $fetch=  mysqli_fetch_array($result);
           $hashed_value=$fetch['hash_value'];
           $first_name=$fetch['first_name'];
           //reset link
              $to      = $email;
              $headers = "From: sahadeb.com";
              $subject = 'Reset Password ( sahadeb.com) ';

              $message_body=" Hello, $first_name,
                   You have requested to reset your password.

                   please click the below link to reset your password
                   https://www.seacomskillsuniversity.com/verifyme.php?email=$email&hash=$hashed_value&reason=reset";

                    if (mail( $to, $subject, $message_body ,$headers)){
                    $success="From successfully submited. A confirmation mail has been send to your mail id $email ";
                    redirect_to("success.php?success=$success");
                    }
         else {

             }
 
          }
 else {
     $error="Combination of email:$email and enrollment id:$enroll_id does not match.";
     redirect_to("reset.php?error=$error");
 }
    }
 else {
       $error="Enrollment Id:$enroll_id have not registered yet.";
       redirect_to("reset.php?error=$error");
    }
}
?>

 <div id="login_box">
            
            <fieldset class="fieldset">
                <legend class="middle">Reset Your Password</legend>
                <form action="reset.php" method="post">
                <label>Enrollment Id</label>
                <input type="text" placeholder="Enrollment Id" required=""  name="enroll_id">
                <label>Email Id</label>
                <input type="email" placeholder="Email Id" required=""  name="email">
                <input type="submit" value="Get Password reset Link" name="reset">
                </form>
                
            </fieldset>
            
  </div>

<?php include'footer.php'; ?>
