<?php
	include_once 'header.php';
?>

<section = "main-container">
	<div class = "index">
		
		<h2>Update Product</h2>
		<p>When a loan unit has been returned or needs to be repaired, update the products location and status here.</p>
		<form class = "updateproduct-form" action="includes/updateproduct.inc.php" method="POST">
			<input type = "text" name= 'serial' placeholder = 'Serial Number'>

			
			
			<select required name= 'status'>
				<option value ="OPEN">OPEN</option>
				<option value ="LOANED">LOANED</option>
				<option value ="REPAIR">REPAIR</option>
				<option value ="UNAVAILABLE">UNAVAILABLE</option>

			</select>
			
			<input type = "text" name= 'location' placeholder = 'Current Location'>
			<button type = 'submit' name='updateproduct'>
				Update Product
			</button>
		</form>
				<button onclick = "goBack()" class = "backbutton">Go Back</button>
	</div>
</section>



<?php
	include_once 'footer.php';
?>