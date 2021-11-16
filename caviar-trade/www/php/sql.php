<?
	include "connect1.php";
	
	mysql_query("CREATE TABLE IF NOT EXISTS users (
				  id INT AUTO_INCREMENT,
				  login CHAR(15) DEFAULT '',
				  password CHAR(32) DEFAULT '',
				  email CHAR(50) DEFAULT '',
				  refid INT DEFAULT '1',
				  regdate DATETIME,
				  fish1 INT DEFAULT '0',
				  fish2 INT DEFAULT '0',
				  fish3 INT DEFAULT '0',
				  fish4 INT DEFAULT '0',
				  fish5 INT DEFAULT '0',
				  fish6 INT DEFAULT '0',
				  fish7 INT DEFAULT '0',
				  warecav1 INT DEFAULT '0',
				  warecav2 INT DEFAULT '0',
				  warecav3 INT DEFAULT '0',
				  warecav4 INT DEFAULT '0',
				  warecav5 INT DEFAULT '0',
				  warecav6 INT DEFAULT '0',
				  warecav7 INT DEFAULT '0',
				  checkwarecav INT(11) DEFAULT '0',
				  caviar1 INT DEFAULT '0',
				  caviar2 INT DEFAULT '0',
				  caviar3 INT DEFAULT '0',
				  caviar4 INT DEFAULT '0',
				  caviar5 INT DEFAULT '0',
				  caviar6 INT DEFAULT '0',
				  caviar7 INT DEFAULT '0',
				  checkcaviar INT(11) DEFAULT '0',
				  caviar INT DEFAULT '0',
				  gold1 FLOAT DEFAULT '0',
				  gold2 FLOAT DEFAULT '0',
				  goldref FLOAT DEFAULT '0',
				  bonusdate DATETIME,
				  bonusnum INT DEFAULT '0',
				  goldall FLOAT DEFAULT '0',
				  goldspent FLOAT DEFAULT '0',
				  paid INT DEFAULT '0',
				  recd INT DEFAULT '0',
				  PRIMARY KEY(id)
				)") Or die(mysql_error());
				
	mysql_query("CREATE TABLE IF NOT EXISTS payments (
				  id INT AUTO_INCREMENT,
				  userid INT DEFAULT '0',
				  type CHAR(10) DEFAULT '',
				  amount INT DEFAULT '0',
				  orderid INT DEFAULT '0',
				  date DATETIME,
				  PRIMARY KEY(id)
				)") Or die(mysql_error());
?>