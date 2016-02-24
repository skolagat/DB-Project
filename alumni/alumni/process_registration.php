<?php

session_start();
$_SESSION['is_registration'] = true;

$con=mysqli_connect("localhost","root","","alumni");
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$username = $_POST[username];
$password = $_POST[password];
$fname = $_POST[fname];
                echo $fname;

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

$is_student = 0;
$is_alumni = 0;
$is_faculty = 0;
if (strpos($registration_type,'Student') !== false) {
    $is_student = true;
}
if (strpos($registration_type,'Faculty') !== false) {
    $is_faculty = true;
}
if (strpos($registration_type,'Alumni') !== false) {
    $is_alumni = true;
}




$query_result = mysqli_query($con,"SELECT * FROM login WHERE userName='$username'") or die(mysqli_error($con));
$row = mysqli_fetch_array($query_result);



if ($username === $row['username'])
{
    //eror user already exists
    $redo_registration = true;
    $_SESSION['login_success'] = false;
    echo 'Error:User Already exists error';
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

$facebook = $_POST[Facebook_ID];
$twitter = $_POST[Twitter_ID];
$linkedin = $_POST[linkedin_id];
$aboutme = $_POST[about_me];

$major = $_POST['major'];
$internship = $_POST['internship'];
$designation = $_POST['designation'];


//before inserting check if last name exists

$query_result = mysqli_query($con, "SELECT * from people WHERE lastName= '$lname' ") or die(mysqli_error($con));;
$row = mysqli_fetch_array($query_result);        ;
if($row['lastName'] == $lname)
{
    echo 'Duplicate lastname exists ';
    echo 'Unable to process registration';
    exit(-1);
}

mysqli_query($con,"INSERT INTO people (firstName,middleName,lastName,ssn,street_address,city,state,zip,email,phone_no, facebook, twitter, linkedin, aboutme, department)
VALUES ('$fname','$mname','$lname','$ssn','$adress_street','$adress_city','$adress_state','$adress_zip','$email','$phone','$facebook','$twitter','$linkedin', '$aboutme','$department')")
or die(mysqli_error($con));


//Run query to get the people id

$query_result = mysqli_query($con, "SELECT * from people WHERE lastName= '$lname' ") or die(mysqli_error($con));;
$row = mysqli_fetch_array($query_result);        
$people_id =$row['people_id'];
//or die(mysqli_error($con)); 

//insert login details
mysqli_query($con,"INSERT INTO login (peopleId,userName,password,is_student,is_faculty,is_alumni)
VALUES ('$people_id','$username','$password','$is_student','$is_faculty','$is_alumni')")
or die(mysqli_error($con));

//insert into specific type of registration entities

if($is_student)
{
    mysqli_query($con,"INSERT INTO student (studentId,major,internship)
    VALUES ('$people_id','$major','$internship')")
    or die(mysqli_error($con));
}

if($is_alumni)
{
    mysqli_query($con,"INSERT INTO alumni (peopleId)
    VALUES ('$people_id')")
    or die(mysqli_error($con));    
}

if($is_faculty)
{
    mysqli_query($con,"INSERT INTO faculty (facultyId,designation)
    VALUES ('$people_id','$designation')")
    or die(mysqli_error($con));    
}

include 'login.php';

//    $imgName = "./"."img/".$Ad_category."/".$_FILES['userfile']['name'];
//    $seller = $_COOKIE['userlogin'];
//    if(isset($_POST['upload'])) {
//
//    $allowed_filetypes = array('.jpg','.jpeg','.png','.gif');
//    $max_filesize = 1048570060;
//    $upload_path = 'AdImages/'.$Ad_category.'/';
//   // $description = $_POST['imgdesc'];
//
//            
//    $filename = $_FILES['userfile']['name'];
//    $ext = substr($filename, strpos($filename,'.'), strlen($filename)-1);
//
//    if(!in_array($ext,$allowed_filetypes))
//      die('The file you attempted to upload is not allowed.');
//
//    if(filesize($_FILES['userfile']['tmp_name']) > $max_filesize)
//      die('The file you attempted to upload is too large.');
//
//    if(!is_writable($upload_path))
//      die('You cannot upload to the specified directory, please CHMOD it to 777.');
//
//    if(move_uploaded_file($_FILES['userfile']['tmp_name'],$upload_path . $filename)) {
////               $query = "INSERT INTO uploads (name, description) VALUES ($filename, $description)"; 
////               mysql_query($query);
//
//    echo 'Your file upload was successful!';
//
//
//    } else {
//         echo 'There was an error during the file upload.  Please try again.';
//    }
//    }
