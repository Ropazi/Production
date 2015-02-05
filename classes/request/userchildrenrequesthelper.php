<?php

	include_once("classes/request/baserequesthelper.php");
	include_once("classes/domain/userchildren.php");


	///*****************************************************************
	///<summary>
	///Class Name: UserChildrenRequestHelper
	///Description: RequestHelper Class
	///</summary>
	///*****************************************************************

	class UserChildrenRequestHelper extends BaseRequestHelper
	{


		///*****************************************************************
		///<summary>
		///Method Name: AssembleUserChildrenEditControl
		///Description: Assembles Control Input
		///</summary>
		///*****************************************************************

		public function AssembleUserChildrenEditControl()
		{
			$logger = Logger::getLogger(__CLASS__);
			$logger->debug("START");
			$userChildren = array();
			if ($_SERVER["REQUEST_METHOD"] == "POST")
			{
				
				$childrenCount = $_POST["childrenCount"];
				$logger->debug("Children count received::" . $childrenCount);
				for ($i = 1; $i <= $childrenCount; $i++){
					$userChild = new UserChildren();
					$userChild->setUserChildrenID($this->CleanInput($_POST["UserChildrenID" . $i]));
					$userChild->setGender($this->CleanInput($_POST["gender" . $i]));
					if ($userChild->getGender() == "Gender"){
						continue;
					}
					$userChild->setDateOfBirth($this->CleanInput($_POST["dateOfBirth". $i]));
					$userChild->setDisplayAge($this->CleanInput($_POST["displayAge" . $i]));
					$userChildren[] = $userChild;
				}
			}
			$logger->debug("END");
			return $userChildren;
		}
	}
?>
