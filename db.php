<?php
// Enter your Host, username, password, database below.
// I left password empty because i do not set password on localhost.
$dbinfo = array(
		'hostname' => '127.0.0.2:3306',
		'username' => 'jamg',
		'password' => '12261994',
		'dbName' => 'jamg'
		);
$con = mysqli_connect(
		$dbinfo['hostname'], 
		$dbinfo['username'], 
		$dbinfo['password'],
		$dbinfo['dbName']
		);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>