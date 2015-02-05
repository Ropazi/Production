<?php

	include_once("classes/validators/basevalidator.php");
	include_once("classes/domain/appuser.php");


	///*****************************************************************
	///<summary>
	///Class Name: AppUserValidator
	///Description: Validator Class
	///</summary>
	///*****************************************************************

	class AppUserValidator extends BaseValidator
	{


		///*****************************************************************
		///<summary>
		///Method Name: ValidateAppUserSignUpControl
		///Description: Validates Control Input
		///</summary>
		///*****************************************************************

		public function ValidateAppUserSignUpControl($_AppUser, $_UserInfo)
		{
			$logger = Logger::getLogger(__CLASS__);
			$logger->debug("START");
			$this->setValidationMessages($_AppUser->getValidationMessages());
			$_AppUserBO = new AppUserBO($_UserInfo);
			if ($_AppUser->getAppUserID() > 0)
			{
				$_EAppUser = $_AppUserBO->SelectByAppUserID($_AppUser->getAppUserID());
				if ($_EAppUser->getEmail() != $_AppUser->getEmail())
				{
					$_EAppUser = $_AppUserBO->SelectByEmail($_AppUser->getEmail());
					if ($_EAppUser->getAppUserID() > 0)
					{
						$_password = CommonUtils::DecryptTripleDES($_EAppUser->getPassword());
						if ($_password != $_AppUser->getPassword())
							$this->AddError("Password", "Password is incorrect<br/>");
					}
				}
			}
			else
			{
				$_VAppUser = $_AppUserBO->SelectByEmail($_AppUser->getEmail());
				if ($_VAppUser->getAppUserID() > 0)
				{
					$_password = CommonUtils::DecryptTripleDES($_VAppUser->getPassword());
					if ($_password != $_AppUser->getPassword())
						$this->AddError("Password", "Password is incorrect<br/>");
				}
			}
			$this->ValidateString(5, 50, "Email", "Email", $_AppUser->getEmail());
			$this->ValidateEmail(5, 50, "Email", "Email", $_AppUser->getEmail());
			$this->ValidateString(6, 15, "Password", "Password", $_AppUser->getPassword());
			$_AppUser->setValidationMessages($this->getValidationMessages());
			$_AppUser->setIsValid($this->getIsValid());
			$logger->debug("END");
		}


		///*****************************************************************
		///<summary>
		///Method Name: ValidateAppUserLoginControl
		///Description: Validates Control Input
		///</summary>
		///*****************************************************************

		public function ValidateAppUserLoginControl($_AppUser, $_UserInfo)
		{
			$logger = Logger::getLogger(__CLASS__);
			$logger->debug("START");
			$this->setValidationMessages($_AppUser->getValidationMessages());
			$this->ValidateString(5, 50, "Email", "Email", $_AppUser->getEmail());
			$this->ValidateEmail(5, 50, "Email", "Email", $_AppUser->getEmail());
			$this->ValidateString(6, 15, "Password", "Password", $_AppUser->getPassword());
			$_AppUser->setValidationMessages($this->getValidationMessages());
			$_AppUser->setIsValid($this->getIsValid());
			$logger->debug("END");
		}


		///*****************************************************************
		///<summary>
		///Method Name: ValidateAppUserSignUpFBControl
		///Description: Validates Control Input
		///</summary>
		///*****************************************************************

		public function ValidateAppUserSignUpFBControl($_AppUser, $_UserInfo)
		{
			$logger = Logger::getLogger(__CLASS__);
			$logger->debug("START");
			$this->setValidationMessages($_AppUser->getValidationMessages());
			$_AppUserBO = new AppUserBO($_UserInfo);
			if ($_AppUser->getAppUserID() > 0)
			{
				$_EAppUser = $_AppUserBO->SelectByAppUserID($_AppUser->getAppUserID());
				if ($_EAppUser->getEmail() != $_AppUser->getEmail())
				{
					$_EAppUser = $_AppUserBO->SelectByEmail($_AppUser->getEmail());
					if ($_EAppUser->getAppUserID() > 0)
					{
						$this->AddError("Email", "Email already in use <br/>");
					}
				}
			}
			else
			{
				$_VAppUser = $_AppUserBO->SelectByEmail($_AppUser->getEmail());
				if ($_VAppUser->getAppUserID() > 0)
				{
					$this->AddError("Email", "Email already in use <br/>");
				}
			}
			$this->ValidateString(5, 50, "Email", "Email", $_AppUser->getEmail());
			$this->ValidateEmail(5, 50, "Email", "Email", $_AppUser->getEmail());
			$this->ValidateString(2, 100, "FirstName", "First Name", $_AppUser->getFirstName());
			$this->ValidateString(2, 100, "LastName", "Last Name", $_AppUser->getLastName());
			$_AppUser->setValidationMessages($this->getValidationMessages());
			$_AppUser->setIsValid($this->getIsValid());
			$logger->debug("END");
		}
		///*****************************************************************
		///<summary>
		///Method Name: ValidateAppUserEditControl
		///Description: Validates Control Input
		///</summary>
		///*****************************************************************
		public function ValidateAppUserEditControl($_AppUser, $_UserInfo)
		{
			$logger = Logger::getLogger(__CLASS__);
			$logger->debug("START");
			$this->setValidationMessages($_AppUser->getValidationMessages());
			$_AppUserBO = new AppUserBO($_UserInfo);
			if ($_AppUser->getAppUserID() > 0)
			{
				$_EAppUser = $_AppUserBO->SelectByAppUserID($_AppUser->getAppUserID());
				if ($_EAppUser->getEmail() != $_AppUser->getEmail())
				{
					$_EAppUser = $_AppUserBO->SelectByEmail($_AppUser->getEmail());
					if ($_EAppUser->getAppUserID() > 0)
					{
						$this->AddError("Email", "Email should be unique <br/>");
					}
				}
			}
			else
			{
				$_VAppUser = $_AppUserBO->SelectByEmail($_AppUser->getEmail());
				if ($_VAppUser->getAppUserID() > 0)
				{
					$this->AddError("Email", "Email should be unique <br/>");
				}
			}
			$this->ValidateString(5, 50, "Email", "Email", $_AppUser->getEmail());
			$this->ValidateEmail(5, 50, "Email", "Email", $_AppUser->getEmail());
			if ($_AppUser->getAppUserID() > 0)
			{
				$_EAppUser = $_AppUserBO->SelectByAppUserID($_AppUser->getAppUserID());
				if ($_EAppUser->getUsername() != $_AppUser->getUsername())
				{
					$_EAppUser = $_AppUserBO->SelectByUsername($_AppUser->getUsername());
					if ($_EAppUser->getAppUserID() > 0)
					{
						$this->AddError("Username", "Username should be unique <br/>");
					}
				}
			}
			else
			{
				$_VAppUser = $_AppUserBO->SelectByUsername($_AppUser->getUsername());
				if ($_VAppUser->getAppUserID() > 0)
				{
					$this->AddError("Username", "Username should be unique <br/>");
				}
			}
			$this->ValidateString(2, 100, "Username", "Username", $_AppUser->getUsername());
			$this->ValidateString(2, 100, "FirstName", "First Name", $_AppUser->getFirstName());
			$this->ValidateString(2, 100, "LastName", "Last Name", $_AppUser->getLastName());
			$this->ValidateString(0, 200, "AboutMe", "About Me", $_AppUser->getAboutMe());
			$this->ValidateString(0, 100, "City", "City", $_AppUser->getCity());
			$this->ValidateString(0, 10, "State", "State", $_AppUser->getState());
			$this->ValidateString(0, 200, "Website", "Website", $_AppUser->getWebsite());
			$this->ValidateString(0, 100, "Facebook", "Facebook", $_AppUser->getFacebook());
			$this->ValidateString(0, 100, "Twitter", "Twitter", $_AppUser->getTwitter());
			$_AppUser->setValidationMessages($this->getValidationMessages());
			$_AppUser->setIsValid($this->getIsValid());
			$logger->debug("END");
		}
	}
?>
