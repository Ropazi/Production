<?php

	include_once("classes/request/baserequesthelper.php");
	include_once("classes/domain/brandcategory.php");


	///*****************************************************************
	///<summary>
	///Class Name: BrandCategoryRequestHelper
	///Description: RequestHelper Class
	///</summary>
	///*****************************************************************

	class BrandCategoryRequestHelper extends BaseRequestHelper
	{


		///*****************************************************************
		///<summary>
		///Method Name: AssembleBrandCategoryEditControl
		///Description: Assembles Control Input
		///</summary>
		///*****************************************************************

		public function AssembleBrandCategoryEditControl()
		{
			$logger = Logger::getLogger(__CLASS__);
			$logger->debug("START");
			$_BrandCategory = new BrandCategory();
			if ($_SERVER["REQUEST_METHOD"] == "POST")
			{
				$_BrandCategory->setName($this->CleanInput($_POST["Name"]));
			}
			$logger->debug("END");
			return $_BrandCategory;
		}
	}
?>
