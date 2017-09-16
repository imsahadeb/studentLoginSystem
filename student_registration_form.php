<div id="registration_form">
    <fieldset class="fieldset">
       
        <legend style="text-align:center; font-size:25px; color: blue">Student Registration Form</legend>
        <form action="student_signup.php" method="post" enctype='multipart/form-data'>
            <fieldset class="fieldset">
                <legend class="middle">University Information</legend>
                <label>Enrollment Id</label>
                <input class="up" type="text" required=""name="enroll_id" placeholder="Enrollment id..">
                <div id="box" class="left">
                <label>Date of Admission</label>
                 <input type="date" name="date_of_admission"required="" placeholder="Date Of Admission..">
                  <label>Course</label>
            <select id="course" required="" name="course">
               <option value="NULL">Select Your Course</option>
              <option value="Diploma">Diploma</option>
              <option value="B-Tech">B-Tech</option>
              <option value="M-Tech">M-Tech</option>
              <option value="Phd">Phd</option>
              <option value="B.Sc">B.Sc</option>
              <option value="M.Sc">M.Sc</option>
              <option value="B.A">B.A</option>
              <option value="M.A">M.A</option>
             </select>
                 </div>
                <div id="box" class="right">
                 <label>Length of the Course</label>
                 <input type="number"  required="" min="1" max="6" name="course_length" placeholder="Course Duration in digit">
                  <label>Department</label>
                  <select class="cap" required=""  id="department" name="department">
                 <option value="NULL">Select Your Department</option>
              <option value="Computer Science">Computer Science</option>
              <option value="Civil Enginering">Civil</option>
              <option value="Mechanical Engineering">Mechanical</option>
              <option value="Electrical Engineering">Electrical</option>
              <option value="English">English</option>
              <option value="Bengali">Bengali</option>
              <option value="Geography">Geography</option>
              <option value="History">History</option>
              <option value="Physics">Physics</option>
              <option value="Mathematics">Mathematics</option>
              <option value="Chemistry">Chemistry</option>
              <option value="Biology">Biology</option>
             </select>
                </div>
            </fieldset>
        
            
          <fieldset class="fieldset">
              <legend class="middle">Personal Information</legend>
           <div id="box" class="left">
            <label>First Name</label>
            <input class="up" type="text"  required="" name="firstname" placeholder="Your name..">
            <label>Email</label>
            <input type="email"name="email"  required="" placeholder="Your Email Address..">

           <label>Gender</label>
            <select id="gender"  required="" name="gender">
              <option value="NULL">Select Your Gender</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
              <option value="other">Other</option>
             </select>
           <label>Father's Name</label>
           <input type="text" name="father_name" required=""  placeholder="Father Name...">
           </div>
    
      <div id="box" class="right">
           
            <label>Last Name</label>
            <input class="up" type="text" name="lastname" required=""  placeholder="Your last name..">

            <label>Mobile</label>
            <input type="mobile" name="mobile"  required="" placeholder="Mobile Number..">
            
            <label>Date Of Birth</label>
            <input type="date" name="date" required=""  placeholder="">
            
            <label>Mother's Name</label>
            <input class="up" type="text"  required="" name="mother_name" placeholder="Mother's name..">
      </div>
        </fieldset>
            <fieldset class="fieldset">
                <legend class="middle">Communication Address</legend>
                <label>Address Line 1</label>
                <textarea class="up" rows="5" required=""  cols="100" name="add1" placeholder="Enter Address Here"></textarea>
                <label>Address Line 2</label>
                <textarea rows="5" cols="100" name="add2" placeholder="Use it for address if required"></textarea>
                <div id="box" class="left">
                    <label>City</label>
                    <input class="up" type="text"  required="" placeholder="city" name="city">
                    <label>Country</label>
                    <input class="up" type="text" required=""  placeholder="Country Name" name="country">
                </div>
                <div id="box" class="right">
                    <label>State</label>
                    <input class="up" type="text"  required="" placeholder="Name of the State" name="state">
                    <label>Pin</label>
                    <input type="number" placeholder="Postal Pin No" required=""  name="pin">
                </div>
                
            </fieldset>
           
            <fieldset class="fieldset">
                <legend class="middle">Login Information</legend>
                
                    <label>User Name</label>
                    <input type="text" placeholder="User Name"  required="" name="user_name">
                    <label>Enter Password</label>
                    <input type="password"  placeholder="Password"  required="" name="pass0">
                    <label>Re-Enter Password</label>
                    <input type="password"  required="" name="pass1">
                
            </fieldset> 
            <fieldset class="fieldset">
               
            <legend class="middle">Select a Profile Picture</legend>
                
                    <label>Profile Picture</label>
                    <input type="file" placeholder="Select a Profile Picture" name="file">
                    
             </fieldset> 


        
          
            <input type="submit" name="submit" value="submit">
   </form>
   </fieldset>
</div>

