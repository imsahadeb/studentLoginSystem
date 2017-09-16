<?php
$title="Request to add your enrollment id";
include 'header.php';
include 'main_header.php';
?>

<?php
if (isset($_POST['request'])){
    $enroll_id=  htmlentities($_POST['enroll_id']);
    $email= htmlentities($_POST['email']);
    $name=  htmlentities($_POST['name']);
    $to = "mymail.sahadeb@gmail.com";
    $headers = "From: sahadeb.com";
    $subject = "Request to add Enrollment Id:$enroll_id from:$name";
    $message_body=" $name has requested to add Enrollment Id:$enroll_id. Please verify it.";
    if (mail( $to, $subject, $message_body ,$headers)){
        $to=$email;
        $subject="Confirmation mail:Request to add Enrollment id:$enroll_id";
        $message_body="Hello, $name you have received this mail because you have requested to add your Enrollment Id "
                . "in online portal of Seacom Skills University. You will receive another confirmation mail "
                . "within 24 hours regarding status of your request"
                . "after we verify your enrollment id.'</br>'."
                . "This is System generated mail, please do not replay on this mail.";
        $headers="From: sahadeb.com";
        if (mail($to,$subject,$message_body, $headers)){
        $success="Your request successfully submited. A confirmation mail has been sent to your mail id $email ";
        redirect_to("success.php?success=$success");
        }
    }
    
}
else {
    
}
?>
<div id="login_box">
            
            <fieldset class="fieldset">
                <legend class="middle">Request To Add Enrollment Id</legend>
                <form action="request_to_add.php" method="post">
                <label>Name</label>
                <input type="text" class="cap" placeholder="Your Name" required=""  name="name">
                <label>Email Id</label>
                <label>Enrollment Id</label>
                <input type="text" class="up" placeholder="Enrollment Id" required=""  name="enroll_id">
                <label>Email Id</label>
                <input type="email" class="low" placeholder="Email Id" required=""  name="email">
                <input type="submit" value="Request" name="request">
                </form>
                
            </fieldset>
            
  </div>
<?php include 'footer.php'; ?>
