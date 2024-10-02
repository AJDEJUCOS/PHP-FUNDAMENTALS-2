<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login System</title>
</head>
<body>
	<?php session_start(); ?>

	<!-- Login Form -->
	<form action="handleForm.php" method="POST">
		<p>Username <input type="text" name="firstName" required></p>
		<p>Password <input type="password" name="password" required></p>
		<p><input type="submit" value="Login" name="loginBtn"></p>
	</form>

	<!-- Logout Button (Always show this) -->
	<form action="unset.php" method="POST">
		<p><input type="submit" value="Logout" name="logoutBtn"></p>
	</form>

	<!-- Show message if a login attempt is made while logged in -->
	<?php if(isset($_SESSION['loginAttempt'])): ?>
		<h2><?php echo htmlspecialchars($_SESSION['firstName']); ?> is already logged in. Please log out before logging in again.</h2>
		<?php unset($_SESSION['loginAttempt']); // Clear the flag after displaying the message ?>
	<?php endif; ?>

	<!-- Show user info only if there is no login attempt -->
	<?php if(!isset($_SESSION['loginAttempt']) && isset($_SESSION['firstName'])): ?>
		<h2>User logged in: <?php echo htmlspecialchars($_SESSION['firstName']); ?></h2>
		<h2>Password: <?php echo $_SESSION['password']; ?></h2>
	<?php endif; ?>

</body>
</html>
