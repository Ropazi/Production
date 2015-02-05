<?php

	include_once("classes/validators/basevalidator.php");
	include_once("classes/domain/brandcategory.php");


	///*****************************************************************
	///<summary>
	///Class Name: BrandCategoryValidator
	///Description: Validator Class
	///</summary>
	///*****************************************************************

	class BrandCategoryValidator extends BaseValidator
	{


		///*****************************************************************
		///<summary>
		///Method Name: ValidateBrandCategoryEditControl
		///Description: Validates Control Input
		///</summary>
		///*****************************************************************

		public function ValidateBrandCategoryEditControl($_BrandCategory, $_UserInfo)
		{
			$logger = Logger::getLogger(__CLASS__);
			$logger->debug("START");
			$this->setValidationMessages($_BrandCategory->getValidationMessages());
			$this->ValidateString(1, 100, "Name", "Category Name", $_BrandCategory->getName());
			$_BrandCategory->setValidationMessages($this->getValidationMessages());
			$_BrandCategory->setIsValid($this->getIsValid());
			$logger->debug("END");
		}
	}
?>
