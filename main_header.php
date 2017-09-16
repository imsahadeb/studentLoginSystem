
<div id="container">
    <div id="header">
    <div id="logo">
        <a href="http://www.seacomskillsuniversity.org"><img src="http://www.seacomskillsuniversity.org/seacomweb/images/ssu.png"></a>
    </div>
        
              <?php 
              
               if(isset($_SESSION['user_name'])){
               $url="profile_pictures/profile".$_SESSION['enrol_id'].".jpg";
               
               echo " <div id='upper-loggedin' class='up-login'>
                <fieldset class='fieldset'>
                <legend class='middle'> ".$_SESSION['first_name']." ".$_SESSION['last_name']."'s Profile</legend>   
                <div id='profile_image' class='right' style='align-content: center'>
                <a href='profile.php' style='font-size: 10px; '> <img src='$url' style='height: 80px; width:80px'></a>
                </div>
             
                <div id='info_box'>
                <label>
                   User Name: <text clase='low'>".$_SESSION['user_name']." </text>
                </label> 
                </div>
                
                <div id='info_box'>
                <label>
                    Enrollment Id: <text class='up'>".$_SESSION['enrol_id']."</text>
                </label>
                </div>
                
                <div id='info_box'>
                <label>
                    Course: <text class='cap'>".$_SESSION['course']."</text>
                </label>
                </div>
                
                <div id='info_box'>
                <label>
                    Department: <text class='cap'>".$_SESSION['subject']."</text>
                </label>
                    <button class='right' id='logout'><a href='logout.php'>Logout</a></button>
                </div>
                
            </fieldset>
          </div>";       
          }
        
         else {
            echo "
            <div id='upper-login' class='up-login'> 
            <fieldset>
                <legend class='middle'>Only for Current Students of University</legend>
            <form action='login.php' method='post'>
                <input class='left' type='text' placeholder='user name' name='user_name' required>
                <input type='password'  placeholder='password' name='pass' required>
                <input type='submit' name='login' value='Login'>
            </form>
                <div id='signup'>
                     <label class='shiftright'>
                        Have Not Register?    
                    </label>
                    <button class='butn1'><a href='student_signup.php'>Register</a></button>
                </div>
                <div id='reset'>
                    <label class='shiftright'>
                        Forgot Password?    
                    </label>
                    <button class='butn2'><a href='reset.php'>Reset</a></button>
                </div>
            </fieldset> 
              </div>
            ";
         }

        ?>
        <div class="clear-fix"></div>
        
    </div>
    
    <div id="nav">
         <ul>
             <li><a class="active" href="index.php">Home</a></li>
              <li><a href="http://www.seacomskillsuniversity.org/admission">Admission</a></li>
              <li><a href="http://www.seacomskillsuniversity.org/seacomweb/pages/fees.php">Fee Structure</a></li>
              <li><a href="http://www.seacomskillsuniversity.org/seacomweb/pages/contact.php">Contact</a></li>
              <li class="right"><?php if (isset($_SESSION['admin_user_id'])){
              echo "<a href='admin_logout.php'>Logout as Admin</a>";}
              else {echo "<a href='admin_login.php'>Login as Admin</a>"; }?></a>
              </li>
              <li class="right"><a href="admin.php">Admin Area</a></li>
        </ul>
    </div>
    
    
   <div id="notice">
        <marquee >
            This is not a official website of <a href="www.seacomskillsuniversity.org">Seacom Skills University</a> . This website is made
             as a part of semister project for educational purpose only.
        </marquee>
    </div>
    <div id="error">
        <?php
        include 'error_pluse_success_shower.php';
        ?>
    </div>


