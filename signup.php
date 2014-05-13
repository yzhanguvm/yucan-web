<!DOCTYPE html>

<html>
	<?php
		
		$username_error = $password_error = $verify_error = $email_error = "";
		$username = $password = $verPassword = $email = "";

		if ($_SERVER["REQUEST_METHOD"] == "POST") {

			if (empty($_POST['username'])) {
				$username_error = "Name is required.";
			} else {
				$username = htmlspecialchars($_POST['username']);
				if (!valid_username($username)) {
					$username_error = "This is not a valid username.";
				}
			}
			
			if (empty($_POST['password'])) {
				$password_error = "Password is required.";
			} else {
				$password = htmlspecialchars($_POST['password']);
			}
			
			if (empty($_POST['verPassword']) || !valid_password($_POST['password'], $_POST['verPassword'])) {
				$verify_error = "Your password did not match.";
			}
		
			if (array_key_exists('email', $_POST) && !valid_email($_POST['email'])) {
				$email_error = "This is not a valid email address.";
			}
			
		}
		if (!empty($_POST['username']) && valid_username($_POST['username'])
		&& !empty($_POST['password']) && valid_password($_POST['password'], $_POST['verPassword'])
		&& (empty($_POST['email']) || valid_email($_POST['email']))) {
			header("Location: welcome.php", true, 302);
		}
		
		function valid_username($username) {
			return preg_match('/^[a-zA-Z_]*[a-zA-Z0-9_]*$/', $username);
		}
		function valid_password($password, $verPassword) {
			return strcmp($password, $verPassword) == 0;
		}
		function valid_email($email) {
			return preg_match("/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/", $email);
		}
	?>
			
	<style>
		.error {
			color: red;
		}
        .left {
            position:relative;
            width:10%;
            text-align:right;
            float:left;
            font-size:18px;
            margin-top:6px;
            margin-bottom:6px;
        }
        
        .right {
            position:relative;
            width:90%;
            text-align:left;
            float:right;
            margin-top:6px;
            margin-bottom:6px;
        }
    </style>
	<body>
		
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" > 
			<h2>Sign up</h2>
			<p class="error">* required fileds</p>
			<label>
				<div class="left">
					Username
				</div>
				<div class="right">
					<input type="text" name="username" />
					<span class="error">*</span><label class="error"> <?php echo $username_error; ?></label>
				</div>
			</label>
			<br/>
			<label>
				<div class="left">
					Password
				</div>
				<div class="right">
					<input type="password" name="password" />
					<span class="error">*</span><label class="error"> <?php echo $password_error; ?></label>
				</div>
			</label>
			<br/>
			<label>
				<div class="left">
					Verify Password
				</div>
				<div class="right">
					<input type="password" name="verPassword" />
					<label class="error"> <?php echo $verify_error ?></label>
				</div>
			</label>
			<br/>
			<label>
				<div class="left">
					Email(optional)
				</div>
				<div class="right">
					<input type="email" name="email" value="xx@x.xxx" />
					<label class="error"> <?php echo $email_error ?></label>
				</div>
			</label>
			<br/>
			<input type="submit" value="Submit" />
		</form>
	</body>
</html>
