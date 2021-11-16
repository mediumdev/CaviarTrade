<div class="wnd_top" align="center">
	Статистика
</div>
<div class="wnd_center" align="left">
    <div style="float:left; width:120px; padding-right:5px;" align="right">Всего участников:</div>
    <div style="float:left; width:82px;"><strong> <font color="#006699"><? echo getMaxUsers(false);?></font></strong></div>
    
    <div style="float:left; width:120px; padding-right:5px;" align="right">Новых за 24 часа:</div>
    <div style="float:left; width:82px;"><strong> <font color="#006699"><? echo getMaxUsers(true);?></font></strong></div><br/>
    
    <div style="float:left; width:120px; padding-right:5px;" align="right">Выплачено всего:</div>
    <div style="float:left; width:82px;"><strong> <font color="#006699"><? echo getRowSum("paid");?></font></strong></div><br/>
    
    <div style="float:left; width:120px; padding-right:5px;" align="right">Резерв проекта:</div>
    <div style="float:left; width:82px;"><strong> <font color="#006699"><? echo getRowSum("recd") - getRowSum("paid");?></font></strong></div><br/>
    
    <br/><br/>
    <div style="float:left; width:207px;" align="center">Проекту пошел: <font color="#006699"><strong><? echo (getAllDays() + 1);?> - й</strong></font> день</div><br/>
</div>
<div class="wnd_bottom"></div>