
    <head>
        <meta charset="UTF-8">  
        <title>Charlotte XChange - Login</title>
        <script src="js/prefixfree.min.js"></script>
        <link rel="stylesheet" href="css/style.css" />
        
        
    </head>


    <div class="body"></div>
    <div class="grad"></div>
    <div class="header">
        <div>Alumni </br><span>Tracking System</span></div>
    </div>
    <br>
    
    <?php
        session_start();
        $_SESSION['is_registration'] = false;
        //$_SESSION['login_success'] = false;
    ?>
    
    <form action="login.php" method="post">

        <div class="login">
            <input type="text" required placeholder="username" name="username"><br>
            <input type="password" required placeholder="password" name="password"><br>
            <select name="login_type" class="styled-select" style="color: black;margin-top: 20px;margin-bottom: 30px;">
              <option value="Student">Student</option>
              <option value="Faculty">Faculty</option>
              <option value="Alumni">Alumni</option>
            </select>
            <input type="submit" value="Login">
            <p>
                Not a member yet?</br>
                <a href="reg_form.html">Register</a>
            </p>

        </div>

    </form>

    <script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>






<?php
// Create connection
//$con = new mysqli("localhost", "root", "", "charlottexchange");
$con = new mysqli("mysql.1freehosting.com", "u453492346_ssdi", "barath", "u453492346_ssdi");
// Check connection
if (mysqli_connect_errno()) {
    $debug_info = "Failed to connect to MySQL: " . mysqli_connect_error();
    $file = fopen("debug.txt", "w");
    fwrite($file, $debug_info);
    fclose($file);
} else {
    $file = fopen("debug.txt", "w");
    $debug_info = "connection successful\n";
    fwrite($file, $debug_info);
    fclose($file);
}


?>

