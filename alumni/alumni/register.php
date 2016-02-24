<?php

session_start();
$_SESSION['is_registration'] = true;

$con=mysqli_connect("localhost","root","","charlottexchange");
//$con = new mysqli("mysql.1freehosting.com", "u453492346_ssdi", "barath", "u453492346_ssdi");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else
    debug("Connection success");

ini_set('max_execution_time', 1000);



$username = $_REQUEST['username'];

//check if user is already registered
//$query_result = mysqli_query($con, "SELECT From users WHERE username=$username");
$password = $_REQUEST['password'];

//$hashed_pass =  password_hash($password, PASSWORD_DEFAULT);

$fname = $_REQUEST['fname'];

$lname = $_REQUEST['lname'];

$age = $_REQUEST['age'];

$address = $_REQUEST['address'];

$email = $_REQUEST['email'];

$phone = $_REQUEST['phone'];

$query_result = mysqli_query($con,"SELECT * FROM users WHERE username='$username'") or die(mysqli_error($con));
$row = mysqli_fetch_array($query_result);

if ($username === $row['username'])
{
    //eror user already exists
    $redo_registration = true;
    $_SESSION['login_success'] = false;
    header("Location: login.php");
    exit("User Already exists error");
}
else
{
    //proceed registration
    //Do more validation
    $redo_registration = false;

    if($password === '')
    {
        //empty string, throw error
        $redo_registration = true;
        exit("Password Cannot be empty");
    }
    
    $_SESSION['login_success'] = true;
}


mysqli_query($con,"INSERT INTO users (username,pwd,fname,lname,age, address,email,phone)
VALUES ('$username','$password' ,'$fname','$lname','$age','$address','$email','$phone')")
or die(mysqli_error($con)); 

include 'login.php';
//include 'reg_form.html';


function debug($debug_info) {
    $file = fopen("debug.txt", "a");
    fwrite($file, $debug_info);
    fwrite($file, "\n\r");
    fclose($file);
}

?>