<?php
if(isset($_POST['signup-submit'])){
	require "dbh.inc.php";
	$username=$_POST['uid'];
	$email=$_POST['mail'];
	$password=$_POST['pwd'];
	$passwordrepeat=$_POST['pwd-repeat'];
	if(empty($username)||empty($email)||empty($password)||empty($passwordrepeat)){
header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
exit();

}
else if(!filter_var($email,FILTER_VALIDATE_EMAIL)&&!preg_match("/^[a-zA-Z0-9]*$",$username)){
header("Location: ../signup.php?error=Invalid Email And username");
exit();	
}
else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
header("Location: ../signup.php?error=Invalid Email&uid".$username);	
exit();
}
else if(!preg_match("/^[a-zA-Z0-9]*$",$username)){
header("Location: ../signup.php?error=Invalid username&mail".$email);	
exit();

}
else if($password!==$passwordrepeat){
header("Location: ../signup.php?error=Passwordcheck &mail=".$email."&username=".$username);
exit();	
}
else{
	$sql="SELECT uidusers FROM users WHERE uidusers=?";
	$stmt=mysqli_stmt_init($conn);// init=initialize
	if(!mysqli_stmt_prepare($stmt,$sql)){
	header("Location: ../signup.php?error=sqlerror");		
	exit();
	}
	else {
mysqli_stmt_bind_param($stmt,"s",$username);//param=parameter
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);
$resultcheck=mysqli_stmt_num_rows($stmt);
if($resultcheck>0){
	header("Location: ../signup.php?error=UsernameTaken &mail=".$email);
	exit();
	}
	else{
		$sql="INSERT INTO users(uidusers,emailusers,pwdusers) VALUES(?,?,?)";
		$stmt=mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt,$sql)){
	header("Location: ../signup.php?error=sqlerror");		
	exit();
	}else{$hashedPwd=password_hash($password,PASSWORD_DEFAULT);
	mysqli_stmt_bind_param($stmt,"sss",$username,$email,$hashedPwd);//param=parameter
     mysqli_stmt_execute($stmt);
header("Location: ../signup.php?signup=success");		
exit();
	}
	}

}

}
mysqli_stmt_close($stmt);
mysqli_close($conn);

}

else{
header("Location: ../signup.php?signup=success");		
exit();	
}