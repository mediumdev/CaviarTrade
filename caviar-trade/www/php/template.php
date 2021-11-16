<?
	include "sql.php";
	include "functions.php";
?>

<div class="wrap" align="center">
    <div class="wrap2">
        <div class="head">
        	<div class="gold" align="center"><strong><? if (isset($_SESSION["login"])) {}?></strong></div>
            <div class="menu">
            	<div class="menu_button" style="margin-left:72px; margin-top:0px;" align="center">
                    <font size="2"><strong><? if (isset($_SESSION["login"])) {}?></strong></font>
                </div>
                <div class="menu_button" style="margin-left:53px; margin-top:19px;" align="center">
                    <a href="../index.php" style="text-decoration:none; color:black;"><strong>Главная</strong></a>
                </div>
                <div class="menu_button" style="margin-left:45px; margin-top:0px;" align="center">
                    <a href="../index.php?page=news" style="text-decoration:none; color:black;"><strong>Новости</strong></a>
                </div>
                <div class="menu_button" style="margin-left:54px; margin-top:20px;" align="center">
                    <a href="../index.php?page=rules" style="text-decoration:none; color:black;"><strong>Правила</strong></a>
                </div>
                <div class="menu_button" style="margin-left:70px; margin-top:6px;" align="center">
                    <a href="../index.php?page=about" style="text-decoration:none; color:black;"><strong>О сайте</strong></a>
                </div>
                <div class="menu_button" style="margin-left:68px; margin-top:14px;" align="center">
                    <a href="../index.php?page=help" style="text-decoration:none; color:black;"><strong>Помощь</strong></a>
                </div>
                <div class="menu_button" style="margin-left:68px; margin-top:20px;" align="center">
                    <? if (isset($_SESSION["login"])) {?>
                    	<a href="../index.php?page=exit" style="text-decoration:none; color:black;"><strong><font color="#990000">Выход</font></strong></a>
					<? }?>
                </div>
            </div>
        </div>
        <div class="content_wrap" align="left">
            <div class="left">
				<?
                    if (!isset($_SESSION["login"])) include "login.php";
                    else include "usermenu.php";
                ?>
                	<div class="wnd_space"></div>
                <?
                	include "stats.php";
				?>
            </div>
            <div class="content" <? if (isset($_SESSION["login"])) {?> style="min-height:1000px !important;"<? }?>>
                <?
                	if (isset($_GET["page"]))
					{
						if ($_GET["page"] == "news")
						{
							include "news.php";
						}
						else if ($_GET["page"] == "rules")
						{
							include "rules.php";
						}
						else if ($_GET["page"] == "about")
						{
							include "about.php";
						}
						else if ($_GET["page"] == "help")
						{
							include "help.php";
						}
						else if ($_GET["page"] == "registration")
						{
							if (isset($_SESSION["login"])) include "profile.php";
							else include "registration.php";
						}
						else if ($_GET["page"] == "remember")
						{
							if (isset($_SESSION["login"])) include "profile.php";
							else include "remember.php";
						}
						else if ($_GET["page"] == "autorize")
						{
							include "autorize.php";
						}
						else if ($_GET["page"] == "exit")
						{
							include "exit.php";
						}
						else if ($_GET["page"] == "profile")
						{
							if (isset($_SESSION["login"])) include "profile.php";
							else include "nologin.php";
						}
						else if ($_GET["page"] == "payment")
						{
							if (isset($_SESSION["login"])) include "payment.php";
							else include "nologin.php";
						}
						else if ($_GET["page"] == "changepassword")
						{
							if (isset($_SESSION["login"])) include "changepassword.php";
							else include "nologin.php";
						}
						else if ($_GET["page"] == "bonus")
						{
							if (isset($_SESSION["login"])) include "bonus.php";
							else include "nologin.php";
						}
						else if ($_GET["page"] == "salecaviar")
						{
							if (isset($_SESSION["login"])) include "salecaviar.php";
							else include "nologin.php";
						}
						else if ($_GET["page"] == "warehouse")
						{
							if (isset($_SESSION["login"])) include "warehouse.php";
							else include "nologin.php";
						}
						else if ($_GET["page"] == "buyfish")
						{
							if (isset($_SESSION["login"])) include "buyfish.php";
							else include "nologin.php";
						}
						else if ($_GET["page"] == "bonus_random")
						{
							if (isset($_SESSION["login"])) include "bonus_random.php";
							else include "nologin.php";
						}
						else if (($_GET["page"] == "admin") && ($_SESSION["id"] == 1))
						{
							if (isset($_SESSION["login"])) include "admin.php";
							else include "nologin.php";
						}
						else if ($_GET["page"] == "success")
						{
							if (isset($_SESSION["login"])) include "payeer/success.php";
							else include "nologin.php";
						}
						else if ($_GET["page"] == "fail")
						{
							if (isset($_SESSION["login"])) include "payeer/fail.php";
							else include "nologin.php";
						}
						else if ($_GET["page"] == "status")
						{
							if (isset($_SESSION["login"])) include "payeer/status.php";
							else include "nologin.php";
						}
						else include "404.php";
					}
					else
					{
						include "main.php";
					}
					
					if (isset($_SESSION["login"]))
					{
						include "userstats.php";
					}
				?>
                
            </div>
        </div>
        <div class="futer" align="left">
            <div class="copyright" align="center">
                <strong>Caviar Trade ©<br/>
                www.caviar-trade.ru</strong>
            </div>
        </div>
    </div>	
</div>