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
</style>
</head>

<!--- PAGE STARTS HERE --->


<body>

					<div id="bg"> <img src='content/images/bodyback.jpg' width="100%" height="100%" alt=""></div>

						<div id="content">
							<?php require("views/appuser/_signupedit.php") ?>
						</div>

</body>
</html>

				<!-- PAGE ENDS HERE -->

