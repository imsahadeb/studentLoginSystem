 <?php
    if(isset($_POST['submit'])){
        $first_name=  htmlentities($_POST['firstname']);
        $last_name=  htmlentities($_POST['lastname']);
        $email=  htmlentities($_POST['email']);
        $mobile=  htmlentities($_POST['mobile']);
        $gender=  htmlentities($_POST['gender']);
        $date_birth=  htmlentities($_POST['date']);
        $father_name=  htmlentities($_POST['dadname']);
        $mother_name=  htmlentities($_POST['momname']);
        $qualification=  htmlentities($_POST['qualification']);
        $year_of_last_exam=  htmlentities($_POST['year']);
        $required_course=  htmlentities($_POST['course']);
        $department=  htmlentities($_POST['department']);
        
        
        
                
        
        $query = "SELECT * FROM onlineadm WHERE mobile= '{$mobile}' ";
        $result1= mysqli_query($link, $query);
        $query = "SELECT * FROM onlineadm WHERE email= '{$email}' ";
        $result= mysqli_query($link, $query);
        
        
        if(mysqli_num_rows($result1)>0) {
         $str="This mobile number is allready in our database! please use different differen number!";
          redirect_to("error.php?error=$str");
       }
        
        elseif(mysqli_num_rows($result)>0){
          $str="This email is allready used by another user! please use different email address!";
          redirect_to("error.php?error=$str");
          
          
          
        }
        
        
        
        

     else {
        
        $query="INSERT INTO onlineadm (
            first_name, last_name, email, mobile, gender, dob,father_name, mother_name, high_degree, last_exam, required_course, department)
            VALUES (
            '$first_name','$last_name','$email','$mobile','$gender','$date_birth','$father_name','$mother_name','$qualification','$year_of_last_exam','$required_course','$department')";

        
       $result=  mysqli_query($link, $query);
       if ($result){
           $to      = $email;
           $headers = "From: sahadeb.com";
           $subject = 'Confirmation Mail( sahadeb.com) ';
           $message_body = '
           Hello '.$first_name.',

           Thank you for applying online application.'
           
            .'Your Applied Course: '.$opted_course.';
              
                if (mail( $to, $subject, $message_body ,$headers)){
                $error="From successfully submited. A confirmation mail has been send to your mail id $email ';
                redirect_to("index.php?error=$error");
        }
           
       }
      }
    
 else {
     
    
}
 
?>
