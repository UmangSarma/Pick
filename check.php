<?php
$servername = "localhost";
$username = "username";
$password = "";
$dbname = "pick";
$Err="";

$conn = mysqli_connect("localhost","root","","pick");

// Create connection

if(isset($_POST['login']))
{
    session_start();
    $username = mysqli_real_escape_string($conn,$_POST['login']);
    $password = mysqli_real_escape_string($conn,$_POST['pass']);
    

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
    
 
 $password=md5("$password");


$sql = "SELECT id,username, password FROM reg Where username='$username' and password='$password'";
$result = $conn->query($sql);
    

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       echo "id: " . $row["id"]. " - Name: " . $row["username"]. " " . $row["password"]. "<br>";
         header("Location: welcome.html");
    }
} else {
      $Err = "Enter Username or password is wrong";
    
}
$conn->close();
    
}
?>