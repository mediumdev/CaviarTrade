<strong>Восстановление пароля</strong><br/><br/>

<?
	$err = -1;
	if (isset($_POST["rem_email"]))
	{
		$err = 0;
		$mail = $_POST["rem_email"];
		$newpassword = genPassword(10);
		$md5password = md5(md5($newpassword));
		$sql = "SELECT * FROM users WHERE email = '" . $mail . "'";
		$result = mysql_query($sql) or die(mysql_error());
		if (mysql_num_rows($result) > 0)
		{
			while ($row = mysql_fetch_assoc($result))
			{
				$id = $row['id'];
				$sql = "UPDATE users SET password = '" . $md5password . "' WHERE id = '".$id."'";
				if (mysql_query($sql))
				{
					if (sendMail($mail, "Восстановление пароля", "Ваш новый пароль:" . $newpassword . " (поменять его можно в настройках аккаунта)"))
					{
						echo "<font color='#009900'>Пароль выслан на указанный E-mail! <a href='../index.php' style='text-decoration:none;'><font color='#FF6600'>На главную.</font></a></font>";
					}
					else echo "<font color='#993300'>Ошибка при восстановлении пароля! <a href='../index.php?page=help' style='text-decoration:none;'><font color='#FF6600'>Свяжитесь с поддержкой</font></a> сайта.</font>";
				}
				else echo "<font color='#993300'>Ошибка при восстановлении пароля! <a href='../index.php?page=help' style='text-decoration:none;'><font color='#FF6600'>Свяжитесь с поддержкой</font></a> сайта.</font>";
			}
		}
		else $err ++;
	}
	
	if ($err != 0)
	{
?>
    <form style="font-size:12px;" method="post" id="rem_form" name="rem_form">
        <strong>E-mail:</strong><font color="#FF3300">*</font><br/>
        <font color="#333333" size="1">(на него будет выслан случайный пароль,<br/>
        поменять его можно будет в настройках аккаунта)</font><br/>
        <input style="font-size:14px; width:350px;" type="text" maxlength="46" value="" id="rem_email" name="rem_email" />
        <? if ($err > 0) echo "<font color='#FF3300'><br/>Такой E-mail не зарегистрирован</font>";?>
        <?
            //require_once("recaptcha/recaptchalib.php");
            //$publickey = "код с странички которая появляется после добавления сайта(код называется Public Key: и длинный код)";
            //echo recaptcha_get_html($publickey);
        ?>
        <br/><br/>
        <input type="button" value="Восстановить" style="cursor:pointer;" id="rem_submit" name="rem_submit" />
    </form>
    <br/><br/>
    <div style="width:340px; height:auto; padding:5px; border: 2px dotted #FF3300; background:#FFDDDE; visibility:hidden; font-size:12px; color:#900;" id="error">
        
    </div>
<?
	}
?>
<script type="text/javascript">
	$(document).ready(function(){
		$('#rem_submit').click(function(){
			var err_valid_email = false;
			var pattern = "";
			
			pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
            if (!pattern.test($('#rem_email').val()))
			{
				err_valid_email = true;
			}
			
			if (!err_valid_email) $('#rem_form').submit();
			else
			{
				$('#error').css("visibility", "visible");
				document.getElementById('error').innerHTML = document.getElementById('error').innerHTML + '- E-mail введен не верно!<br/>';
			}
		});
	});
</script>