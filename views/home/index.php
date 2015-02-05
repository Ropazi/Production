<?php  include_once("classes/helpers/webincludes.php");?>
<html>
<head>
<title>Ropazi</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta http-equiv="Imagetoolbar" content="no">
<style type="text/css">
/* pushes the page to the full capacity of the viewing area */
html {height:100%;}
body {height:100%; margin:0; padding:0;}
/* prepares the background image to full capacity of the viewing area */
#bg {position:fixed; top:0; left:0; width:100%; height:100%;}
/* places the content ontop of the background image */
#content {
	width:300px;
	height:450px;
    position: absolute;
    top:0;
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
    z-index:15;}
    #quotes p {
	margin-top: 1.25em;
	font-size: 160%;
	font-family: Georgia,serif;
	font-style: italic;
	}
</style>

</head>

<!--- PAGE STARTS HERE --->


<body>

					 <div id="bg"> <img src='content/images/bodyback.jpg' width="100%" height="100%" alt=""></div>
						<div id="content">
							<?php require("views/appuser/_signupedit.php") ?>
						</div>
						<!-- 
	<form id="signupForm" method="post" action="/signup" class=" " autocomplete="off" 
	data-reservation-mode="" data-auto-submit="" data-user="" data-signup-redirect="" 
	style="margin-top: -218px;"> 
	<h1>Start designing</h1> 
	<fieldset id="message" class="message">  </fieldset>  
	<fieldset id="intro">  
	<p> 
		<button type="button" class="button buttonBlock buttonFacebook">Connect with Facebook</button> 
	</p> 
	<p class="or">or</p>  </fieldset> <fieldset id="emailSignup"> 
	<input id="accessToken" name="accessToken" type="hidden" value="6Jyzxmu4IYWvCZ-lZ3ffaAAjYQDts7pt6I4jArjJ0Y-vHUzbMsY9zNbQyQ7MwEjCc4P5Ug"> 
	<input id="reservationToken" name="reservationToken" type="hidden" value="" disabled="disabled"> 
	<input id="authMode" name="authMode" type="hidden" value="email"> 
	<input id="facebookToken" name="facebookToken" type="hidden"> 
	<label for="email"> <span class="text">Email</span> 
	<input id="email" name="email" type="text" value="" autocomplete="off" placeholder="Your email address"> 
	</label> <label for="password"> 
	<span class="text">Password</span> 
	<input id="password" name="password" type="password" value="" autocomplete="off" placeholder="Choose a password"> 
	</label> <input id="analyticsId" name="analyticsId" type="hidden" value="UAA9qWFe5l0">    
	<input class="button buttonBlock" type="submit" value="Sign up">   </fieldset> 
	<fieldset id="quotes"> <p>“The easiest to use design program in the world” <cite>– The Webbys</cite></p> 
	<p>“Canva enables anyone to become a designer” <cite>– PSFK</cite></p> 
	</fieldset> <div class="formFootnote ready" id="loginLinkWrapper"> 
	<a href="/login">Have an account? Log in</a> </div></form>-->
</body>
</html>

				<!-- PAGE ENDS HERE -->

