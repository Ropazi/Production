<?php 
	include_once("classes/utils/commonutils.php");
	include_once("classes/domain/usercatalog.php");
	include_once("classes/utils/constants.php");
	///*****************************************************************
	///<summary>
	///Class Name: EmailTemplateHelper
	///Description: EmailTemplateHelper utils
	///</summary>
	///*****************************************************************

	class UserCatalogHelper
	{


		
        
        ///*****************************************************************
        ///<summary>
        ///Method Name: getScrapeRule
        ///Description: getScrapeRule
        ///</summary>
        ///*****************************************************************

        public static function getCatalogs($userCatalogs)
        {
        	$logger = Logger::getLogger(__CLASS__);
        	$logger->debug("Got cats::" . sizeof($userCatalogs));
        	$selectCss = "";
        	$textCss = "";
        	if ($userCatalogs == NULL || sizeof($userCatalogs) == 0){
        		$selectCss = "display:none;";
        	}
        	else {
        		$textCss = "display:none;";
        	}
        	$options = "<div id='ropazicategories' style='margin:10px 20px;" . $selectCss . "'>";
        	$options .= "<select id='ropazicategory'  style='width:190px;border: 1px solid #adaeb0;-moz-border-radius: 2px;-webkit-border-radius: 2px;border-radius: 2px;height:30px;line-height:30px;font-size: 14px;padding: 4px 7px;outline: 0;-webkit-appearance: none;background: #f5f5f7;' name='category'>";
            foreach($userCatalogs as $userCatalog){
            	$options .= '<option>' . $userCatalog->getCatalogName() . '</option>';
            }
            $options .= "</select>";
            $options .= "&nbsp;&nbsp;<img src='" . Constants::$SERVERURL . "/content/images/scissor-plus.png' onmouseover='javascript:hover(this, \\\"plus-btn.png\\\");' onmouseout='javascript:hover(this, \\\"scissor-plus.png\\\");' style='cursor:pointer;vertical-align:middle;' onclick='javascript:ShowNewCategory();' />";
            
            $options .= "</div>";
            $options .= "<div id='ropazicategorynew' style='margin:10px 20px;" . $textCss . "'>";
            $options .= "<input type='text' id='txtropazicategory'  style='width:240px;border: 1px solid #adaeb0;-moz-border-radius: 2px;-webkit-border-radius: 2px;border-radius: 2px;height:30px;line-height:30px;font-size: 14px;padding: 4px 7px;outline: 0;-webkit-appearance: none;background: #f5f5f7;' name='description' value='New Category' />";
            $options .= "</div>";
            $logger->debug("Options" . $options);
            return $options;
           
        }
		
	}
?>
