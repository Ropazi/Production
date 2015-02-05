<?php

	include_once("classes/validators/basevalidator.php");
	include_once("classes/domain/scraperule.php");


	///*****************************************************************
	///<summary>
	///Class Name: ScrapeRuleValidator
	///Description: Validator Class
	///</summary>
	///*****************************************************************

	class ScrapeRuleValidator extends BaseValidator
	{


		///*****************************************************************
		///<summary>
		///Method Name: ValidateScrapeRuleEditControl
		///Description: Validates Control Input
		///</summary>
		///*****************************************************************

		public function ValidateScrapeRuleEditControl($_ScrapeRule, $_UserInfo)
		{
			$logger = Logger::getLogger(__CLASS__);
			$logger->debug("START");
			$this->setValidationMessages($_ScrapeRule->getValidationMessages());
			$this->ValidateString(1, 100, "RuleType", "Rule Type", $_ScrapeRule->getRuleType());
			$this->ValidateString(1, 1000, "Selector", "Selector", $_ScrapeRule->getSelector());
			$this->ValidateString(1, 100, "ElementType", "Element Type", $_ScrapeRule->getElementType());
			$this->ValidateString(0, 500, "Notes", "Notes", $_ScrapeRule->getNotes());
			$_ScrapeRule->setValidationMessages($this->getValidationMessages());
			$_ScrapeRule->setIsValid($this->getIsValid());
			$logger->debug("END");
		}
	}
?>
