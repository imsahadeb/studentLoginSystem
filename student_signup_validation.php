<?php
    //if 'submit' button clicked
    if (isset($_POST['submit'])){
        
        //personal
        $first_name=  htmlentities($_POST['firstname']);
        $last_name=  htmlentities($_POST['lastname']);
        $email=  htmlentities($_POST['email']);
        $mobile=  htmlentities($_POST['mobile']);
        $gender=  htmlentities($_POST['gender']);
        $date_birth=  htmlentities($_POST['date']);
        $father_name=  htmlentities($_POST['father_name']);
        $mother_name=  htmlentities($_POST['mother_name']);
        
        //university
        $enroll_id =  htmlentities($_POST['enroll_id']);
        $date_of_admission =  htmlentities($_POST['date_of_admission']);
        $course_duration =  htmlentities($_POST['course_length']);
        $opted_course =  htmlentities($_POST['course']);
        $department =  htmlentities($_POST['department']);
        
        //Communication Address
        $add1 =  htmlentities($_POST['add1']);
        $add2 =  htmlentities($_POST['add2']);
        $city =  htmlentities($_POST['city']);
        $state =  htmlentities($_POST['state']);
        $pin =  htmlentities($_POST['pin']);
        
        //Login Information
        $user_name =  htmlentities($_POST['user_name']);
        $pass0 =  htmlentities($_POST['pass0']);
        $pass1 =  htmlentities($_POST['pass1']);
        $pass= sha1($pass1);
        $hashed_value = md5( rand(0,1000));
        
        //File Processing for uploading profile photo
        $file = $_FILES['file'];
        $fileName = $file['name'];
	$fileTmpName = $file['tmp_name'];
	$fileSize = $file['size'];
	$fileError = $file['error'];
	$fileType = $file['type'];

	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));

	$allowed = array('jpg', 'jpeg', 'png', 'pdf');

	
        
            //Check the enrolment id is correct and haven't registerd yet
           
            $query = "SELECT * FROM enrolment_id WHERE enrol_id = '{$enroll_id}' ";
            $result = mysqli_query($link, $query);
            
            //ture indicates the current student's of the university
            //if enrolment id not in database, if statement will return 0
            if (mysqli_num_rows($result)>0){
                //procedes fourther
                
                $query= " SELECT * FROM registered_users WHERE enrol_id = '{$enroll_id}' ";
                $result = mysqli_query($link, $query);
               //Check if the user alredy registered
               if (mysqli_num_rows($result)<1){
                   //procceds fourther
                   
                   //check username entered by the user is available
                   $query = " SELECT * FROM registered_users user_name = '{$user_name}' ";
                   $result = mysqli_query($link, $query);
                   if (mysqli_num_rows($result)<1){
                       //check for mobile number
                       $query=" SELECT * FROM registered_users WHERE mobile = '{$mobile}' ";
                       $result=  mysqli_query($link, $query);
                       if (mysqli_num_rows($result)<1){
                           //Check for email id
                           $query=" SELECT * FROM registered_users WHERE email = '{$email}' ";
                           $result= mysqli_query($link, $query);
                           if (mysqli_num_rows($result)<1){
                               //after enrolmen id, password, user name, email id, mobile number validation
                               //sucessfully passed, upload data into database
                               
                               //Insertion query
                               $query=" INSERT INTO registered_users (
                                  first_name, last_name,gender,dob,email,
                                  mobile,father_name,mother_name,add1,add2,
                                  city,state,pin,enrol_id,course,subject,
                                  course_length,hash_value,user_name,pass,doa) VALUES (
                                  '$first_name','$last_name','$gender','$date_birth','$email',
                                  '$mobile','$father_name','$mother_name','$add1','$add2',
                                  '$city','$state','$pin','$enroll_id','$opted_course','$department',
                                  '$course_duration','$hashed_value','$user_name','$pass','$date_of_admission')";
                                  $result = mysqli_query($link, $query) or die(mysqli_error($link));
                                   if ($result){
                                       
                                       
                                      $to      = $email;
                                      $headers = "From: sahadeb.com";
                                      $subject = 'Account Verification ( sahadeb.com) ';
                                       
                                      $message_body=" Hello, $first_name,
                                           Thank for registration in our online portal.
                                           
                                           please click the below link to active your account.Without verification
                                           you can not login our portal.
                                           https://www.sseacomskillsuniversity.com/verifyme.php?email=$email&hash=$hashed_value";
                                       
                                            if (mail( $to, $subject, $message_body ,$headers)){
                                            $success_mail="From successfully submited. A confirmation mail has been send to your mail id $email ";
                                            
                                            }
 




                                        //Profile Picture upload
                                      
                                       if (in_array($fileActualExt, $allowed)) {
                                       if ($fileError === 0) {
                                            if ($fileSize < 1000000) {
                                                    $fileNameNew = "profile".$enroll_id.".".$fileActualExt;
                                                    $fileDestination = 'profile_pictures/'.$fileNameNew;
                                                    move_uploaded_file($fileTmpName, $fileDestination);
                                                    
                                                    $error="From submission sucessfull";
                                                    redirect_to("student_signup.php?error=$error");

                                            } 
                                            else {
                                                 $error =$subject." "."But your profile picture could not uploaded because your file is too big!."
                                                         . "But you can do it later";
                                                 redirect_to("student_signup.php?error=$error");
                                            }
                                         } 
                                       else 
                                        {
                                            $error= $success_mail." "."But your profile picture could not uploaded because There was an error uploading your file!";
                                            redirect_to("student_signup.php?error=$error");
                                       }
                                      } 
                                     else {
                                        $error= $success_mail." "."But your profile picture could not uploaded because You cannot upload files of this type!";
                                        redirect_to("student_signup.php?error=$error");
                                    }

                                   }
                                     else {
                                         $error="From submission faild";
                                         redirect_to("student_signup.php?error=$error");
                                     }

                               }
                           else{
                               $error="$email is already used by another user, please use differnt email Address!";
                               redirect_to("student_signup.php?error=$error");
                           }
                       }
                       else{
                           $error="$mobile is already used by another user, please use differnt mobile number!";
                           redirect_to("student_signup.php?error=$error");
                       }
                   }
                 else {
                     $error="The Username:$user_name already used by another user, Please use different user name!";
                     redirect_to("student_signup.php?error=$error");

                 }
                   
               }
                else {
                     $error="Hi $enroll_id you have alredy registered in our system. Please login or try different enrolment id.";
                     redirect_to("student_signup.php?error=$error");
                 }

                  }
            else {
             
                $error="Your Enrollment Id: <text class='up' style='color:red'>$enroll_id</text> is not in our system. "
                        . "Please Re Enter your Eenrollment Id or you can request us to add."
                        . "It will take upto 24 hours to add in our system after verification."
                        . "to request please <a href='request_to_add.php'>click here<a>";
                redirect_to("student_signup.php?error=$error");
            }
    }
     else {
        
    }
    ?>
