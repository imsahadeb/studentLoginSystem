    <div id="registration_form">
    <fieldset class="fieldset">
       
        <legend style="text-align:center; font-size:25px; color: blue">Online Application for Admission</legend>
        <form action="index.php" method="post">
        <fieldset class="fieldset">
          <legend>Personal Information</legend>
           <div id="box" class="left">

            <label>First Name</label>
            <input type="text" required=""  name="firstname" placeholder="Your name..">

            <label>Email</label>
            <input type="email" required="" name="email" placeholder="Your Email Address..">

           <label>Gender</label>
            <select id="gender" name="gender">
              <option value="NULL">Select Your Gender</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
              <option value="other">Other</option>
             </select>
           <label>Father's Name</label>
           <input type="text"  required="" name="dadname" placeholder="Father Name...">
           </div>
    
      <div id="box" class="right">
           
            <label>Last Name</label>
            <input type="text"  required="" name="lastname" placeholder="Your last name..">

            <label>Mobile</label>
            <input type="mobile"  required="" name="mobile" placeholder="Mobile Number..">
            
            <label>Date Of Birth</label>
            <input type="date" required=""  name="date" placeholder="">
            
            <label>Mother's Name</label>
            <input type="text"  required="" name="momname" placeholder="Mother's name..">
      </div>
        </fieldset>
            <fieldset class="fieldset"> 
              <legend style="text-align:center">Educational Information</legend>
      
            <div id="box" class="left">
            <fieldset class="fieldset">
                <legend style="text-align:center">
                    Academic Details
                </legend>
                
                <label>Highest Qualification</label>
                <select id="qualification" name="qualification">
                    <option value="NULL">--Select--</option>
                    <option value="Madhyamik">Madhyamik</option>
                    <option value="Higher Secondary">Higher Secondary</option>
                    <option value="Under Graduate">Under Graduate</option>
                    <option value="Post Graduate">Post Graduate</option>
                </select>
                <label>Year Of Passing Last Exam</label>
                <select id="year" name="year">
                    <option value="NULL">Select an Year</option>
                    <option value="2017">2017</option>
                    <option value="2016">2016</option>
                    <option value="2015">2015</option>
                    <option value="2014">2014</option>
                    <option value="2013">2013</option>
                    <option value="2012">2012</option>
                    <option value="2011">2011</option>
                    <option value="2010">2010</option>
                    <option value="2009">2009</option>
                    <option value="2008">2008</option>
                    <option value="2007">2007</option>
                    <option value="2006">2006</option>
                    <option value="2005">2005</option>
                </select>
            </fieldset>
            </div>
            <div id="box" class="right">
                <fieldset class="fieldset">
                    <legend style="text-align:center">Applying For</legend>
            <label>Course</label>
            <select id="course" name="course">
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

            <label>Department</label>
            <select id="department"  name="department">
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
                </fieldset>
            </div>

        </fieldset>
          
            <input type="submit" name="submit" value="submit">
   </form>
   </fieldset>
</div>
