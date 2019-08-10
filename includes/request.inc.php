<?php

if (isset($_POST['request'])){
	session_start();
	
	include_once 'dbh.inc.php';
	
	$product = mysqli_real_escape_string($conn, $_POST['product']);
	$start = mysqli_real_escape_string($conn, $_POST['start']);
	$accept = mysqli_real_escape_string($conn, $_POST['terms']);
	$requester = $_SESSION['u_uid'];
	$date = date("d/m/Y");
	
//Error Handling
//Empty input
	
	if(empty($product)){
			
		header("Location: ../requestproduct.php?product=empty");
		exit();
		
	} else {
		if ($accept == 'agree'){
					//Insert Request into Database
		$sql = "INSERT INTO requests (request_user, request_product, request_date, request_start) VALUES ('$requester', '$product', '$date', '$start');";
						
		mysqli_query($conn, $sql);
		
		ini_set('display_errors',1);
		
		error_reporting(E_ALL);
		
		
		
				$id = $row['request_id'];
				$foo = $requester;
				$sql2 = "SELECT * FROM users WHERE user_uid =  '$foo'";
				$details = mysqli_query($conn, $sql2);
				$detailsCheck = mysqli_num_rows($details);
				
				if ($detailsCheck > 0){
					while ($row2 = mysqli_fetch_assoc($details)){
						$msg3 = "Shipping Details\n";
						$msg4 = "Name: ".$row2['user_first']. " ".$row2['user_last']."\n";
						$msg5 = "Company: ".$row2['user_company']."\n";
						$msg6 =  "Email: ".$row2['user_email']."\n";
						$email = $row2['user_email'];
						$msg7 =  "Phone: ".$row2['user_phone']."\n";
						$msg8 =  "Address:\n";
						$msg9 =  "".$row2['user_address1']."\n";
						$msg10 = "".$row2['user_address2']."\n";
						$msg11= "".$row2['user_city']."\n";
						$msg12=  "".$row2['user_state'].", ".$row2['user_postcode']."\n";
						$msg13=  "Contact: ".$row2['user_contact']."\n";
						$contact = $row2['user_contact'];
						
					}
				
				}
				
		
		$from = "NOREPLY_EMAIL";
		$to = "YOUR_EMAIL";
		$subject = "Product Loan Unit Request Submitted";
		$msg = "A loan request has been received. To accept the request, log in to WEBSITE under the administrators account, and submit the product that has been sent.\n Request Details \n".$requester." Request Date: ".$date."\n Requester: ".$requester.
		"\n Product: ".$product."\n Date Requested: ".$date.$msg3.$msg4.$msg5.$msg6.$msg7.$msg8.$msg9.$msg10.$msg11.$msg12.$msg13."";
	
		if ($contact == 'ONE'){
		     $mail = 'ONE@email.com';
		} else if ($contact == 'TWO'){
		    $mail = 'TWO@email.com';
		}	else if ($contact == 'THREE'){
		    $mail = 'THREE@email.com';
		}
		
		$headers = "From: ".$from;
		$msg2 = wordwrap($msg, 70);
		mail($to, $subject, $msg, $headers);
		
		mail($mail, $subject, $msg, $headers);
		
		$to2 = $email.
		$usr = "Your loan request has been received. You will be notified by email once your request is approved. If1 the unit you have requested is unavailable or is a blocked out time on the calender we will contact you with an estimate of when a unit will be available and a list of alternative available units.";
		
		mail($to2, $subject, $usr, $headers);
		
		
		header("Location:../requestproduct.php?success");
						
		}	else {
			header("Location:../requestproduct.php?checkfail");
			
		}		

	}
		
	
} else{
	header("Location: ../requestproduct.php");
	exit();
}
