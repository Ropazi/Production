<?php

	include_once("classes/request/baserequesthelper.php");
	include_once("classes/domain/brandheart.php");


	///*****************************************************************
	///<summary>
	///Class Name: BrandHeartRequestHelper
	///Description: RequestHelper Class
	///</summary>
	///*****************************************************************

	class BrandHeartRequestHelper extends BaseRequestHelper
	{


		///*****************************************************************
		///<summary>
		///Method Name: AssembleBrandHeartEditControl
		///Description: Assembles Control Input
		///</summary>
		///*****************************************************************

		public function AssembleBrandHeartEditControl()
		{
			$logger = Logger::getLogger(__CLASS__);
			$logger->debug("START");
			$_BrandHeart = new BrandHeart();
			if ($_SERVER["REQUEST_METHOD"] == "POST")
			{
				$_BrandHeart->setAppUserID($this->CleanInput($_POST["AppUserID"]));
				$_BrandHeart->setBrandID($this->CleanInput($_POST["BrandID"]));
			}
			$logger->debug("END");
			return $_BrandHeart;
		}
	}
?>
