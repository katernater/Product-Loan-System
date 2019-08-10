<?php

if (isset($_POST['removeproduct'])){

	include_once 'dbh.inc.php';
	$serial = mysqli_real_escape_string($conn, $_POST['serial']);
//Error Handling
//Empty input
	
	if(empty($serial)){
			
		header("Location: ../removeproduct.php?product=empty");
		exit();
		
	} else {
		$sql = "SELECT * FROM products WHERE product_serial= '$serial';";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
				
		if($resultCheck < 1){
			header("Location: ../removeproduct.php?product=missing");
			exit();
		} else{
			
			//$id = $row['product_id'];
			//Remove Product from Database
			$sql = "DELETE FROM products WHERE product_serial = '$serial'";
						
			mysqli_query($conn, $sql);
			header("Location:../removeproduct.php?success");
						
		}
	}
	
	
} else{
	header("Location: ../removeproduct.php");
	exit();
}