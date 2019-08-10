<?php
	include_once 'header.php';
?>

<section = "main-container">
	<div class = "index">
		<h2>Sign Up</h2>
		<form class = "signup-form" action="includes/signup.inc.php" method="POST">
			<input type = "text" name= 'first' placeholder = 'First Name'>
			<input type = "text" name= 'last' placeholder = 'Last Name'>
			<input type = "text" name= 'email' placeholder = 'Email Address'>
			<input type = "text" name= 'uid' placeholder = 'Username'>
			<input type = "password" name= 'pwd' placeholder = 'Password'>
			
			<input type = "text" name= 'company' placeholder = 'Company'>
			<input type = "text" name= 'ad1' placeholder = 'Address 1'>
			<input type = "text" name= 'ad2' placeholder = 'Address 2'>
			<input type = "text" name= 'city' placeholder = 'City'>
			
			<select required name= 'state'>
				<option value ="ACT">Australian Capital Territory</option>
				<option value ="NSW">New South Wales</option>
				<option value ="NZ">New Zealand</option>
				<option value ="NT">Northern Territory</option>
				<option value ="QLD">Queensland</option>
				<option value ="SA">South Australia</option>
				<option value ="VIC">Victoria</option>
				<option value ="WA">Western Australia</option>
				<option value ="NT">Northern Territory</option>

			</select>
			
			<input type = "text" name= 'postcode' placeholder = 'Postcode'>
			<input type = "text" name= 'phone' placeholder = 'Phone Number'>
			<select required name = "contact">
			    <option value ="NILL">Select Contact</option>
				<option value ="ONE">Contact One</option>
				<option value ="TWO">Contact Two</option>
				<option value ="THREE">Contact Three</option>
			</select>
 			<button type = 'submit' name='submit'>
				Sign Up
			</button>
		</form>
	</div>
</section>



<?php
	include_once 'footer.php';
?>
