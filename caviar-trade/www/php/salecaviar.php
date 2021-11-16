<strong>Продажа икры</strong><br/><br/>

<?
	$cav1 = getUserInfo($_SESSION['id'], "caviar1");
	$cav2 = getUserInfo($_SESSION['id'], "caviar2");
	$cav3 = getUserInfo($_SESSION['id'], "caviar3");
	$cav4 = getUserInfo($_SESSION['id'], "caviar4");
	$cav5 = getUserInfo($_SESSION['id'], "caviar5");
	$cav6 = getUserInfo($_SESSION['id'], "caviar6");
	$cav7 = getUserInfo($_SESSION['id'], "caviar7");
	
	$all = $cav1 + $cav2 + $cav3 + $cav4 + $cav5 + $cav6 + $cav7;
	/*echo "<font color='#FF6600'><strong>Всего икры для продажи: " . $all . " шт.</strong></font><br/>";*/
	
	if (isset($_POST["caviar"]))
	{
		$res = saleCaviar($_SESSION['id'], $all);
		echo "<font color='#FF6600'><strong>Всего продано икры: " . $res . " шт. на сумму " . $res / 100 . " золота.<br/></strong></font> ";
		$cav1 = getUserInfo($_SESSION['id'], "caviar1");
		$cav2 = getUserInfo($_SESSION['id'], "caviar2");
		$cav3 = getUserInfo($_SESSION['id'], "caviar3");
		$cav4 = getUserInfo($_SESSION['id'], "caviar4");
		$cav5 = getUserInfo($_SESSION['id'], "caviar5");
		$cav6 = getUserInfo($_SESSION['id'], "caviar6");
		$cav7 = getUserInfo($_SESSION['id'], "caviar7");
	}
?>


<?
if ($all > 0)
{
?>
	<br/>
    <form id="form_sale" method="post" action="../index.php?page=salecaviar">
        <input type="hidden" value="sale" name="caviar" id="caviar"/>
    </form>
    <div class="check_button">
        <div class="check_button_text" id="salecaviar" align="center">
            Продать икру
        </div>
    </div>
<?
}
else echo "<font color='#FF3300'><strong><br/>Нет икры для продажи.</strong></font><br/>";
?>
<div style="width:642px; height:71px; margin-top:40px; float:bottom; display:table;">
    <div style="width:71px; height:71px; float:left; background:url(../img/caviar1.png) no-repeat center;"></div>
    <div style="width:561px; height:71px; padding-left:10px; float:left;">
   	Икра салатовой рыбы<br/>
    Всего икры: <? echo "<strong>" . $cav1 . "</strong> шт."; ?>
    </div>
</div>
<div style="width:642px; height:71px; margin-top:40px; float:bottom; display:table;">
    <div style="width:71px; height:71px; float:left; background:url(../img/caviar2.png) no-repeat center;"></div>
    <div style="width:561px; height:71px; padding-left:10px; float:left;">
    Икра голубой рыбы<br/>
    Всего икры: <? echo "<strong>" . $cav2 . "</strong> шт."; ?>
    </div>
</div>
<div style="width:642px; height:71px; margin-top:40px; float:bottom; display:table;">
    <div style="width:71px; height:71px; float:left; background:url(../img/caviar3.png) no-repeat center;"></div>
    <div style="width:561px; height:71px; padding-left:10px; float:left;">
    Икра оранжевой рыбы<br/>
    Всего икры: <? echo "<strong>" . $cav3 . "</strong> шт."; ?>
    </div>
</div>
<div style="width:642px; height:71px; margin-top:40px; float:bottom; display:table;">
    <div style="width:71px; height:71px; float:left; background:url(../img/caviar4.png) no-repeat center;"></div>
    <div style="width:561px; height:71px; padding-left:10px; float:left;">
    Икра рыжей рыбы<br/>
    Всего икры: <? echo "<strong>" . $cav4 . "</strong> шт."; ?>
    </div>
</div>
<div style="width:642px; height:71px; margin-top:40px; float:bottom; display:table;">
    <div style="width:71px; height:71px; float:left; background:url(../img/caviar5.png) no-repeat center;"></div>
    <div style="width:561px; height:71px; padding-left:10px; float:left;">
    Икра полосатой рыбы<br/>
    Всего икры: <? echo "<strong>" . $cav5 . "</strong> шт."; ?>
    </div>
</div>
<div style="width:642px; height:71px; margin-top:40px; float:bottom; display:table;">
    <div style="width:71px; height:71px; float:left; background:url(../img/caviar6.png) no-repeat center;"></div>
    <div style="width:561px; height:71px; padding-left:10px; float:left;">
    Икра тигровой рыбы<br/>
    Всего икры: <? echo "<strong>" . $cav6 . "</strong> шт."; ?>
    </div>
</div>
<div style="width:642px; height:71px; margin-top:40px; float:bottom; display:table;">
    <div style="width:71px; height:71px; float:left; background:url(../img/caviar7.png) no-repeat center;"></div>
    <div style="width:561px; height:71px; padding-left:10px; float:left;">
    Икра королевской рыбы<br/>
    Всего икры: <? echo "<strong>" . $cav7 . "</strong> шт."; ?>
    </div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#salecaviar').click(function(){
			$('#form_sale').submit();
		});
	});
</script>