<?php

if (isset($_POST['reqsend'])){

	include_once 'dbh.inc.php';
	
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$product = mysqli_real_escape_string($conn, $_POST['accept']);
	$user = mysqli_real_escape_string($conn, $_POST['contact']);
	$wacom = mysqli_real_escape_string($conn, $_POST['wacom'])
	$date = mysqli_real_escape_string($conn, $_POST['date']);
//Error Handling
//Empty input
	
	if(empty($id) || empty($product) || empty($user)){
			$a = "";
		if(empty($id)){
			$a .= "ID.";
		} else if (empty($product)){
			$a .="PRODUCT";
		} else if (empty($user)){
			$a .="USER";
		}
			
		header("Location: ../requests.php?requestmissing=".$a."");
		
	} else {
				

						$sql2 = "UPDATE products SET product_status = 'LOANED' WHERE product_serial ='$product'";
						mysqli_query($conn, $sql2);
		
						$sql = "SELECT * FROM users WHERE user_uid = '$user';";
						$result = mysqli_query($conn, $sql);
	
						$resultCheck = mysqli_num_rows($result);

		
						if ($resultCheck >0){
			
						while($row = mysqli_fetch_assoc($result)){
			
						$name = $row['user_first'];
						$name .= " ".$row['user_last'];
						
					
				
				}
			}
		
		
		
						$sql3 = "UPDATE products SET product_location = '$name' WHERE product_serial ='$product'";
						mysqli_query($conn, $sql3);
						$sql4 = "UPDATE products SET product_return = '$date' WHERE product_serial ='$product'";
						mysqli_query($conn, $sql4);
						$sql6 = "UPDATE products SET product_contact = '$wacom' WHERE product_serial = '$product'";
						$sql5 = "DELETE FROM requests WHERE request_id = '$id'";
						mysqli_query($conn, $sql5);
						exit();
		

			}
	
	
} else{
	header("Location: ../requests.php");
	exit();
}