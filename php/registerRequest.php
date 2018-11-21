<?php
if (isset($_POST["user"])) {
	$con = '';
	require '../db.php';
	$username = stripslashes($_POST['user']);
	$username = mysqli_real_escape_string($con, $username);
	$email = stripslashes($_POST['email']);
	$email = mysqli_real_escape_string($con, $email);
	$password = stripslashes($_POST['pass']);
	$password = mysqli_real_escape_string($con, $password);
	$trn_date = date("Y-m-d H:i:s");
	$query = "INSERT into `users` (username, password, email, trn_date)
				VALUES ('$username', '" . md5($password) . "', '$email', '$trn_date')";
	$pass2 = $_POST['pass2'];
	if ($password == $pass2) {
		$emailConfirm = "SELECT * FROM users WHERE email = '$email' OR username = '$username'";
		$emailCheck = mysqli_query($con, $emailConfirm);
		$num_rows = mysqli_num_rows($emailCheck);
		if ($num_rows) {
			//duplicate email or username
			echo 'Dup';
		} else {
			$result = mysqli_query($con, $query);
			if ($result) {
				//successfully registered
				echo 'Yes';
			} else {
				echo 'No';
			}
		}
	} else {
		// password not matched
		echo 'Not';
	}
}
?>