<?php

	include_once("classes/request/baserequesthelper.php");
	include_once("classes/domain/postcomment.php");


	///*****************************************************************
	///<summary>
	///Class Name: PostCommentRequestHelper
	///Description: RequestHelper Class
	///</summary>
	///*****************************************************************

	class PostCommentRequestHelper extends BaseRequestHelper
	{


		///*****************************************************************
		///<summary>
		///Method Name: AssemblePostCommentEditControl
		///Description: Assembles Control Input
		///</summary>
		///*****************************************************************

		public function AssemblePostCommentEditControl()
		{
			$logger = Logger::getLogger(__CLASS__);
			$logger->debug("START");
			$_PostComment = new PostComment();
			if ($_SERVER["REQUEST_METHOD"] == "POST")
			{
				$_PostComment->setPostID($this->CleanInput($_POST["PostID"]));
				$_PostComment->setAppUserID($this->CleanInput($_POST["AppUserID"]));
				$_PostComment->setComments($this->CleanInput($_POST["Comments"]));
			}
			$logger->debug("END");
			return $_PostComment;
		}
	}
?>
