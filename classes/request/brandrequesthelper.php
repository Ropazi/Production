<?php

	include_once("classes/request/baserequesthelper.php");
	include_once("classes/domain/brand.php");


	///*****************************************************************
	///<summary>
	///Class Name: BrandRequestHelper
	///Description: RequestHelper Class
	///</summary>
	///*****************************************************************

	class BrandRequestHelper extends BaseRequestHelper
	{


		///*****************************************************************
		///<summary>
		///Method Name: AssembleBrandEditControl
		///Description: Assembles Control Input
		///</summary>
		///*****************************************************************

		public function AssembleBrandEditControl()
		{
			$logger = Logger::getLogger(__CLASS__);
			$logger->debug("START");
			$_Brand = new Brand();
			if ($_SERVER["REQUEST_METHOD"] == "POST")
			{
				$_Brand->setBrandName($this->CleanInput($_POST["BrandName"]));
				$_Brand->setBrandCode($this->CleanInput($_POST["BrandCode"]));
				$_Brand->setWebsite($this->CleanInput($_POST["Website"]));
				$_Brand->setBrandLogo($this->CleanInput($_POST["BrandLogo"]));
				$_Brand->setIsApproved($this->CleanInput($_POST["IsApproved"]));
				$_Brand->setTier($this->CleanInput($_POST["Tier"]));
				$_Brand->setIsFeatured($this->CleanInput($_POST["IsFeatured"]));
			}
			$logger->debug("END");
			return $_Brand;
		}
	}
?>
