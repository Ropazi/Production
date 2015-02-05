<?php

	include_once("classes/validators/basevalidator.php");
	include_once("classes/domain/usercatalog.php");


	///*****************************************************************
	///<summary>
	///Class Name: UserCatalogValidator
	///Description: Validator Class
	///</summary>
	///*****************************************************************

	class UserCatalogValidator extends BaseValidator
	{


		///*****************************************************************
		///<summary>
		///Method Name: ValidateUserCatalogEditControl
		///Description: Validates Control Input
		///</summary>
		///*****************************************************************

		public function ValidateUserCatalogEditControl($_UserCatalog, $_UserInfo)
		{
			$logger = Logger::getLogger(__CLASS__);
			$logger->debug("START");
			$this->setValidationMessages($_UserCatalog->getValidationMessages());
			$this->ValidateString(0, 200, "CatalogName", "Name", $_UserCatalog->getCatalogName());
			$_UserCatalog->setValidationMessages($this->getValidationMessages());
			$_UserCatalog->setIsValid($this->getIsValid());
			$logger->debug("END");
		}
	}
?>
