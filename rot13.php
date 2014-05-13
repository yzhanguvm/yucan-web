<html>
	<body>
		<?php
		if (array_key_exists('content', $_POST)) {
			echo "<h3>You wrote:</h3>";
			echo htmlspecialchars($_POST['content']);
			echo "<br/>";
			echo "<h3>ROT13:</h3>";
			echo +str_rot13($_POST['content']);
		}
		?>
		<form action="/rot13" method="post">
			<h2>Enter some text to ROT13:</h2>
			<div>
				<textarea name="content" rows="3" cols="60"></textarea>
			</div>			
			<div>
				<input type="submit" value="Submit">
			</div>
		</form>
	</body>
</html>
