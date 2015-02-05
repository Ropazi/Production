<?php

	include_once("classes/request/baserequesthelper.php");
	include_once("classes/domain/usercatalog.php");


	///*****************************************************************
	///<summary>
	///Class Name: UserCatalogRequestHelper
	///Description: RequestHelper Class
	///</summary>
	///*****************************************************************

	class UserCatalogRequestHelper extends BaseRequestHelper
	{


		///*****************************************************************
		///<summary>
		///Method Name: AssembleUserCatalogEditControl
		///Description: Assembles Control Input
		///</summary>
		///*****************************************************************

		public function AssembleUserCatalogEditControl()
		{
			$logger = Logger::getLogger(__CLASS__);
			$logger->debug("START");
			$_UserCatalog = new UserCatalog();
			if ($_SERVER["REQUEST_METHOD"] == "POST")
			{
				$_UserCatalog->setCatalogName($this->CleanInput($_POST["CatalogName"]));
			}
			$logger->debug("END");
			return $_UserCatalog;
		}
	}
?>
