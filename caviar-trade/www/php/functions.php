<?
	include "config.php";

	function genPassword($number)  
	{  
		$arr = array('a','b','c','d','e','f',  
					 'g','h','i','j','k','l',  
					 'm','n','o','p','r','s',  
					 't','u','v','x','y','z',  
					 'A','B','C','D','E','F',  
					 'G','H','I','J','K','L',  
					 'M','N','O','P','R','S',  
					 'T','U','V','X','Y','Z',  
					 '1','2','3','4','5','6',  
					 '7','8','9','0','.','+',
					 '-','*','_');
		// Генерируем пароль  
		$pass = "";  
		for($i = 0; $i < $number; $i++)  
		{  
		  // Вычисляем случайный индекс массива  
		  $index = rand(0, count($arr) - 1);  
		  $pass .= $arr[$index];  
		}  
		return $pass;  
	}
	
	function sendMail($email, $subject, $message)
	{
		require_once "phpmailer/PHPMailerAutoload.php";
		$mail = new PHPMailer();
		$mail->SetFrom("admin@caviar-trade.ru", "support caviar-trade.ru");
		$mail->AddAddress($email, "");
		$mail->Subject = $subject;
		$mail->Body = $message;
		$mail->XMailer = "caviar-trade.ru";
		
		if(!$mail->Send()){
			return false;
		}else{
			return true;
		}
	}
	
	function days($d)
	{
		return 'д'. numberEnd($d, array('ень', 'ня', 'ней'));
	}

	function numberEnd($number, $titles)
	{
		$cases = array (2, 0, 1, 1, 1, 2);
	    return $titles[ ($number%100>4 && $number%100<20)? 2 : $cases[min($number%10, 5)] ];
	}
	
	function drawError()
	{
		?>
		<strong><font color='#FF3300'>Ошибка! <a href='../index.php?page=help' class='link_login'><font color='#FF6600'>Cвяжитесь с поддержкой сайта.</font></a></font></strong>
        <?
	}

	function getMaxUsers($lastday = false)
	{
		if (!$lastday) $query = mysql_query("SELECT COUNT(*) FROM users");
		else $query = mysql_query("SELECT COUNT(*) FROM users WHERE regdate>NOW()-INTERVAL 24 HOUR");
		$row = mysql_fetch_row($query);
		return $row[0];
	}
	
	function getRowSum($row)
	{
		$query = mysql_query("SELECT SUM(".$row.") FROM users");
		$result = mysql_fetch_row($query);
		return $result[0];
	}
	
	function getAllDays()
	{
		$sql = "SELECT * FROM users WHERE id = 1";
		$result = mysql_query($sql);
		if (mysql_num_rows($result) > 0)
		{
			while ($rows = mysql_fetch_assoc($result))
			{
				$date1 = strtotime($rows["regdate"]);
				$date2 = strtotime(date('Y-m-d H:i:s'));
				return (int)(($date2 - $date1) / 86400);
			}
		}
		return 0;
	}
	
	function getUserInfo($id, $row)
	{
		$sql = "SELECT * FROM users WHERE id = " . $id;
		$result = mysql_query($sql);
		if (mysql_num_rows($result) > 0)
		{
			while ($rows = mysql_fetch_assoc($result))
			{
				return $rows[$row];
			}
		}
		return false;
	}
	
	function getBonusNum($id, $lost = 0)
	{
		$sql = "SELECT * FROM users WHERE id = " . $id;
		$result = mysql_query($sql);
		if (mysql_num_rows($result) > 0)
		{
			while ($row = mysql_fetch_assoc($result))
			{
				$date1 = date('Y-m-d H:i:s', strtotime($row['bonusdate']));
				$date2 = date('Y-m-d H:i:s');
				$bonusday = strtotime($date1) / 86400;
				$currentday = strtotime($date2) / 86400;
				$passed = floor($currentday - $bonusday);
				$bonusnum = $row["bonusnum"];
				$tempbonusnum = $bonusnum;
				$bonusnum += $passed;
				if ($bonusnum > 0) $bonusnum -= $lost;
				$sql = "UPDATE users SET bonusnum = " . $bonusnum . ", bonusdate = '" . $date2 . "' WHERE id = " . $id;
				if (mysql_query($sql))
				{
					if ($lost > 0) return $tempbonusnum;
					return $bonusnum;
				}
			}
		}
		return 0;
	}
	
	function buyFish($fish, $id)
	{
		$price = array(0, 100, 1000, 5000, 10000, 30000, 60000, 100000);
		$gold = getUserInfo($id, "gold1");
		$ind = (int)($fish);
		if ($price[$ind] <= $gold)
		{
			$sql = "UPDATE users SET gold1 = gold1 - " . $price[$ind] . ", fish" . $ind . " = fish" . $ind . " + 1, goldspent = goldspent + " . $price[$ind] . " WHERE id = " . $id;
			if (mysql_query($sql))
			{
				return $ind;
			}
			else return -1;
		}
		else return 0;
	}
	
	function checkCaviar($id)
	{
		$sql = "SELECT * FROM users WHERE id = " . $id;
		$res = mysql_query($sql);
		if (mysql_num_rows($res) > 0)
		{
			while ($row = mysql_fetch_assoc($res))
			{
				global $_f_fish1;
				global $_f_fish2;
				global $_f_fish3;
				global $_f_fish4;
				global $_f_fish5;
				global $_f_fish6;
				global $_f_fish7;
				$fish1 = $row["fish1"];
				$fish2 = $row["fish2"];
				$fish3 = $row["fish3"];
				$fish4 = $row["fish4"];
				$fish5 = $row["fish5"];
				$fish6 = $row["fish6"];
				$fish7 = $row["fish7"];
				$checksec = $row['checkwarecav'];
				$cursec = time();
				$passed = floor(($cursec) - ($checksec));
				$pfish1 = $_f_fish1 / 3600 * $passed * $fish1;
				$pfish2 = $_f_fish2 / 3600 * $passed * $fish2;
				$pfish3 = $_f_fish3 / 3600 * $passed * $fish3;
				$pfish4 = $_f_fish4 / 3600 * $passed * $fish4;
				$pfish5 = $_f_fish5 / 3600 * $passed * $fish5;
				$pfish6 = $_f_fish6 / 3600 * $passed * $fish6;
				$pfish7 = $_f_fish7 / 3600 * $passed * $fish7;
				$resarr = array(0, round($pfish1), round($pfish2), round($pfish3), round($pfish4), round($pfish5), round($pfish6), round($pfish7));
				$sql1 = "UPDATE users SET warecav1 = warecav1 + " . $resarr[1] . 
										", warecav2 = warecav2 + " . $resarr[2] . 
										", warecav3 = warecav3 + " . $resarr[3] . 
										", warecav4 = warecav4 + " . $resarr[4] . 
										", warecav5 = warecav5 + " . $resarr[5] . 
										", warecav6 = warecav6 + " . $resarr[6] . 
										", warecav7 = warecav7 + " . $resarr[7] .
										", checkwarecav = " . $cursec . " WHERE id = " . $id;
				if (mysql_query($sql1))
				{
					return $resarr;
				}
				return 0;
			}
			return 0;
		}
		return 0;
	}
	
	function giveCaviar($id, $cav1, $cav2, $cav3, $cav4, $cav5, $cav6, $cav7)
	{
		$sql = "SELECT * FROM users WHERE id = " . $id;
		$res = mysql_query($sql);
		if (mysql_num_rows($res) > 0)
		{
			while ($row = mysql_fetch_assoc($res))
			{
				$checksec = $row['checkcaviar'];
				$cursec = time();
				$passed = floor(($cursec) - ($checksec));
				if ($passed > 599)
				{
					$sql1 = "UPDATE users SET warecav1 = 0, warecav2 = 0, warecav3 = 0, warecav4 = 0, warecav5 = 0, warecav6 = 0, warecav7 = 0," . 
							" caviar1 = caviar1 + " . $cav1 . "," . 
							" caviar2 = caviar2 + " . $cav2 . "," . 
							" caviar3 = caviar3 + " . $cav3 . "," . 
							" caviar4 = caviar4 + " . $cav4 . "," . 
							" caviar5 = caviar5 + " . $cav5 . "," . 
							" caviar6 = caviar6 + " . $cav6 . "," . 
							" caviar7 = caviar7 + " . $cav7 . "," . 
							" checkcaviar = " . $cursec . " WHERE id = " . $id;
					if (mysql_query($sql1))
					{
						return $cav1 + $cav2 + $cav3 + $cav4 + $cav5 + $cav6 + $cav7;
					}
					return -1;
				}
				else return "early" . (600 - $passed);
			}
		}
		else return -1;
	}
	
	function saleCaviar($id, $cav)
	{
		$allgold = $cav / 100;
		$gold1 = round($allgold * 0.65, 2);
		$gold2 = round($allgold * 0.35, 2);
		$sql = "UPDATE users SET caviar1 = 0, caviar2 = 0, caviar3 = 0, caviar4 = 0, caviar5 = 0, caviar6 = 0, caviar7 = 0, " . 
				"gold1 = gold1 + " . $gold1 . ", gold2 = gold2 + " . $gold2 . ", goldall = goldall + " . round($allgold, 2) . " WHERE id = " . $id;
		if (mysql_query($sql))
		{
			return $cav;
		}
		return -1;
	}
	
	function generateOrderId()
	{
		$sql = mysql_query("SELECT id FROM payments ORDER BY id DESC LIMIT 1");
		if (mysql_num_rows($sql) > 0)
		{
			return $row["id"] + 1;
		}
		return 1;
	}
	
	function addPayment($amount, $userid)
	{
		$date = date('Y.m.d. H-i-s');
		$sql = "INSERT INTO payments (userid, type, amount, orderid, date) VALUES('" .$userid. "', 'payment', '" .$amount. "', '" .generateOrderId(). "','" .$date. "',)";
		if (mysql_query($sql))
		{
			return 1;
		}
		return 0;
	}
	
	function giveGold($gold, $id)
	{
		$sql = "UPDATE users SET gold1 = gold1 + " . $gold . ", goldall = goldall + " . $gold . " WHERE id = " . $id;
		if (mysql_query($sql))
		{
			return 1;
		}
		return 0;
	}
?>