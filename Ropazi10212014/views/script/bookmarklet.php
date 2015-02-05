<?php include_once("classes/uihelpers/scraperulehelper.php"); ?>
<?php include_once("classes/uihelpers/usercataloghelper.php"); ?>
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
    pbox += "<div style='min-height:280px;margin:0px;border:1px solid #d8d8d8;'>";
    pbox += "<div style='margin:20px;'>";
    pbox += "<img src='" + (jQuery.trim(<?php echo ScrapeRuleHelper::getScrapeRule("Image", $model) ?>)).replace(/'/g,'&apos;')  + "' id='ropaziimage' height='150px' width='150px;'/>";
    pbox += "</div>";
    pbox += "<div style='margin:10px 20px;'>";
    pbox += "<input type='text' id='ropaziprice' style='width:240px;border: 1px solid #adaeb0;-moz-border-radius: 2px;-webkit-border-radius: 2px;border-radius: 2px;height:30px;line-height:30px;font-size: 14px;padding: 4px 7px;outline: 0;-webkit-appearance: none;background: #f5f5f7;' name='price' value='" + jQuery.trim(<?php echo ScrapeRuleHelper::getScrapeRule("Price", $model) ?>) + "' />";
    pbox += "</div>";
    pbox += "<div style='margin:10px 20px;'>";
    pbox += "<input type='text' id='ropazititle'  style='width:240px;border: 1px solid #adaeb0;-moz-border-radius: 2px;-webkit-border-radius: 2px;border-radius: 2px;height:30px;line-height:30px;font-size: 14px;padding: 4px 7px;outline: 0;-webkit-appearance: none;background: #f5f5f7;' name='title' value='" + (jQuery.trim(<?php echo ScrapeRuleHelper::getScrapeRule("Title", $model) ?>)).replace(/'/g,'&apos;') + "' />";
    pbox += "</div>";
    pbox += "<div style='margin:10px 20px;'>";
    pbox += "<input type='text' id='ropazidescription'  style='width:240px;border: 1px solid #adaeb0;-moz-border-radius: 2px;-webkit-border-radius: 2px;border-radius: 2px;height:30px;line-height:30px;font-size: 14px;padding: 4px 7px;outline: 0;-webkit-appearance: none;background: #f5f5f7;' name='description' value='" +  (jQuery.trim(<?php echo ScrapeRuleHelper::getScrapeRule("Description", $model) ?>)).replace(/'/g,'&apos;') + "' />";
    pbox += "</div>";
    pbox += "<?php echo UserCatalogHelper::getCatalogs($this->submodels[0]); ?>";
    
    
    pbox += "<p/><div style='margin:20px;line-height:30px;height:30px;text-align:left;'><img src='http://<?php echo Constants::$SERVERURL ?>/content/images/clipa.png' onmouseover='javascript:hover(this, \"clipb.png\");' onmouseout='javascript:hover(this, \"clipa.png\");' style='cursor:pointer;vertical-align:middle;' onclick='javascript:PostIt();' />&nbsp;&nbsp;&nbsp;&nbsp;<a href='javascript:hideIt();' style='color:#7f7f7f;'>Cancel</a></div></div>";
    return pbox;
}
function ShowNewCategory(){
	jQuery('#ropazicategories').hide();
	jQuery('#ropazicategorynew').show();
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
function PostIt(){
	jQuery.ajax({
        type: "GET",
        url: "<?php echo Constants::$SERVERURL ?>post/createpost",
        data: "Title=" + encodeURIComponent(jQuery.trim(jQuery('#ropazititle').val())) + "&Description=" + encodeURIComponent(jQuery.trim(jQuery('#ropazidescription').val())) +"&Image=" + encodeURIComponent(jQuery.trim(<?php echo ScrapeRuleHelper::getScrapeRule("Image", $model) ?>)) + "&Price=" + encodeURIComponent(jQuery.trim(jQuery('#ropaziprice').val())) + "&PageUrl=" + encodeURIComponent(jQuery(location).attr('href')) + "&ScrapeError=0&CatalogName=" + encodeURIComponent(getCatalogName()),
        dataType: "jsonp",
        success: function(){jQuery('#ropaziDiv').html(getPostHtml());jQuery('#ropaziDiv').delay(3000).fadeOut(1000);}
    });
}
function getCatalogName(){
	if ($('#ropazicategorynew').is(':visible')){
		return $('#txtropazicategory').val();
	} 
	else {
		return $('#ropazicategory option:selected').text();
	}
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
	return s;
}
function hover(element, imgsrc) {
    element.setAttribute('src', 'http://<?php echo Constants::$SERVERURL ?>/content/images/' + imgsrc);
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
 