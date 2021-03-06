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
                $(".product_nav li").click(function() {
                    var i = $(this).index();
                    $(this).addClass("hover").siblings("li").removeClass("hover");
                    $(".product_content").eq(i).addClass("show_block").siblings("div.product_content").removeClass("show_block");
                });
                $(".product_color span").click(function() {
                    $(this).addClass("hover").siblings("span").removeClass("hover");
                    $("#pip").attr("src", $(this).attr("rel"));
                });
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


        <div class="block padding_box">
            <div class="wrapper">
                <div class="title_wrap">
                    <?php
                    getProductSegment('title');
                    ?>
                </div>
            </div>
        </div>

        <div class="block">
            <div class="wrapper product_item">
                <?php getProductSegment('intro'); ?>
            </div>
        </div>
        <!--end.block-->
        <div class="block">
            <div class="wrapper">
                <div class="product_info">
                    <div class="block padding_box">
                        <div class="title_wrap"> <h2 class="title">TECHNICAL DETAILS </h2></div>
                    </div>
                    <div class="product_box">
                        <?php getProductSegment('details'); ?>
                    </div>
                    <!--end.product_box--> 
                </div>
                <!--end.product_info--> 
            </div>
        </div>
        <!--end.block-->
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

        <?php
        $pair = array(
            'p1' => 'bundle1',
            'p2' => 'bundle2',
            'p3' => 'bundle3'
        );
        ?>
        <script type="text/javascript" src="//static.criteo.net/js/ld/ld.js" async="true"></script>
        <!--  Product page tag ---->
        <script type="text/javascript">
            window.criteo_q = window.criteo_q || [];
            window.criteo_q.push(
                {event: "setAccount", account: 14599},
                {event: "setSiteType", type: "d"},
                {event: "viewItem", item: "<?php echo $pair[$p]; ?>"}
            );
        
            function clickoutconv(pid, price)
            {
                window.criteo_q = window.criteo_q || [];
                criteo_q.push(
                        {event: "setAccount", account: 14599},
                {event: "setSiteType", type: "d"},
                {event: "trackTransaction",
                    id: Math.floor(Math.random() * 99999999999),
                    item: [
                        {id: pid, price: price, quantity: "1"}
                    ]});
            }
        </script>

    </body>
</html>
