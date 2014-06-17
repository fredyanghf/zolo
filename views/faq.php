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
                $(".faq_list dt").click(function() {
                    $(this).toggleClass("hover").parent(".faq_list").siblings(".faq_list").children("dt").removeClass("hover");
                    $(this).next("dd").slideToggle(0).parent(".faq_list").siblings(".faq_list").children("dd").hide();
                });
            })
        </script>
    </head>
    <body class="inner_page referral_page">
        <?php
        include BLOCK_PATH . '/navbar.php';
        ?>
        <!--end.blocks-->
        <div class="block padding_box">
            <div class="title_wrap it_two"><h2 class="titles"><span class="title">PRODUCTION TIMELINE</span></h2></div>
            <div class="it_two"><img src="images/FAQ-English-Zolo-Production-Timeline.jpg" /></div>
        </div>
        <div class="block padding_box">
            <div class="title_wrap it_two"><h2 class="titles"><span class="title">FUND ALLOCATION</span></h2></div>
            <div class="it_two"><img src="images/FAQ-English-Zolo-Pie-Chart.jpg" /></div>
            <div class="block">
                <div class="it_two gray_bg">
                    <div class="title_wrap it_two"><h2 class="titles"><span class="title">WHAT IS INDIEGOGO?</span></h2></div>
                    <p>Indiegogo is a way for people all over the world to join forces to make ideas happen. Since 2008, millions of contributors have empowered hundreds of thousands of inventors, musicians, do-gooders, filmmakers – and many more – to bring their dreams to life.
                    </p>

                </div>
            </div>
            <!--end.block-->
            <div class="block">
                <div class="it_two">
                    <div class="title_wrap it_two"><h2 class="titles"><span class="title">MORE QUESTIONS</span></h2></div>
                    <p>More questions than you can find here, or just want to say hi? Email us at support@hellozolo.com or visit our forum.
                    </p>

                </div>
                <div class="faq">
                    <h4 class="it_two faq_title">PRODUCTS</h4>
                    <dl class="faq_list">
                        <dt>How many times will the Zolo 1X Battery charge my phone?</dt>
                        <dd>There are some lots of technical things that influence this…but most users will get about one charge. That's why we named it the 1X. </dd>
                    </dl>
                    <dl class="faq_list">
                        <dt>What does military grade protection actually mean?</dt>
                        <dd>We drop test our cases from every imaginable angle onto a steel plate from 1.8 meters. After that, if the phone isn't damaged, it has passed the test. </dd>
                    </dl>
                    <dl class="faq_list">
                        <dt>How good does the Zolo Impact Screen Protector resist impacts to the screen?</dt>
                        <dd>We drop a 225 Gram steel ball from 1.5 meters on the the screen. It doesn't break. That's how good it is. </dd>
                    </dl>
                    <dl class="faq_list">
                        <dt>When will your website + mobile app launch? Which OS will you mobile app be compatible with?</dt>
                        <dd>We're still building our full website and apps for both iOS and Android. If we're not delayed, we should launch around the time our products ship out in August or September.  </dd>
                    </dl>
                    <dl class="faq_list">
                        <dt>I don't have an iPhone 5s, 5 or a Samsung GALAXY S5. When will you be making a military-grade-protection case for my phone?</dt>
                        <dd>For kickoff, we only designed the most popular phone cases. But don't worry, with your help we plan on continuing to make more.  </dd>
                    </dl>
                    <dl class="faq_list">
                        <dt>How are you able to offer such low prices? How long will this last — is this "too good to be true?</dt>
                        <dd>Our pricing is incredibly low, so we need your help to keep it that way. Share our story and help us get the word out so we can reach scale quickly and maintain our rock-bottom prices. </dd>
                    </dl>

                    <h4 class="it_two faq_title">SHIPPING & DELIVERY</h4>

                    <dl class="faq_list">
                        <dt>When will you be shipping my stuff to me?</dt>
                        <dd>We're shooting for August, but it could be September. </dd>
                    </dl>
                    <dl class="faq_list">
                        <dt>Where do you ship to?</dt>
                        <dd>Anywhere — our perk prices already include shipping to wherever you reside. </dd>
                    </dl>

                    <h4 class="it_two faq_title">TEAM</h4>
                    <dl class="faq_list">
                        <dt>Who is the Zolo Team?</dt>
                        <dd><strong>Product Manager</strong> Chuanwen Zhou Billie Zhu Alex Xiao Tony Peng <strong>Product Engineers</strong> Nicole Li Serena Tang Gloria Yuan <strong>Engineers</strong> Elliot Xu Tiny Li Bruce Lin <strong>Designers</strong> Evan Yan Seven Jaina Mars <strong>Management</strong> Arthur Gao Henry He <strong>Quality</strong> Justin Zhang <strong>Supply Management</strong> Raul Li Elena Liu <strong>Legal</strong> Lilian Yao </dd>
                    </dl>         

                </div>
                <!--end.faq-->
            </div>
            <!--end.block-->
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
        <!--end.blocks-->
    </body>
</html>