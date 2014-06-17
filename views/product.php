<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="robots" content="nofollow" />
        <title>Zolo</title>
        <link href="css/css.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="js/jquery.js" ></script>
        <script type="text/javascript">
            $(function() {
                $(".small_nav_ico").click(function() {
                    if ($(".nav").is(':hidden'))
                    {
                        $(".nav").show();
                    }
                    else
                    {
                        $(".nav").hide();
                    }
                });
            })
        </script>
    </head>
    <body class="inner_page">
        <?php
        include BLOCK_PATH . '/navbar.php';
        ?>
        <!--end.blocks-->
        <div class="block product_page">
            <div class="block"><div class="title_wrap"><h2 class="title">POWER PACK</h2></div></div>
            <a href="<?php echo linkto('product.php?p=p3'); ?>"><div class="it_two it_two_hover">
                    <div class="ithover it_two_hover_txt"><div class="title_wrap"><h4>Zolo 1x Battery<br>
                                Zolo Short Cable<br>
                                Zolo Cable Clips</h4>
                        </div></div>
                    <div class="ithover it_two_hover_bg"></div>
                    <img src="images/p1.jpg" />   
                </div> </a>   
        </div>
        <!--end.block-->
        <div class="block product_page">
            <div class="block"><div class="title_wrap"><h2 class="titles"><span class="title">POWER + PROTECTION PACK</span><em>for iPhone 5s</em></h2></div></div>
            <a href="<?php echo linkto('product.php?p=p2'); ?>"><div class="it_two it_two_hover">
                    <div class="ithover it_two_hover_txt"><div class="title_wrap"><h4>Zolo 1x Battery<br>

                                Zolo Short Cable<br>

                                Zolo Cable Clips<br>

                                Zolo Tough Case + Impact Screen Protector</h4></div></div>
                    <div class="ithover it_two_hover_bg"></div>
                    <img src="images/p2.jpg" />  
                </div>    </a>
        </div>
        <!--end.block-->
        <div class="block product_page">
            <div class="block">	<div class="title_wrap"><h2 class="titles"><span class="title">POWER + PROTECTION PACK</span><em>for Samsung S5</em></h2></div></div>
            <a href="<?php echo linkto('product.php?p=p1'); ?>">
                <div class="it_two it_two_hover">
                    <div class="ithover it_two_hover_txt"><div class="title_wrap"><h4>Zolo 1x Battery<br>

                                Zolo Short Cable<br>

                                Zolo Cable Clips<br>

                                Zolo Tough Case + Impact Screen Protector</h4></div></div>
                    <div class="ithover it_two_hover_bg"></div>
                    <img src="images/p3.jpg" />  
                </div>   
            </a> 
        </div>
        <!--end.block-->
        <div class="blocks orange_bg it_two">
            <div class="footer block inner_footer">
                <div class="footer_top">
                    <img src="images/logo2.png" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Everyday smart tools that integrate seamlessly into your lifestyle.
                </div>
                <div class="footer_center">
                    <div class="footer_txt half_box font_color3 left">&copy;2014 Zolo.All rights reserved.</div>
                    <div class="half_boxs right">
                        <div class="share"><a class="fb" href=""></a><a class="tw" href=""></a><a class="yt" href=""></a></div>
                        <!--<div class="subscribe"><input class="txt" type="" /><input class="btn" value=">" type=""></div>-->
                        <!--end.share-->
                    </div>
                </div>
                <!--end.footer_center-->
            </div>
        </div>
        <!--end.blocks-->
        <div class="footer_bottom">
            <div class="lang"><a href=""></a></div>
        </div>
        <!--end.footer_bottom-->
    </body>
</html>
