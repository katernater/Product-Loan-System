<?php

if (isset($_POST['updateproduct'])){

	include_once 'dbh.inc.php';
	
	$serial = mysqli_real_escape_string($conn, $_POST['serial']);
	$status = mysqli_real_escape_string($conn, $_POST['status']);
	$location = mysqli_real_escape_string($conn, $_POST['location']);
//Error Handling
//Empty input
	
	if( empty($serial) || empty($location) || empty($status)){
			
		header("Location: ../updateproduct.php?product=empty");
		exit();
		
	} else {
		$sql = "UPDATE products SET product_status = '$status' WHERE product_serial= '$serial'";
		mysqli_query($conn, $sql);
		$sql2 = "UPDATE products SET product_location = '$location' WHERE product_serial = '$serial'";
		mysqli_query($conn, $sql2);
		$sql3 = "UPDATE products SET product_return = ' ' WHERE product_serial = '$serial'";
		mysqli_query($conn, $sql3);
	
		header("Location: ../adminpage.php");
		exit();
	}
}