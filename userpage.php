<?php
include_once 'header.php';
include_once 'includes/dbh.inc.php';
if (isset($_SESSION['u_type'])){
?>
	
	
<section = "main-container">
	<div class = "index">
		<h2>User Panel</h2>

		<div class = "options">
		<a href="requestproduct.php">Request Product</a>
		</div>
		<div class = "calendar">
			<iframe src="https://calendar.google.com/calendar/embed?src=l6mqt57fc65giargt9avebv68k%40group.calendar.google.com&ctz=Australia%2FSydney" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
		</div>
		
	</div>
</section>
	




<?php
	}else if (!isset($_SESSION['u_type'])){
			header("Location: ../index.php");
			exit();
}
	include_once 'footer.php';
?>