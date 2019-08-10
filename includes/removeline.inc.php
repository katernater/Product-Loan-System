<?php

if (isset($_POST['removeline'])){

	include_once 'dbh.inc.php';
	$sku = mysqli_real_escape_string($conn, $_POST['sku']);
//Error Handling
//Empty input
	
	if(empty($sku)){
			
		header("Location: ../removeproduct.php?sku=notfound");
		exit();
		
	} else {
		$sql = "SELECT * FROM products WHERE product_sku= '$sku'";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
				
		if($resultCheck < 1){
			header("Location: ../removeproduct.php?product=missing");
			exit();
		} else{
					
			//Remove Products from Database
			$sql = "DELETE FROM products WHERE product_sku = '$sku'";
						
			mysqli_query($conn, $sql);
			header("Location:../removeproduct.php?sku=success");
						
		}
	}
	
	
} else{
	header("Location: ../removeproduct.php");
	exit();
}