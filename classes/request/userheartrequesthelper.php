<?php

	include_once("classes/request/baserequesthelper.php");
	include_once("classes/domain/userheart.php");


	///*****************************************************************
	///<summary>
	///Class Name: UserHeartRequestHelper
	///Description: RequestHelper Class
	///</summary>
	///*****************************************************************

	class UserHeartRequestHelper extends BaseRequestHelper
	{


		///*****************************************************************
		///<summary>
		///Method Name: AssembleUserHeartEditControl
		///Description: Assembles Control Input
		///</summary>
		///*****************************************************************

		public function AssembleUserHeartEditControl()
		{
			$logger = Logger::getLogger(__CLASS__);
			$logger->debug("START");
			$_UserHeart = new UserHeart();
			if ($_SERVER["REQUEST_METHOD"] == "POST")
			{
				$_UserHeart->setAppUserID($this->CleanInput($_POST["AppUserID"]));
				$_UserHeart->setHeartedByAppUserID($this->CleanInput($_POST["HeartedByAppUserID"]));
			}
			$logger->debug("END");
			return $_UserHeart;
		}
	}
?>
