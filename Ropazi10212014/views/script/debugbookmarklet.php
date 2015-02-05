<?php include_once("classes/uihelpers/scraperulehelper.php"); ?>
<?php include_once("classes/utils/constants.php"); ?>
<?php if (sizeof($model) > 0) {?>
function ropazi(){
	
	var element = document.createElement('div');
    element.id = "ropaziDiv";
    document.body.appendChild(element);
    document.getElementById('ropaziDiv').style.position = 'fixed';
    document.getElementById('ropaziDiv').style.zIndex='99999';
    document.getElementById('ropaziDiv').style.color='red';
    document.getElementById('ropaziDiv').style.display='block';
    document.getElementById('ropaziDiv').style.background='#f7f7f7';
    document.getElementById('ropaziDiv').style.width='280px';
    document.getElementById('ropaziDiv').style.right='10px';
    document.getElementById('ropaziDiv').style.top='10px';
    var pbox = '';
    
    if (<?php echo ScrapeRuleHelper::getScrapeRule("ImageTest", $model) ?>.length > 0){
    	
    	pbox = getClipHtml();
    }
    else {
    	pbox = getNotSupportedHtml();
    } 
    jQuery('#ropaziDiv').html(pbox);
	

}
function getClipHtml(){
	var pbox = "<div style='position:relative;height:45px;'><img src='http://<?php echo Constants::$SERVERURL ?>/content/images/ropazi_white.jpg'/></div>";
    pbox += "<div style='height:600px;margin:0px;border:1px solid #d8d8d8;overflow-y:scroll';>";
    pbox += "<div style='margin:20px;'>";
    pbox += "<img src='" + (jQuery.trim(<?php echo ScrapeRuleHelper::getScrapeRule("Image", $model) ?>)).replace(/'/g,'&apos;')  + "' id='ropaziimage' height='100px' width='200px;'/>";
    pbox += "</div>";
    pbox += "<div style='margin:5px 5px;'> &nbsp;&nbsp;&nbsp;Price:";
    pbox += "<input type='text' id='ropaziprice' style='width:200px;border: 1px solid #adaeb0;-moz-border-radius: 2px;-webkit-border-radius: 2px;border-radius: 2px;height:30px;line-height:30px;font-size: 14px;padding: 4px 7px;outline: 0;-webkit-appearance: none;background: #f5f5f7;' name='price' alt='price' value='" + jQuery.trim(<?php echo ScrapeRuleHelper::getScrapeRule("Price", $model) ?>) + "' />";
    pbox += "</th></div>";
    pbox += "<div style='margin:5px 5px;'> R.Price:";
    pbox += "<input type='text' id='ropaziretailprice' style='width:200px;border: 1px solid #adaeb0;-moz-border-radius: 2px;-webkit-border-radius: 2px;border-radius: 2px;height:30px;line-height:30px;font-size: 14px;padding: 4px 7px;outline: 0;-webkit-appearance: none;background: #f5f5f7;' name='retailprice' alt='retailprice' value='" + jQuery.trim(<?php echo ScrapeRuleHelper::getScrapeRule("RetailPrice", $model) ?>) + "' />";
    pbox += "</div>";
    pbox += "<div style='margin:5px 5px;'> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Title:";
    pbox += "<input type='text' id='ropazititle'  style='width:200px;border: 1px solid #adaeb0;-moz-border-radius: 2px;-webkit-border-radius: 2px;border-radius: 2px;height:30px;line-height:30px;font-size: 14px;padding: 4px 7px;outline: 0;-webkit-appearance: none;background: #f5f5f7;' name='title' alt='title' value='" + (jQuery.trim(<?php echo ScrapeRuleHelper::getScrapeRule("Title", $model) ?>)).replace(/'/g,'&apos;') + "' />";
    pbox += "</div>";
    pbox += "<div style='margin:5px 5px;'> &nbsp;&nbsp;&nbsp;Desc:";
    pbox += "<input type='text' id='ropazidescription'  style='width:200px;border: 1px solid #adaeb0;-moz-border-radius: 2px;-webkit-border-radius: 2px;border-radius: 2px;height:30px;line-height:30px;font-size: 14px;padding: 4px 7px;outline: 0;-webkit-appearance: none;background: #f5f5f7;' name='description' alt='description' value='" +  (jQuery.trim(<?php echo ScrapeRuleHelper::getScrapeRule("Description", $model) ?>)).replace(/'/g,'&apos;') + "' />";
    pbox += "</div>";
    pbox += "<div style='margin:5px 5px;'> Gender: ";
    pbox += "<input type='text' id='ropazigender'  style='width:200px;border: 1px solid #adaeb0;-moz-border-radius: 2px;-webkit-border-radius: 2px;border-radius: 2px;height:30px;line-height:30px;font-size: 14px;padding: 4px 7px;outline: 0;-webkit-appearance: none;background: #f5f5f7;' name='gender' alt='gender' value='" +  (jQuery.trim(<?php echo ScrapeRuleHelper::getScrapeRule("Gender", $model) ?>)).replace(/'/g,'&apos;') + "' />";
    pbox += "</div>";
    pbox += "<div style='margin:5px 5px;'> &nbsp;Rating: ";
    pbox += "<input type='text' id='ropazirating'  style='width:200px;border: 1px solid #adaeb0;-moz-border-radius: 2px;-webkit-border-radius: 2px;border-radius: 2px;height:30px;line-height:30px;font-size: 14px;padding: 4px 7px;outline: 0;-webkit-appearance: none;background: #f5f5f7;' name='rating' alt='rating' value='" +  (jQuery.trim(<?php echo ScrapeRuleHelper::getScrapeRule("Rating", $model) ?>)) + "' />";
    pbox += "</div>";
    pbox += "<div style='margin:5px 5px;'>&nbsp;&nbsp;&nbsp;Catg:   ";
    pbox += "<input type='text' id='ropazicategory'  style='width:200px;border: 1px solid #adaeb0;-moz-border-radius: 2px;-webkit-border-radius: 2px;border-radius: 2px;height:30px;line-height:30px;font-size: 14px;padding: 4px 7px;outline: 0;-webkit-appearance: none;background: #f5f5f7;' name='category' alt='category' value='" +  (jQuery.trim(<?php echo ScrapeRuleHelper::getScrapeRule("Category", $model) ?>)).replace(/'/g,'&apos;') + "' />";
    pbox += "</div>";
    pbox += "<div style='margin:5px 5px;'> S.Catg: ";
    pbox += "<input type='text' id='ropazisubcategory'  style='width:200px;border: 1px solid #adaeb0;-moz-border-radius: 2px;-webkit-border-radius: 2px;border-radius: 2px;height:30px;line-height:30px;font-size: 14px;padding: 4px 7px;outline: 0;-webkit-appearance: none;background: #f5f5f7;' name='subcategory' alt='subcategory' value='" +  (jQuery.trim(<?php echo ScrapeRuleHelper::getScrapeRule("SubCategory", $model) ?>)).replace(/'/g,'&apos;') + "' />";
    pbox += "</div>";
    pbox += "<div style='margin:5px 5px;'> InStock:";
    pbox += "<input type='text' id='ropaziinstock'  style='width:200px;border: 1px solid #adaeb0;-moz-border-radius: 2px;-webkit-border-radius: 2px;border-radius: 2px;height:30px;line-height:30px;font-size: 14px;padding: 4px 7px;outline: 0;-webkit-appearance: none;background: #f5f5f7;' name='instock' alt='instock' value='" +  (jQuery.trim(<?php echo ScrapeRuleHelper::getScrapeRule("InStock", $model) ?>)).replace(/'/g,'&apos;') + "' />";
    pbox += "</div>";
    pbox += "<div style='margin:5px 5px;'> &nbsp;&nbsp;PrdId:  ";
    pbox += "<input type='text' id='ropaziproductid'  style='width:200px;border: 1px solid #adaeb0;-moz-border-radius: 2px;-webkit-border-radius: 2px;border-radius: 2px;height:30px;line-height:30px;font-size: 14px;padding: 4px 7px;outline: 0;-webkit-appearance: none;background: #f5f5f7;' name='productid' alt='productid' value='" +  (jQuery.trim(<?php echo ScrapeRuleHelper::getScrapeRule("ProductID", $model) ?>)).replace(/'/g,'&apos;') + "' />";
    
    
    pbox += "<p/><div style='margin:20px;line-height:30px;height:30px;text-align:left;'><img src='http://<?php echo Constants::$SERVERURL ?>/content/images/clipa.png' onmouseover='javascript:hover(this);' onmouseout='javascript:unhover(this);' style='cursor:pointer;vertical-align:middle;' onclick='javascript:PostIt();' />&nbsp;&nbsp;&nbsp;&nbsp;<a href='javascript:hideIt();' style='color:#7f7f7f;'>Cancel</a></div></div>";
    
	pbox += "<script> UserVoice=window.UserVoice||[];(function(){var uv=document.createElement('script');uv.type='text/javascript';";
	pbox += "uv.async=true;uv.src='//widget.uservoice.com/SkyxHdifYfWuI2Qd33ZQ.js';var s=document.getElementsByTagName('script')[0];s.parentNode.insertBefore(uv,s)})();";
	pbox += "UserVoice.push(['set', {accent_color: '#448dd6', trigger_color: 'white', trigger_background_color: 'rgba(46, 49, 51, 0.6)'}]);";
	pbox += "UserVoice.push(['identify', {}]);";
	pbox += "UserVoice.push(['addTrigger', { mode: 'contact', trigger_position: 'top-right' }]);";
	pbox += "UserVoice.push(['autoprompt', {}]); </script>"
	pbox += "<script type='text/javascript'> $(document).keyup(function(e){if (e.keyCode == 27) {javascript:hideIt();} if (e.keyCode == 13) {javascript:PostIt();}});</script>"
	
    return pbox;
}
function getULText(el) {
  var txt = '';
	jQuery(el).each(function(index, element) {
   		txt += jQuery(element).text() + '. ';
	});
  return txt;
}
function replaceBlankLines(el){
	return jQuery(el).text().replace(/\n/g,'').replace(/\t/g,'');
}
function scrapePrice(el){
	var p = jQuery(el).text().match(/\$([\d,]+(?:\.\d+)?)/g)[0];
	return p;
}
function extraxtGender(text){
	var upCaseText = text.toUpperCase();
	var isGirl = upCaseText.match(/GIRL/g);
	if (isGirl == null) isGirl=upCaseText.match(/FEMALE/g);
	var isBoy = upCaseText.match(/BOY/g);
	if (isBoy == null) isBoy=upCaseText.match(/^MALE/g);
	var isNeutral = ((isGirl != null && isBoy != null) || (isGirl == null && isBoy == null));
	return ((isNeutral) ? 'N' : ((isGirl != null) ? 'F' : 'M'));
}
function extractCategory(text, defaultCategory){
	if (defaultCategory == null) defaultCategory='Gear';
	var upCaseText = text.toUpperCase();
	var isClothes = upCaseText.match(/CLOTH/g);
	if (isClothes != null) return 'Clothes';
	var isFurniture = upCaseText.match(/FURNITURE/g);
	if (isFurniture != null) return 'Furniture';
	else {
		isFurniture = upCaseText.match(/DECOR/g);
		if (isFurniture != null) return 'Furniture';
	}
	var isToys = upCaseText.match(/TOY/g);
	if (isToys != null) return 'Toys';
	return defaultCategory;
}
function selectNonEmpty (text1, text2){
	return (text1 != '')? text1 : text2;
}
function PostIt(){
	jQuery.ajax({
        type: "GET",
        url: "<?php echo Constants::$SERVERURL ?>post/createpostextended",
        data: "Title=" + encodeURIComponent(jQuery.trim(jQuery('#ropazititle').val())) + 
        	"&Description=" + encodeURIComponent(jQuery.trim(jQuery('#ropazidescription').val())) +
        	"&Image=" + encodeURIComponent(jQuery.trim(<?php echo ScrapeRuleHelper::getScrapeRule("Image", $model) ?>)) + 
        	"&Price=" + encodeURIComponent(jQuery.trim(jQuery('#ropaziprice').val())) + 
        	"&RetailPrice=" + encodeURIComponent(jQuery.trim(jQuery('#ropaziretailprice').val())) +
        	"&ItemGender=" + encodeURIComponent(jQuery.trim(jQuery('#ropazigender').val())) +
        	"&ProductID=" + encodeURIComponent(jQuery.trim(jQuery('#ropaziproductid').val())) + 
        	"&InStock=" + encodeURIComponent(jQuery.trim(jQuery('#ropaziinstock').val())) +
        	"&Rating=" + encodeURIComponent(jQuery.trim(jQuery('#ropazirating').val())) + 
        	"&Category=" + encodeURIComponent(jQuery.trim(jQuery('#ropazicategory').val())) +
        	"&SubCategory=" + encodeURIComponent(jQuery.trim(jQuery('#ropazisubcategory').val())) + 
        	"&PageUrl=" + encodeURIComponent(jQuery(location).attr('href')) + 
        	"&ScrapeError=0",
        dataType: "jsonp",
        success: function(){jQuery('#ropaziDiv').html(getPostHtml());jQuery('#ropaziDiv').delay(3000).fadeOut(1000);}
    });
}
function hideIt(){
	jQuery('#ropaziDiv').hide();
}
function getPostHtml(){
	var s = "<div style='position:relative;height:45px;'><img src='http://<?php echo Constants::$SERVERURL ?>/content/images/ropazi_white.jpg'/></div>";
	s += "<div style='text-align:center;border:1px solid #d8d8d8;'>";
	s += "<img src='http://<?php echo Constants::$SERVERURL ?>/content/images/ropazi_favicon.png' style='margin:10px;' />";
	s += "<div style='text-align:center;font-size:12pt;color:#7f7f7f;margin:5px;'>Congrats! The item has been clipped to your catalog</div>";
	s += "<p/><div style='margin:20px;text-align:center;'><a href='javascript:hideIt();' style='color:#7f7f7f;'>Close</a></div>";
	s += "</div>";
	return s;
}
function getNotSupportedHtml(){
	var s = "<div style='position:relative;height:45px;'><img src='http://<?php echo Constants::$SERVERURL ?>/content/images/ropazi_white.jpg'/></div>";
	s += "<div style='text-align:center;border:1px solid #d8d8d8;'>";
	s += "<img src='http://<?php echo Constants::$SERVERURL ?>/content/images/ropazi_favicon.png'  style='margin:10px;'/>";
	s += "<div style='text-align:center;font-size:12pt;color:#7f7f7f;margin:5px;'>We are continuously trying to improve your clipping experience.  Please clip from the detailed product page for us to capture important features of the item.</div>";
	s += "<p/><div style='margin:20px;text-align:center;'><a href='javascript:hideIt();' style='color:#7f7f7f;'>Close</a></div></div>";
	
	s += "<script> UserVoice=window.UserVoice||[];(function(){var uv=document.createElement('script');uv.type='text/javascript';";
	s += "uv.async=true;uv.src='//widget.uservoice.com/SkyxHdifYfWuI2Qd33ZQ.js';var s=document.getElementsByTagName('script')[0];s.parentNode.insertBefore(uv,s)})();";
	s += "UserVoice.push(['set', {accent_color: '#448dd6', trigger_color: 'white', trigger_background_color: 'rgba(46, 49, 51, 0.6)'}]);";
	s += "UserVoice.push(['identify', {}]);";
	s += "UserVoice.push(['addTrigger', { mode: 'contact', trigger_position: 'top-right' }]);";
	s += "UserVoice.push(['autoprompt', {}]); </script>";
	return s;
}
function hover(element) {
    element.setAttribute('src', 'http://<?php echo Constants::$SERVERURL ?>/content/images/clipb.png');
}
function unhover(element) {
    element.setAttribute('src', 'http://<?php echo Constants::$SERVERURL ?>/content/images/clipa.png');
}

<?php } else {?>
function ropazi(){
	
	
	var element = document.createElement('div');
    element.id = "ropaziDiv";
    document.body.appendChild(element);


    document.getElementById('ropaziDiv').style.position = 'fixed';
    document.getElementById('ropaziDiv').style.zIndex='999';
    document.getElementById('ropaziDiv').style.color='red';
    document.getElementById('ropaziDiv').style.display='block';
    document.getElementById('ropaziDiv').style.background='#f7f7f7';
    document.getElementById('ropaziDiv').style.width='280px';
    document.getElementById('ropaziDiv').style.right='10px';
    document.getElementById('ropaziDiv').style.top='10px';
    var s = "<div style='position:relative;height:45px;'><img src='http://<?php echo Constants::$SERVERURL ?>/content/images/ropazi_white.jpg'/></div>";
	s += "<div style='text-align:center;border:1px solid #d8d8d8;'>";
	s += "<img src='http://<?php echo Constants::$SERVERURL ?>/content/images/ropazi_favicon.png'  style='margin:10px;'/>";
	s += "<div style='text-align:center;font-size:12pt;color:#7f7f7f;margin:5px;'>The site you are trying to use is currently not supported by Ropazi but we are working on it and will get back to you soon!!</div>";
	
    
    
    s += "<p/><div style='margin:20px;'><a href='javascript:hideIt();' style='color:#7f7f7f;'>Close</a></div></div>";
    jQuery('#ropaziDiv').html(s);

	
	

}
function hideIt(){
	jQuery('#ropaziDiv').hide();
}
<?php }?>
 