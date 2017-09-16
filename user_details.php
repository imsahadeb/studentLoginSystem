<?php include 'session_start.php'; ?>
<?php $title=$_GET['first_name']."'s profile"?>
<?php include 'header.php'; ?>
<?php include 'main_header.php'; ?>
<?php confirm_logged_in_as_admin() ?>
<div id="profile">
    <fieldset class="fieldset">
        <legend class="middle"></legend>
        <div id="box" class="left">
            <div id="info_box">
            <label>User Id: <text><?php echo $_GET['user_id']; ?></text></label>
            </div>
            <div id="info_box">
            <label>User Name:<text class="low"><?php echo $_GET['user_name']; ?></text></label>
            </div>
            
            <div id="info_box">
            <label>Enrollment Id:<text class="up"><?php echo $_GET['enrol_id']; ?></text></label>
            </div>
            <div id="info_box">
            <label>Course:<text class="cap"><?php echo $_GET['course']; ?></text></label>
            </div>
            <div id="info_box">
            <label>Department:<text class="cap"><?php echo $_GET['subject']; ?></text></label>
            </div>
            <div id="info_box">
            <label>Course Length:<text class="cap"><?php echo $_GET['course_length']; ?> Year's</text></label>
            </div>
            <div id="info_box">
            <label>Date Of Admission:<text class="up"><?php echo $_GET['doa']; ?></text></label>
            </div>
            
            
            
        </div>
        <div id="box" class="right">
            <div id="info_box">
           <label>Name:<text class="cap"><?php echo $_GET['first_name']." ".$_GET['last_name']; ?></text></label>
            </div>
            <div id="info_box">
           <label>Gender:<text class="cap"><?php echo $_GET['gender']; ?></text></label>
            </div>
            <div id="info_box">
              
           <label>Father Name:<text class="cap"><?php echo $_GET['father_name']; ?></text></label>
            </div>
            <div id="info_box">
           <label>Mother Name:<text class="cap"><?php echo $_GET['mother_name']; ?></text></label>
            </div>
            <div id="info_box">
           <label>Mobile Number:<text class="low"><?php echo $_GET['mobile']; ?></text></label>
            </div>
            <div id="info_box">
           <label>mail Id:<text class="low"><?php echo $_GET['email']; ?></text></label>
            </div>
            <div id="info_box">
           <label>Address:<text class="cap"><?php echo $_GET['add1']; ?></text></label>
            </div>
            <div id="info_box">
           <label>City:<text class="cap"><?php echo $_GET['city']; ?></text></label>
            </div>
            <div id="info_box">
           <label>State Name:<text class="cap"><?php echo $_GET['state']; ?></text></label>
            </div>
            <div id="info_box">
           <label>Pin:<text class="low"><?php echo $_GET['pin']; ?></text></label>
            </div>
        </div>
    </fieldset>
</div>
<?php include 'footer.php'; ?>
