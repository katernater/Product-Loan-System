<?php
	include_once 'header.php';
?>

<section = "main-container">
	<div class = "index">
		<h2>Add Product</h2>
		<form class = "addproduct-form" action="includes/addproduct.inc.php" method="POST">
			<input type = "text" name= 'type' placeholder = 'Product Type'>
			<input type = "text" name= 'sku' placeholder = 'Product SKU'>
			<input type = "text" name= 'serial' placeholder = 'Serial Number'>

			
			
			<select required name= 'status'>
				<option value ="OPEN">OPEN</option>
				<option value ="LOANED">LOANED</option>
				<option value ="REPAIR">REPAIR</option>

			</select>
			
			<input type = "text" name= 'location' placeholder = 'Current Holder'>
			<button type = 'submit' name='addproduct'>
				Add Product
			</button>
		</form>
				<button onclick = "goBack()" class = "backbutton">Go Back</button>
	</div>
</section>



<?php
	include_once 'footer.php';
?>