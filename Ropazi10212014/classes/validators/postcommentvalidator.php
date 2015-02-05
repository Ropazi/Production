<?php

	include_once("classes/validators/basevalidator.php");
	include_once("classes/domain/postcomment.php");


	///*****************************************************************
	///<summary>
	///Class Name: PostCommentValidator
	///Description: Validator Class
	///</summary>
	///*****************************************************************

	class PostCommentValidator extends BaseValidator
	{


		///*****************************************************************
		///<summary>
		///Method Name: ValidateProductCommentThreadControl
		///Description: Validates Control Input
		///</summary>
		///*****************************************************************

		public function ValidateProductCommentThreadControl($_PostComment, $_UserInfo)
		{
			$logger = Logger::getLogger(__CLASS__);
			$logger->debug("START");
			$this->setValidationMessages($_PostComment->getValidationMessages());
			$this->ValidateString(1, 5000, "Comments", "Comments", $_PostComment->getComments());
			$_PostComment->setValidationMessages($this->getValidationMessages());
			$_PostComment->setIsValid($this->getIsValid());
			$logger->debug("END");
		}


		///*****************************************************************
		///<summary>
		///Method Name: ValidatePostCommentEditControl
		///Description: Validates Control Input
		///</summary>
		///*****************************************************************

		public function ValidatePostCommentEditControl($_PostComment, $_UserInfo)
		{
			$logger = Logger::getLogger(__CLASS__);
			$logger->debug("START");
			$this->setValidationMessages($_PostComment->getValidationMessages());
			$this->ValidateString(1, 5000, "Comments", "Comments", $_PostComment->getComments());
			$_PostComment->setValidationMessages($this->getValidationMessages());
			$_PostComment->setIsValid($this->getIsValid());
			$logger->debug("END");
		}
	}
?>
