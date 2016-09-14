<?php

function throw_error($error){
    echo "There was an error executing the qurery";
    echo "<br>";
    echo "Error Description:";
    echo "<br>";
    echo $error;
}

$db=mysqli_connect("localhost","root","","pick");
//    session_start();
if(isset($_POST['username']))
{
    session_start();
    $username=mysqli_real_escape_string($db,$_POST['username']);
    $password=mysqli_real_escape_string($db,$_POST['password']);
      $email=mysqli_real_escape_string($db,$_POST['email']);
    $phone=mysqli_real_escape_string($db,$_POST['phone']);
    $password=md5($password);

    
    mysqli_query($db,"INSERT into `reg` (`username`,`password`,`email`,`phone`) values('$username','$password','$email','$phone')") or die(throw_error(mysqli_query($db)));

    $_session["message"]="you have successfully Register";
    
    header("Location: welcome.html");
    
}
?>