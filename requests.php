<?php
include_once 'header.php';
include_once 'includes/dbh.inc.php';

?>
	
	
<section = "main-container">
	<div class = "index">
		<h2>Current Requests</h2>
		
			<?php
		$sql = "SELECT * FROM requests;";
		$result = mysqli_query($conn, $sql);
	
		$resultCheck = mysqli_num_rows($result);

		
		if ($resultCheck >0){
			
			while($row = mysqli_fetch_assoc($result)){
				echo "<div class = 'requests'>";
				echo "<h4> ".$row['request_user']." Request Date: ".$row['request_date']."</h4>";
				echo "<div class = 'hiddenContent'>"; 
				echo "<p>Requester: ".$row['request_user']."</p>";
				echo "<p>Product: ".$row['request_product']."</p>";
				echo "<p>Date Requested: ".$row['request_date']."</p>";
				
				$id = $row['request_id'];
				$foo = $row['request_user'];
				$sql2 = "SELECT * FROM users WHERE user_uid =  '$foo'";
				$details = mysqli_query($conn, $sql2);
				$detailsCheck = mysqli_num_rows($details);
				
				if ($detailsCheck > 0){
					while ($row2 = mysqli_fetch_assoc($details)){
						echo "<p>Shipping Details</p>";
						echo "<p>Name: ".$row2['user_first']. " ".$row2['user_last']."</p>";
						echo "<p>Company: ".$row2['user_company']."</p>";
						echo "<p>Email: ".$row2['user_email']."</p>";
						echo "<p>Phone: ".$row2['user_phone']."</p>";
						echo "<p>Address:</p>";
						echo "<p>".$row2['user_address1']."</p>";
						echo "<p>".$row2['user_address2']."</p>";
						echo "<p>".$row2['user_city']."<p>";
						echo "<p>".$row2['user_state'].", ".$row2['user_postcode']."</p>";
						echo "<p>Contact: ".$row2['user_contact']."</p>";
						
					}
				
				}
				

				
				/*echo "</div>";*/
				//$id = $row['request_id'];
				$user = $row['request_user'];
				echo "<form class = 'acceptrequestform' action= 'includes/accrequest.inc.php' method= 'POST'> 
				<input type = 'hidden' name = 'id' value =".$row['request_id'].">
				<input type = 'hidden' name = 'contact' value =".$row['request_user'].">
	
	
				<input type = 'text' name= 'accept' placeholder = 'Serial Number'>
				<input type = 'text' name= 'date' placeholder = 'Return Date DD/MM/YYYY'>
				<button type = 'submit' name= 'reqsend'>
				Accept and Send Loan Unit
			    </button>
					</form>";
				echo "
				<form class = 'rejectrequest' action = 'includes/reject.inc.php' method = 'POST'>
				<input type = 'hidden' name = 'id' value =".$id.">
				<input type = 'hidden' name = 'user' value =".$foo.">
				<button type = 'submit' name='reject'>
				Reject Request
			    </button>
				</div>
				</div>";
			}
		}
	?>
	<form action='/adminpage.php'>
    <input type="hidden" value="Go Back" />
    </form>
	<button onclick = "window.location.href ='/adminpage.php'" class = "backbutton">Go Back</button>
	</div>
</section>
	




<?php
	include_once 'footer.php';
?>