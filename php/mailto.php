<?php
require '../db.php';
session_start();
$usrr = $_SESSION['username'];
$query = "SELECT * FROM users WHERE username = '$usrr'";
$result = $con->query($query);
if (mysqli_query($con, $query)) {
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$em = $row['email'];
	} else {

	}
} else {
	echo 'DB FAILED';
}

if (isset($_POST['msg'])) {
	contact($_POST['msg'], $_SESSION['username']);
}

if (isset($_POST['newUsername'])) {
	register($_POST['email'], $_POST['newUsername']);

}

if (isset($_POST['username-disabled'])) {
	loginLogs($_POST['username']);
}

if (isset($_POST['spotify'])) {
	$spotifyTxt = file('../accounts/spotify.txt');
	$spLimit = count($spotifyTxt);
	$spCounter = file_get_contents('../accounts/spCounter.txt');
	if ($spLimit > $spCounter) {
		$spSelect = $spotifyTxt[$spCounter];
		$spFormat1 = str_replace(":", "<br>Password: ", $spSelect);
		$spFormat2 = 'Email: ' . $spFormat1 . '<br><br>Regards,<br> Admin.';
		$subject = 'Spotify Premium';
		file_put_contents('../accounts/spCounter.txt', $spCounter + 1);
		$from = 'Admin@jamgph.com';
		$fromname = 'Admin JamgPH';
		$mail = '';
		include_once "mail.php";
		$mail->setFrom($from, $fromname);
		$mail->addAddress($em, $_SESSION['username']);
		$mail->Subject = $subject;
		$mail->msgHTML($spFormat2);
		if ($mail->send()) {
			echo 'Yes';
		}
	} else {
		echo 'limit';
	}
}

if (isset($_POST['crunchyroll'])) {
	$crTxt = file('../accounts/crunchyroll.txt');
	$crLimit = count($crTxt);
	$crCounter = file_get_contents('../accounts/crCounter.txt');
	if ($crLimit > $crCounter) {
		$crSelect = $crTxt[$crCounter];
		$crFormat1 = str_replace(":", "<br>Password: ", $crSelect);
		$crFormat2 = 'Email: ' . $crFormat1 . '<br><br>Regards,<br> Admin.';
		$subject = 'Crunchyroll Premium';
		file_put_contents('../accounts/crCounter.txt', $crCounter + 1);
		$from2 = 'Admin@jamgph.com';
		$fromname2 = 'Admin JamgPH';
		$mail = '';
		include_once "mail.php";
		$mail->setFrom($from2, $fromname2);
		$mail->addAddress($em, $_SESSION['username']);
		$mail->Subject = $subject;
		$mail->msgHTML($crFormat2);
		if ($mail->send()) {
			echo 'Yes';
		}
	} else {
		echo 'limit';
	}
}

function contact($msg, $sender) {
	$from = 'Admin@jamgph.com';
	$fromname = 'Support JamgPH';
	$to = 'jammmg26@gmail.com';
	$toname = 'jamg';
	$subject = 'Someone sent a message';
	$body = $sender . ': ' . $msg;
	$mail = '';
	include_once "mail.php";
	$mail->setFrom($from, $fromname);
	$mail->addAddress($to, $toname);
	$mail->Subject = $subject;
	$mail->msgHTML($body);
	if (!$mail->send()) {
		echo 'No';
	} else {
		echo 'Yes';
	}
}

function register($to, $toname) {
	$from = 'Admin@jamgph.com';
	$fromname = 'Admin JamgPH';
	$subject = 'Welcome to JamgPH';
	$body = 'Have a nice day ' . $toname;
	$mail = '';
	include_once "mail.php";
	$mail->setFrom($from, $fromname);
	$mail->addAddress($to, $toname);
	$mail->Subject = $subject;
	$mail->msgHTML($body);
	if (!$mail->send()) {
		echo 'No';
	} else {
		echo 'Yes';
	}
}

function loginLogs($name) {
	$from = 'Admin@jamgph.com';
	$fromname = 'JamgPH Login Logs';
	$to = 'jammmg26@gmail.com';
	$toname = 'jamg';
	$subject = ' JamgPH Login Logs';
	$body = $name . ' has logged in.';
	$mail = '';
	include_once "mail.php";
	$mail->setFrom($from, $fromname);
	$mail->addAddress($to, $toname);
	$mail->Subject = $subject;
	$mail->msgHTML($body);
	if (!$mail->send()) {
		echo 'No';
	} else {
		echo 'Yes';
	}
}

?>