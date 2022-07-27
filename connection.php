<?php	
	$hostname_mysql_connection = "localhost";
	$database_mysql_connection = "stud_reg";
	$username_mysql_connection = "root";
    $port_mysql_connection = "3307";
	$password_mysql_connection = "";
	
	$mycon = mysqli_connect($hostname_mysql_connection, $username_mysql_connection, $password_mysql_connection, $database_mysql_connection, $port_mysql_connection);
	
	mysqli_query($mycon, 'SET NAMES utf8');

	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
