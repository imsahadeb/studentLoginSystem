<?php
$title="Add new administrative user";
include 'header.php'; 
?>
<?php include 'main_header.php'; ?>
<?php confirm_logged_in_as_admin(); ?>
<div id="admin">
    <?php
    if(isset($_POST['add_admin_user'])){
        $first_name=  htmlentities($_POST['first_name']);
        $last_name=  htmlentities($_POST['last_name']);
        $email=  htmlentities($_POST['email']);
        $mobile=  htmlentities($_POST['mobile']);
        $gender=  htmlentities($_POST['gender']);
        $user_name=  htmlentities($_POST['user_name']);
        $pass0=  htmlentities($_POST['pass0']);
        $pass1=  htmlentities($_POST['pass1']);
        $pass= sha1($pass1);
        $hashed_value = md5( rand(0,1000));
        
        $query="SELECT * FROM admin_users WHERE admin_user_name ='{$user_name}' ";
        $result = mysqli_query($link, $query);
        if (mysqli_num_rows($result)<1){
            $query=" SELECT * FROM admin_users WHERE admin_email ='{$email}' ";
            $result= mysqli_query($link, $query);
            if(mysqli_num_rows($result)<1){
                $query=" SELECT * FROM admin_users WHERE admin_mobile ='{$mobile}' ";
                $result= mysqli_query($link, $query);
                if (mysqli_num_rows($result)<1){
                    $query="INSERT INTO admin_users (
                        admin_first_name, admin_last_name,gender,admin_email,admin_mobile,admin_user_name,admin_password,hash_value) VALUES (
                        '{$first_name}','{$last_name}','{$gender}','{$email}','{$mobile}','{$user_name}','{$pass}','{$hashed_value}')";
                        $result=  mysqli_query($link, $query);
                        if ($result){
                            //send activation mail
                                      $to = $email;
                                      $headers = "From: sahadeb.com";
                                      $subject = 'Account Verification ( sahadeb.com) ';
                                      $message_body=" Hello, $first_name,
                                               Your account has been created as administrator successsfully.

                                               please click the below link to active your account.Without verification
                                               you can not login our portal.
                                               https://sahadeb.000webhostapp.com/verifyme.php?email=$email.&hash=$hashed_value";

                                                if (mail( $to, $subject, $message_body ,$headers)){
                                                $success="From successfully submited. A confirmation mail has been send to your mail id $email ";
                                                redirect_to("add_new_admin_users.php?success=$success");                                        
                                                }
                                                $success="From successfully submited. A confirmation mail has been send to your mail id $email ";
                                                redirect_to("add_new_admin_users.php?success=$success"); 
 
                                           }
                                         else {
                                             $error="Faild to add new user";
                                             redirect_to("add_new_admin_users.php?error=$error");

                                         }
                                       }
                      
                        
                        
                                else {
                                $error="Mobile Number: $mobile alreday used by othder users.Please user other Mobile Number";
                                redirect_to("add_new_admin_users.php?error=$error");
                                }
               }
         else {
             $error="Email id: $email alreday used by othder users.Please user other email id";
             redirect_to("add_new_admin_users.php?error=$error");

         }
        }
 else {
     $error="user name: $user_name alreday used by othder users.Please user other user name";
     redirect_to("add_new_admin_users.php?error=$error");
 }
    }
 else {
      //Do Nothing  
    }
    ?>
    <?php
    include 'error_pluse_success_shower.php';
    ?>
    
    
 <fieldset class="fieldset">
            <legend class="middle">Add New Administrative User</legend>
            <form action="add_new_admin_users.php" method="post">
            <div id="box" class="left">
                <label>First Name</label>
                <input type="text" class="cap" required="" name="first_name"placeholder="First Name">
                <label>User Name</label>
                <input type="text" class="low" required="" name="user_name" placeholder="User Name">
                <label>Enter Password</label>
                <input type="password" class="low" required="" name="pass0" placeholder="Password">
                <label>Re Enter Password</label>
                <input type="password" class="low" required="" name="pass1" placeholder="Re Type Password">
            </div>
            <div id="box" class="right">
                <label>Last Name</label>
                <input type="text" class="cap" required="" name="last_name" placeholder="Last Name">
                <label>gender</label>
                <input type="text" class="cap"required="" name="gender" placeholder="Gender">
                <label>Mobile Number</label>
                <input type="mobile" class="up"required="" name="mobile" placeholder="Mobile">
                <label>Email Id</label>
                <input type="email" class="lo" required=""name="email" placeholder="Email">
                
            </div>
                <input type="submit" name="add_admin_user" value="Add Administrative User">
            </form>
        </fieldset>
</div>
