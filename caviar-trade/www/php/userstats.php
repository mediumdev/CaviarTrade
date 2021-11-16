<?
$resarr = checkCaviar($_SESSION['id']);
?>
<div style="background:#FFF; border:1px solid #999; width:200px; height:auto; position:fixed;  top: 0px; left: 100%; margin-left: -202px;" id="us_panel">
    <div style="width:200px; color:#FF6600; border-bottom:1px solid #999; height:19px; float:bottom; font-weight:bold;" id="us_caption" align="center">
    Информация:
    </div>
    <div style="width:190px; height:330px; float:bottom; font-size:10px; padding:5px;" id="us_content">
    Для покупок:      <? echo "<strong>" . getUserInfo($_SESSION["id"], "gold1") . "</strong>";?> золота<br/>
    Для продажи:      <? echo "<strong>" . getUserInfo($_SESSION["id"], "gold2") . "</strong>";?> золота<br/><br/>
    <table width="190" cellspacing="0" cellpadding="0" border="0" style="font-size:10px;">
        <tr>
        	<td width="50" height ="40" style="background:url(../img/fish1m.png) no-repeat left;"></td>
            <td>
            Салатовая рыба:<br/>   <? echo "<strong>" . getUserInfo($_SESSION["id"], "fish1") . "</strong>";?> шт. /
    		Икры - <? echo "<strong>" . getUserInfo($_SESSION["id"], "warecav1") . "</strong>";?><br/>
            </td>
        </tr>
        <tr>
        	<td width="50" height ="40" style="background:url(../img/fish2m.png) no-repeat left;"></td>
            <td>
			Голубая рыба:<br/>     <? echo "<strong>" . getUserInfo($_SESSION["id"], "fish2") . "</strong>";?> шт. /
    		Икры - <? echo "<strong>" . getUserInfo($_SESSION["id"], "warecav2") . "</strong>";?><br/>
            </td>
        </tr>
        <tr>
        	<td width="50" height ="40" style="background:url(../img/fish3m.png) no-repeat left;"></td>
            <td>
			Оранжевая рыба:<br/>   <? echo "<strong>" . getUserInfo($_SESSION["id"], "fish3") . "</strong>";?> шт. /
    		Икры - <? echo "<strong>" . getUserInfo($_SESSION["id"], "warecav3") . "</strong>";?><br/>
            </td>
        </tr>
        <tr>
        	<td width="50" height ="40" style="background:url(../img/fish4m.png) no-repeat left;"></td>
            <td>
			Рыжая рыба:<br/>       <? echo "<strong>" . getUserInfo($_SESSION["id"], "fish4") . "</strong>";?> шт. /
    		Икры - <? echo "<strong>" . getUserInfo($_SESSION["id"], "warecav4") . "</strong>";?><br/>
            </td>
        </tr>
        <tr>
        	<td width="50" height ="40" style="background:url(../img/fish5m.png) no-repeat left;"></td>
            <td>
			Полосатая рыба:<br/>  <? echo "<strong>" . getUserInfo($_SESSION["id"], "fish5") . "</strong>";?> шт. /
    		Икры - <? echo "<strong>" . getUserInfo($_SESSION["id"], "warecav5") . "</strong>";?><br/>
            </td>
        </tr>
        <tr>
        	<td width="50" height ="40" style="background:url(../img/fish6m.png) no-repeat left;"></td>
            <td>
			Тигровая рыба:<br/>    <? echo "<strong>" . getUserInfo($_SESSION["id"], "fish6") . "</strong>";?> шт. /
    		Икры - <? echo "<strong>" . getUserInfo($_SESSION["id"], "warecav6") . "</strong>";?><br/>
            </td>
        </tr>
        <tr>
        	<td width="50" height ="40" style="background:url(../img/fish7m.png) no-repeat left;"></td>
            <td>
			Королевская рыба:<br/> <? echo "<strong>" . getUserInfo($_SESSION["id"], "fish7") . "</strong>";?> шт. /
    		Икры - <? echo "<strong>" . getUserInfo($_SESSION["id"], "warecav7") . "</strong>";?><br/>
            </td>
        </tr>
    </table>
    </div>
    
    
    
    <div style="background:#FF6600; width:200px; height:20px; float:bottom; cursor:pointer; color:white; font-weight:bold;" id="us_openclose" align="center">
    Открыть
    </div>
</div>

<script type="text/javascript">
	var cls = true;
	$(document).ready(function(){
		if ($.cookie('us_open') == "true") us_open(0);
		else us_close(0);
		$('#us_openclose').click(function(){
			if (!cls) us_close(500);
			else us_open(500);
		});
		
		function us_open(val)
		{
			cls = false;
			$('#us_openclose').text("Закрыть");
			$("#us_content").slideDown(val);
			$.cookie('us_open', 'true');
		}
		
		function us_close(val)
		{
			cls = true;
			$('#us_openclose').text("Открыть");
			$("#us_content").slideUp(val);
			$.cookie('us_open', 'false');
		}
	});
	
</script>