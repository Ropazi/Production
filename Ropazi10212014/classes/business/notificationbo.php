<?php
	include_once("classes/data/notificationdal.php");
	include_once("classes/data/apptransaction.php");


	///*****************************************************************
	///<summary>
	///Class Name: Notification
	///Description: Entity Business Object
	///</summary>
	///*****************************************************************

	class NotificationBO
	{
		private $_userinfo;


		///*****************************************************************
		///<summary>
		///Constructor for NotificationBO
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

		public function InsertNotification($notification)
		{
			$tContext = new AppTransaction();
			$notificationDAL = new NotificationDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$notificationDAL->InsertNotification($notification, $tContext);
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

		public function UpdateNotification($notification)
		{
			$tContext = new AppTransaction();
			$notificationDAL = new NotificationDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$notificationDAL->UpdateNotification($notification, $tContext);
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
			$notificationDAL = new NotificationDAL($this->_userinfo);
			return $notificationDAL->SelectByAppUserID($AppUserID, null);
		}


	}
?>
