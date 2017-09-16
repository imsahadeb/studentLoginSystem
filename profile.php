<?php 
require_once 'session_start.php';
$title=$_SESSION['first_name']."'s"." "."profile";
include 'header.php';
?>
<?php confirm_logged_in() ?>
<?php include 'main_header.php'; ?>

<div id="profile">
    <fieldset class="fieldset">
        <legend class="middle"></legend>
        <div id="box" class="left">
            <div id="info_box">
            <label>User Id: <text><?php echo $_SESSION['user_id']; ?></text></label>
            </div>
            <div id="info_box">
            <label>User Name:<text class="low"><?php echo $_SESSION['user_name']; ?></text></label>
            </div>
            <div id="info_box">
            <label>Password:<text class="up"><?php echo $_SESSION['pass']; ?></text></label>
            </div>
            <div id="info_box">
            <label>Enrollment Id:<text class="up"><?php echo $_SESSION['enrol_id']; ?></text></label>
            </div>
            <div id="info_box">
            <label>Course:<text class="cap"><?php echo $_SESSION['course']; ?></text></label>
            </div>
            <div id="info_box">
            <label>Department:<text class="cap"><?php echo $_SESSION['subject']; ?></text></label>
            </div>
            <div id="info_box">
            <label>Course Length:<text class="cap"><?php echo $_SESSION['course_length']; ?> Year's</text></label>
            </div>
            <div id="info_box">
            <label>Date Of Admission:<text class="up"><?php echo $_SESSION['doa']; ?></text></label>
            </div>
            
            
            
        </div>
        <div id="box" class="right">
            <div id="info_box">
           <label>Name:<text class="cap"><?php echo $_SESSION['first_name']." ".$_SESSION['last_name']; ?></text></label>
            </div>
            <div id="info_box">
           <label>Father Name:<text class="cap"><?php echo $_SESSION['father_name']; ?></text></label>
            </div>
            <div id="info_box">
           <label>Mother Name:<text class="cap"><?php echo $_SESSION['mother_name']; ?></text></label>
            </div>
            <div id="info_box">
           <label>Mobile Number:<text class="low"><?php echo $_SESSION['mobile']; ?></text></label>
            </div>
            <div id="info_box">
           <label>mail Id:<text class="low"><?php echo $_SESSION['email']; ?></text></label>
            </div>
            <div id="info_box">
           <label>Address:<text class="cap"><?php echo $_SESSION['add1']; ?></text></label>
            </div>
            <div id="info_box">
           <label>City:<text class="cap"><?php echo $_SESSION['city']; ?></text></label>
            </div>
            <div id="info_box">
           <label>State Name:<text class="cap"><?php echo $_SESSION['state']; ?></text></label>
            </div>
            <div id="info_box">
           <label>Pin:<text class="low"><?php echo $_SESSION['pin']; ?></text></label>
            </div>
        </div>
    </fieldset>
</div>

<?php include 'footer.php'; ?>
