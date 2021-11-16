<strong>Сменить пароль</strong><br/><br/>
<?
	$err = -1;
	if (isset($_POST["ch_old"]) && isset($_POST["ch_pass"]))
	{
		$err = 0;
		$pass = $_POST["ch_pass"];
		$old = $_POST["ch_old"];
		$md5old = md5(md5($old));
		$md5pass = md5(md5($pass));
		
		$sql = "UPDATE users SET password = '" . $md5pass . "' WHERE id = " . $_SESSION["id"] . " AND password = '" . $md5old . "'";
		if (mysql_query($sql))
		{
			if (mysql_affected_rows() > 0)
			{
				echo "<font color='#009900'>Вы успешно сменили пароль. <a href='../index.php?page=profile' class='link_login'><font color='#FF6600'>Ваш профиль.</font></a></font>";
			}
			else $err++;
		}
		else echo "<font color='#993300'>Ошибка при смене пароля! Попробуйте <a href='..".$_SERVER['REQUEST_URI']."' class='link_login'><font color='#FF6600'>еще раз</font></a> или <a href='../index.php?page=help' class='link_login'><font color='#FF6600'>свяжитесь с поддержкой сайта</font></a>.</font>";
	}
	
	if ($err != 0)
	{
?>
    <form style="font-size:12px;" method="post" id="reg_form" name="reg_form">
        <strong>Старый пароль:</strong> <font color="#FF3300">*</font><br/>
        <input style="font-size:14px; width:350px;" type="password" maxlength="20" value="" id="ch_old" name="ch_old" /><br/>
        <? if ($err == 1) echo "<font color='#FF3300'><br/>Не правельно введен пароль!</font>";?><br/>
        <strong>Новый пароль:</strong> <font color="#333333">(6 - 20 латинских символов)</font> <font color="#FF3300">*</font><br/>
        <input style="font-size:14px; width:350px;" type="password" maxlength="20" value="" id="ch_pass" name="ch_pass" /><br/><br/>
        <strong>Повторите пароль:</strong> <font color="#333333">(пароли должны совпадать)</font> <font color="#FF3300">*</font><br/>
        <input style="font-size:14px; width:350px;" type="password" maxlength="20" value="" id="ch_repass" name="ch_repass" /><br/><br/>
        <input type="button" value="Сменить пароль" style="cursor:pointer;" id="ch_submit" name="ch_submit" />
    </form>
    <br/><br/>
    <div style="width:340px; height:auto; padding:5px; border: 2px dotted #FF3300; background:#FFDDDE; visibility:hidden; font-size:12px; color:#900;" id="error">
        
    </div>
<?
	}
?>

<script type="text/javascript">
	$(document).ready(function(){
		$('#ch_submit').click(function(){
			var err_valid_password = false;
			var err_re = false;
			var pattern = "";
			
			pattern = /^[\.\+\*a-z0-9_-]{6,20}$/i;
            if (!pattern.test($('#ch_pass').val()))
			{
				err_valid_password = true;
			}
			
			if ($('#ch_pass').val() != $('#ch_repass').val())
			{
				err_re = true;
			}
			
			if ((!err_re) && (!err_valid_password)) $('#reg_form').submit();
			else
			{
				$('#error').css("visibility", "visible");
				document.getElementById('error').innerHTML = "";
				if (err_valid_password) document.getElementById('error').innerHTML = document.getElementById('error').innerHTML + '- Пароль может содержать 6-20 латинских символов, цыфры, знаки +*_- и точка (.)!<br/>';
				if (err_re) document.getElementById('error').innerHTML = document.getElementById('error').innerHTML + '- Пароли должны совпадать!<br/>';
			}
		});
	});
</script>
