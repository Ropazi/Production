<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ropazi</title>
    <script type="text/javascript">
        var basePath = '/';
        var ecss = 'normaledit';
        var lastecss = '';
        var issearch = false;
        var dtoupdate = '';
        var ctoupdate = '';
        var mindex = '0';
        var slikeid = '';
    </script>
    <link href="/content/themes/ui-lightness/jquery-ui-1.10.4.custom.css" rel="stylesheet"/>
	

	<link href="/content/StyleSheetMain.css,StyleSheetForms.css,StyleSheetButtons.css,menu.css" rel="stylesheet"/>
	<script src="/content/scripts/jquery-1.9.0.js,jquery.validate.js,jquery-ui-1.10.4.min.js,common.js,blockui.js,jquery.autogrowtextarea.js,jquery.autosize.js,jquery.watermark.js"></script>
    

</head>
<body>
    <div class="parent">
        <div style="background:#d8d8d8;height:20px;position:relative;">
            <div style="position:absolute;left:5px;font-weight:bold;color:#000000;"></div>
            <div style="position:absolute;right:100px;color:blue;">
                

                                        
                                        
  </div>
            <div style="position:absolute;top:3px;right:10px;">
                <a href="#" class="blue">Log Out</a>
            </div>
        </div>
        <div style="position:relative;height:48px;">
            <!-- menu -->
            <div style="padding-left:130px;">
                <ul id="menulist">
                <li id="brandTab"><a href="/brand/searchbrands"><img src="/content/images/customers.png" border="0" /><br/><span style="display:block;">Brands</span></a></li>
                <li id="brandTab"><a href="/brandcategory/brandcategories"><img src="/content/images/customers.png" border="0" /><br/><span style="display:block;">Brand Categories</span></a></li>
                <li id="postTab"><a href="/post/searchpost"><img src="/content/images/customers.png" border="0" /><br/><span style="display:block;">Posts</span></a></li>
                <li id="postTab"><a href="/scraperule/scraperules"><img src="/content/images/customers.png" border="0" /><br/><span style="display:block;">Scrape Rules</span></a></li>
                <li id="adminTab"><a href="/configparameter/configparameters"><img src="/content/images/admin.png" border="0" /><br/><span style="display:block;">System</span></a></li></ul>
            </div>
            <div style="background: #74747c;position:absolute;left:0px;top:0px;height:64px;padding:0px;border-top:2px solid red;width:130px;">&nbsp;</div>
            <div style="position:absolute;left:10px;top:2px;height:41px;background: #fff;">
                <img src="/content/images/ropazi_logo.png" style="margin-top:0px;" />

            </div>

            <!-- end menu -->
        </div>

        <div class="content">

            <div>
                <div class="PageHolder">
                    <?php require($this->viewFile); ?>
                </div>
            </div>

        </div>
        <div id="confirmremove" title="Delete?" style="display:none;">
            <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>Are you sure you want to delete?</p>
        </div>
        <div class="footer">
            <div class="footercontent" style="color:#a04839;">
                &copy; 2014. Ropazi
            </div>
        </div>
    </div>
    <div class="growlUI" style="display:none">
        <h1>Processing...</h1>
        <img src="../content/images/ajax-loader.gif" />
    </div>
    <div id="marea1">


        <div id="mcontainer1">
        </div>


    </div>
    <div id="marea2">


        <div id="mcontainer2">
        </div>


    </div>
    <div id="marea3">

        <div id="mcontainer3">
        </div>


    </div>
    <div id="marea4">

        <div id="mcontainer4">
        </div>


    </div>
    <div id="marea5">

        <div id="mcontainer5">
        </div>


    </div>
    <div id="mask1"></div>
    <div id="mask2"></div>
    <div id="mask3"></div>
    <div id="mask4"></div>
    <div id="mask5"></div>
</body>
</html>
