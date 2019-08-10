<?php
	include_once 'header.php';
?>

<section = "main-container">
	<div class = "index">
		<h2>Remove Product by Serial Number</h2>
		<form class = "removeproduct-form" action="includes/removeproduct.inc.php" method="POST">
			<input type = "text" name= 'serial' placeholder = 'Serial Number'>
			<button type = 'submit' name= 'removeproduct'>
				Remove Product
			</button>
		</form>
		
		
		<h2>Remove Products by SKU</h2>
		<form class = "removesku-form" action = "includes/removeline.inc.php" method = "POST">
			<input type = "text" name= 'sku' placeholder = 'Product SKU'>
			<button type = 'submit' name='removeline'>
				Remove Product Line
			</button>
		</form>
				<button onclick = "goBack()" class = "backbutton">Go Back</button>
	</div>
	
</section>



<?php
	include_once 'footer.php';
?>