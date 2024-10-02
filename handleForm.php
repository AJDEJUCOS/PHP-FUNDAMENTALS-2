<?php 
session_start();

// Check if the login button is pressed
if(isset($_POST['loginBtn'])) {
	if(isset($_SESSION['firstName'])) {
		// Set a flag indicating that a login attempt was made while already logged in
		$_SESSION['loginAttempt'] = true;
	} else {
		// Get the first name from index.php
		$firstName = $_POST['firstName'];

		// Get the password from the input field
		$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Use password_hash instead of md5 for security

		// Set the session variables
		$_SESSION['firstName'] = $firstName;
		$_SESSION['password'] = $password;

		// Clear the login attempt flag if user successfully logs in
		unset($_SESSION['loginAttempt']);
	}

	// Go back to index.php
	header('Location: index.php');
	exit();
}

if(isset($_POST['logoutBtn'])) {
	session_unset(); // Delete all session variables
	header('Location: index.php'); // Go back to homepage
	exit();
}
?>
