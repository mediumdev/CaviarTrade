<?
	$server = "localhost";
	$db_username = "caviartrade";
	$db_name = "caviartrade";
	$db_password = "123";
	
	mysql_connect($server, $db_username, $db_password) or die(mysql_error());
	mysql_select_db($db_name) or die(mysql_error());
?>