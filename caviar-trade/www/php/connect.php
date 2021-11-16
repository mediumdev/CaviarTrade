<?
	$server = "mysql67.1gb.ru";
	$db_username = "gb_x_cavia28d";
	$db_name = "gb_x_cavia28d";
	$db_password = "214890fe234";
	
	mysql_connect($server, $db_username, $db_password) or die(mysql_error());
	mysql_select_db($db_name) or die(mysql_error());
?>