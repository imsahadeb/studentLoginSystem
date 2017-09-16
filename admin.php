<?php
require_once 'session_start.php';
$title="Admin Area";
include 'header.php';
confirm_logged_in_as_admin();
include 'main_header.php';

?>

<?php

if (isset($_POST['add_enroll'])){
    $enroll_id=  htmlentities($_POST['enroll_id']);
    
    $query = " SELECT * FROM enrolment_id WHERE enrol_id = '{$enroll_id}' ";
    $result = mysqli_query($link, $query);
    if(mysqli_num_rows($result)<1){
        $query = "INSERT INTO enrolment_id (
            enrol_id ) VALUES ('$enroll_id')";
        $result = mysqli_query($link, $query);
        if ($result){
            $succes="Enrollment Id: $enroll_id uploaded succesfully";
            redirect_to("admin.php?success=$succes");
        }
    }
 else {
        $error="This Enrollment Id: $enroll_id already present in our database ";
        redirect_to("admin.php?error=$error");
    }
}

elseif (isset ($_POST['view_users'])) {
    $enroll_id= htmlentities($_POST['enroll_id']);
    
    //Check if the enrollent id is available in databases
    $query=" SELECT * FROM enrolment_id WHERE enrol_id = '{$enroll_id}' ";
    $result= mysqli_query($link, $query);
    if (mysqli_num_rows($result)>0){
        $query = "  SELECT * FROM registered_users WHERE enrol_id= '{$enroll_id}' ";
        $result =  mysqli_query($link, $query);
        if (mysqli_num_rows($result)>0){
            $query = "SELECT * FROM registered_users WHERE enrol_id = '{$enroll_id}' ";
            $result = mysqli_query($link, $query);
            
             if (mysqli_num_rows($result)==1){
                  $fetch = mysqli_fetch_array($result);
                  $user_id = $fetch['user_id'];
                  $gender =$fetch['gender'];
                  $user_name =$fetch['user_name'];
                  $enrol_id =$fetch['enrol_id'];
                  $course =$fetch['course'];
                  $subject =$fetch['subject'];
                  $first_name =$fetch['first_name'];
                  $last_name = $fetch['last_name'];
                  $email = $fetch['email'];
                  $mobile = $fetch['mobile'];
                  $father_name = $fetch['father_name'];
                  $mother_name = $fetch['mother_name'];
                  $add1 = $fetch['add1'];
                  $city = $fetch['city'];
                  $state = $fetch['state'];
                  $pin = $fetch['pin'];
                  $doa = $fetch['doa'];
                  $course_length = $fetch['course_length'];
                

                
                redirect_to("user_details.php?view=true&user_id=$user_id&user_name=$user_name&enrol_id=$enrol_id&course=$course"
                        . "&subject=$subject&first_name=$first_name&last_name=$last_name&gender=$gender&email=$email&mobile=$mobile&father_name=$father_name"
                        . "&mother_name=$mother_name&add1=$add1&city=$city&state=$state&pin=$pin&doa=$doa&course_length=$course_length");  
            }
             else {
                 $error="There is smome unknown problem to view data of Student with Enrollment Id $enroll_id right now.";
          redirect_to("admin.php?error=$error");
             }
            
        }
     else {
          $error="Student with Enrollment Id $enroll_id have not registered yet..";
          redirect_to("admin.php?error=$error");
     }
    }
 else {
        $error="Enrollment id:$enroll_id is not in our database.";
        redirect_to("admin.php?error=$error");
    }
}
elseif (isset ($_POST['del_users'])) {
    $enroll_id= htmlentities($_POST['enroll_id']);
    
    //Check if the enrollent id is available in databases
    $query=" SELECT * FROM enrolment_id WHERE enrol_id = '{$enroll_id}' ";
    $result= mysqli_query($link, $query);
    if(mysqli_num_rows($result)>0){
        //Check if user have registered
        $query = "  SELECT * FROM registered_users WHERE enrol_id= '{$enroll_id}' ";
        $result =  mysqli_query($link, $query);
        if (mysqli_num_rows($result)>0){
            $query = "SELECT * FROM registered_users WHERE enrol_id = '{$enroll_id}' ";
            $result = mysqli_query($link, $query);
            
             if (mysqli_num_rows($result)==1){
                $fetch = mysqli_fetch_array($result);
                $user_id = $fetch['user_id'];
                $user_name =$fetch['user_name'];
                $enrol_id =$fetch['enrol_id'];
                $course =$fetch['course'];
                $subject =$fetch['subject'];
                $first_name =$fetch['first_name'];
                $last_name = $fetch['last_name'];
                $gender = $fetch['gender'];

                
                redirect_to("confirm_delete.php?confirm_del_user_id=$user_id&user_name=$user_name&enrol_id=$enrol_id&course=$course"
                        . "&subject=$subject&first_name=$first_name&last_name=$last_name&gender=$gender");  
            }
        }
         else {
        $query="DELETE FROM enrolment_id WHERE enrol_id = '{$enroll_id}' ";
        $result= mysqli_query($link, $query) or die(mysqli_error($link));
        if($result){
         $succes="Enrollment Id: <text class='up' style='color:red'>$enroll_id </text>is not Registered Yet. But was on our database, has been deleted successfully.";
         redirect_to("admin.php?success=$succes");
         }
   
      }
   
     }
 else {
     $error="Enrolment Id: $enroll_id is not in our database...";
     redirect_to("admin.php?error=$error");
     }

}
 else {
    
}

?>



<div id="admin">
    <fieldset class="fieldset">
        <legend class="middle">Administrative Area</legend>
        
        <div id="box" class="left">
            <fieldset class="fieldset">
            <legend class="middle">Add New Administrative Users</legend>
            <button class="add_admin"><a href="add_new_admin_users.php">Add New Administrative User</a></button> 
            </fieldset>
        </div>
        
        
        <div id="box" class="right">
            <fieldset class="fieldset">
            <legend class="middle">View Users Details</legend>
            <form action="admin.php" method="post">
            <label>Enrollment Id</label>
            <input type="text" class="up" required="" name="enroll_id">
            <input type="submit" name="view_users" value="View Student Details">
            </form>
            </fieldset>
        </div>
        
        <div id="box" class="left">
            <fieldset class="fieldset">
                <legend class="middle">Add Enrollment Id</legend>
             <form action="admin.php" method="post">
                 <label>Enrollment Id</label>
                 <input type="text" name="enroll_id" placeholder="Enrollment Id.." class="up">
                 <input type="submit" value="Add Enrollment Id" required="" name="add_enroll">
             </form>
            </fieldset>
        </div>
        <div id="box" class="right">
            <fieldset class="fieldset">
                <legend class="middle">Delete Users</legend>
                <form action="admin.php" method="post">
                 <label>Enrollment Id</label>
                 <input type="text" required="" name="enroll_id" required="" placeholder="Enrollment Id.." class="up">
                 <input type="submit" value="Delete Users" name="del_users">
                </form>
            </fieldset>
            
        </div>
        
    </fieldset>
</div>
<?php include 'footer.php'; ?>
