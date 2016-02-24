<html>

    <head>
        <meta charset="UTF-8">  
        <title>ATS</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="css/font.css" />
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="css/style.css" />
    </head>


    <div class="body"></div>
    <div class="grad"></div>
    <div class="header">
        <div>Alumni</br><span>Tracking System</span></div>
    </div>
    <br>
    <form action="./process_registration.php" method="post">

        <div class="register">

            <?php 
                $username = $_POST[username];
                $password = $_POST[password];
                $fname = $_POST[fname];
                $mname = $_POST[mname];
                $lname = $_POST[lname];
                $ssn = $_POST[ssn];
                $age = $_POST[age];
                $department = $_POST[department];
                $adress_street = $_POST[adress_street];
                $adress_city = $_POST[adress_city];
                $adress_state = $_POST[adress_state];
                $adress_zip = $_POST[adress_zip];
                $email = $_POST[email];
                $phone = $_POST[phone];
                $registration_type = $_POST[registration_type];
                
                echo '<input type="hidden" name="username" value="' .$username. '">';
                echo '<input type="hidden" name="password" value="' .$password. '">';
                echo '<input type="hidden" name="fname" value="' . $fname . '">';
                echo '<input type="hidden" name="mname" value="' .$mname. '">';
                echo '<input type="hidden" name="lname" value="' .$lname. '">';
                echo '<input type="hidden" name="ssn" value="' .$ssn. '">';
                echo '<input type="hidden" name="age" value="' .$age. '">';
                echo '<input type="hidden" name="department" value="' .$department. '">';
                echo '<input type="hidden" name="adress_street" value="' .$adress_street. '">';
                echo '<input type="hidden" name="adress_city" value="' .$adress_city. '">';
                echo '<input type="hidden" name="adress_state" value="' .$adress_state. '">';
                echo '<input type="hidden" name="adress_state" value="' .$adress_zip. '">';

                echo '<input type="hidden" name="registration_type" value="' .$registration_type. '">';   
                
            ?>
            <div class="input-group">
                
            <?php 
            //student specific form
            if (strpos($registration_type,'Student') !== false) {
                echo '<input type="text" required placeholder="major" name="major"><br>';
                echo '<input type="text" required placeholder="internship" name="internship"><br>';
            }
            //faculty specific form 
            if (strpos($registration_type,'Faculty') !== false) {
                echo '<input type="text" required placeholder="designation" name="designation"><br>';
            }
            //alumni specific form
            if (strpos($registration_type,'Alumni') !== false) {
            }
            ?>
                
            <input type="text" required placeholder="Email" name="email"><br>
            <input type="text" required placeholder="Phone Number" name="phone"><br>    
            <input type="text" required placeholder="facebook ID" name="Facebook_ID"><br>
            <input type="text" required placeholder="Twitter ID" name="Twitter_ID"><br>
            <input type="text" required placeholder="LinkedIN ID" name="linkedin_id"><br>
            <input type="text" style="height: 90px;" required placeholder="About Me" name="about_me"><br>
            <label>Upload Your Profile Image</label>
            <input type="file" name="userfile">
            <input type="submit" value="Register">
        </div>
    </form>

    <script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>



</html>
