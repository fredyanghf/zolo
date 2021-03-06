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
    <body>
        <div class="blocks orange_bg">
            <div class="block header">
                <a class="logo" href="index.html"><img src="images/logo.png" /></a>
                <div class="small_nav">
                    <div class="small_nav_ico"></div>
                    <div class="nav">
                        <a href="index.html">Home</a>
                        <a href="product.html">Products</a>
                        <a href="referral.html">Referral Content</a>
                        <a href="">FAQ</a>
                        <a href="">Forum</a>
                    </div>
                    <!--end.nav-->
                </div>
                <!--end.small_nav-->
            </div>
            <!--end.header-->
        </div>
        <!--end.blocks-->

        <div class="block padding_box">
            <div class="wrapper">
                <div class="title_wrap">
                    <h2 class="titles"><span class="title"> Zolo 1x Battery and Tough Case System</span><em>For iPhone 5s/5</em></h2>
                </div>
            </div>
        </div>

        <div class="block">
            <div class="wrapper product_item">
                <div class="product_item_pic"><img id="pip" src="images/Power-+-S5-1.jpg" /></div>
                <div class="product_item_wrapper">
                    <ul class="product_item_spec">
                        <li>&bull; One charge to most smartphones.</li>
                        <li>&bull; Magnetic cable clips work with most cords.</li>
                        <li>&bull; 7 inch Micro USB cable with Magnetic ends.</li>
                        <li>&bull; Military grade protection case.</li>
                        <li>&bull; Impact resistant screen protector.</li>
                    </ul>
                    <div class="product_color"> <span rel="images/Power-+-S5-1.jpg" class="hover">1</span> <span class="pc_black" rel="images/Power-+-S5-2.jpg">2</span> <span rel="images/Power-+-S5-3.jpg"><em class="pc_blue"></em><i>3</i></span> <span rel="images/Power-+-S5-4.jpg"><em class="pc_red"></em><i>4</i></span> </div>
                    <!--end.product_color-->
                    <div class="product_price">$<strong>15</strong></div>
                    <a class="product_buy" href="">CONTRIBUTE NOW</a> <span class="product_buy_info">Products not sold separately. </span> </div>
            </div>
        </div>
        <!--end.block-->
        <div class="block padding_box">
            <div class="wrapper">
                <div class="product_info">
                    <div class="block padding_box">
                        <div class="title_wrap"> <h2 class="title">TECHNICAL DETAILS </h2></div>
                    </div>
                    <div class="product_box">
                        <div class="product_nav">
                            <ul>
                                <li class="hover">Zolo 1x Battery</li>
                                <li>Zolo Tough Case</li>
                                <li>Zolo Impact Screen Protector</li>
                                <li>Zolo Short Cable</li>
                                <li>Zolo Cable Clips</li>
                            </ul>
                        </div>
                        <!--end.product_nav-->
                        <div class="product_container">
                            <div class="product_content show_block">
                                <h3 class="small_titles">Zolo 1x Battery</h3>
                                <table cellpadding="0" cellspacing="0" class="product_sptable">
                                    <tr>
                                        <th width="50%">Capacity:</th>
                                        <td width="50%"> 3000 mAh</td>
                                    </tr>
                                    <tr>
                                        <th>Charging Ports: </th>
                                        <td> 1</td>
                                    </tr>
                                    <tr>
                                        <th>Output Current: </th>
                                        <td> 1 Amp</td>
                                    </tr>
                                    <tr>
                                        <th>Input Current: </th>
                                        <td> 1 Amp</td>
                                    </tr>
                                    <tr>
                                        <th>Size: </th>
                                        <td> 3.0 x 2.1 x 0.5</td>
                                    </tr>
                                    <tr>
                                        <th>Weight: </th>
                                        <td> 3.2 oz</td>
                                    </tr>
                                    <tr>
                                        <th>Charging time: </th>
                                        <td> 4 Hours</td>
                                    </tr>
                                    <tr>
                                        <th>Certifications: </th>
                                        <td> CE, FCC, RoHS, PSE(Japan)</td>
                                    </tr>
                                </table>
                            </div>
                            <!--end.product_content--> 
                            <div class="product_content">
                                <h3 class="small_titles">Zolo Tough Case</h3>
                                <table cellpadding="0" cellspacing="0" class="product_sptable">
                                    <tr>
                                        <th width="50%">Military drop-test standard:</th>
                                        <td width="50%">Dropped 26 times from a height of 4 feet with no obvious damage.</td>
                                    </tr>
                                    <tr>
                                        <th>Insertion durability test: </th>
                                        <td>100 insertion test</td>
                                    </tr>
                                    <tr>
                                        <th>Environmental test: </th>
                                        <td>Temperature cycling from -20 C to 40 C; 70% relative humidity with no obvious damage.</td>
                                    </tr>
                                    <tr>
                                        <th>Abrasion testing:</th>
                                        <td>  Passed</td>
                                    </tr>
                                    <tr>
                                        <th>Certifications: </th>
                                        <td>RoHS, Proposition 65</td>
                                    </tr>          
                                </table>
                            </div>
                            <!--end.product_content--> 
                            <div class="product_content">
                                <h3 class="small_titles">Zolo Impact Screen Protector</h3>
                                <table cellpadding="0" cellspacing="0" class="product_sptable">
                                    <tr>
                                        <th width="50%">Hardness:</th>
                                        <td width="50%">4H</td>
                                    </tr>
                                    <tr>
                                        <th>Drop-test standard: </th>
                                        <td>225 Gram steel ball dropped from 1.5 meters</td>
                                    </tr>
                                    <tr>
                                        <th>Finish: </th>
                                        <td>Glossy</td>
                                    </tr>                      
                                </table>
                            </div>
                            <!--end.product_content--> 
                            <div class="product_content">
                                <h3 class="small_titles">Zolo Short Cable</h3>
                                <table cellpadding="0" cellspacing="0" class="product_sptable">
                                    <tr>
                                        <th width="50%">Length:</th>
                                        <td width="50%">7 inches</td>
                                    </tr>
                                    <tr>
                                        <th>Type: </th>
                                        <td>USB to Micro USB </td>
                                    </tr>          
                                </table>
                            </div>
                            <!--end.product_content--> 
                            <div class="product_content">
                                <h3 class="small_titles">Zolo Cable Clips</h3>
                                <table cellpadding="0" cellspacing="0" class="product_sptable">
                                    <tr>
                                        <th width="50%">Size:</th>
                                        <td width="50%">3mm.</td>
                                    </tr>
                                    <tr>
                                        <th>Compatible with: </th>
                                        <td>3mm</td>
                                    </tr>          
                                </table>
                            </div>
                            <!--end.product_content--> 
                        </div>
                        <!--end.product_container--> 
                    </div>
                    <!--end.product_box--> 
                </div>
                <!--end.product_info--> 
            </div>
        </div>
        <!--end.block-->
        <div class="blocks orange_bg footer">
            <div class="footer_bottom block">
                <div class="footer_txt half_box left">&copy;2014 Zolo.All rights reserved.</div>
                <div class="half_boxs right"><div class="share"><a class="fb" href=""></a><a class="tw" href=""></a><a class="yt" href=""></a></div></div>
            </div>
            <!--end.footer_bottom--> 
        </div>
        <!--end.blocks-->
    </body>
</html>
