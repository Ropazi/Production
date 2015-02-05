<?php



	///*****************************************************************
	///<summary>
	///Class Name: ButtonHelper
	///Description: ButtonHelper Class
	///</summary>
	///*****************************************************************

	class ButtonHelper
	{


		/////////////////////////
        ///*****************************************************************
        ///<summary>
        ///Method Name: StandardButton
        ///Description: Generic Button
        ///</summary>
        ///*****************************************************************

        public static function Button($BasePath, $Target, $ClickScript, $Text, $Icon)
        {
            $bHtml = "<a href=\"" . $BasePath . $Target . "\" class=\"BLink uibutton\" onmouseover=\"javascript:this.className='BLinkOn uibuttonon';\" onmouseout=\"javascript:this.className='BLink uibutton';\" onclick=\"javascript:" . $ClickScript . "\" style=\"background-image:url('" . $BasePath . "content/images/" . $Icon . "');\">" . $Text . "</a>&nbsp;&nbsp;";
            return $bHtml;
        }
        public static function RopaziButton($BasePath, $Target, $ClickScript, $Text, $Icon)
        {
        	$bHtml = "<a href=\"" . $BasePath . $Target . "\" style=\"margin-left:18px;-webkit-border-radius: 3; -moz-border-radius: 3;  border-radius: 3px;  font-family: Arial;  color: #ffffff;  font-size: 18px;  background: #37d39e;  padding: 10px 88px 10px 88px;  text-decoration: none;\" onclick=\"javascript:" . $ClickScript . "\" style=\"background-image:url('" . $BasePath . "content/images/" . $Icon . "');\">" . $Text . "</a>&nbsp;&nbsp;";
        	return $bHtml;
        }
        ///*****************************************************************
        ///<summary>
        ///Method Name: StandardButton
        ///Description: Generic Button
        ///</summary>
        ///*****************************************************************
        
        public static function Bookmarklet()
        {
        	$serverUrl = Constants::$SERVERURL;
        	$clickScript = '';
        	$clickScript .= 'javascript: void((function(url) {';
        	$clickScript .= '	if (!window.jQuery) {';
        	$clickScript .= '		var script = document.createElement(\'script\');';
        	$clickScript .= '		script.type = \'text/javascript\';';
        	$clickScript .= '		script.src = \'//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js\';';
        	$clickScript .= '		document.getElementsByTagName(\'head\')[0].appendChild(script);';
        	$clickScript .= '	}';
        	$clickScript .= '	var productURL = encodeURIComponent(url),';
        	$clickScript .= '	cacheBuster = Math.floor(Math.random() * 1e3),';
        	$clickScript .= '	element = document.createElement(\'script\');';
        	$clickScript .= '	element.setAttribute(\'src\', \'' . $serverUrl . 'script/bookmarklet?p=\' + cacheBuster + \'&url=\' + productURL);';
        	$clickScript .= '	element.onload = init;';
        	$clickScript .= '	element.setAttribute(\'type\', \'text/javascript\');';
        	$clickScript .= '	document.getElementsByTagName(\'head\')[0].appendChild(element);';
        	
        	$clickScript .= '	function init() {';
        	$clickScript .= '		ropazi();';
        	$clickScript .= '	}';
        	$clickScript .= '})(window.location.href))';
        	//<a class="btn" href="#" onclick="javascript:showmodal('/appuser/signupget', '2');return false;">Click me</a>
        	$bHtml = "<a style=\"-webkit-border-radius: 10; -moz-border-radius: 10;  border-radius: 10px;  font-family: Arial;  color: #ffffff;  font-size: 20px;  background: #4bca7d;  padding: 10px 20px 10px 20px;  text-decoration: none;cursor:crosshair;\" href=\"javascript:" . $clickScript . "\">" . "Clip To Ropazi" . "</a>";
        	return $bHtml;
        }
        
	}
?>
