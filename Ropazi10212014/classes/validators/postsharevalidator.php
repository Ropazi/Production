<?php

	include_once("classes/validators/basevalidator.php");
	include_once("classes/domain/postshare.php");


	///*****************************************************************
	///<summary>
	///Class Name: PostShareValidator
	///Description: Validator Class
	///</summary>
	///*****************************************************************

	class PostShareValidator extends BaseValidator
	{


		///*****************************************************************
		///<summary>
		///Method Name: ValidatePostShareEditControl
		///Description: Validates Control Input
		///</summary>
		///*****************************************************************

		public function ValidatePostShareEditControl($_PostShare, $_UserInfo)
		{
			$logger = Logger::getLogger(__CLASS__);
			$logger->debug("START");
			$this->setValidationMessages($_PostShare->getValidationMessages());
			$this->ValidateString(0, 100, "Title", "Title", $_PostShare->getTitle());
			$this->ValidateString(0, 100, "Image", "Image", $_PostShare->getImage());
			$this->ValidateString(1, 9999, "Emails", "Email(s)", $_PostShare->getEmails());
			$this->ValidateEmail(1, 9999, "Emails", "Email(s)", $_PostShare->getEmails());
			$this->ValidateString(0, 200, "Message", "Message (optional)", $_PostShare->getMessage());
			$_PostShare->setValidationMessages($this->getValidationMessages());
			$_PostShare->setIsValid($this->getIsValid());
			$logger->debug("END");
		}
	}
?>
