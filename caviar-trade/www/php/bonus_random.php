<strong>Случайный подарок</strong><br/><br/>
<?
	if (getBonusNum($_SESSION['id'], 1) > 0)
	{
		$percent = rand(1, 100);
		$gold = rand(10, 100);
		$caviar = 0;
		$fish = 0;
		if ($percent>80) $caviar = rand(100, 1000);
		if ($percent>95) $fish = 1;
		$sql = "UPDATE users SET gold1 = gold1 + " . $gold . ", goldall = goldall + " . $gold . ", warecav1 = warecav1 + " . $caviar . ", fish1 = fish1 + " . $fish . " WHERE id = " . $_SESSION['id'];
		if (mysql_query($sql))
		{
			echo "<strong>Ваш подарок:</strong><br/>";
			if ($gold > 0) echo "Золото - " . $gold . "<br/>";
			if ($caviar > 0) echo "Икра салатовой рыбы - " . $caviar . " шт. (на складе)<br/>";
			if ($fish > 0) echo "Салатовая рыбка - " . $fish . "<br/>";
			
			echo "<br/><br/><br/>Подарок получен! <a href='../index.php?page=bonus' class='link_login'><font color='#FF6600'>На страницу выбора подарка.</font></a>";
		}
		else drawError();
	}
	else 
	{
?>
		<font color='#FF3300'><strong>Подарок недоступен!</strong></font>
<?
	}
?>