<?php

	include_once("classes/request/baserequesthelper.php");
	include_once("classes/domain/appuser.php");


	///*****************************************************************
	///<summary>
	///Class Name: AppUserRequestHelper
	///Description: RequestHelper Class
	///</summary>
	///*****************************************************************

	class AppUserRequestHelper extends BaseRequestHelper
	{


		///*****************************************************************
		///<summary>
		///Method Name: AssembleAppUserSignUpControl
		///Description: Assembles Control Input
		///</summary>
		///*****************************************************************

		public function AssembleAppUserSignUpControl()
		{
			$logger = Logger::getLogger(__CLASS__);
			$logger->debug("START");
			$_AppUser = new AppUser();
			if ($_SERVER["REQUEST_METHOD"] == "POST")
			{
				$_AppUser->setEmail($this->CleanInput($_POST["Email"]));
				$_AppUser->setPassword($this->CleanInput($_POST["Password"]));
			}
			$logger->debug("END");
			return $_AppUser;
		}


		///*****************************************************************
		///<summary>
		///Method Name: AssembleAppUserLoginControl
		///Description: Assembles Control Input
		///</summary>
		///*****************************************************************

		public function AssembleAppUserLoginControl()
		{
			$logger = Logger::getLogger(__CLASS__);
			$logger->debug("START");
			$_AppUser = new AppUser();
			if ($_SERVER["REQUEST_METHOD"] == "POST")
			{
				$_AppUser->setEmail($this->CleanInput($_POST["Email"]));
				$_AppUser->setPassword($this->CleanInput($_POST["Password"]));
			}
			$logger->debug("END");
			return $_AppUser;
		}


		///*****************************************************************
		///<summary>
		///Method Name: AssembleAppUserSignUpFBControl
		///Description: Assembles Control Input
		///</summary>
		///*****************************************************************

		public function AssembleAppUserSignUpFBControl()
		{
			$logger = Logger::getLogger(__CLASS__);
			$logger->debug("START");
			$_AppUser = new AppUser();
			if ($_SERVER["REQUEST_METHOD"] == "POST")
			{
				$_AppUser->setEmail($this->CleanInput($_POST["Email"]));
				$_AppUser->setFirstName($this->CleanInput($_POST["FirstName"]));
				$_AppUser->setLastName($this->CleanInput($_POST["LastName"]));
				$_AppUser->setFacebookId($this->CleanInput($_POST["Id"]));
				$_AppUser->setProfileImage(str_replace(' ','-',strtolower($this->CleanInput($_POST["FirstName"]) . "-". $this->CleanInput($_POST["Id"]))));
			}
			$logger->debug("END");
			return $_AppUser;
		}


		///*****************************************************************
		///<summary>
		///Method Name: AssembleAppUserEditControl
		///Description: Assembles Control Input
		///</summary>
		///*****************************************************************

		public function AssembleAppUserEditControl()
		{
			$logger = Logger::getLogger(__CLASS__);
			$logger->debug("START");
			$_AppUser = new AppUser();
			if ($_SERVER["REQUEST_METHOD"] == "POST")
			{
				$_AppUser->setEmail($this->CleanInput($_POST["Email"]));
				$_AppUser->setUsername($this->CleanInput($_POST["Username"]));
				$_AppUser->setFirstName($this->CleanInput($_POST["FirstName"]));
				$_AppUser->setLastName($this->CleanInput($_POST["LastName"]));
				$_AppUser->setAboutMe($this->CleanInput($_POST["AboutMe"]));
				$_AppUser->setCity($this->CleanInput($_POST["City"]));
				$_AppUser->setState($this->CleanInput($_POST["State"]));
				$_AppUser->setWebsite($this->CleanInput($_POST["Website"]));
				$_AppUser->setFacebook($this->CleanInput($_POST["Facebook"]));
				$_AppUser->setTwitter($this->CleanInput($_POST["Twitter"]));
			}
			$logger->debug("END");
			return $_AppUser;
		}
	}
?>
