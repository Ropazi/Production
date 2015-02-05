<?php include_once("classes/helpers/webincludes.php");  ?>
<?php include_once("classes/uihelpers/categoryhelper.php");  ?>
<?php include_once("classes/uihelpers/sizehelper.php");  ?>
<?php include_once("classes/uihelpers/appuserhelper.php");  ?>
<script type="text/javascript">
		$(document).ready(function () {
			
			$('#searchText').keyup(function(e){
				if ((e.which && e.which == 13) || (e.keyCode && e.keyCode == 13))
			    {
				    $(this).trigger("enterKey");
			    }
			});
			$('#searchText').bind("enterKey",function(e){
				RopaziSearch();
			});
		});
        $(document).ready(function () {
            $(".nano").nanoScroller();
        });
        $(document).ready(function () {
        	$("#right-alert-dropdown").on({
        	    mouseenter: function () {
        	        //stuff to do on mouse enter
        	    },
        	    mouseleave: function () {
        	        $(this).css("visibility", "hidden");
        	    }
        	});
	        $('#bell-img').click(function (e) {
		        $("#right-alert-dropdown").css("visibility", "visible");
	            return false;
	        });
        });
        $(document).ready(function () {
        	$("#right-profile-dropdown").on({
        	    mouseenter: function () {
        	        //stuff to do on mouse enter
        	        
        	    },
        	    mouseleave: function () {
            	    
        	        $(this).css("display", "none");
        	    }
        	});
	        $('#profile-box').hover(function (e) {
		        $("#right-profile-dropdown").css("display", "block");
	            return false;
	        },function (e) {
		        
	        });
        });
        $(document).ready(function () {
        	$("#left-drop-down").on({
        	    mouseenter: function () {
        	    	//$("this").css("display", "block");
        	    },
        	    mouseleave: function () {
        	        //$(this).css("display", "none");
        	    }
        	});
	        $('#left-button-burger').hover(function (e) {
		        //$("left-drop-down").css("display", "block");
	        },function (e) {
		        
	        });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#slider-range").slider({
                range: true, min: 0, max: 150, values: [0, 150],
                slide: function (event, ui) {
                    $("#amount").text("from $" + ui.values[0] + " - $" + ui.values[1]);
                    $('#hdnPrice').val(ui.values[0] + "-" + ui.values[1]);
                }
            });
            $("#amount").text("from $" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#age-slider-range").slider({
                range: false, min: 0, max: 35, values: [0],
                slide: function (event, ui) {
                            if(ui.values[0] <= 24) {
                                $("#displaySize").text(ui.values[0] + "m");
                                $('#hdnSize').val(ui.values[0] + "m");
                            }
                            else {
                                $("#displaySize").text(ui.values[0]-23 + "y");
                                $('#hdnSize').val(ui.values[0] + "y");
                            }
                     }	
            });
        });
    </script>
    <input type="hidden" id="hdnCategory" value="" />
    <input type="hidden" id="hdnTitle" value="" />
    <input type="hidden" id="hdnPrice" value="0-1000" />
    <input type="hidden" id="hdnSize" value="" />
    <input type="hidden" id="hdnGender" value="" />
    <input type="hidden" id="hdnPageIndex" value="0" />
