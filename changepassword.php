<?php
session_start();
$opass = $_POST['opassword'];
$npass = $_POST['npassword'];
$cpass = $_POST['cpassword'];
$username = $_SESSION['username'];

$conn = mysqli_connect("localhost","root", "","kluniversity");

$sql = "select password from admin where username = '$username'"; 

$result = mysqli_query($conn, $sql);

if((mysqli_num_rows($result))>0){
    if(mysqli_fetch_assoc($result)['password']===$opass&&$npass===$cpass){
        $query = "update admin set password = '$npass' where username = '$username'";
        if(mysqli_query($conn, $query)){
            echo "Successfully Changed";
            header("Location:home.html");
        }        
    }
 elseif ($npass!==$cpass) {
               echo "your New Password and Confirm Password doesn't match";
    }else{
        echo "please enter credentials correctly";
    }
}
