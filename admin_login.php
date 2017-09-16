        <?php 
        require_once 'session_start.php';
         $title="Login as admin";
        include 'header.php';
        
        ?>
        <?php
        include 'main_header.php';
        ?>
        
        <?php
        
        if (isset($_POST['admin_login'])){
            $user_name=  htmlentities($_POST['admin_user_name']);
            $pass=  htmlentities($_POST['admin_pass']);
            $password= sha1($pass);
            
            $query=" SELECT * FROM admin_users WHERE admin_user_name = '{$user_name}' AND admin_password = '{$password}' ";
            $result = mysqli_query($link, $query) or die(mysqli_error($link));
            
            if (mysqli_num_rows($result)==1){
                $fetch = mysqli_fetch_array($result);
                $_SESSION['admin_user_id'] = $fetch['admin_user_id'];
                $_SESSION['admin_user_name'] =$fetch['admin_user_name'];
                
                $_SESSION['admin_first_name'] =$fetch['admin_first_name'];
                $_SESSION['admin_last_name'] = $fetch['admin_last_name'];
                $_SESSION['admin_email'] = $fetch['admin_email'];
                $_SESSION['admin_mobile'] = $fetch['admin_mobile'];
            
                redirect_to("admin.php");
                
            }
         else {
             $error="username and password does not match";
             redirect_to("admin_login.php?error=$error");

         }
            
        }
        else{
            
        }
        ?>

        
        <div id="login_box">
            
            <fieldset class="fieldset">
                <legend class="middle">Administrative Users Only</legend>
                <form action="admin_login.php" method="post">
                <label>User Name</label>
                <input type="text" placeholder="User Name" required=""  name="admin_user_name">
                <label>Password</label>
                <input type="password" placeholder="User Name" required=""  name="admin_pass">
                <input type="submit" value="Login as Admin" name="admin_login">
                </form>
                
            </fieldset>
            
        </div>
        
        
    <?php        include 'footer.php'; ?>
