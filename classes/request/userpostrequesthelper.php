<?php

	include_once("classes/request/baserequesthelper.php");
	include_once("classes/domain/userpost.php");


	///*****************************************************************
	///<summary>
	///Class Name: UserPostRequestHelper
	///Description: RequestHelper Class
	///</summary>
	///*****************************************************************

	class UserPostRequestHelper extends BaseRequestHelper
	{


		///*****************************************************************
		///<summary>
		///Method Name: AssembleUserPostEditControl
		///Description: Assembles Control Input
		///</summary>
		///*****************************************************************

		public function AssembleUserPostEditControl()
		{
			$logger = Logger::getLogger(__CLASS__);
			$logger->debug("START");
			$_UserPost = new UserPost();
			if ($_SERVER["REQUEST_METHOD"] == "POST")
			{
				$_UserPost->setPostID($this->CleanInput($_POST["PostID"]));
				$_UserPost->setAppUserID($this->CleanInput($_POST["AppUserID"]));
			}
			$logger->debug("END");
			return $_UserPost;
		}
	}
?>
