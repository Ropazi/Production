<?php

	include_once("classes/validators/basevalidator.php");
	include_once("classes/domain/post.php");


	///*****************************************************************
	///<summary>
	///Class Name: PostValidator
	///Description: Validator Class
	///</summary>
	///*****************************************************************

	class PostValidator extends BaseValidator
	{


		///*****************************************************************
		///<summary>
		///Method Name: ValidatePostEditControl
		///Description: Validates Control Input
		///</summary>
		///*****************************************************************

		public function ValidatePostEditControl($_Post, $_UserInfo)
		{
			$logger = Logger::getLogger(__CLASS__);
			$logger->debug("START");
			$this->setValidationMessages($_Post->getValidationMessages());
			$this->ValidateString(1, 500, "Title", "Title", $_Post->getTitle());
			$this->ValidateString(0, 50, "Price", "Price ($)", $_Post->getPrice());
			$this->ValidateString(0, 2000, "DetailText", "Detail Description", $_Post->getDetailText());
			$_Post->setValidationMessages($this->getValidationMessages());
			$_Post->setIsValid($this->getIsValid());
			$logger->debug("END");
		}
	}
?>
