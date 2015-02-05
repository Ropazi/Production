<?php

	include_once("classes/domain/datatransferobject.php");


	///*****************************************************************
	///<summary>
	///Class Name: UserNotification
	///Description: Data Transfer Object
	///</summary>
	///*****************************************************************

	class UserNotification extends DataTransferObject
	{
		private $_UserNotificationID;
		private $_AppUserID;
		private $_NotificationType;
		private $_DisplayName;
		private $_Notify;


		public function getUserNotificationID()
		{
			if ($this->_UserNotificationID == NULL)
			{
				$this->_UserNotificationID = 0;
			}
			return $this->_UserNotificationID;
		}
		public function setUserNotificationID($UserNotificationID)
		{
			$this->_UserNotificationID = $UserNotificationID;
		}
		public function getAppUserID()
		{
			if ($this->_AppUserID == NULL)
			{
				$this->_AppUserID = 0;
			}
			return $this->_AppUserID;
		}
		public function setAppUserID($AppUserID)
		{
			$this->_AppUserID = $AppUserID;
		}
		public function getNotificationType()
		{
			return $this->_NotificationType;
		}
		public function setNotificationType($NotificationType)
		{
			$this->_NotificationType = $NotificationType;
		}
		public function getDisplayName()
		{
			return $this->_DisplayName;
		}
		public function setDisplayName($DisplayName)
		{
			$this->_DisplayName = $DisplayName;
		}
		public function getNotify()
		{
			return $this->_Notify;
		}
		public function setNotify($Notify)
		{
			$this->_Notify = $Notify;
		}
	}
?>
