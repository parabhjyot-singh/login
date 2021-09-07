<?php
require "header.php"
?>
<main>
	<?php
	if(isset($_SESSION['userId'])){
		echo '<p style="color: red";>You are Logged In</p>';
	}
	else{
		echo '<p style="color: red";>You are Logged Out</p>';
	}
?>
</main>
<?php 
require "footer.php"
?>
