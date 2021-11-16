<strong>Регистрация</strong><br/><br/>
<?
	$err = -1;
	$mail = "";
	$login = "";
	$recaptcha = -1;
	
	require_once('recaptcha/recaptchalib.php');
	$publickey = "6Ld7W-8SAAAAAM9DdJkJLy6fuLKU4Nme7PiFmHGb";
	$privatekey = "6Ld7W-8SAAAAAFF0MDyasFk8BpEx8jV88V4k5U4k";
	$error = null;
	
	if (isset($_POST["recaptcha_response_field"]))
	{
		$recaptcha = 0;
		$resp = recaptcha_check_answer($privatekey, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);
		if ($resp->is_valid) $recaptcha = 1;
	}
	
	if (isset($_POST["reg_email"]) && isset($_POST["reg_login"]) && isset($_POST["reg_pass"]) && isset($_POST["reg_ref"]))
	{
		$err = 0;
		$mail = $_POST["reg_email"];
		$login = $_POST["reg_login"];
		$pass = $_POST["reg_pass"];
		$ref = $_POST["reg_ref"];
		$pass = md5(md5($pass));
		
		$sql = "SELECT * FROM users WHERE login = '" . $login . "'";
		$result = mysql_query($sql) or die(mysql_error());
		if (mysql_num_rows($result) > 0) $err ++;
		
		$sql = "SELECT * FROM users WHERE email = '" . $mail . "'";
		$result = mysql_query($sql) or die(mysql_error());
		if (mysql_num_rows($result) > 0) $err += 2;
		
		if (($err == 0) && ($recaptcha == 1))
		{
			$date = date('Y.m.d. H-i-s');
			$secdate = time();
			$sql = 'INSERT INTO users (email, login, password, refid, regdate, bonusdate, bonusnum, checkwarecav, gold1, goldall) VALUES("'.$mail.'", "'.$login.'", "'.$pass.'", "'.$ref.'", "'.$date.'", "'.$date.'", 1, '.$secdate.', 100, 100)';
			if (mysql_query($sql))
			{
				echo "<font color='#009900'>Регистрация прошла успешно! Вы можете войти в аккаунт.<a href='../index.php' class='link_login'><font color='#FF6600'>На главную.</font></a></font>";
				echo "<br/><font color='#FF6600'><strong>Получен бонус: 100 золота.</strong></font>";
			}
			else echo "<font color='#FF3300'>Ошибка при регистрации! Попробуйте <a href='..".$_SERVER['REQUEST_URI']."' class='link_login'><font color='#FF6600'>еще раз</font></a> или <a href='../index.php?page=help' class='link_login'><font color='#FF6600'>свяжитесь с поддержкой сайта</font></a>.</font>";
		}
	}
	
	$ref_login = "";
	$ref_id = "";
	$ref = 1;
	if (isset($_GET["ref"])) $ref = $_GET["ref"];
	$sql = "SELECT * FROM users WHERE id = " . $ref;
	$result = mysql_query($sql) or die(mysql_error());
	if (mysql_num_rows($result) > 0)
	{
		while ($row = mysql_fetch_assoc($result))
		{
			$ref_login = $row['login'];
			$ref_id = $ref;
		}
	}
	else
	{
		$sql = "SELECT * FROM users WHERE id = 1";
		$result = mysql_query($sql) or die(mysql_error());
		while ($row = mysql_fetch_assoc($result))
		{
			$ref_login = $row['login'];
			$ref_id = $row['id'];
		}
	}
	
	if (($err != 0) || ($recaptcha < 1))
	{
?>
    <form style="font-size:12px;" method="post" id="reg_form" name="reg_form">
        <strong>E-mail:</strong> <font color="#333333">(нужен для восстановления пароля)</font> <font color="#FF3300">*</font><br/>
        <input style="font-size:14px; width:350px;" type="text" maxlength="46" value="<? if (($err != 2) && ($err != 3)) echo $mail;?>" id="reg_email" name="reg_email" />
        <? if (($err == 2) || ($err == 3)) echo "<font color='#FF3300'><br/>Такой E-mail уже зарегистрирован</font>";?><br/><br/>
        <strong>Логин:</strong> <font color="#333333">(4 - 15 латинских символов)</font> <font color="#FF3300">*</font><br/>
        <input style="font-size:14px; width:350px;" type="text" maxlength="15" value="<? if (($err != 1) && ($err != 3)) echo $login;?>" id="reg_login" name="reg_login" />
        <? if (($err == 1) || ($err == 3)) echo "<font color='#FF3300'><br/>Такой логин уже зарегистрирован</font>";?><br/><br/>
        <strong>Пароль:</strong> <font color="#333333">(6 - 20 латинских символов)</font> <font color="#FF3300">*</font><br/>
        <input style="font-size:14px; width:350px;" type="password" maxlength="20" value="" id="reg_pass" name="reg_pass" /><br/><br/>
        <strong>Повторите пароль:</strong> <font color="#333333">(пароли должны совпадать)</font> <font color="#FF3300">*</font><br/>
        <input style="font-size:14px; width:350px;" type="password" maxlength="20" value="" id="reg_repass" name="reg_repass" /><br/><br/>
        Вас пригласил: <strong><? echo $ref_login." (id - ".$ref_id.")";?> </strong><br/><br/>
        <input type="hidden" value="1" id="reg_ref" name="reg_ref" />
        <? echo recaptcha_get_html($publickey, $error); ?>
        <? if ($recaptcha == 0) echo "<font color='#FF3300'>Не правильно введены символы!<br/></font>";?>
        <br/>
        С <a href="../index.php?page=rules" target="_blank" class="link_login"><font color="#FF6600">правилами</font></a> проекта ознакомлен(а) и принимаю:
        <input style="cursor:pointer;" type="checkbox" value="checked" id="reg_rul" name="reg_rul" /> <font color="#FF3300">*</font><br/><br/>
        
        <input type="button" value="Зарегистрироваться" style="cursor:pointer;" id="reg_submit" name="reg_submit" />
    </form>
    <br/><br/>
    <div style="width:340px; height:auto; padding:5px; border: 2px dotted #FF3300; background:#FFDDDE; visibility:hidden; font-size:12px; color:#900;" id="error">
        
    </div>
<?
	}
