<?php
include_once 'header.php';
include_once 'includes/dbh.inc.php';
if (isset($_SESSION['u_type']) && $_SESSION['u_type'] == 2) {

?>
	
	
<section = "main-container">
	<div class = "index">
		<h2>Admin Panel</h2>

		<div class = "options">
		<a href="addproduct.php">Add Product</a>
		<a href="removeproduct.php">Remove Product</a>
		<a href="updateproduct.php">Update Product</a>
		<a href = "requests.php">Check Requests</a>
		</div>
		
			
			<?php
		$sql = "SELECT * FROM products;";
		$result = mysqli_query($conn, $sql);
	
		$resultCheck = mysqli_num_rows($result);
		
		echo "<table class = 'products' style = 'width:80%'>
		<tr>
				<th>Product</th>
				<th>SKU</th>
				<th>Serial No.</th>
				<th>Status</th>
				<th>Location</th>
				<th>Contact</th>
				<th>Return Date</th>
		
				</tr>";
		if ($resultCheck >0){
			
			while($row = mysqli_fetch_assoc($result)){
				echo "<tr>";
				echo "<td>".$row['product_type']."</td>";
				echo "<td>".$row['product_sku']."</td>";
				echo "<td>".$row['product_serial']."</td>";
				echo "<td>".$row['product_status']."</td>";
				echo "<td>".$row['product_location']."</td>";
				echo "<td>".$row['product_contact']."</td>";
				echo "<td>".$row['product_return']."</td>";
				echo "</tr>";	
			}
		}
		echo "</table>";
		?>

		<div class = "calendar">
			<iframe src="https://calendar.google.com/calendar/embed?src=l6mqt57fc65giargt9avebv68k%40group.calendar.google.com&ctz=Australia%2FSydney" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
			</div>
		
			
		
	</div>
</section>
	




<?php
}else if (!isset($_SESSION['u_type']) || $_SESSION['u_type'] != 2){
			header("Location: ../index.php");
			exit();
}

	include_once 'footer.php';
?>