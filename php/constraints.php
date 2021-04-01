<?php

$host = 'localhost';
	$user = 'bloooybt_alphadev';
	$password = '';
	$database = 'blog';

	$mysqli = new MYSQLi($host, $user, $password, $database);
	if($mysqli -> connect_error){
		echo 'Connection Failed! Error #' . $mysqli -> connect_errno . ": " . $mysqli -> connect_error;
		exit(0);
	}

?>