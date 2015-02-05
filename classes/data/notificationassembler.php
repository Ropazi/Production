<?php
	include_once("classes/domain/paginatedlist.php");


	///*****************************************************************
	///<summary>
	///Class Name: Notification
	///Description: Assembles Notification
	///</summary>
	///*****************************************************************

	class NotificationAssembler
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
		///Method Name: Assemble List of Notification
		///Description: Assembles List of Notification from Results
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
					$notification = new Notification();
					$notification->setNotificationID($row['notificationid']);
					$notification->setAppUserID($row['appuserid']);
					$notification->setEntityName($row['entityname']);
					$notification->setEntityID($row['entityid']);
					$notification->setNotificationType($row['notificationtype']);
					$notification->setCreateDate($row['createdate']);
					$notification->setViewLink($row['viewlink']);
					$notification->setViewed($row['viewed']);
					$notification->setViewDate($row['viewdate']);
					$notification->setUserImage($row['userimage']);
					$notification->setPostImage($row['postimage']);
					$notification->setOtherText($row['othertext']);
					$aList[] = $notification;
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
		///Method Name: AssembleNotification
		///Description: Assembles Notification from DataReader
		///</summary>
		///*****************************************************************

		public function AssembleNotification($result)
		{
			$this->logger->debug("START");
			$notification = new Notification();
			try
			{
				if (!mysqli_num_rows($result))
				{
					return $notification;
				}
				if ($row = mysqli_fetch_array($result))
				{
					$notification->setNotificationID($row['notificationid']);
					$notification->setAppUserID($row['appuserid']);
					$notification->setEntityName($row['entityname']);
					$notification->setEntityID($row['entityid']);
					$notification->setNotificationType($row['notificationtype']);
					$notification->setCreateDate($row['createdate']);
					$notification->setViewLink($row['viewlink']);
					$notification->setViewed($row['viewed']);
					$notification->setViewDate($row['viewdate']);
					$notification->setUserImage($row['userimage']);
					$notification->setPostImage($row['postimage']);
					$notification->setOtherText($row['othertext']);
				}

			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
			$this->logger->debug("END");
			return $notification;
		}


	}
?>
