<?php

if (isset($_POST['submit'])){

	include_once 'dbh.inc.php';
	
	$first = mysqli_real_escape_string($conn, $_POST['first']);
	$last = mysqli_real_escape_string($conn, $_POST['last']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$uid = mysqli_real_escape_string($conn, $_POST['uid']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
	$company = mysqli_real_escape_string($conn, $_POST['company']);
	$ad1 = mysqli_real_escape_string($conn, $_POST['ad1']);
	$ad2 = mysqli_real_escape_string($conn, $_POST['ad2']);
	$city = mysqli_real_escape_string($conn, $_POST['city']);
	$state = mysqli_real_escape_string($conn, $_POST['state']);
	$postcode = mysqli_real_escape_string($conn, $_POST['postcode']);
	$phone = mysqli_real_escape_string($conn, $_POST['phone']);
	$contact = mysqli_real_escape_string($conn, $_POST['contact']);
	
//Error Handling
//Empty input
	
	if(empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd) || 
	   empty($company) || empty($ad1) || empty($city) || empty($state) || empty($postcode) 
	   || empty($phone) || empty($contact)){
			
		header("Location: ../signup.php?signup=empty");
		exit();
		
	} else {
		//Check if input characters are valid
		
		if(!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)){
			header("Location: ../signup.php?signup=invalid");
			exit();
		} else {
			
				//check if email is valid
				if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
					header("Location: ../signup.php?signup=email");
					exit();
				} else {
					$sql = "SELECT * FROM users WHERE user_id= '$uid'";
					$result = mysqli_query($conn, $sql);
					$resultCheck = mysqli_num_rows($result);
				
					if($resultCheck > 0){
						header("Location: ../signup.php?signup=usertaken");
						exit();
					} else{
						//hashing password
						$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
					
						//Insert User into Database
						$sql = "INSERT INTO users (user_first, user_last, user_contact, user_email, user_uid, user_pwd, user_company, user_address1, user_address2, user_city, user_state, user_postcode, user_phone) VALUES ('$first', '$last', '$contact', '$email', '$uid', '$hashedPwd', '$company', '$ad1', '$ad2', '$city', '$state', '$postcode', '$phone');";
						
						mysqli_query($conn, $sql);
						header("Location:../signup.php?success");
						
					}
				}
		}
	}
	
} else{
	header("Location: ../signup.php");
	exit();
}