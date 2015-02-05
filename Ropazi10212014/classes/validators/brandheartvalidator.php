<?php

	include_once("classes/validators/basevalidator.php");
	include_once("classes/domain/brandheart.php");


	///*****************************************************************
	///<summary>
	///Class Name: BrandHeartValidator
	///Description: Validator Class
	///</summary>
	///*****************************************************************

	class BrandHeartValidator extends BaseValidator
	{


		///*****************************************************************
		///<summary>
		///Method Name: ValidateBrandHeartEditControl
		///Description: Validates Control Input
		///</summary>
		///*****************************************************************

		public function ValidateBrandHeartEditControl($_BrandHeart, $_UserInfo)
		{
			$logger = Logger::getLogger(__CLASS__);
			$logger->debug("START");
			$this->setValidationMessages($_BrandHeart->getValidationMessages());
			$_BrandHeart->setValidationMessages($this->getValidationMessages());
			$_BrandHeart->setIsValid($this->getIsValid());
			$logger->debug("END");
		}
	}
?>
