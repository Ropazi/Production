<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
        var pid = '';
        var aid = '';
    </script>
    	
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>    
    <script src="/content/scripts/jquery-1.9.0.js"></script> 
    <link href="/content/ropazi_home.css" rel="stylesheet" type="text/css" />
    
    
    <link href="/content/ropazi.custom.css" rel="stylesheet" type="text/css" />
    <link href="/content/local.css" rel="stylesheet" type="text/css" />
    <link href="/content/nanoscroller.css" rel="stylesheet" type="text/css" />
    <script src="/content/scripts/jquery.nanoscroller.js"></script>
    <link rel="stylesheet" href="/content/jquery-ui.css" type="text/css" />
    <script src="/content/scripts/jquery-ui.js"></script> 
    <script src="/content/scripts/foundation.min.js"></script> 
    <script src="/content/scripts/common.js"></script> 
    <script src="/content/scripts/jquery.watermark.js"></script>
	<script src="/content/scripts/masonry.js"></script>
	 <script type="text/javascript" src="/content/scripts/guiders.js"></script>
	<script type="text/javascript">
	$(document).ready(function() { 
		$(document).foundation();
	});
	</script>
	<script>
	// Include the UserVoice JavaScript SDK (only needed once on a page)
	UserVoice=window.UserVoice||[];(function(){var uv=document.createElement('script');uv.type='text/javascript';uv.async=true;uv.src='//widget.uservoice.com/SkyxHdifYfWuI2Qd33ZQ.js';var s=document.getElementsByTagName('script')[0];s.parentNode.insertBefore(uv,s)})();
	//
	// UserVoice Javascript SDK developer documentation:
	// https://www.uservoice.com/o/javascript-sdk
	//
	// Set colors
	UserVoice.push(['set', {
	  accent_color: 'rgb(251,100,87)',
	  trigger_color: 'white',
	  trigger_background_color: 'rgb(251,100,87)'
	}]);
	// Identify the user and pass traits
	// To enable, replace sample data with actual user traits and uncomment the line
	UserVoice.push(['identify', {
	  //email:      'john.doe@example.com', // User’s email address
	  //name:       'John Doe', // User’s real name
	  //created_at: 1364406966, // Unix timestamp for the date the user signed up
	  //id:         123, // Optional: Unique id of the user (if set, this should not change)
	  //type:       'Owner', // Optional: segment your users by type
	  //account: {
	  //  id:           123, // Optional: associate multiple users with a single account
	  //  name:         'Acme, Co.', // Account name
	  //  created_at:   1364406966, // Unix timestamp for the date the account was created
	  //  monthly_rate: 9.99, // Decimal; monthly rate of the account
	  //  ltv:          1495.00, // Decimal; lifetime value of the account
	  //  plan:         'Enhanced' // Plan name for the account
	  //}
	}]);
	// Add default trigger to the bottom-right corner of the window:
	UserVoice.push(['addTrigger', { mode: 'contact', trigger_position: 'bottom-right' }]);
	// Or, use your own custom trigger:
	//UserVoice.push(['addTrigger', '#id', { mode: 'contact' }]);
	// Autoprompt for Satisfaction and SmartVote (only displayed under certain conditions)
	UserVoice.push(['autoprompt', {}]);
	</script>
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-53069025-1', 'auto');
	  ga('require', 'displayfeatures');
	  ga('send', 'pageview');

	
	</script>
	
	<!-- Facebook Conversion Code for User Sign-Up -->
	<script>
		(function() {
		var _fbq = window._fbq || (window._fbq = []);
		if (!_fbq.loaded) {
		var fbds = document.createElement('script');
		fbds.async = true;
		fbds.src = '//connect.facebook.net/en_US/fbds.js';
		var s = document.getElementsByTagName('script')[0];
		s.parentNode.insertBefore(fbds, s);
		_fbq.loaded = true;
		}
		})();
		window._fbq = window._fbq || [];
		window._fbq.push(['track', '6020466455516', {'value':'1','currency':'USD'}]);
	</script>
	<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?ev=6020466455516&amp;cd[value]=0.01&amp;cd[currency]=USD&amp;noscript=1" /></noscript>
	
    
  </head>
  <body>
      	<div style="position: fixed;left: 0px;top: 0px;z-index: 50;width: 100%;"><?php require("views/_topbanner.php"); ?></div>
        <div id="ViewFile" style="padding-top: 100px"><?php require($this->viewFile); ?></div>
    
 	

  
  
  <div id="ropaziModal" class="reveal-modal medium" data-reveal>
  <div id="ropaziModalContent"></div>
  <a class="close-reveal-modal"></a> 
  </div>
  
  <div id="ropaziModalAlert" class="reveal-modal tiny" data-reveal>
  <div id="ropaziModalContentAlert"></div>
  <a class="close-reveal-modal">X</a> 
  </div>


  <script type="text/javascript" src="//s.skimresources.com/js/72676X1521695.skimlinks.js"></script>  
  </body>
</html>