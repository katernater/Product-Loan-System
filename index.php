<?php
	include_once 'header.php';
?>

<section = "main-container">
	<div class = "index">
		<div class = "info">
		<h2>Product Loan System</h2>
		<p>Welcome to the Product Loan Unit Request System. If you would like to request a short term loan of a demonstration unit, please sign up with your contact details and log in. Our demo units are available for loans to persons and companies that have been referred by a staff member.</p>
		
				<?php
			if (isset($_SESSION['u_id'])){
			    echo "<div class = 'options'>";
					if ($_SESSION['u_type'] == 2){
							echo "<a href = 'adminpage.php'>Admin Page</a>";
							exit();
					} else if ($_SESSION['u_type'] == 1){
							echo "<a href = 'userpage.php'>User Page</a>";
							exit();
					}
				echo "</div>";
			}
		?>
		
		</div>
		    <div class = "index_info"> <img src = "" alt = ""></div>

	</div>
</section>



<?php
	include_once 'footer.php';
?>