<div id="topbanner" class="banner-row">
    <div class="topbanner-innerrow">
        <div id="left-menu" class="large-5 small-3 columns">
            <ul>
                <li><a id="left-button-burger" class="left-button" href="#"></a>
                    <div id="left-drop-down" class="dropdown">
                        <ul>
                            <li>Girls</li>
                            <li>Boys</li>
                            <li>Babies</li>
                            <li>Furniture</li>
                            <li>Toys</li>
                            <li class="bottom-text">About us</li>
                            <li class="bottom-text">Term of Use</li>
                            <li class="bottom-text">Privacy</li>
                        </ul>
                    </div>
                </li>
                <li>
                    <ul class="hide-for-small" style="list-style-type: none">
                        <li>
                            <input type="text" id="searchText" class="txtserach" /></li><li>
                                <div id="search-box"  class="textarea">
                                    <a id="search-img" href="#" onclick="javascript:RopaziSearch();return false;"></a>
                                </div>
                            </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="large-2 small-2 columns banner-image">
            <a id="banner-img" href="/post/userpost">
                <img src="/content/images/banner-img.png" />
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
                                    <img src="/content/images/plus-btn.png" /></a></li>
                            <li style=" text-align:center;">
                            </li>
                        </ul>
                    </div>
                    <div id="right-scissor-dropdown-clipping" class="dropdown">
                        <div>
                            Clip to ...
                            <a class="clip-anchor" href="#">
                                    <img src="/content/images/scissor-cross.png" /></a></div>
                        <ul>
                            <li>
                                <input type="text" class="txt-dropdown" placeholder=" Catalog Name" />
                                <a href="#">
                                    <img src="/content/images/scissor-plus.png" /></a></li>
                            <li>
                            <div class="nano" style=" height:100px;">
                            <ul class="nano-content">
                                <li>
                                     Outfits for Billy
                                </li>
                                <li>
                                     Billy’s Room
                                </li>
                                <li>
                                     Jill’s baby Shower Ideas
                                </li>
                                <li>
                                     I &lt;3 Ralph Lauren Kids
                                </li>
                                <li>
                                     Outfits for Billy
                                </li>
                                <li>
                                     Billy’s Room
                                </li>
                                <li>
                                     Jill’s baby Shower Ideas
                                </li>
                                <li>
                                     I &lt;3 Ralph Lauren Kids
                                </li>
                            </ul>
                        </div>
                            </li>
                        </ul>
                    </div>
                </li>
                <li><a id="bell-img" class="bell-img" href="#"></a>
                <div id="alerts">
                    <div id="right-alert-dropdown" class="dropdown">
                        <div>
                            Alerts</div>
                        <div class="nano" style="height: 207px;">
                            <ul class="nano-content">
                                
                            </ul>
                        </div>
                    </div>
                    <span class="number"></span> 
                 </div>
                 </li>
                <li>
                    <div id="profile-box">
                        <ul>
                            <li id="profile-img">
                                <?php echo AppUserHelper::getProfileImage(CommonUtils::verifyUserCookie()) ?></li>
                                <li id="profile-name">Hello
                                    <?php echo CommonUtils::getUserFirstNameFromCookie() ?></li>
                                <li><a id="profile-open" href="#"></a></li>
                        </ul>
                    </div>
                    <div id="right-profile-dropdown" class="dropdown">
                        <ul>
                            <li style="cursor:pointer;" onclick="javascript:window.location='/appuser/userclipping/<?php echo CommonUtils::verifyUserCookie() ?>';">Profile</li>
                            <li style="cursor:pointer;" onclick="javascript:window.location='/home/bookmarklet';">Clipper</li>
                            <li style="cursor:pointer;" onclick="javascript:window.location='/appuser/updateprofile';">Settings</li>
                            <li style="cursor:pointer;" onclick="javascript:window.location='/help/help';">Help</li>
                            <li>Logout</li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        </div>
    </div>
    
    <div id="banner-line" class="banner-row">
    <div class="topbanner-innerrow">
        <div id="banner-line-container">
            <div id="banner-line-cross" class="large-1 small-2 columns">
                <a id="cross" href="#" onclick="javascript:$('#banner-line-container').css('display', 'none');$('#banner-line').css('height', '0');$('#plus-topline').css('display', 'block');$('#ViewFile').css('padding-top','70px');"></a>
            </div>
            <div id="banner-line-txtfilter" class="large-11 small-10 columns">
                <div>
                    <ul>
                        <li>I'm looking for </li>
                        <li id="shirts-filter"><a href="#" id="displayCategory">---<span class="dd-image"></span></a>
                            <ul id="shirts-filter-dropdown" class="f-dd">
                                <?php echo CategoryHelper::getCategories(); ?>
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
                        <li id="age-filter"><a href="#"><span id="displaySize">---</span><span class="dd-image"></span>
                        </a>
                            <ul id="age-filter-dropdown" class="f-dd">
                                <li>
                                    <div id="age-slider-range">
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>old</li>
                        <li id="sex-filter"><a href="#" id="displayGender">---<span class="dd-image"></span></a>
                            <ul id="sex-filter-dropdown" class="f-dd">
                            	<li style="cursor:pointer;" onclick="javascript:$('#hdnGender').val('');$('#displayGender').text('---');">---</li>
                            	<li style="cursor:pointer;" onclick="javascript:$('#hdnGender').val('M');$('#displayGender').text('Boy');">Boy</li>
                                <li style="cursor:pointer;" onclick="javascript:$('#hdnGender').val('F');$('#displayGender').text('Girl');">Girl</li>
                                
                            </ul>
                        </li>
                        <li><a id="filter-img" href="#" onclick="javascript:RopaziFilter();return false;"></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <a id="plus-topline" style="display: none;z-index:100;" href="#" onclick="javascript:$('#banner-line-container').css('display', 'block');$('#banner-line').css('height', '35');$('#plus-topline').css('display', 'none');$('#ViewFile').css('padding-top','100px');"></a>
        </div>
    </div>