        <?php 
        require_once 'session_start.php';
        $title="login with your correct user name and password";
        include 'header.php';
        ?>
        <?php
        include 'main_header.php';
        ?>
        
        <?php
        
        if (isset($_POST['login'])){
            $user_name=  htmlentities($_POST['user_name']);
            $pass=  htmlentities($_POST['pass']);
            $password= sha1($pass);
            $query=" SELECT * FROM registered_users WHERE user_name = '{$user_name}' ";
            $result=  mysqli_query($link, $query);
            if (mysqli_num_rows($result)>0){
                
                $query="SELECT * FROM registered_users WHERE user_name= '{$user_name}' AND active=1 ";
                $result=  mysqli_query($link, $query);
                if (mysqli_num_rows($result)==1){
                
            
            $query=" SELECT * FROM registered_users WHERE user_name = '{$user_name}' AND pass = '{$password}' ";
            $result = mysqli_query($link, $query) or die(mysqli_error($link));
            
            if (mysqli_num_rows($result)==1){
                $fetch = mysqli_fetch_array($result);
                $_SESSION['user_id'] = $fetch['user_id'];
                $_SESSION['pass'] = $fetch['pass'];
                $_SESSION['user_name'] =$fetch['user_name'];
                $_SESSION['enrol_id'] =$fetch['enrol_id'];
                $_SESSION['course'] =$fetch['course'];
                $_SESSION['subject'] =$fetch['subject'];
                $_SESSION['first_name'] =$fetch['first_name'];
                $_SESSION['last_name'] = $fetch['last_name'];
                $_SESSION['email'] = $fetch['email'];
                $_SESSION['mobile'] = $fetch['mobile'];
                $_SESSION['father_name'] = $fetch['father_name'];
                $_SESSION['mother_name'] = $fetch['mother_name'];
                $_SESSION['add1'] = $fetch['add1'];
                $_SESSION['city'] = $fetch['city'];
                $_SESSION['state'] = $fetch['state'];
                $_SESSION['pin'] = $fetch['pin'];
                $_SESSION['doa'] = $fetch['doa'];
                $_SESSION['course_length'] = $fetch['course_length'];
                
                
                
                
                
                redirect_to("profile.php");
            }
            
                
            
         else {
             $error="username and password does not match";
             redirect_to("login.php?error=$error");

                }
                
         }
 else {
     $error="You have not activate your account yet.Please click the activation link you have received after registration.";
     redirect_to("login.php?error=$error");
 }
       }
     else {
              $error="User with email:$email does not exist.";
              redirect_to("login.php?error=$error");
           }
            
        }
        else{
            
        }
        ?>

        <div id="login_box">
            
            <fieldset class="fieldset">
                <legend class="middle">Enter Your Login Details</legend>
                <form action="login.php" method="post">
                <label>User Name</label>
                <input type="text" placeholder="User Name" name="user_name" required>
                <label>Password</label>
                <input type="password" placeholder="User Name" name="pass" required>
                <input type="submit" value="login" name="login">
                </form>
                
            </fieldset>
            
        </div>
        
   <?php        include 'footer.php'; ?>     
  
