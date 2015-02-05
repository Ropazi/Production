<?php
	include_once("classes/domain/notification.php");
	include_once("classes/data/notificationdal.php");
	include_once("classes/domain/appuser.php");
	include_once("classes/data/appuserdal.php");
	include_once("classes/domain/post.php");
	include_once("classes/data/postdal.php");
	include_once("classes/domain/brand.php");
	include_once("classes/data/branddal.php");
	include_once("classes/data/userpostdal.php");
	include_once("classes/data/apptransaction.php");


	///*****************************************************************
	///<summary>
	///Class Name: UserPost
	///Description: Entity Business Object
	///</summary>
	///*****************************************************************

	class UserPostBO
	{
		private $_userinfo;


		///*****************************************************************
		///<summary>
		///Constructor for UserPostBO
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

		public function InsertUserPost($userpost)
		{
			$tContext = new AppTransaction();
			$userpostDAL = new UserPostDAL($this->_userinfo);
			$postDAL = new PostDAL($this->_userinfo);
			$appUserDAL = new AppUserDAL($this->_userinfo);
			$brandDAL = new BrandDAL($this->_userinfo);
			$notificationDAL = new NotificationDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$userpostDAL->InsertUserPost($userpost, $tContext);
				$appUser = $appUserDAL->SelectByAppUserID($userpost->getAppUserID(), $tContext);
				if ($appUser->getClips() > 0){
					$appUser->setClips($appUser->getClips() + 1);
				}
				else {
					$appUser->setClips(1);
				}
				$appUserDAL->UpdateClips($appUser, $tContext);
				
				$post = $postDAL->SelectByPostID($userpost->getPostID(), $tContext);
				if ($post->getClips() > 0){
					$post->setClips($post->getClips() + 1);
				}
				else {
					$post->setClips(1);
				}
				$postDAL->UpdateClips($post, $tContext);
				
				$notification = new Notification();
				$notification->setAppUserID($post->getAppUserID());
				$notification->setCreateDate(new DateTime());
				$notification->setEntityID($userpost->getAppUserID());
				$notification->setEntityName("APPUSER");
				$notification->setNotificationType("CLIP");
				$notification->setViewed(0);
				$notification->setViewLink("/post/postlightboxget/".$post->getPostID());
				$notification->setUserImage($appUser->getProfileImage());
				$notification->setPostImage($post->getLocalImageURL());
				$notificationDAL->InsertNotification($notification, $tContext);
				
				
				$brand = $brandDAL->SelectByBrandID($post->getBrandID(), $tContext);
				if ($brand->getClips() > 0){
					$brand->setClips($brand->getClips() + 1);
				}
				else {
					$brand->setClips(1);
				}
				$brandDAL->UpdateClips($brand, $tContext);
				
				$tContext->CommitTransaction();
				return $post->getClips();
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

		public function UpdateUserPost($userpost)
		{
			$tContext = new AppTransaction();
			$userpostDAL = new UserPostDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$userpostDAL->UpdateUserPost($userpost, $tContext);
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
		///Method Name: SelectByPostID
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByPostID($PostID)
		{
			$userPostDAL = new UserPostDAL($this->_userinfo);
			return $userPostDAL->SelectByPostID($PostID, null);
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectByAppUserID
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByAppUserID($AppUserID)
		{
			$userPostDAL = new UserPostDAL($this->_userinfo);
			return $userPostDAL->SelectByAppUserID($AppUserID, null);
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectExistingPost
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectExistingPost($PostID, $AppUserID)
		{
			$userPostDAL = new UserPostDAL($this->_userinfo);
			return $userPostDAL->SelectExistingPost($PostID, $AppUserID, null);
		}


	}
?>
