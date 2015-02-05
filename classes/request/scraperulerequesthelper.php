<?php

	include_once("classes/request/baserequesthelper.php");
	include_once("classes/domain/scraperule.php");


	///*****************************************************************
	///<summary>
	///Class Name: ScrapeRuleRequestHelper
	///Description: RequestHelper Class
	///</summary>
	///*****************************************************************

	class ScrapeRuleRequestHelper extends BaseRequestHelper
	{


		///*****************************************************************
		///<summary>
		///Method Name: AssembleScrapeRuleEditControl
		///Description: Assembles Control Input
		///</summary>
		///*****************************************************************

		public function AssembleScrapeRuleEditControl()
		{
			$logger = Logger::getLogger(__CLASS__);
			$logger->debug("START");
			$_ScrapeRule = new ScrapeRule();
			if ($_SERVER["REQUEST_METHOD"] == "POST")
			{
				$_ScrapeRule->setBrandID($this->CleanInput($_POST["BrandID"]));
				$_ScrapeRule->setRuleType($this->CleanInput($_POST["RuleType"]));
				$_ScrapeRule->setSelector($this->CleanInput($_POST["Selector"]));
				$_ScrapeRule->setElementType($this->CleanInput($_POST["ElementType"]));
				$_ScrapeRule->setNotes($this->CleanInput($_POST["Notes"]));
			}
			$logger->debug("END");
			return $_ScrapeRule;
		}
	}
?>
