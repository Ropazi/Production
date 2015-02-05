<?php

	include_once("classes/domain/datatransferobject.php");


	///*****************************************************************
	///<summary>
	///Class Name: Notification
	///Description: Data Transfer Object
	///</summary>
	///*****************************************************************

	class Notification extends DataTransferObject
	{
		private $_NotificationID;
		private $_AppUserID;
		private $_EntityName;
		private $_EntityID;
		private $_NotificationType;
		private $_CreateDate;
		private $_ViewLink;
		private $_Viewed;
		private $_ViewDate;
		private $_UserImage;
		private $_PostImage;
		private $_OtherText;


		public function getNotificationID()
		{
			if ($this->_NotificationID == NULL)
			{
				$this->_NotificationID = 0;
			}
			return $this->_NotificationID;
		}
		public function setNotificationID($NotificationID)
		{
			$this->_NotificationID = $NotificationID;
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
		public function getEntityName()
		{
			return $this->_EntityName;
		}
		public function setEntityName($EntityName)
		{
			$this->_EntityName = $EntityName;
		}
		public function getEntityID()
		{
			if ($this->_EntityID == NULL)
			{
				$this->_EntityID = 0;
			}
			return $this->_EntityID;
		}
		public function setEntityID($EntityID)
		{
			$this->_EntityID = $EntityID;
		}
		public function getNotificationType()
		{
			return $this->_NotificationType;
		}
		public function setNotificationType($NotificationType)
		{
			$this->_NotificationType = $NotificationType;
		}
		public function getCreateDate()
		{
			return $this->_CreateDate;
		}
		public function setCreateDate($CreateDate)
		{
			$this->_CreateDate = $CreateDate;
		}
		public function getViewLink()
		{
			return $this->_ViewLink;
		}
		public function setViewLink($ViewLink)
		{
			$this->_ViewLink = $ViewLink;
		}
		public function getViewed()
		{
			return $this->_Viewed;
		}
		public function setViewed($Viewed)
		{
			$this->_Viewed = $Viewed;
		}
		public function getViewDate()
		{
			return $this->_ViewDate;
		}
		public function setViewDate($ViewDate)
		{
			$this->_ViewDate = $ViewDate;
		}
		public function getUserImage()
		{
			return $this->_UserImage;
		}
		public function setUserImage($UserImage)
		{
			$this->_UserImage = $UserImage;
		}
		public function getPostImage()
		{
			return $this->_PostImage;
		}
		public function setPostImage($PostImage)
		{
			$this->_PostImage = $PostImage;
		}
		public function getOtherText()
		{
			return $this->_OtherText;
		}
		public function setOtherText($OtherText)
		{
			$this->_OtherText = $OtherText;
		}
	}
?>
