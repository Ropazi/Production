<?php

	include_once("classes/validators/basevalidator.php");
	include_once("classes/domain/userpost.php");


	///*****************************************************************
	///<summary>
	///Class Name: UserPostValidator
	///Description: Validator Class
	///</summary>
	///*****************************************************************

	class UserPostValidator extends BaseValidator
	{


		///*****************************************************************
		///<summary>
		///Method Name: ValidateUserPostEditControl
		///Description: Validates Control Input
		///</summary>
		///*****************************************************************

		public function ValidateUserPostEditControl($_UserPost, $_UserInfo)
		{
			$logger = Logger::getLogger(__CLASS__);
			$logger->debug("START");
			$this->setValidationMessages($_UserPost->getValidationMessages());
			$_UserPost->setValidationMessages($this->getValidationMessages());
			$_UserPost->setIsValid($this->getIsValid());
			$logger->debug("END");
		}
	}
?>
