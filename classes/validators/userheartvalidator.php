<?php

	include_once("classes/validators/basevalidator.php");
	include_once("classes/domain/userheart.php");


	///*****************************************************************
	///<summary>
	///Class Name: UserHeartValidator
	///Description: Validator Class
	///</summary>
	///*****************************************************************

	class UserHeartValidator extends BaseValidator
	{


		///*****************************************************************
		///<summary>
		///Method Name: ValidateUserHeartEditControl
		///Description: Validates Control Input
		///</summary>
		///*****************************************************************

		public function ValidateUserHeartEditControl($_UserHeart, $_UserInfo)
		{
			$logger = Logger::getLogger(__CLASS__);
			$logger->debug("START");
			$this->setValidationMessages($_UserHeart->getValidationMessages());
			$_UserHeart->setValidationMessages($this->getValidationMessages());
			$_UserHeart->setIsValid($this->getIsValid());
			$logger->debug("END");
		}
	}
?>
