<?php


session_start();


/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$mysqli = new mysqli("localhost", "root", "", "blood_organ");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
 
// Escape user inputs for security
$name = $mysqli->real_escape_string($_REQUEST['name']);
$username = $mysqli->real_escape_string($_REQUEST['username']);
$password = $mysqli->real_escape_string($_REQUEST['password']);
$cpassword = $mysqli->real_escape_string($_REQUEST['cpassword']);
$sex = $mysqli->real_escape_string($_REQUEST['sex']);
$PhoneNo = $mysqli->real_escape_string($_REQUEST['phoneNo']);
$Address = $mysqli->real_escape_string($_REQUEST['address']);
$DateOfBirth = $mysqli->real_escape_string($_REQUEST['DOB']);

$_SESSION['Username']=$username;
 
// attempt insert query execution
$sql = "INSERT INTO users (Name,Username,Password,Sex,PhoneNo,Address,DateOfBirth,AccessLevel) VALUES ('$name','$username','$password','$sex', '$PhoneNo','$Address','$DateOfBirth',0)";


if($mysqli->query($sql) === true ){
    echo "Records inserted successfully."; 
    $message ="signup successfull";
     //echo "<script type = 'text/javascript'> alert($message);</script>";
     header("Location: sign_in.php");
} else {
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
// Close connection
$mysqli->close();
?>