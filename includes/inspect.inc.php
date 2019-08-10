<?php

session_start();

if(isset($_POST['inspect'])){
	
	include 'dbh.inc.php';
	
	$uid =mysqli_real_escape_string($conn, $_POST['uid']);
	$pwd =mysqli_real_escape_string($conn, $_POST['pwd']);
	
	//Error handlers
	//Check for empty input
	
	if(empty($uid) || empty($pwd)){
		header("Location:../index.php?login=empty");
	    exit();
	} else{
		$sql = "SELECT * FROM users WHERE user_uid = '$uid' OR user_email ='$uid'";
		$result = mysqli_query($conn, $sql);
		
		$resultCheck = mysqli_num_rows($result);
		
		if($resultCheck < 1){
			header("Location:../index.php?login=error");
			exit();
		} else{
			if ($row = mysqli_fetch_assoc($result)){
				//Dehashing password
				$hashedPwdCheck = password_verify($pwd, $row['user_pwd']);
				if($hashedPwdCheck == false){
					header("Location:../index.php?login=error");
					exit();
				} elseif ($hashedPwdCheck == true){
					//log in user
					$_SESSION['u_id'] = $row['user_id'];
					$_SESSION['u_first'] = $row['user_first'];
					$_SESSION['u_last'] = $row['user_last'];
					$_SESSION['u_email'] = $row['user_email'];
					$_SESSION['u_uid'] = $row['user_uid'];
					$_SESSION['u_company'] = $row['user_company'];
					$_SESSION['u_ad1'] = $row['user_address1'];
					$_SESSION['u_ad2'] = $row['user_address2'];
					$_SESSION['u_city'] = $row['user_city'];
					$_SESSION['u_state'] = $row['user_state'];
					$_SESSION['u_postcode'] = $row['user_postcode'];
					$_SESSION['u_phone'] = $row['user_phone'];
					$_SESSION['u_type']= $row['user_type'];
					
					
					if ($_SESSION['u_type'] == 2){
							header("Location:../adminpage.php");
							exit();
					} else if ($_SESSION['u_type'] == 1){
							header("Location:../userpage.php");
							exit();
					}else{
							header("Location:../index.php?login=error");
							exit();
					}
				
				}
			}
		}
	}
} else{
	header("Location:../index.php?login=error");
	exit();
}