?>

<script type="text/javascript">
	$(document).ready(function(){
		$('#reg_submit').click(function(){
			var err_valid_email = false;
			var err_valid_login = false;
			var err_valid_password = false;
			var err_re = false;
			var err_rul = false;
			var pattern = "";
			
			pattern = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
            if (!pattern.test($('#reg_email').val()))
			{
				err_valid_email = true;
			}
			
			pattern = /^[a-z0-9_-]{4,15}$/i;
            if (!pattern.test($('#reg_login').val()))
			{
				err_valid_login = true;
			}
			
			pattern = /^[\.\+\*a-z0-9_-]{6,20}$/i;
            if (!pattern.test($('#reg_pass').val()))
			{
				err_valid_password = true;
			}
			
			if ($('#reg_pass').val() != $('#reg_repass').val())
			{
				err_re = true;
			}
			
			if ($("#reg_rul").is(':checked')){} else
			{
				err_rul = true;
			}
			
			if ((!err_re) && (!err_valid_email) && (!err_valid_login) && (!err_valid_password) && (!err_rul)) $('#reg_form').submit();
			else
			{
				$('#error').css("visibility", "visible");
				document.getElementById('error').innerHTML = "";
				if (err_valid_email) document.getElementById('error').innerHTML = document.getElementById('error').innerHTML + '- E-mail введен не верно!<br/>';
				if (err_valid_login) document.getElementById('error').innerHTML = document.getElementById('error').innerHTML + '- Логин может содержать 4-15 латинских символов, цыфры, знаки - и _!<br/>';
				if (err_valid_password) document.getElementById('error').innerHTML = document.getElementById('error').innerHTML + '- Пароль может содержать 6-20 латинских символов, цыфры, знаки +*_- и точка (.)!<br/>';
				if (err_re) document.getElementById('error').innerHTML = document.getElementById('error').innerHTML + '- Пароли должны совпадать!<br/>';
				if (err_rul) document.getElementById('error').innerHTML = document.getElementById('error').innerHTML + '- Вы должны согласится с <a href="../index.php?page=rules" style="text-decoration:none;">правилами</a>!';
			}
		});
	});
</script>
