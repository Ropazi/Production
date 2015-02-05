<?php
	include_once("classes/data/userheartdal.php");
	include_once("classes/data/appuserdal.php");
	include_once("classes/domain/appuser.php");
	include_once("classes/domain/notification.php");
	include_once("classes/data/notificationdal.php");
	include_once("classes/data/apptransaction.php");


	///*****************************************************************
	///<summary>
	///Class Name: UserHeart
	///Description: Entity Business Object
	///</summary>
	///*****************************************************************

	class UserHeartBO
	{
		private $_userinfo;


		///*****************************************************************
		///<summary>
		///Constructor for UserHeartBO
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

		public function InsertUserHeart($userheart)
		{
			$tContext = new AppTransaction();
			$userheartDAL = new UserHeartDAL($this->_userinfo);
			$appUserDAL = new AppUserDAL($this->_userinfo);
			$notificationDAL = new NotificationDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$userheartDAL->InsertUserHeart($userheart, $tContext);
				$appUser = $appUserDAL->SelectByAppUserID($userheart->getAppUserID(), $tContext);
				if ($appUser->getFollowers() > 0){
					$appUser->setFollowers($appUser->getFollowers() + 1);
				}
				else {
					$appUser->setFollowers(1);
				}
				$followers = $appUser->getFollowers();
				$appUserDAL->UpdateFollowers($appUser, $tContext);
				$appUser = $appUserDAL->SelectByAppUserID($userheart->getHeartedByAppUserID(), $tContext);
				if ($appUser->getFollowing() > 0){
					$appUser->setFollowing($appUser->getFollowing() + 1);
				}
				else {
					$appUser->setFollowing(1);
				}
				$appUserDAL->UpdateFollowing($appUser, $tContext);
				
				$notification = new Notification();
				$notification->setAppUserID($userheart->getAppUserID());
				$notification->setCreateDate(new DateTime());
				$notification->setEntityID($userheart->getHeartedByAppUserID());
				$notification->setEntityName("APPUSER");
				$notification->setNotificationType("USERHEART");
				$notification->setViewed(0);
				$notification->setViewLink("/appuser/userclipping/". $userheart->getHeartedByAppUserID());
				$notification->setUserImage($appUser->getProfileImage());
				$notification->setOtherText($appUser->getFirstName() . " " . $appUser->getLastName());
				$notificationDAL->InsertNotification($notification, $tContext);
				
				$tContext->CommitTransaction();
				return $followers;
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

		public function UpdateUserHeart($userheart)
		{
			$tContext = new AppTransaction();
			$userheartDAL = new UserHeartDAL($this->_userinfo);
			$appUserDAL = new AppUserDAL($this->_userinfo);
			$notificationDAL = new NotificationDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$userheartDAL->UpdateUserHeart($userheart, $tContext);
				$appUser = $appUserDAL->SelectByAppUserID($userheart->getAppUserID(), $tContext);
				if ($appUser->getFollowers() > 0){
					if ($userheart->getIsValid() == TRUE) {
						$appUser->setFollowers($appUser->getFollowers() + 1);
					}
					else {
						$appUser->setFollowers($appUser->getFollowers() - 1);
					}
				}
				else {
					if ($userheart->getIsValid() == TRUE){
						$appUser->setFollowers(1);
					}
					else {
						$appUser->setFollowers(0);
					}
				}
				$followers = $appUser->getFollowers();
				$appUserDAL->UpdateFollowers($appUser, $tContext);
				$appUser = $appUserDAL->SelectByAppUserID($userheart->getHeartedByAppUserID(), $tContext);
				if ($appUser->getFollowing() > 0){
					if ($userheart->getIsValid() == TRUE) {
						$appUser->setFollowing($appUser->getFollowing() + 1);
					}
					else {
						$appUser->setFollowing($appUser->getFollowing() - 1);
					}
				}
				else {
					if ($userheart->getIsValid() == TRUE) {
						$appUser->setFollowing(1);
					}
					else {
						$appUser->setFollowing(1);
					}
				}
				$appUserDAL->UpdateFollowing($appUser, $tContext);
				/*$notification = new Notification();
				$notification->setAppUserID($userheart->getAppUserID());
				$notification->setCreateDate(new DateTime());
				$notification->setEntityID($userheart->getHeartedByAppUserID());
				$notification->setEntityName("APPUSER");
				$notification->setNotificationType("USERHEART");
				$notification->setViewed(0);
				$notification->setViewLink("/appuser/userclipping/". $userheart->getHeartedByAppUserID());
				$notification->setUserImage($appUser->getProfileImage());
				$notification->setOtherText($appUser->getFirstName() . " " . $appUser->getLastName());
				$notificationDAL->InsertNotification($notification, $tContext);*/
				
				$tContext->CommitTransaction();
				return $followers;
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
			$userHeartDAL = new UserHeartDAL($this->_userinfo);
			return $userHeartDAL->SelectByAppUserID($AppUserID, null);
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectByHeartedByAppUserID
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByHeartedByAppUserID($HeartedByAppUserID)
		{
			$userHeartDAL = new UserHeartDAL($this->_userinfo);
			return $userHeartDAL->SelectByHeartedByAppUserID($HeartedByAppUserID, null);
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectByAppUserAndHeart
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByAppUserAndHeart($AppUserID, $HeartedByAppUserID)
		{
			$userHeartDAL = new UserHeartDAL($this->_userinfo);
			return $userHeartDAL->SelectByAppUserAndHeart($AppUserID, $HeartedByAppUserID, null);
		}


	}
?>
