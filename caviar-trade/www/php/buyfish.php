<strong>Купить рыбок</strong><br/><br/>

<?
	include "config.php";
	
	if (isset($_POST["fish"]))
	{
		$result = buyFish($_POST["fish"], $_SESSION['id']);
		if ($result == 1) echo "<strong><font color='#FF6600'>Вы успешно купили салатовую рыбу!</font></strong>";
		else if ($result == 2) echo "<strong><font color='#FF6600'>Вы успешно купили голубую рыбу!</font></strong>";
		else if ($result == 3) echo "<strong><font color='#FF6600'>Вы успешно купили оранжевую рыбу!</font></strong>";
		else if ($result == 4) echo "<strong><font color='#FF6600'>Вы успешно купили рыжую рыбу!</font></strong>";
		else if ($result == 5) echo "<strong><font color='#FF6600'>Вы успешно купили полосатую рыбу!</font></strong>";
		else if ($result == 6) echo "<strong><font color='#FF6600'>Вы успешно купили тигровую рыбу!</font></strong>";
		else if ($result == 7) echo "<strong><font color='#FF6600'>Вы успешно купили королевскую рыбу!</font></strong>";
		else if ($result == -1) drawError();
		else if ($result == 0) echo "<strong><font color='#FF3300'>Недостаточно денег!</font></strong>";
		echo "<br/><br/>";
	}
?>

<form id="form_fish" method="post" action="../index.php?page=buyfish">
	<input type="hidden" value="1" name="fish" id="fish"/>
</form>

<div style="width:642px; height:120px; float:bottom; display:table;">
    <div style="width:120px; height:120px; background:url(../img/fish1.png); float:left; display:table;">
    Салатовая
    </div>
    <div style="width:502px; height:60px; padding:20px 0px 20px 20px; float:left; display:table;">
    	<strong>Плодовитость:</strong> <? echo $_f_fish1;?> икры в час<br/>
        <strong>Стоимость:</strong> <? echo $_p_fish1;?> золота<br/>
        <strong>Куплено:</strong> <? echo getUserInfo($_SESSION['id'], "fish1")?> шт.<br/><br/>
       
        <a class="buy_button" id="fish1">Купить</a>
    </div>
</div>


<div style="width:642px; height:120px; float:bottom; display:table; margin-top:30px;">
    <div style="width:120px; height:120px; background:url(../img/fish2.png); float:left; display:table;">
    Голубая
    </div>
    <div style="width:502px; height:60px; padding:20px 0px 20px 20px; float:left; display:table;">
    	<strong>Плодовитость:</strong> <? echo $_f_fish2;?> икры в час<br/>
        <strong>Стоимость:</strong> <? echo $_p_fish2;?> золота<br/>
        <strong>Куплено:</strong> <? echo getUserInfo($_SESSION['id'], "fish2")?> шт.<br/><br/>
        <a class="buy_button" id="fish2">Купить</a>
    </div>
</div>


<div style="width:642px; height:120px; float:bottom; display:table; margin-top:30px;">
    <div style="width:120px; height:120px; background:url(../img/fish3.png); float:left; display:table;">
    Оранжевая
    </div>
    <div style="width:502px; height:60px; padding:20px 0px 20px 20px; float:left; display:table;">
    	<strong>Плодовитость:</strong> <? echo $_f_fish3;?> икры в час<br/>
        <strong>Стоимость:</strong> <? echo $_p_fish3;?> золота<br/>
        <strong>Куплено:</strong> <? echo getUserInfo($_SESSION['id'], "fish3")?> шт.<br/><br/>
        <a class="buy_button" id="fish3">Купить</a>
    </div>
</div>


<div style="width:642px; height:120px; float:bottom; display:table; margin-top:30px;">
    <div style="width:120px; height:120px; background:url(../img/fish4.png); float:left; display:table;">
    Рыжая
    </div>
    <div style="width:502px; height:60px; padding:20px 0px 20px 20px; float:left; display:table;">
    	<strong>Плодовитость:</strong> <? echo $_f_fish4;?> икры в час<br/>
        <strong>Стоимость:</strong> <? echo $_p_fish4;?> золота<br/>
        <strong>Куплено:</strong> <? echo getUserInfo($_SESSION['id'], "fish4")?> шт.<br/><br/>
        <a class="buy_button" id="fish4">Купить</a>
    </div>
</div>


<div style="width:642px; height:120px; float:bottom; display:table; margin-top:30px;">
    <div style="width:120px; height:120px; background:url(../img/fish5.png); float:left; display:table;">
    Полосатая
    </div>
    <div style="width:502px; height:60px; padding:20px 0px 20px 20px; float:left; display:table;">
    	<strong>Плодовитость:</strong> <? echo $_f_fish5;?> икры в час<br/>
        <strong>Стоимость:</strong> <? echo $_p_fish5;?> золота<br/>
        <strong>Куплено:</strong> <? echo getUserInfo($_SESSION['id'], "fish5")?> шт.<br/><br/>
        <a class="buy_button" id="fish5">Купить</a>
    </div>
</div>


<div style="width:642px; height:120px; float:bottom; display:table; margin-top:30px;">
    <div style="width:120px; height:120px; background:url(../img/fish6.png); float:left; display:table;">
    Тигровая
    </div>
    <div style="width:502px; height:60px; padding:20px 0px 20px 20px; float:left; display:table;">
    	<strong>Плодовитость:</strong> <? echo $_f_fish6;?> икры в час<br/>
        <strong>Стоимость:</strong> <? echo $_p_fish6;?> золота<br/>
        <strong>Куплено:</strong> <? echo getUserInfo($_SESSION['id'], "fish6")?> шт.<br/><br/>
        <a class="buy_button" id="fish6">Купить</a>
    </div>
</div>


<div style="width:642px; height:120px; float:bottom; display:table; margin-top:30px;">
    <div style="width:120px; height:120px; background:url(../img/fish7.png); float:left; display:table;">
    Королевская
    </div>
    <div style="width:502px; height:60px; padding:20px 0px 20px 20px; float:left; display:table;">
    	<strong>Плодовитость:</strong> <? echo $_f_fish7;?> икры в час<br/>
        <strong>Стоимость:</strong> <? echo $_p_fish7;?> золота<br/>
        <strong>Куплено:</strong> <? echo getUserInfo($_SESSION['id'], "fish7")?> шт.<br/><br/>
        <a class="buy_button" id="fish7">Купить</a>
    </div>
</div>


<script type="text/javascript">
	$(document).ready(function(){
		$('#fish1').click(function(){
			$('#fish').val("1"); $('#form_fish').submit();
		});
		$('#fish2').click(function(){
			$('#fish').val("2"); $('#form_fish').submit();
		});
		$('#fish3').click(function(){
			$('#fish').val("3"); $('#form_fish').submit();
		});
		$('#fish4').click(function(){
			$('#fish').val("4"); $('#form_fish').submit();
		});
		$('#fish5').click(function(){
			$('#fish').val("5"); $('#form_fish').submit();
		});
		$('#fish6').click(function(){
			$('#fish').val("6"); $('#form_fish').submit();
		});
		$('#fish7').click(function(){
			$('#fish').val("7"); $('#form_fish').submit();
		});
	});
</script>