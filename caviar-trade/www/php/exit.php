<strong>Выход из аккаунта</strong><br/><br/>
<?
	unset($_SESSION["login"]);
	unset($_SESSION["id"]);
	echo "<font color='#009900'>Вы вышли из аккаунта! <a href='../index.php' style='text-decoration:none;'><font color='#FF6600'>На главную.</font></a></font>";
?>

<script type="text/javascript">
	document.location.replace('/index.php');
</script>