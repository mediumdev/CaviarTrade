<strong>Покупка золота</strong><br/><br/>
На этой странице вы можете купить золото. За 1 рубль Вы получите 100 золота.<br/><br/>
<?
	if (!isset($_POST["amount"]))
	{
?>
		<strong>Шаг 1.</strong><br/>
		Введите сумму в рублях и нажмите "Далее".
		<br/>
		<br/>
		
		<form method="POST" action="index.php?page=payment" id="payform">
			<input type="text" name="amount" id="amount" value="100" onkeyup="return onlyNum(this);" maxlength="10" style="width:115px;" onchange="return onlyNum(this);"> рублей
		</form><br/>
		<a class="buy_button" id="paysubmit" style="margin-left: -5px; color:#000;">Далее</a>

		<script type="text/javascript">
			$(document).ready(function(){
				$('#paysubmit').click(function(){
					//if ($('#amount').val() < 10) alert("Минемальная сумма пополнения 10 рублей!");
					//else $('#payform').submit();
					$('#payform').submit();
				});
			});
			
			function onlyNum(input){
				input.value = input.value;//.replace(/[^\d,]/g, '');
			}
		</script>
<?
	}
	else
	{
        $amount = $_POST["amount"];
        $m_shop = '8518308';
        $m_orderid = generateOrderId();
        $m_amount = number_format($amount, 2, '.', '');
        $m_curr = 'RUB';
        $m_desc = base64_encode('Покупка золота ' . $_SESSION['login']);
        $m_key = 'PaW1N3Njah';
        
        $arHash = array(
            $m_shop,
            $m_orderid,
            $m_amount,
            $m_curr,
            $m_desc,
            $m_key
        );
        $sign = strtoupper(hash('sha256', implode(":", $arHash)));
        ?>
        <strong>Шаг 2.</strong><br/>
        <font color="#FF6600"><strong>Вы хотите внести <? echo (int)($amount);?> рублей. За них вы получите <? echo (int)($amount) * 100?> золота.</strong></font><br/>
        Нажмите "Оплатить" для покупки золота.
        <br/>
        <br/>
        <form method="GET" action="https://payeer.com/api/merchant/m.php?m_shop=8518308&m_orderid=12345&m_amount=100.00&m_curr=RUB&m_desc=0KLQtdGB0YLQvtCy0YvQuSDQv9C70LDRgtC10LYg4oSWMTIzNDU=&m_sign=9DF1F8F05F69D4AD16DF05AF0E548645FD5EC22C9A29A8B4633572ABB8E13BAE" id="payform">
            <input type="hidden" name="m_shop" value="<?=$m_shop?>">
            <input type="hidden" name="m_orderid" value="<?=$m_orderid?>">
            <input type="hidden" name="m_amount" value="<?=$m_amount?>">
            <input type="hidden" name="m_curr" value="<?=$m_curr?>">
            <input type="hidden" name="m_desc" value="<?=$m_desc?>">
            <input type="hidden" name="m_sign" value="<?=$sign?>">
        </form><br/>
        <a class="buy_button" id="paysubmit" style="margin-left: -5px; color:#000;">Оплатить</a>
		<script type="text/javascript">
			$(document).ready(function(){
				$('#paysubmit').click(function(){
					$('#payform').submit();
				});
			});
		</script>
<?
	}
?>
