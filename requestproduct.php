<?php
	include_once 'header.php';
	include_once 'includes/dbh.inc.php';
?>

<section = "main-container">
	<div class = "index">
		<h2>Request Product Loan</h2>
		<form class = "request-form" action="includes/request.inc.php" method="POST">
			
					<?php
		$sql = "SELECT * FROM products;";
		$result = mysqli_query($conn, $sql);
	
		$resultCheck = mysqli_num_rows($result);
		
		echo "<select required name= 'product'>";
		if ($resultCheck >0){
			
			$loanop = array();
			
			while($row = mysqli_fetch_assoc($result)){
			   
				if (!in_array($row[product_sku], $loanop)){
					
					echo "<option value =$row[product_sku]>$row[product_type]</option>";
					$loanop[] = $row[product_sku];
				}
				
			}
		}
		echo "</select>";
	?>
			<input type = "text" name= 'start' placeholder = 'Preferred Start Date DD/MM/YYYY'>
			I have read, understood, and agree to the Product Loan Equipment <a href = "termsconditions.php">Terms and Conditions</a>, 
particularly that the cost of returning the loan unit is my responsibility.
I understand that if I do not comply with these conditions and return all loaned equipment 
undamaged within the pre-arranged loan period, I and/or the company I am a representative of will be 
invoiced for the value of the loaned goods at the Recommended Retail Price.<input type = "checkbox" name = 'terms' value = 'agree'> <span class = "check"></span></input>
			<button type = 'request' name='request'>
				Submit Request
			</button>
		</form>
		<button onclick = "goBack()" class = "backbutton">Go Back</button>
	</div>
</section>



<?php
	include_once 'footer.php';
?>