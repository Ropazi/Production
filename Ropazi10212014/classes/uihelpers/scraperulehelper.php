<?php 
	include_once("classes/utils/commonutils.php");
	include_once("classes/domain/scraperule.php");
	///*****************************************************************
	///<summary>
	///Class Name: EmailTemplateHelper
	///Description: EmailTemplateHelper utils
	///</summary>
	///*****************************************************************

	class ScrapeRuleHelper
	{


		
        
        ///*****************************************************************
        ///<summary>
        ///Method Name: getScrapeRule
        ///Description: getScrapeRule
        ///</summary>
        ///*****************************************************************

        public static function getScrapeRule($ruleType, $scrapeRules)
        {
            foreach($scrapeRules as $scrapeRule){
            	if ($scrapeRule->getRuleType() == $ruleType){
            		return $scrapeRule->getSelector();
            	}
            }
            return "";
           
        }
		
	}
?>
