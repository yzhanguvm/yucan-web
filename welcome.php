<html>
	<?php
		$username = $_SESSION['username'];
	?>
	<body>
		
		<h2>Welcome, <?php echo escape_html($username) ?>!</h2>
	</body>
</html>