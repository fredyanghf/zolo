<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
                $("body").on("click", '.float_box_btn_close', function() {
                    $(this).addClass("float_box_btn_open").removeClass("float_box_btn_close");
                    $(".float_box").animate({right: '-200px'}, "fast");
                });
                $("body").on("click", '.float_box_btn_open', function() {
                    $(this).addClass("float_box_btn_close").removeClass("float_box_btn_open");
                    $(".float_box").animate({right: '0'}, "fast");
                });
            })
        </script>
    </head>
    <body class="inner_page">
        <?php
        include BLOCK_PATH . '/navbar.php';
        ?>
        <!--end.blocks-->
        <div class="block">	
            <div class="it_two">
                <p>To keep our prices low without compromising quality, we need your help to build scale. Spread the word about our products and our vision, and earn some great perks while you're at it.  </p>
                <img src="images/30.jpg" />
            </div>
            <!--end.block-->
        </div>
        <!--end.block-->
        <div class="block">
            <div class="title_wrap it_two"><h2 class="titles"><span class="title">WHAT YOU WIN</span></h2></div>
            <div class="block font_color1">
                <div class="it_two gray_bg4">
                    <div class="title_wrap"><h4 class="atitle">Travel Stand</h4></div>
                    <p>For every 10 friends you refer that each donate $13 or more, 
                        we will give you a FREE Zolo Travel Stand. 
                    </p>
                    <p><img src="images/31.jpg" /></p>
                    <p><img src="images/32.jpg" /></p>
                    <p>Exclusively available only through our referral contest, magnetically connect the Zolo case to the versatile, thin Zolo Travel Stand or use non-magnetically with any smartphone or tablet. The patent-pending design fits easily into a pocket, or looks great on a desk.</p>
                </div>
            </div>
            <!--end.block-->
            <div class="block font_color">
                <div class="it_two orange_bg">
                    <div class="title_wrap"><h4 class="atitle">Zolo Products for Life
                        </h4></div>
                    <p>For every 10 friends you refer that each donate $13 or more, 
                        we will give you a FREE Zolo Travel Stand. 
                    </p>
                    <p><img src="images/33.jpg" /></p>
                    <p>Yep, that's no typo. If you're the person with the most qualifying referrals, you'll get one free Zolo product every time we release something new, as long as we both shall live! (You and Zolo, that is.) 
                    </p><p>
                        What does it take to become our Zolo Lifer? A broad network, smooth-talking finesse and fearless tenacity. Join the fun, and we'll send out a leaderboard every so often so you can check your standings.
                    </p>
                </div>
            </div>
            <!--end.block-->
            <div class="block it_ten">
                <div class="title_wrap it_two"><h2 class="titles"><span class="title">HOW TO SHARE</span></h2></div>
                <div class="it_two">
                    <p>1) Fund our campaign, and be sure you create a Indiegogo account if you haven't already.
                        2) While logged in, use the sharing toolbar under our campaign video to post on Facebook, Twitter, Google+ or get your unique link to email or share anywhere on the web. 
                    </p>
                    <img src="images/34.jpg" />
                </div>
                <div class="title_wrap it_two"><h2 class="titles"><span class="title">HOW TO TRACK PROGRESS</span></h2></div>
                <div class="it_two"><p>1) Login to your Indiegogo account and click "My Contributions"</p>
                    <p><img src="images/35.jpg" /></p>
                    <p>2) Click on the "Referrals" tab to see how close you are to earning a free Zolo Travel Stand. Keep sharing, and we'll send regular leaderboard updates so you can scope out the competition.
                    </p>
                    <p><img src="images/36.jpg" /></p>
                </div>
            </div>
            <!--end.block-->
        </div>
        <!--end.block-->
         <div class="it_two it_ten"><p><a class="more" href="">SHARE NOW</a></p></div>
        <div class="block orange_bg it_two">
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
        <!--
        <div class="float_box">
            <div class="float_box_btn float_box_btn_close"></div>
            <dl>
                <dt>Indiegogo Leaderboard</dt>
                <dd><em>1.</em> <span>Rank</span> </dd>
                <dd><em>2.</em> <span>Rank</span> </dd>
                <dd><em>3.</em> <span>Rank</span> </dd>
                <dd><em>4.</em> <span>Rank</span> </dd>
                <dd><em>5.</em> <span>Rank</span> </dd>
                <dd><em>6.</em> <span>Rank</span> </dd>
                <dd><em>7.</em> <span>Rank</span> </dd>
                <dd><em>8.</em> <span>Rank</span> </dd>
                <dd><em>9.</em> <span>Rank</span> </dd>
                <dd><em>10.</em> <span>Rank</span> </dd>
            </dl>
        </div>
        -->
        <!--end.float_box-->
    </body>
</html>