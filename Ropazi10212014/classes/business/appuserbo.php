<?php
	include_once("classes/data/appuserdal.php");
	include_once("classes/data/apptransaction.php");
	include_once("classes/data/usernotificationdal.php");
	include_once("classes/domain/usernotification.php");
	include_once("classes/domain/userchildren.php");
	include_once("classes/data/userchildrendal.php");

	///*****************************************************************
	///<summary>
	///Class Name: AppUser
	///Description: Entity Business Object
	///</summary>
	///*****************************************************************

	class AppUserBO
	{
		private $_userinfo;


		///*****************************************************************
		///<summary>
		///Constructor for AppUserBO
		///</summary>
		///*****************************************************************

		public function __construct($userinfo)
		{
			$this->_userinfo = $userinfo;
		}




		///*****************************************************************
		///<summary>
		///Method Name: Insert
		///Description: Adds new Record to the Database
		///</summary>
		///*****************************************************************

		public function InsertAppUser($appuser)
		{
			$tContext = new AppTransaction();
			$appuserDAL = new AppUserDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$appuserDAL->InsertAppUser($appuser, $tContext);
				$tContext->CommitTransaction();
			}
			catch (Exception $ex)
			{
				$tContext->RollbackTransaction();
				throw $ex;
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: Update
		///Description: Updates Records in the Database
		///</summary>
		///*****************************************************************

		public function UpdateAppUser($appuser)
		{
			$tContext = new AppTransaction();
			$appuserDAL = new AppUserDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$appuserDAL->UpdateAppUser($appuser, $tContext);
				$tContext->CommitTransaction();
			}
			catch (Exception $ex)
			{
				$tContext->RollbackTransaction();
				throw $ex;
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: Search
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SearchAppUser($Email, $sortBy, $sortDirection, $PageSize, $PageIndex)
		{
			$appUserDAL = new AppUserDAL($this->_userinfo);
			return $appUserDAL->SearchAppUser($Email, $sortBy, $sortDirection, $PageSize, $PageIndex);
		}




		///*****************************************************************
		///<summary>
		///Method Name: Update
		///Description: Updates Records in the Database
		///</summary>
		///*****************************************************************

		public function UpdateProfile($appuser)
		{
			$tContext = new AppTransaction();
			$appuserDAL = new AppUserDAL($this->_userinfo);
			$usernotificationDAL = new UserNotificationDAL($this->_userinfo);
			$userChildrenDAL = new UserChildrenDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$appuserDAL->UpdateProfile($appuser, $tContext);
				foreach($appuser->getUserNotifications() as $userNotification){
					$userNotification->setAppUserID($appuser->getAppUserID());
					$usernotificationDAL->UpdateUserNotification($userNotification, $tContext);
				}
				foreach($appuser->getUserChildren() as $userChild){
					if ($userChild->getUserChildrenID() > 0){
						$userChild->setAppUserID($appuser->getAppUserID());
						$userChildrenDAL->UpdateUserChildren($userChild, $tContext);
					}
					else {
						$userChild->setAppUserID($appuser->getAppUserID());
						$userChildrenDAL->InsertUserChildren($userChild, $tContext);
					}
				}
				$tContext->CommitTransaction();
			}
			catch (Exception $ex)
			{
				$tContext->RollbackTransaction();
				throw $ex;
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: Update
		///Description: Updates Records in the Database
		///</summary>
		///*****************************************************************

		public function UpdateClips($appuser)
		{
			$tContext = new AppTransaction();
			$appuserDAL = new AppUserDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$appuserDAL->UpdateClips($appuser, $tContext);
				$tContext->CommitTransaction();
			}
			catch (Exception $ex)
			{
				$tContext->RollbackTransaction();
				throw $ex;
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: Update
		///Description: Updates Records in the Database
		///</summary>
		///*****************************************************************

		public function UpdateHearts($appuser)
		{
			$tContext = new AppTransaction();
			$appuserDAL = new AppUserDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$appuserDAL->UpdateHearts($appuser, $tContext);
				$tContext->CommitTransaction();
			}
			catch (Exception $ex)
			{
				$tContext->RollbackTransaction();
				throw $ex;
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: Update
		///Description: Updates Records in the Database
		///</summary>
		///*****************************************************************

		public function UpdateFollowers($appuser)
		{
			$tContext = new AppTransaction();
			$appuserDAL = new AppUserDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$appuserDAL->UpdateFollowers($appuser, $tContext);
				$tContext->CommitTransaction();
			}
			catch (Exception $ex)
			{
				$tContext->RollbackTransaction();
				throw $ex;
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: Update
		///Description: Updates Records in the Database
		///</summary>
		///*****************************************************************

		public function UpdateFollowing($appuser)
		{
			$tContext = new AppTransaction();
			$appuserDAL = new AppUserDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$appuserDAL->UpdateFollowing($appuser, $tContext);
				$tContext->CommitTransaction();
			}
			catch (Exception $ex)
			{
				$tContext->RollbackTransaction();
				throw $ex;
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: Update
		///Description: Updates Records in the Database
		///</summary>
		///*****************************************************************

		public function UpdateBuys($appuser)
		{
			$tContext = new AppTransaction();
			$appuserDAL = new AppUserDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$appuserDAL->UpdateBuys($appuser, $tContext);
				$tContext->CommitTransaction();
			}
			catch (Exception $ex)
			{
				$tContext->RollbackTransaction();
				throw $ex;
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectByAppUserID
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByAppUserID($AppUserID)
		{
			$appUserDAL = new AppUserDAL($this->_userinfo);
			return $appUserDAL->SelectByAppUserID($AppUserID, null);
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectByUsername
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByUsername($Username)
		{
			$appUserDAL = new AppUserDAL($this->_userinfo);
			return $appUserDAL->SelectByUsername($Username, null);
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectByEmail
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByEmail($Email)
		{
			$appUserDAL = new AppUserDAL($this->_userinfo);
			return $appUserDAL->SelectByEmail($Email, null);
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectAllAppUser
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectAllAppUser()
		{
			$appUserDAL = new AppUserDAL($this->_userinfo);
			return $appUserDAL->SelectAllAppUser(null);
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectFollowers
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectFollowers($AppUserID, $LoggedInAppUserID)
		{
			$appUserDAL = new AppUserDAL($this->_userinfo);
			return $appUserDAL->SelectFollowers($AppUserID, $LoggedInAppUserID, null);
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectFollowing
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectFollowing($AppUserID, $LoggedInAppUserID)
		{
			$appUserDAL = new AppUserDAL($this->_userinfo);
			return $appUserDAL->SelectFollowing($AppUserID, $LoggedInAppUserID, null);
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectWhoToFollow
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectWhoToFollow($AppUserID)
		{
			$appUserDAL = new AppUserDAL($this->_userinfo);
			return $appUserDAL->SelectWhoToFollow($AppUserID, null);
		}


		///*****************************************************************
		///<summary>
		///Method Name: SelectByAppUserIDAndLoggedInAppUserID
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByAppUserIDAndLoggedInAppUserID($AppUserID, $LoggedInAppUserID)
		{
			$appUserDAL = new AppUserDAL($this->_userinfo);
			return $appUserDAL->SelectByAppUserIDAndLoggedInAppUserID($AppUserID, $LoggedInAppUserID, null);
		}
	}
?>
