<?php

	include_once("classes/validators/basevalidator.php");
	include_once("classes/domain/postheart.php");


	///*****************************************************************
	///<summary>
	///Class Name: PostHeartValidator
	///Description: Validator Class
	///</summary>
	///*****************************************************************

	class PostHeartValidator extends BaseValidator
	{


		///*****************************************************************
		///<summary>
		///Method Name: ValidatePostHeartEditControl
		///Description: Validates Control Input
		///</summary>
		///*****************************************************************

		public function ValidatePostHeartEditControl($_PostHeart, $_UserInfo)
		{
			$logger = Logger::getLogger(__CLASS__);
			$logger->debug("START");
			$this->setValidationMessages($_PostHeart->getValidationMessages());
			$_PostHeart->setValidationMessages($this->getValidationMessages());
			$_PostHeart->setIsValid($this->getIsValid());
			$logger->debug("END");
		}
	}
?>
