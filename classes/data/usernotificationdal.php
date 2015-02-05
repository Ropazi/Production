<?php
	include_once("basedal.php");
	include_once("usernotificationsql.php");
	include_once("usernotificationassembler.php");
	include_once("classes/domain/usernotification.php");


	///*****************************************************************
	///<summary>
	///Class Name: UserNotification
	///Description: Data Access Layer
	///</summary>
	///*****************************************************************

	class UserNotificationDAL extends BaseDAL
	{
		private $userInfo;
		private $logger;


		///*****************************************************************
		///<summary>
		///Constructor for UserNotification
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

		public function InsertUserNotification($userNotification, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$userNotificationSQL = new UserNotificationSQL($this->userInfo, $this->mysqli);
			$query = $userNotificationSQL->InsertUserNotification($userNotification);
			$this->logger->debug($query);
			try
			{
				$this->mysqli->query($query);
				$userNotification->setUserNotificationID($this->mysqli->insert_id);
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

		public function UpdateUserNotification($userNotification, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$userNotificationSQL = new UserNotificationSQL($this->userInfo, $this->mysqli);
			$query = $userNotificationSQL->UpdateUserNotification($userNotification);
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
			$userNotificationSQL = new UserNotificationSQL($this->userInfo, $this->mysqli);
			$query = $userNotificationSQL->SelectByAppUserID($AppUserID);
			$this->logger->debug($query);
			try
			{
				$result = $this->mysqli->query($query);
				$userNotificationAssembler = new UserNotificationAssembler($this->userInfo);
				$userNotifications = $userNotificationAssembler->AssembleList($result);
				$this->logger->debug("END");
				return $userNotifications;
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
		}


	}
?>
