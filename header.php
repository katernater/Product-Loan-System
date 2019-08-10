<?php
session_start();
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Product Loan Requests</title>

	<link rel = 'stylesheet' type = "text/css" href='style.css'>
	<script src="includes/jquery-3.2.1.min.js"></script>
	<script>
		$(document).ready(function() { //do not delete this line

			$('h4').click(function() {
				$('.hiddenContent').slideUp(300);
				$(this).next().stop().slideDown();
		});

}); //do not delete this line
	
	function goBack(){
		window.history.back();
	}
	</script>
	
	</head>
<body>
<div class = "wrap">
<header>
	<nav>
		<div class = "main-wrapper">
			<ul class = "navi">
				<li>
					<a href="index.php"><img src = "" alt = "Home"></a>
				</li>


				
			</ul>
			
			<div class = "nav_login">
			
			<?php
				if (isset($_SESSION['u_id'])){
					
					echo '				<form action = "includes/logout.inc.php" method= "POST">
					<button type = "submit" name = "submit" class = "enter">
						Logout
					</button>
				</form>';
				} else {
					
					echo '			<form action = "includes/login.inc.php" method = "POST">
				<input type = "text" name = "uid" placeholder = "Username/e-mail">
				<input type = "password" name = "pwd" placeholder = "password">
				<button type = "submit" name = "submit" class = "enter">Login</button>
			</form>
			<a id = "sign" href="signup.php">Sign Up</a>';
				}
				?>
				
			</div>
		
		</div>
	</nav>
</header>