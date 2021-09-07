<?php
if(isset($_POST['login-submit'])){
require'dbh.inc.php';
$mailuid=$_POST['mailuid'];
$password=$_POST['pwd'];
if(empty($mailuid)||empty($password)){
	header("Location: ../index.php?error=emptyfield");		
exit();	}

else{
	$sql="SELECT * FROM users WHERE uidusers=? OR emailusers=?";
	$stmt=mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql))//to  check is sql has any errors
	{
	header("Location: ../index.php?error=sqlerroeer");		
exit();		
	}
	else{
		mysqli_stmt_bind_param($stmt,"ss",$mailuid,$mailuid);
		mysqli_stmt_execute($stmt);
		$result=mysqli_stmt_get_result($stmt);
		if($row=mysqli_fetch_assoc($result)){
$pwdcheck=password_verify($password,$row['pwdusers']);
if($pwdcheck==false){
	header("Location: ../index.php?error=WrongPassword");		
exit();	
}else if($pwdcheck==true){
session_start();
$_SESSION['userId']=$row['idusers'];
$_SESSION['useruid']=$row['idusers'];
header("Location: ../index.php?login=success");		
exit();	
}else{
		header("Location: ../index.php?error=nouser");		
exit();		
}
		}
		else{
				header("Location: ../index.php?error=nouser");		
exit();	
		}

	}
}

}