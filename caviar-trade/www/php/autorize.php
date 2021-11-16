<strong>Авторизация</strong><br/><br/>

<?
	if ((isset($_POST["aut_login"])) && (isset($_POST["aut_password"])) && (isset($_POST["aut_path"])))
	{
		$path = $_POST["aut_path"];
		$login = $_POST["aut_login"];
		$password = $_POST["aut_password"];
		$md5password = md5(md5($password));
		
		$sql = "SELECT * FROM users WHERE login = '" . $login . "' AND password = '".$md5password."'";
		$result = mysql_query($sql) or die(mysql_error());
		if (mysql_num_rows($result) > 0)
		{
			while ($row = mysql_fetch_assoc($result))
			{
				$_SESSION["login"] = $login;
				$_SESSION["id"] = $row['id'];
				echo "<font color='#009900'>Вы успешно вошли в аккаунт! <a href='../index.php?page=profile' class='link_login'><font color='#FF6600'>Ваш профиль.</font></a></font>";
?>
				<script type="text/javascript">
					document.location.replace('<? echo $path;?>');
				</script>
<?				

			}
		}
		else echo "<font color='#993300'>Неверный логин или пароль! <a href='../index.php' style='text-decoration:none;'><font color='#FF6600'>На главную.</font></a> </font>";
	}
	else echo "<font color='#993300'>Вам нужно войти в аккаунт! <a href='../index.php' style='text-decoration:none;'><font color='#FF6600'>На главную.</font></a> </font>";
?>