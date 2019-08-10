<?php

if (isset($_POST['reject'])){

	include_once 'dbh.inc.php';
	$request = mysqli_real_escape_string($conn, $_POST['id']);
	$user = mysqli_real_escape_string($conn, $_POST['user']);
//Error Handling
//Empty input
	
	if(empty($request)){
			
		header("Location: ../requests.php?request=".$request.$user."missing");
		exit();
		
	} else {
		$sql = "SELECT * FROM requests WHERE request_id= '$request';";
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
				
		if($resultCheck < 1){
			header("Location: ../requests.php?request=missing");
			exit();
		} else{
			
			//$id = $row['product_id'];
			//Remove Product from Database
			$sql = "DELETE FROM requests WHERE request_id = '$request'";
						
			mysqli_query($conn, $sql);
			header("Location:../requests.php?".$request."");
						
		}
	}
	
	
} else{
	header("Location: ../requests.php");
	exit();
}