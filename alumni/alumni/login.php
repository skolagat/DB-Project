<?php
session_start();

if(!$_SESSION['is_registration']){
    
$con=mysqli_connect("localhost","root","","alumni");
//$con = new mysqli("mysql.1freehosting.com", "u453492346_ssdi", "barath", "u453492346_ssdi");

$username = $_POST['username'];
$query_uname_result = mysqli_query($con,"SELECT * FROM login WHERE userName='$username'") or die(mysqli_error($con));
$query_uname = mysqli_fetch_array($query_uname_result);


$password = $_POST['password'];
//$hashed_pass =  password_hash($password, PASSWORD_DEFAULT);
$query_pwd_result = mysqli_query($con,"SELECT password FROM login WHERE userName='$username'") or die(mysqli_error($con));
$query_pwd = mysqli_fetch_array($query_pwd_result);

//verify login type

$login_type = $_POST['login_type'];
$validate_login_type = false;

if (strpos($login_type,'Student') !== false) {
    $query = mysqli_query($con,"SELECT * FROM login WHERE userName='$username'") or die(mysqli_error($con));
    $query_exec = mysqli_fetch_array($query);
    if($query_exec['is_student']){
        $validate_login_type = TRUE;
    }
}
if (strpos($login_type,'Faculty') !== false) {
    $query = mysqli_query($con,"SELECT * FROM login WHERE userName='$username'") or die(mysqli_error($con));
    $query_exec = mysqli_fetch_array($query);
    if($query_exec['is_faculty']){
        $validate_login_type = TRUE;
    }
}

if (strpos($login_type,'Alumni') !== false) {
    $query = mysqli_query($con,"SELECT * FROM login WHERE userName='$username'") or die(mysqli_error($con));
    $query_exec = mysqli_fetch_array($query);
    if($query_exec['is_alumni']){
        $validate_login_type = TRUE;
    }
}

$query_pwd_result = mysqli_query($con,"SELECT password FROM login WHERE userName='$username'") or die(mysqli_error($con));
$query_pwd = mysqli_fetch_array($query_pwd_result);


if($password == $query_pwd['password']) 
{

    if(!$validate_login_type)
    {
        exit('Wrong type of login specified');
    }
    $_SESSION['login_success'] = TRUE ;
}
else{
    exit('Usename/Password combination not found');
}

}

if ($_SESSION['login_success'] && $_SESSION['is_registration']) {
    echo 'Registration success';
} else if ($_SESSION['login_success'] && !$_SESSION['is_registration']) {
    echo 'Login success';
} else if (!$_SESSION['login_success'] && $_SESSION['is_registration']) {
    echo 'Registration Failed, User exists already ?';
} else if (!$_SESSION['login_success'] && !$_SESSION['is_registration']) {
    echo 'Login Failed';
}
