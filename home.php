<?php
    session_start();

error_reporting(E_ALL);
	$value = 0;
	$error1 = $error2 = $error3 = "";
	$username = "";
        $_SESSION['susername'] = $_POST['username'];
	if(!empty($_POST['username']) && !empty($_POST['Password'])){
		$username= $_POST['username'];
		$pass = $_POST['Password'];
		$value = 1;
	}
	else{
		$error1 =  'Please fill the total details<br>';
	}
	$error1 = $error2 = $erro3 = $error4 = $error5 = "";
		
		$link=mysqli_connect("localhost", "root", "", "kluniversity");
	if($value == 1){
		
		$sql = "select * from admin";
		
		$query_resource = mysqli_query($link,$sql);			
		$num=	mysqli_num_rows($query_resource);
			if(0==$num) {
                        echo "No record";
                            exit;
            } else {
			 
			$one = 1;
			$two = 1;
		
			while($row = mysqli_fetch_assoc($query_resource)){
					
				if(($username == $row['username'])){
					
					$one = 0;
					
				}
				if(($pass == $row['password'])){
					$two = 0;
				}
			}
			
			 }
			if($one){
				$error2 =  'username is wrong<br>';
                                echo $error2;
			}
			if($two){
				$error3 = 'Password is wrong';
                                echo $error3;
			}
			if($one == 0 && $two == 0){
				$_SESSION['username'] = $username;
				header("Location:home.html");
			}		
		}
	
?>
