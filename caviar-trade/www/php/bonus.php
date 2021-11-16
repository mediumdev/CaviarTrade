<strong>Получить подарок</strong><br/><br/>

Вы можете получить накопленные подарки в любое время. Каждый день прибавляется по одному подарку.<br/>
День считается с 00:00 до 23:59 по московскому времени.<br/>
Московское время на момент загрузки страницы - <strong><? echo date('H:i');?></strong>.
<br/><br/>


<?
	$bonus = getBonusNum($_SESSION['id']);
	
	
	if ($bonus>0)
	{
?>
        <font color="#FF3300"><strong>Предупреждение!</strong><br/>
        Не уходите со страницы подарка и не обновляйте ее пока не пройдете весь процесс получения подарк, иначе подарок пропадет.</font>
        <br/><br/>
        
		Число подарков - <strong><? echo $bonus;?></strong> шт.<br/>
        <br/>
        
        <strong>Выберите тип подарка:</strong>
        <br/><br/><br/>
        <div style="width:640px; height:185px;" align="center">
            
            <div style="width:160px; height:185px; cursor:pointer;" id="bonus1">
            	<a style="text-decoration:none;" style="link_login" href="../index.php?page=bonus_random">
                    <div style="background:url(../img/bonus.png) no-repeat center; width:160px; height:160px;">
                    
                    </div>
                    <div style="width:160px; height:25px;" align="center">
                        <font color="#FF6600"><strong>Случайный подарок</strong></font>
                    </div>
                </a>
            </div>
            
        </div>
        <br/><br/>

        <div style="width:100%; height:auto; min-height:30px; padding:5px; border: 2px dotted #CCCCCC; background:#F5F5F5; font-size:12px; color:#000;" id="aboutwnd">
            <strong>Описание подарка:</strong>
            <div id="about">
            
            </div>
        </div>
<?
	}
	else
	{
?>
		Число подарков - <strong>0</strong> шт.<br/>
        <font color="#FF6600"><strong>Заходите завтра!</strong></font>
<?
	}
?>


<script type="text/javascript">
	$(document).ready(function(){
		$('#bonus1').mouseover(function(){
			$('#about').text("Случайный подарок может дать вам от 10 до 100 золота, от 100 до 1000 икры салатовой рыбы или салатовую рыбу. Есть вероятность получить несколько подарков!");
		});
		$('#bonus1').mouseout(function(){
			$('#about').text("");
		});
	});
</script>