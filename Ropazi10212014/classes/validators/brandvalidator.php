<?php

	include_once("classes/validators/basevalidator.php");
	include_once("classes/domain/brand.php");


	///*****************************************************************
	///<summary>
	///Class Name: BrandValidator
	///Description: Validator Class
	///</summary>
	///*****************************************************************

	class BrandValidator extends BaseValidator
	{


		///*****************************************************************
		///<summary>
		///Method Name: ValidateBrandEditControl
		///Description: Validates Control Input
		///</summary>
		///*****************************************************************

		public function ValidateBrandEditControl($_Brand, $_UserInfo)
		{
			$logger = Logger::getLogger(__CLASS__);
			$logger->debug("START");
			$this->setValidationMessages($_Brand->getValidationMessages());
			$this->ValidateString(1, 100, "BrandName", "Brand Name", $_Brand->getBrandName());
			$this->ValidateString(1, 25, "BrandCode", "Code", $_Brand->getBrandCode());
			$this->ValidateString(1, 100, "Website", "Website", $_Brand->getWebsite());
			$this->ValidateString(0, 300, "BrandLogo", "Logo", $_Brand->getBrandLogo());
			$_Brand->setValidationMessages($this->getValidationMessages());
			$_Brand->setIsValid($this->getIsValid());
			$logger->debug("END");
		}
	}
?>
