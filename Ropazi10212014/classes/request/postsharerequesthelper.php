<?php

	include_once("classes/request/baserequesthelper.php");
	include_once("classes/domain/postshare.php");


	///*****************************************************************
	///<summary>
	///Class Name: PostShareRequestHelper
	///Description: RequestHelper Class
	///</summary>
	///*****************************************************************

	class PostShareRequestHelper extends BaseRequestHelper
	{


		///*****************************************************************
		///<summary>
		///Method Name: AssemblePostShareEditControl
		///Description: Assembles Control Input
		///</summary>
		///*****************************************************************

		public function AssemblePostShareEditControl()
		{
			$logger = Logger::getLogger(__CLASS__);
			$logger->debug("START");
			$_PostShare = new PostShare();
			if ($_SERVER["REQUEST_METHOD"] == "POST")
			{
				$_PostShare->setTitle($this->CleanInput($_POST["Title"]));
				$_PostShare->setImage($this->CleanInput($_POST["Image"]));
				$_PostShare->setEmails($this->CleanInput($_POST["Emails"]));
				$_PostShare->setMessage($this->CleanInput($_POST["Message"]));
			}
			$logger->debug("END");
			return $_PostShare;
		}
	}
?>
