<?php
	include_once("classes/domain/appuser.php");
	include_once("classes/data/appuserdal.php");
	include_once("classes/domain/post.php");
	include_once("classes/data/postdal.php");
	include_once("classes/domain/brand.php");
	include_once("classes/data/branddal.php");
	include_once("classes/data/postheartdal.php");
	include_once("classes/domain/notification.php");
	include_once("classes/data/notificationdal.php");
	include_once("classes/data/apptransaction.php");


	///*****************************************************************
	///<summary>
	///Class Name: PostHeart
	///Description: Entity Business Object
	///</summary>
	///*****************************************************************

	class PostHeartBO
	{
		private $_userinfo;


		///*****************************************************************
		///<summary>
		///Constructor for PostHeartBO
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

		public function InsertPostHeart($postheart)
		{
			$tContext = new AppTransaction();
			$postheartDAL = new PostHeartDAL($this->_userinfo);
			$postDAL = new PostDAL($this->_userinfo);
			$appUserDAL = new AppUserDAL($this->_userinfo);
			$brandDAL = new BrandDAL($this->_userinfo);
			$notificationDAL = new NotificationDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$postheartDAL->InsertPostHeart($postheart, $tContext);
				
				$appUser = $appUserDAL->SelectByAppUserID($postheart->getAppUserID(), $tContext);
				if ($appUser->getHearts() > 0){
					$appUser->setHearts($appUser->getHearts() + 1);
				}
				else {
					$appUser->setHearts(1);
				}
				$appUserDAL->UpdateHearts($appUser, $tContext);
				
				$post = $postDAL->SelectByPostID($postheart->getPostID(), $tContext);
				if ($post->getHearts() > 0){
					$post->setHearts($post->getHearts() + 1);
				}
				else {
					$post->setHearts(1);
				}
				$postDAL->UpdateHearts($post, $tContext);
				
				$brand = $brandDAL->SelectByBrandID($post->getBrandID(), $tContext);
				if ($brand->getHearts() > 0){
					$brand->setHearts($brand->getHearts() + 1);
				}
				else {
					$brand->setHearts(1);
				}
				$brandDAL->UpdateHearts($brand, $tContext);
				
				$notification = new Notification();
				$notification->setAppUserID($post->getAppUserID());
				$notification->setCreateDate(new DateTime());
				$notification->setEntityID($postheart->getAppUserID());
				$notification->setEntityName("APPUSER");
				$notification->setNotificationType("POSTHEART");
				$notification->setViewed(0);
				$notification->setViewLink("/post/postlightboxget/".$postheart->getPostID());
				$notification->setUserImage($appUser->getProfileImage());
				$notification->setPostImage($post->getLocalImageURL());
				$notificationDAL->InsertNotification($notification, $tContext);
				
				$tContext->CommitTransaction();
				return $post->getHearts();
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

		public function UpdatePostHeart($postheart)
		{
			$tContext = new AppTransaction();
			$postheartDAL = new PostHeartDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$postheartDAL->UpdatePostHeart($postheart, $tContext);
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
			$postHeartDAL = new PostHeartDAL($this->_userinfo);
			return $postHeartDAL->SelectByAppUserID($AppUserID, null);
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectByPostID
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByPostID($PostID)
		{
			$postHeartDAL = new PostHeartDAL($this->_userinfo);
			return $postHeartDAL->SelectByPostID($PostID, null);
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectByAppUserAndPost
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByAppUserAndPost($AppUserID, $PostID)
		{
			$postHeartDAL = new PostHeartDAL($this->_userinfo);
			return $postHeartDAL->SelectByAppUserAndPost($AppUserID, $PostID, null);
		}


	}
?>
