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
                    if ($(".nav").is(':hidden')) {
                        $(".nav").show();
                    }
                    else
                    {
                        $(".nav").hide();
                    }
                });
                $('.zolo-btn-play').click(function zolo_() {
                    var player = $(this).closest('.zolo-player')
                            , header = $('.zolo-player-wrapper')
                            , iframe = $('<iframe type="text/html" frameborder="0" style="width:100%;height:479px;"></iframe>');
                    iframe.attr('src', player.data('target'));
                    header.html('').append(iframe);
                });
            })
        </script>
    </head>
    <body>
        <?php
        include BLOCK_PATH . '/navbar.php';
        ?>

        <!--end.blocks-->
        <div class="block orange_bg padding_box" id="video">
            <div class="block" style="text-align:center">
                <div class="zolo-player-wrapper"><div data-target="//www.youtube.com/embed/i5u12Wt95Nk?autoplay=1&amp;controls=0&amp;modestbranding=1&amp;showinfo=0" class="zolo-player"><div class="zolo-btn-container"><div class="zolo-btn-play"></div></div></div></div>
            </div>
        </div>
        <!--end.blocks-->

        <div class="block">
            <div class="block lineheight"> <img src="images/2.jpg" /></div>
            <div class="it_two it_block1 font_size1 gray_bg3 font_color">   
                Clever and holistic design makes our products a joy to use. Intuitive and friendly, it's an essential set of smart tools made for everyone.
            </div>
            <div class="block lineheight"> <img src="images/3.jpg" /></div>
            <div class="it_two font_size1 orange_bg font_color">   
                Zolo 1x Battery ·Short Cable · Cable Clips<br>
                Tough Case for iPhone 5s and Samsung GALAXY S5
            </div>
            <div class="block">
                <div class="it_two it_block2">
                    <div class="content">
                        <div class="cut_box right_text right"><img src="images/23.gif" /></div>
                        <!--end.half_box-->
                        <div class="cut_box left it_three"><h3 class="title3">MAGNETIC ATTRACTION</h3>Our new system uses magnets to keep everything you need in one place. No snaps, clicks, tabs, ties, or loose ends. Everything works nicely together so you have what you need when you need it. </div>
                        <!--end.half_box-->
                    </div>
                </div>
                <!--end.content-->
                <div class="block lineheight"> <img src="images/21.jpg" /></div>
            </div>
            <!--end.block-->
        </div>
        <!--end.block-->
        <div class="it_two orange_bg font_color">   

        </div>
        <div class="block it_five">
            <div class="block font_color gray_bg5">
                <div class="half_box lineheight left"><img src="images/4.jpg" /></div>
                <!--end.half_box-->
                <div class="cut_box right it_three">
                    <div class="box_content"><p>The Zolo 1x Battery's compact size makes it easy to put into your bag or even your pocket. The byte-sized battery stores one phone charge -- perfect for a night out or a day away.</p></div></div>
                <!--end.half_box-->
            </div>
            <!--end.block-->
            <div class="block font_color gray_bg6">

                <div class="half_box lineheight left"><img src="images/5.jpg" /></div>
                <!--end.half_box-->
                <div class="cut_box right it_three"><div class="box_content"><p>Always have the power when you need it most. LED lights let you know your battery status with a single swipe of the finger. And, if you're close to running out, the lights will flash to let you know it's time for a charge. </p></div></div>
                <!--end.half_box-->
            </div>
            <!--end.block-->
            <div class="block font_color gray_bg5">
                <div class="half_box lineheight left"><img src="images/6.jpg" /></div>
                <!--end.half_box-->
                <div class="cut_box right it_three"><div class="box_content"><p>Never forget your cable again. Integrated magnets in the battery and cables keep everything in one place, so it's there when you need it. </p></div></div>
                <!--end.half_box-->
            </div>
            <!--end.block-->
            <div class="block font_color gray_bg6">

                <div class="half_box lineheight left"><img src="images/7.jpg" /></div>

                <!--end.half_box-->
                <div class="cut_box right it_three"><div class="box_content"><p>Magnetically snap the battery onto the case to hitch a ride and easily charge while talking. And when you're done, take the battery off to enjoy your slim phone again.</p></div></div>
                <!--end.half_box-->
            </div>
            <!--end.block-->
            <div class="block font_color gray_bg5">
                <div class="half_box lineheight left"><img src="images/8.jpg" /></div>
                <!--end.half_box-->
                <div class="cut_box right it_three"><div class="box_content"><p>Convert most cables to work with the Zolo magnetic system. Simply add Zolo Cable Clips onto your cable ends and like magic it works.
                        </p></div></div>
                <!--end.half_box-->
            </div>
            <!--end.block-->
            <div class="block font_color gray_bg6">

                <div class="half_box lineheight left"><img src="images/9.jpg" /></div>

                <!--end.half_box-->
                <div class="cut_box right it_three"><div class="box_content"><p>Get military grade protection and shield your screen from impacts without the bulk. The Zolo Tough Case System is stylish and sleek.</p></div></div>
                <!--end.half_box-->
            </div>
            <!--end.block-->
        </div>
        <!--end.block-->
        <div class="block">	
            <div class="it_four">
                <ul>
                    <li>
                        <p class="itf_title"><img src="images/1.png" /><strong>Superior Value</strong>
                        </p>
                        <p class="itf_content">With Zolo you get premium products that cost less.</p>
                    </li>
                    <li>
                        <p class="itf_title"><img src="images/2.png" /><strong>Works Together</strong>
                        </p>
                        <p class="itf_content">
                            Using magnets and clever design Zolo products are made to work together.
                        </p>
                    </li>
                    <li>
                        <p class="itf_title"><img src="images/3.png" /><strong>Direct To You
                            </strong>
                        </p>
                        <p class="itf_content">We ship direct to you so there's no middleman and unnecessary costs.</p>
                    </li>
                    <li>
                        <p class="itf_title"><img src="images/4.png" /><strong>Premium Quality</strong>
                        </p>
                        <p class="itf_content">Products that you can trust, so you can worry less and live more.</p>
                    </li>
                    <li>
                        <p class="itf_title"><img src="images/5.png" /><strong>Simple</strong>
                        </p>
                        <p class="itf_content">
                            Easy to set up, easy to use and always intuitive. It's simply smarter.</p>
                    </li>
                    <li>
                        <p class="itf_title"><img src="images/6.png" /><strong>Evergrowing</strong>
                        </p>
                        <p class="itf_content"> 
                            We are continuing to grow our ecosystem of products.</p>
                    </li>
                </ul>
            </div>
            <!--end.it_four-->
        </div>
        <!--end.block-->
        <div class="block font_color gray_bg6 padding_box2">
            <div class="title_wrap"><h2 class="title font_size2">WHAT YOU GET WHEN YOU BACK US</h2></div>
        </div>

        <div class="block it_six">
            <a class="m_hover" href="">
                <div class="block gray_bg">
                    <div class="left">
                        <p class="price w1">
                            <strong class="price_count">$2<em>High Five</em></strong>
                            <span class="price_txt">Emotional Support - A Zolo fan at heart.</span>
                        </p>
                    </div>
                    <p class="right"><img src="images/11.jpg" /></p>
                    <div class="ithover"></div>
                </div>
                <!--end.gray_bg-->
            </a>
        </div>
        <!--end.block-->
        <div class="block it_seven">
            <a class="half_boxs it_seven_left left m_hover" href="">
                <div class="gray_bg2">  
                    <p><img src="images/12.jpg" /></p>
                    <p class="price">
                        <strong class="price_count">$13<em>Power Pack</em></strong>
                        <span class="price_txt">Zolo 1x Battery, Short Cable, 2 Cable Clips.</span>
                    </p>
                    <div class="ithover"></div>
                </div>

            </a>
            <!--end.half_boxs-->
            <a class="half_boxs right m_hover" href="">
                <div class="gray_bg2">
                    <p><img src="images/13.jpg" /></p>
                    <p class="price">
                        <strong class="price_count">$18<em>Power + Protection Pack</em></strong>
                        <span class="price_txt">2X Zolo 1x Battery. Tough Case for iPhone 5s, 6* or Samsung GALAXY S5, Short Cable, 2 Cable Clips</span>
                    </p> 
                    <div class="ithover"></div>
                </div>
            </a>
            <!--end.half_boxs-->
        </div>
        <!--end.block-->
        <div class="block it_seven">
            <a class="m_hover half_boxs it_seven_left left" href="">
                <div class="gray_bg7">   
                    <p><img src="images/14.jpg" /></p>
                    <p class="price">
                        <strong class="price_count">$25<em>Power Pack X2</em></strong>
                        <span class="price_txt">2X Zolo 1x Battery. Short Cable, 2 Cable Clips.</span>
                    </p>
                    <div class="ithover"></div>
                </div>

            </a>
            <!--end.half_boxs-->
            <a class="m_hover half_boxs right" href="">
                <div class="gray_bg7">   
                    <p><img src="images/15.jpg" /></p>
                    <p class="price">
                        <strong class="price_count">$35<em>Power + Protection Pace X2</em></strong>
                        <span class="price_txt">2X Zolo 1x Battery. Tough Case for iPhone 5s, 6* or Samsung GALAXY S5, Short Cable, 2 Cable Clips.</span>
                    </p>  
                    <div class="ithover"></div>  
                </div>
                <!--end.half_boxs-->
            </a>
        </div>
        <!--end.block-->
        <div class="block it_seven">
            <a class="m_hover half_boxs left" href="">
                <div class="orange_bg">    
                    <p><img src="images/16.jpg" /></p>
                    <p class="price">
                        <strong class="price_count">$1,000<em> Zolo Lifer</em></strong>
                        <span class="price_txt">Get a new Zolo product every time we release something new for life.</span>
                    </p> 
                    <div class="ithover"></div>  
                </div>
            </a>
            <!--end.half_boxs-->
            <a class="m_hover half_boxs right " href="">
                <div class="orange_bg">    
                    <p><img src="images/17.jpg" /></p>
                    <p class="price">
                        <strong class="price_count">$10, 000<em>Zolo Elite</em></strong>
                        <span class="price_txt">Get free personalized Zolo products for life and meet the Zolo team.</span>
                    </p>    
                    <div class="ithover"></div>
                </div>
            </a>
            <!--end.half_boxs-->
        </div>
        <!--end.block-->
        <div class="block font_color gray_bg6 padding_box2">
            <div class="title_wrap"><h2 class="font_size2 title">EVERY DAY SMART FOR EVERYONE</h2></div>
        </div>
        <div class="block it_two">
            <div class="it_nine">
                <div class="half_boxs padding_top1 right"><img src="images/22.gif" /></div>
                <div class="half_box left">
                    <!--<div class="title_wrap"><h3 class="title">FROM OUR DOOR TO YOURS</h3></div>-->
                    <div class="title_wrap"><h3 class="title">HOW ARE WE ABLE TO OFFER SUCH LOW PRICES?</h3></div>

                    When our direct to consumer model is supported by an engaged community,  we'll be able to work smarter together in keeping costs down for everyone.
                    <br>
                    <br>
                    We ship direct to you,  so there's no middleman to drive up the prices. Through our careful design considerations and experience in optimizing sales models we have created a way to deliver high quality accessories at the most accessible prices. </div>
            </div>
        </div>
        <!--end.block-->
        <div class="block">
            <div class="it_nine it_nine1">
                <div class="half_boxs left"><img src="images/24.gif" /></div>
                <div class="half_box padding_top1 right">
                    <div class="title_wrap"><h3 class="title">THIS IS JUST THE BEGINNING</h3></div>
                    With your backing,  our simple "connect" system will quickly grow to an entire collection of accessories that work smarter together — giving you even more effortless ways to stay powered,  connected,  and protected. 
                </div>
            </div>
            <!--it_nine-->
        </div>
        <div class="block it_two">
            <div class="it_nine">
                <div class="half_boxs right"><img src="images/20.jpg" /></div>
                <div class="half_box padding_top2 left">
                    <div class="title_wrap"><h3 class="title">REFERRAL REWARDS</h3></div>
                    We hope to reach as many people as possible with your help. With our referral rewards program you can earn a free Zolo Travel Stand for referring 10+ people who each donate at least $13 to our campaign.
                    <br>
                    <br>

                    The person who refers the most people who donateat least $15 to our campaign will win<br>

                    <strong class="font_color2">FREE ZOLO PRODUCTS FOR LIFE!</strong><br>
                    <a href="" class="more">LEARN MORE</a> </div>
            </div>
            <!--it_nine-->
        </div>

        <div class="block padding_box">
            <div class="title_wrap"><h2 class="title title2">WE ARE SMARTER TOGETHER</h2></div>
        </div>
        <!--end.block-->

        <div class="block lineheight"><img src="images/26.jpg" /></div>
        <!--end.blocks-->
        <div class="block orange_bg it_two">
            <div class="footer">
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
    </body>
</html>