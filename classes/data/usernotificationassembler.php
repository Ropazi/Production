<?php
	include_once("classes/domain/paginatedlist.php");


	///*****************************************************************
	///<summary>
	///Class Name: UserNotification
	///Description: Assembles UserNotification
	///</summary>
	///*****************************************************************

	class UserNotificationAssembler
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
		///Method Name: Assemble List of UserNotification
		///Description: Assembles List of UserNotification from Results
		///</summary>
		///*****************************************************************

		public function AssembleList($result)
		{
			$this->logger->debug("START");
			$aList = array();
			try
			{
				if (!mysqli_num_rows($result))
				{
					return $aList;
				}
				while ($row = mysqli_fetch_array($result))
				{
					$userNotification = new UserNotification();
					$userNotification->setUserNotificationID($row['usernotificationid']);
					$userNotification->setAppUserID($row['appuserid']);
					$userNotification->setNotificationType($row['notificationtype']);
					$userNotification->setDisplayName($row['displayname']);
					$userNotification->setNotify($row['notify']);
					$aList[] = $userNotification;
				}
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}

			$this->logger->debug("END");
			return $aList;
		}




		///*****************************************************************
		///<summary>
		///Method Name: AssembleUserNotification
		///Description: Assembles UserNotification from DataReader
		///</summary>
		///*****************************************************************

		public function AssembleUserNotification($result)
		{
			$this->logger->debug("START");
			$userNotification = new UserNotification();
			try
			{
				if (!mysqli_num_rows($result))
				{
					return $userNotification;
				}
				if ($row = mysqli_fetch_array($result))
				{
					$userNotification->setUserNotificationID($row['usernotificationid']);
					$userNotification->setAppUserID($row['appuserid']);
					$userNotification->setNotificationType($row['notificationtype']);
					$userNotification->setDisplayName($row['displayname']);
					$userNotification->setNotify($row['notify']);
				}

			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
			$this->logger->debug("END");
			return $userNotification;
		}


	}
?>
