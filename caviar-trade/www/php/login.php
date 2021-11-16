<div class="wnd_top" align="center">
Вход в аккаунт
</div>
<div class="wnd_center" align="left">
	<form method="post" name="login_form" id="login_form" action="index.php?page=autorize">
    	<input type="hidden" value="<? echo $_SERVER['REQUEST_URI'];?>" id="aut_path" name="aut_path" />
        Логин:<br/>
        <input type="text" maxlength="15" style="width:201px" value="" id="aut_login" name="aut_login" /><br/>
        Пароль: <a class="link_login" href="../index.php?page=remember"><font color="#FF6600">Забыли пароль?</font></a><br/>
        <input type="password" maxlength="20" style="width:201px" value="" id="aut_password" name="aut_password" /><br/>
        <div align="center">
        	<input type="submit" style="width: 100px;" id="aut_submit" value="Войти"/><br/>
            <a class="link_login" href="../index.php?page=registration"><font color="#FF6600"><strong>ЗАРЕГИСТРИРОВАТЬСЯ</strong></font></a>
        </div>
    </form>
</div>
<div class="wnd_bottom"></div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#aut_submit').click(function(){
			$('#login_form').submit();
		});
	});
</script>
