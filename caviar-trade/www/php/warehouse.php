<strong>Склад икры</strong><br/><br/>
<?
	$resarr = checkCaviar($_SESSION['id']);
	$cav1 = getUserInfo($_SESSION['id'], "warecav1");
	$cav2 = getUserInfo($_SESSION['id'], "warecav2");
	$cav3 = getUserInfo($_SESSION['id'], "warecav3");
	$cav4 = getUserInfo($_SESSION['id'], "warecav4");
	$cav5 = getUserInfo($_SESSION['id'], "warecav5");
	$cav6 = getUserInfo($_SESSION['id'], "warecav6");
	$cav7 = getUserInfo($_SESSION['id'], "warecav7");
	
	if ($resarr == 0) echo "<font color='#FF3300'>Ошибка! Попробуйте проверить <a href='..".$_SERVER['REQUEST_URI']."' class='link_login'><font color='#FF6600'>еще раз</font></a> или <a href='../index.php?page=help' class='link_login'><font color='#FF6600'>свяжитесь с поддержкой сайта</font></a>.</font>";
	else
	{
		/*$newall = $resarr[1] + $resarr[2] + $resarr[3] + $resarr[4] + $resarr[5] + $resarr[6] + $resarr[7];
		$wareall = $cav1 + $cav2 + $cav3 + $cav4 + $cav5 + $cav6 + $cav7;
		echo "<font color='#FF6600'><strong>Всего икры на складе: " . ($wareall + $newall) . " шт.</strong></font> ";
		echo "<font color='#66CC00'><strong> +" . $newall . "<strong></font><br/>";*/
		
		if (isset($_POST["caviar"]))
		{
			$give = giveCaviar($_SESSION['id'], ($cav1 + $resarr[1]), ($cav2 + $resarr[2]), ($cav3 + $resarr[3]), ($cav4 + $resarr[4]), ($cav5 + $resarr[5]), ($cav6 + $resarr[6]), ($cav7 + $resarr[7]));
			if ($give > 0)
			{
				echo "<font color='#FF6600'><strong><br/>Собрано икры: " . $give . " шт.</strong></font><br/>";
				$cav1 = 0; $cav2 = 0; $cav3 = 0; $cav4 = 0; $cav5 = 0; $cav6 = 0; $cav7 = 0; 
			}
			else if ($give < 0) echo "<strong><font color='#FF3300'>Ошибка! Попробуйте <a id='givecaviar' class='link_login'><font color='#FF6600'>еще раз</font></a> или <a href='../index.php?page=help' class='link_login'><font color='#FF6600'>свяжитесь с поддержкой сайта</font></a>.</font></strong>";
			else if (substr($give, 0, 5) == "early")
			{
				$time = substr($give, 5);
				$tt = "мин.";
				if ($time < 60) $tt = "сек.";
				else $time = round($time / 60);
				echo "<font color='#FF3300'><strong><br/>Собирать икру можно раз в 10 минут. Подождите еще " . $time . " " . $tt . "</strong></font><br/>";
			}
			else echo "<font color='#FF3300'><strong>На складе нет икры.<br/></strong><font>";
		}
	}
?>

<br/>
<form id="form_give" method="post" action="../index.php?page=warehouse">
	<input type="hidden" value="give" name="caviar" id="caviar"/>
</form>
<div class="check_button">
    <div class="check_button_text" id="givecaviar" align="center">
    	Собрать икру
    </div>
</div>
<div style="width:642px; height:71px; margin-top:40px; float:bottom; display:table;">
    <div style="width:71px; height:71px; float:left; background:url(../img/caviar1.png) no-repeat center;"></div>
    <div style="width:561px; height:71px; padding-left:10px; float:left;">
   	Икра салатовой рыбы<br/>
    Всего икры: <? echo "<strong>" . ($cav1) . "</strong> шт. <font color='#66CC00'></font>"; ?>
    </div>
</div>
<div style="width:642px; height:71px; margin-top:40px; float:bottom; display:table;">
    <div style="width:71px; height:71px; float:left; background:url(../img/caviar2.png) no-repeat center;"></div>
    <div style="width:561px; height:71px; padding-left:10px; float:left;">
    Икра голубой рыбы<br/>
    Всего икры: <? echo "<strong>" . ($cav2) . "</strong> шт. <font color='#66CC00'></font>"; ?>
    </div>
</div>
<div style="width:642px; height:71px; margin-top:40px; float:bottom; display:table;">
    <div style="width:71px; height:71px; float:left; background:url(../img/caviar3.png) no-repeat center;"></div>
    <div style="width:561px; height:71px; padding-left:10px; float:left;">
    Икра оранжевой рыбы<br/>
    Всего икры: <? echo "<strong>" . ($cav3) . "</strong> шт. <font color='#66CC00'></font>"; ?>
    </div>
</div>
<div style="width:642px; height:71px; margin-top:40px; float:bottom; display:table;">
    <div style="width:71px; height:71px; float:left; background:url(../img/caviar4.png) no-repeat center;"></div>
    <div style="width:561px; height:71px; padding-left:10px; float:left;">
    Икра рыжей рыбы<br/>
    Всего икры: <? echo "<strong>" . ($cav4) . "</strong> шт. <font color='#66CC00'></font>"; ?>
    </div>
</div>
<div style="width:642px; height:71px; margin-top:40px; float:bottom; display:table;">
    <div style="width:71px; height:71px; float:left; background:url(../img/caviar5.png) no-repeat center;"></div>
    <div style="width:561px; height:71px; padding-left:10px; float:left;">
    Икра полосатой рыбы<br/>
    Всего икры: <? echo "<strong>" . ($cav5) . "</strong> шт. <font color='#66CC00'></font>"; ?>
    </div>
</div>
<div style="width:642px; height:71px; margin-top:40px; float:bottom; display:table;">
    <div style="width:71px; height:71px; float:left; background:url(../img/caviar6.png) no-repeat center;"></div>
    <div style="width:561px; height:71px; padding-left:10px; float:left;">
    Икра тигровой рыбы<br/>
    Всего икры: <? echo "<strong>" . ($cav6) . "</strong> шт. <font color='#66CC00'></font>"; ?>
    </div>
</div>
<div style="width:642px; height:71px; margin-top:40px; float:bottom; display:table;">
    <div style="width:71px; height:71px; float:left; background:url(../img/caviar7.png) no-repeat center;"></div>
    <div style="width:561px; height:71px; padding-left:10px; float:left;">
    Икра королевской рыбы<br/>
    Всего икры: <? echo "<strong>" . ($cav7) . "</strong> шт. <font color='#66CC00'></font>"; ?>
    </div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#givecaviar').click(function(){
			$('#form_give').submit();
		});
	});
</script>