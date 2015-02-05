<?php
	include_once("classes/data/usernotificationdal.php");
	include_once("classes/data/apptransaction.php");


	///*****************************************************************
	///<summary>
	///Class Name: UserNotification
	///Description: Entity Business Object
	///</summary>
	///*****************************************************************

	class UserNotificationBO
	{
		private $_userinfo;


		///*****************************************************************
		///<summary>
		///Constructor for UserNotificationBO
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

		public function InsertUserNotification($usernotification)
		{
			$tContext = new AppTransaction();
			$usernotificationDAL = new UserNotificationDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$usernotificationDAL->InsertUserNotification($usernotification, $tContext);
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

		public function UpdateUserNotification($usernotification)
		{
			$tContext = new AppTransaction();
			$usernotificationDAL = new UserNotificationDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$usernotificationDAL->UpdateUserNotification($usernotification, $tContext);
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
			$userNotificationDAL = new UserNotificationDAL($this->_userinfo);
			return $userNotificationDAL->SelectByAppUserID($AppUserID, null);
		}


	}
?>
