<?php

if (isset($_POST['addproduct'])){

	include_once 'dbh.inc.php';
	
	$type = mysqli_real_escape_string($conn, $_POST['type']);
	$sku = mysqli_real_escape_string($conn, $_POST['sku']);
	$serial = mysqli_real_escape_string($conn, $_POST['serial']);
	$status = mysqli_real_escape_string($conn, $_POST['status']);
	$location = mysqli_real_escape_string($conn, $_POST['location']);
	$return = mysqli_real_escape_string($conn, $_POST['return']);
//Error Handling
//Empty input
	
	if(empty($type) || empty($sku) || empty($serial) || empty($location)){
			
		header("Location: ../addproduct.php?product=empty");
		exit();
		
	} else {
		$sql = "SELECT * FROM products WHERE product_serial= '$serial'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
				
		if($resultCheck > 0){
			header("Location: ../addproduct.php?product=exists");
			exit();
		} else{
					
			//Insert Product into Database
			$sql = "INSERT INTO products (product_type, product_sku, product_serial, product_status, product_location) VALUES ('$type', '$sku', '$serial', '$status', '$location');";
						
			mysqli_query($conn, $sql);
			header("Location:../addproduct.php?success");
						
		}
	}
	
	
} else{
	header("Location: ../addproduct.php");
	exit();
}