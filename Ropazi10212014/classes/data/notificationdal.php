<?php
	include_once("basedal.php");
	include_once("notificationsql.php");
	include_once("notificationassembler.php");
	include_once("classes/domain/notification.php");


	///*****************************************************************
	///<summary>
	///Class Name: Notification
	///Description: Data Access Layer
	///</summary>
	///*****************************************************************

	class NotificationDAL extends BaseDAL
	{
		private $userInfo;
		private $logger;


		///*****************************************************************
		///<summary>
		///Constructor for Notification
		///</summary>
		///*****************************************************************

		public function __construct($userInfo)
		{
			$this->userInfo = $userInfo;
			$this->logger = Logger::getLogger(__CLASS__);
		}




		///*****************************************************************
		///<summary>
		///Method Name: Insert
		///Description: Adds new Record to the Database
		///</summary>
		///*****************************************************************

		public function InsertNotification($notification, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$notificationSQL = new NotificationSQL($this->userInfo, $this->mysqli);
			$query = $notificationSQL->InsertNotification($notification);
			$this->logger->debug($query);
			try
			{
				$this->mysqli->query($query);
				$notification->setNotificationID($this->mysqli->insert_id);
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
			$this->logger->debug("END");
			return true;
		}




		///*****************************************************************
		///<summary>
		///Method Name: Update
		///Description: Update Record in the Database
		///</summary>
		///*****************************************************************

		public function UpdateNotification($notification, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$notificationSQL = new NotificationSQL($this->userInfo, $this->mysqli);
			$query = $notificationSQL->UpdateNotification($notification);
			$this->logger->debug($query);
			try
			{
				$this->mysqli->query($query);
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
			$this->logger->debug("END");
			return true;
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectByAppUserID
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByAppUserID($AppUserID, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$notificationSQL = new NotificationSQL($this->userInfo, $this->mysqli);
			$query = $notificationSQL->SelectByAppUserID($AppUserID);
			$this->logger->debug($query);
			try
			{
				$result = $this->mysqli->query($query);
				$notificationAssembler = new NotificationAssembler($this->userInfo);
				$notifications = $notificationAssembler->AssembleList($result);
				$this->logger->debug("END");
				return $notifications;
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
		}


	}
?>
