<?php

	include_once("classes/request/baserequesthelper.php");
	include_once("classes/domain/postheart.php");


	///*****************************************************************
	///<summary>
	///Class Name: PostHeartRequestHelper
	///Description: RequestHelper Class
	///</summary>
	///*****************************************************************

	class PostHeartRequestHelper extends BaseRequestHelper
	{


		///*****************************************************************
		///<summary>
		///Method Name: AssemblePostHeartEditControl
		///Description: Assembles Control Input
		///</summary>
		///*****************************************************************

		public function AssemblePostHeartEditControl()
		{
			$logger = Logger::getLogger(__CLASS__);
			$logger->debug("START");
			$_PostHeart = new PostHeart();
			if ($_SERVER["REQUEST_METHOD"] == "POST")
			{
				$_PostHeart->setAppUserID($this->CleanInput($_POST["AppUserID"]));
				$_PostHeart->setPostID($this->CleanInput($_POST["PostID"]));
			}
			$logger->debug("END");
			return $_PostHeart;
		}
		
	}
?>
