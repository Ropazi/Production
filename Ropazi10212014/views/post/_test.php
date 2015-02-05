<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
    <link href="Resources/Style/Ropazi_home.css" rel="stylesheet" type="text/css" />
    <link href="Resources/Style/custom.css" rel="stylesheet" type="text/css" />
    <link href="http://jamesflorentino.github.io/nanoScrollerJS/css/nanoscroller.css"
        rel="stylesheet" type="text/css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://jamesflorentino.github.io/nanoScrollerJS/javascripts/jquery.nanoscroller.js"></script>
    <link rel="stylesheet" href="Resources/Style/jquery-ui.css">
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <script>
        $(function () {
            $("#slider-range").slider({
                range: true, min: 0, max: 999, values: [75, 300],
                slide: function (event, ui) {
                    $("#amount").text("from $" + ui.values[0] + " - $" + ui.values[1]);
                }
            });
            $("#amount").text("from $" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));
        });
    </script>
</head>
<body>
    <div id="topbanner" class="banner-row">
        <div id="left-menu" class="large-5 small-3 columns">
            <ul>
                <li><a class="left-button" href="#"></a>
                    <div id="left-drop-down" class="dropdown">
                        <ul>
                            <li>Girls</li>
                            <li>Boys</li>
                            <li>Babies</li>
                            <li>Furniture</li>
                            <li>Brands</li>
                            <li class="bottom-text">About us</li>
                            <li class="bottom-text">Term of Use</li>
                            <li class="bottom-text">Privacy</li>
                        </ul>
                    </div>
                </li>
                <li>
                    <ul class="hide-for-small" style="list-style-type: none">
                        <li>
                            <input type="text" class="txtserach" /></li><li>
                                <div id="search-box" class="textarea">
                                    <a id="search-img" href="#"></a>
                                </div>
                            </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="large-2 small-2 columns banner-image">
            <a id="banner-img" href="#">
                <img src="Resources/Images/banner-img.png" />
            </a>
        </div>
        <div id="right-menu" class="large-5 small-5 columns">
            <ul>
                <li><a id="scissor-img" href="#"></a>
                    <div id="right-scissor-dropdown" class="dropdown">
                        <div>
                            Add Clipping</div>
                        <ul>
                            <li>
                                <input type="text" class="txt-dropdown" placeholder="  Paste web page URL" />
                                <a href="#">
                                    <img src="Resources/Images/plus-btn.png" /></li></a>
                        </ul>
                    </div>
                </li>
                <li><a id="bell-img" href="#"></a>
                    <div id="right-alert-dropdown" class="dropdown">
                        <div>
                            Alerts</div>
                        <ul class="nano-content">
                            <li>
                                <img alt="" src="Resources/Images/s1-a.png" /><img alt="" src="Resources/Images/sale.png" />
                                <div class="alert-content">
                                    This item is on sale in your <strong>wishlist</strong>.</div>
                            </li>
                            <li>
                                <img alt="" src="Resources/Images/s-2.png" /><img alt="" src="Resources/Images/clip.png" />
                                <img alt="" src="Resources/Images/s-3.png" /><img alt="" src="Resources/Images/s-4.png" />
                                <div class="alert-content-2">
                                    + 4 more
                                </div>
                            </li>
                            <li>
                                <img alt="" src="Resources/Images/s-5.png" /><img alt="" src="Resources/Images/s-6.png" />
                                <img alt="" src="Resources/Images/s-2.png" />
                                <div class="alert-content-2">
                                    + 10 more</div>
                                <img alt="" src="Resources/Images/heart_s.png" /><img alt="" src="Resources/Images/s1-a.png" /></li>
                            <li>
                                <img alt="" src="Resources/Images/s-5.png" />
                                <div class="alert-content-3">
                                    <strong>Janet Barnes</strong><br />
                                    started following you</div>
                            </li>
                            <li>
                                <img alt="" src="Resources/Images/s-5.png" /><img alt="" src="Resources/Images/clip.png" />
                                <img alt="" src="Resources/Images/s-3.png" /><img alt="" src="Resources/Images/s-4.png" /></li>
                            <li>
                                <img alt="" src="Resources/Images/s-6.png" /><img alt="" src="Resources/Images/clip.png" />
                                <img alt="" src="Resources/Images/s-3.png" /><img alt="" src="Resources/Images/s1-a.png" />
                                <img alt="" src="Resources/Images/s-4.png" /><div class="alert-content-2">
                                    + 10 more</div>
                            </li>
                            <li>
                                <img alt="" src="Resources/Images/s1-a.png" /><img alt="" src="Resources/Images/sale.png" /></li>
                            <li>
                                <img alt="" src="Resources/Images/s1-a.png" /><img alt="" src="Resources/Images/sale.png" /></li>
                            <li>
                                <img alt="" src="Resources/Images/s1-a.png" /><img alt="" src="Resources/Images/sale.png" /></li>
                            <li>
                                <img alt="" src="Resources/Images/s1-a.png" /><img alt="" src="Resources/Images/sale.png" /></li>
                            <li>
                                <img alt="" src="Resources/Images/s1-a.png" /><img alt="" src="Resources/Images/sale.png" /></li>
                            <li>
                                <img alt="" src="Resources/Images/s1-a.png" /><img alt="" src="Resources/Images/sale.png" /></li>
                        </ul>
                    </div>
                    <span class="number">9</span> </li>
                <li>
                    <div id="profile-box">
                        <ul>
                            <li id="profile-img">
                                <img alt="" src="Resources/Images/profile-img.png" /></li><li id="profile-name">Hello
                                    Kathleen</li><li><a id="profile-open" href="#"></a></li>
                        </ul>
                    </div>
                    <div id="right-profile-dropdown" class="dropdown">
                        <ul>
                            <li>Profile</li>
                            <li>Watchlist</li>
                            <li>Settings</li>
                            <li>Help</li>
                            <li>Logout</li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div id="banner-line" class="banner-row">
        <div id="banner-line-container">
            <div id="banner-line-cross" class="large-1 small-2 columns">
                <a id="cross" href="#"></a>
            </div>
            <div id="banner-line-txtfilter" class="large-11 small-10 columns">
                <div>
                    <ul>
                        <li>I'm looking for </li>
                        <li id="shirts-filter"><a href="#">shirts<span class="dd-image"></span></a>
                            <ul id="shirts-filter-dropdown" class="f-dd">
                                <li class="active">shirts</li>
                                <li>pants</li>
                                <li>shorts</li>
                                <li>hoodies</li>
                                <li>shoes</li>
                                <li>sleepwear</li>
                                <li>jackets</li>
                                <li>sweeters</li>
                                <li>furniture</li>
                            </ul>
                        </li>
                        <li id="price-filter"><a href="#"><span id="amount"></span><span class="dd-image"></span>
                        </a>
                            <ul id="price-filter-dropdown" class="f-dd">
                                <li>
                                    <div id="slider-range">
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>for a</li>
                        <li id="age-filter"><a href="#">12m old<span class="dd-image"></span></a>
                            <ul id="age-filter-dropdown" class="f-dd">
                                <li class="active">12m old</li>
                                <li>13m old</li>
                                <li>14m old</li>
                            </ul>
                        </li>
                        <li id="sex-filter"><a href="#">boy<span class="dd-image"></span></a>
                            <ul id="sex-filter-dropdown" class="f-dd">
                                <li class="active">boy</li>
                                <li>girl</li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <a id="plus-topline" style=" display:none;"></a>
    </div>
    <div id="container" class="banner-row">
    <div class="row">
        <div class="large-3 small-6 columns pic-container row-first">
            <div class="outercontainer">
                <div class="content-large-image">
                    <div class="overlay-img">
                        <div class="overlay-padding">
                            <a href="#2">
                                <img class="content-picture" src="Resources/Images/overlay-scissor.png" /></a>
                            <a href="#1">
                                <img class="content-picture" src="Resources/Images/overrelay-heart.png" /></a>
                            <a href="#3">
                                <img class="content-picture-last" src="Resources/Images/overlay-share.png" /></a>
                        </div>
                        <a href="#">
                            <img class="large-11 small-11" src="Resources/Images/overlay-opacity.png" /></a>
                        <div class="large-12 small-10 columns txtimg hide-for-small">
                            Skinny jeans lorem ipsum dolor quality manufacturer top trend by Ralph Lauren.</div>
                    </div>
                    <img class="content-picture" src="Resources/Images/diaper.jpg" />
                </div>
                <div class="content-price-panel">
                    <a class="large-9 small-9 columns price-9 no-padding">
                        <div class="padding-inner">
                            <img src="Resources/Images/content-polo.png" />
                            <span class="price">$29 <span class="buy">Buy</span></span>
                        </div>
                    </a>
                    <div class=" large-3 small-3 columns padding-inner-2 no-padding">
                        <div class="right-imgs-child">
                                        <a class="clipping_sci" href="javascript:void(0)">
                                            <span>1</span></a>
                                             <a class="clipping_heart" href="javascript:void(0)"><span>0</span></a>
                                    </div>
                    </div>
                </div>
                <div class="content-clipping-panel">
                    <div class=" large-2 small-4 columns" style="padding-left: 5px;">
                        <img src="Resources/Images/content-profilepic.png" />
                    </div>
                    <div class="large-10 small-8 columns last-img">
                        <span>Clipped by <strong>Marsha Smith</strong>
                            <br />
                            <span class="bottom-txt">Boys Pants</span></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="large-3 small-6 columns pic-container">
            <div class="outercontainer">
                <div class="content-large-image">
                    <div class="overlay-img">
                        <div class="overlay-padding">
                            <a href="#2">
                                <img class="content-picture" src="Resources/Images/overlay-scissor.png" /></a>
                            <a href="#1">
                                <img class="content-picture" src="Resources/Images/overrelay-heart.png" /></a>
                            <a href="#3">
                                <img class="content-picture-last" src="Resources/Images/overlay-share.png" /></a>
                        </div>
                        <a href="#">
                            <img class="large-11 small-11" src="Resources/Images/overlay-opacity.png" /></a>
                        <div class="large-12 small-10 columns txtimg hide-for-small">
                            Skinny jeans lorem ipsum dolor quality manufacturer top trend by Ralph Lauren.</div>
                    </div>
                    <img class="content-picture" src="Resources/Images/content-boy-img.png" />
                </div>
                <div class="content-price-panel">
                    <a class="large-9 small-9 columns price-9 no-padding">
                        <div class="padding-inner">
                            <img src="Resources/Images/content-polo.png" />
                            <span class="price">$29 <span class="buy">Buy</span></span>
                        </div>
                    </a>
                    <div class=" large-3 small-3 columns padding-inner-2 no-padding">
                        <div class="right-imgs-child">
                                        <a class="clipping_sci" href="javascript:void(0)">
                                            <span>3325</span></a>
                                             <a class="clipping_heart" href="javascript:void(0)"><span>479</span></a>
                                    </div>
                    </div>
                </div>
                <div class="content-clipping-panel">
                    <div class=" large-2 small-4 columns" style="padding-left: 5px;">
                        <img src="Resources/Images/content-profilepic.png" />
                    </div>
                    <div class="large-10 small-8 columns last-img">
                        <span>Clipped by <strong>Marsha Smith</strong>
                            <br />
                            <span class="bottom-txt">Boys Pants</span></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="large-3 small-6 columns pic-container">
            <div class="outercontainer">
                <div class="content-large-image">
                    <div class="overlay-img">
                        <div class="overlay-padding">
                            <a href="#2">
                                <img class="content-picture" src="Resources/Images/overlay-scissor.png" /></a>
                            <a href="#1">
                                <img class="content-picture" src="Resources/Images/overrelay-heart.png" /></a>
                            <a href="#3">
                                <img class="content-picture-last" src="Resources/Images/overlay-share.png" /></a>
                        </div>
                        <a href="#">
                            <img class="large-11 small-11" src="Resources/Images/overlay-opacity.png" /></a>
                        <div class="large-12 small-10 columns txtimg hide-for-small">
                            Skinny jeans lorem ipsum dolor quality manufacturer top trend by Ralph Lauren.</div>
                    </div>
                    <img class="content-picture" src="Resources/Images/content-boy-img.png" />
                </div>
                <div class="content-price-panel">
                    <a class="large-9 small-9 columns price-9 no-padding">
                        <div class="padding-inner">
                            <img src="Resources/Images/content-polo.png" />
                            <span class="price">$29 <span class="buy">Buy</span></span>
                        </div>
                    </a>
                    <div class=" large-3 small-3 columns padding-inner-2 no-padding">
                        <div class="right-imgs-child">
                                        <a class="clipping_sci" href="javascript:void(0)">
                                            <span>3325</span></a>
                                             <a class="clipping_heart" href="javascript:void(0)"><span>479</span></a>
                                    </div>
                    </div>
                </div>
                <div class="content-clipping-panel">
                    <div class=" large-2 small-4 columns" style="padding-left: 5px;">
                        <img src="Resources/Images/content-profilepic.png" />
                    </div>
                    <div class="large-10 small-8 columns last-img">
                        <span>Clipped by <strong>Marsha Smith</strong>
                            <br />
                            <span class="bottom-txt">Boys Pants</span></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="large-3 small-6 columns pic-container row-last">
            <div class="outercontainer">
                <div class="content-large-image">
                    <div class="overlay-img">
                        <div class="overlay-padding">
                            <a href="#2">
                                <img class="content-picture" src="Resources/Images/overlay-scissor.png" /></a>
                            <a href="#1">
                                <img class="content-picture" src="Resources/Images/overrelay-heart.png" /></a>
                            <a href="#3">
                                <img class="content-picture-last" src="Resources/Images/overlay-share.png" /></a>
                        </div>
                        <a href="#">
                            <img class="large-11 small-11" src="Resources/Images/overlay-opacity.png" /></a>
                        <div class="large-12 small-10 columns txtimg hide-for-small">
                            Skinny jeans lorem ipsum dolor quality manufacturer top trend by Ralph Lauren.</div>
                    </div>
                    <img class="content-picture" src="Resources/Images/content-boy-img.png" />
                </div>
                <div class="content-price-panel">
                    <a class="large-9 small-9 columns price-9 no-padding">
                        <div class="padding-inner">
                            <img src="Resources/Images/content-polo.png" />
                            <span class="price">$29 <span class="buy">Buy</span></span>
                        </div>
                    </a>
                    <div class=" large-3 small-3 columns padding-inner-2 no-padding">
                        <div class="right-imgs-child">
                                        <a class="clipping_sci" href="javascript:void(0)">
                                            <span>3325</span></a>
                                             <a class="clipping_heart" href="javascript:void(0)"><span>479</span></a>
                                    </div>
                    </div>
                </div>
                <div class="content-clipping-panel">
                    <div class=" large-2 small-4 columns" style="padding-left: 5px;">
                        <img src="Resources/Images/content-profilepic.png" />
                    </div>
                    <div class="large-10 small-8 columns last-img">
                        <span>Clipped by <strong>Marsha Smith</strong>
                            <br />
                            <span class="bottom-txt">Boys Pants</span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>
</html>
