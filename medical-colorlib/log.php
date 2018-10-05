<?php

session_start();


/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
  $servername = "localhost";
  $username = "root";
  $pass = "";
  $dbName = "blood_organ";
$con = new mysqli($servername, $username, $pass, $dbName);

// Check connection
if($con->connect_error)
  {
    die("connection failed: " . $con->connect_error);
  }
// Escape user inputs for security
$Username = $con->real_escape_string($_REQUEST['Username']);
$Password = $con->real_escape_string($_REQUEST['Password']);

$_SESSION['Username'] = $Username;
    
      $sql = "SELECT Username,Password,AccessLevel FROM users WHERE Username = '".$Username."'and Password = '".$Password."' ";
      

      if(!($result = $con ->query($sql))){
        echo $con->error;
      }

      if ($result-> num_rows > 0) {
        while ($row = $result-> fetch_assoc()) {
          if ($row["Username"]== $Username && $row["Password"]==$Password) {
           
            if($row["AccessLevel"] == 1)
            {
              header("location: Admin.html");
            } else
            
           header("location: index.php");
          }
          else
          {
            $_SESSION['Error']="Invalid  Username or Password";
     if( isset($_SESSION['Error']) )
      {
        echo $_SESSION['Error'];

        unset($_SESSION['Error']);
        //header("location: login.html");

      }
    }
  }
}

      

?>
