<strong>Профиль</strong><br/><br/><br/>
<?
$date = getUserInfo($_SESSION["id"], "regdate");
$refid = getUserInfo($_SESSION["id"], "refid");
$days = (int)((strtotime(date("Y-m-d H:i:s")) - strtotime($date)) / 86400);
?>

<div class="list_top">
</div>
<div class="list_content">
    <table width="100%" cellspacing="0" cellpadding="4" border="1" style="border:none;">
        <tr>
        	<td width="236" align="right" style="padding-right:10px; border:none;">Дата регистрации:</td>
            <td style="border:none;"><? echo date("d:m:Y", strtotime($date));?> в <? echo date("H:i:s", strtotime($date));?></td>
        </tr>
        <tr>
        	<td width="236" align="right" style="padding-right:10px; border:none;">В проекте:</td>
            <td style="border:none;"><? echo $days . " " . days($days);?></td>
        </tr>
        <tr>
        	<td width="236" align="right" style="padding-right:10px; border:none;">ID:</td>
            <td style="border:none;"><? echo $_SESSION["id"];?></td>
        </tr>
        <tr>
        	<td width="236" align="right" style="padding-right:10px; border:none;">Псевдоним:</td>
            <td style="border:none;"><? echo $_SESSION["login"];?></td>
        </tr>
        <tr>
        	<td width="236" align="right" style="padding-right:10px; border:none;">Email:</td>
            <td style="border:none;"><? echo getUserInfo($_SESSION["id"], "email");?></td>
        </tr>
        <tr>
        	<td width="236" align="right" style="padding-right:10px; border:none;">Для покупок:</td>
            <td style="border:none;"><? echo getUserInfo($_SESSION["id"], "gold1");?> золота</td>
        </tr>
        <tr>
        	<td width="236" align="right" style="padding-right:10px; border:none;">На вывод:</td>
            <td style="border:none;"><? echo getUserInfo($_SESSION["id"], "gold2");?> золота</td>
        </tr>
        <tr>
        	<td width="236" align="right" style="padding-right:10px; border:none;">Заработано на рефералах:</td>
            <td style="border:none;"><? echo getUserInfo($_SESSION["id"], "goldref");?> золота</td>
        </tr>
        <tr>
        	<td width="236" align="right" style="padding-right:10px; border:none;">Заработано всего:</td>
            <td style="border:none;"><? echo getUserInfo($_SESSION["id"], "goldall");?> золота</td>
        </tr>
        <tr>
        	<td width="236" align="right" style="padding-right:10px; border:none;">Потрачено всего:</td>
            <td style="border:none;"><? echo getUserInfo($_SESSION["id"], "goldspent");?> золота</td>
        </tr>
        <tr>
        	<td width="236" align="right" style="padding-right:10px; border:none;">Выплачено всего:</td>
            <td style="border:none;"><? echo getUserInfo($_SESSION["id"], "paid");?> р.</td>
        </tr>
        <tr>
        	<td width="236" align="right" style="padding-right:10px; border:none;">Внесено всего:</td>
            <td style="border:none;"><? echo getUserInfo($_SESSION["id"], "recd");?> р.</td>
        </tr>
        <tr>
        	<td width="236" align="right" style="padding-right:10px; border:none;">Вас пригласил:</td>
            <td style="border:none;"><? echo getUserInfo($refid, "login")?> его ID - <? echo $refid;?></td>
        </tr>
        <tr>
        	<td width="236" align="right" style="padding-right:12px; border:none;">Ссылка для рефералов:</td>
            <td style="border:none;font-size:10px"><? echo "http://" . $_SERVER["SERVER_NAME"] . "/index.php?page=registration&ref=" . $_SESSION["id"]; ?></td>
        </tr>
    </table>
</div>
<div class="list_bottom">
</div>
