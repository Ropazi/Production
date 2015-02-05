<?php

	include_once("classes/domain/datatransferobject.php");


	///*****************************************************************
	///<summary>
	///Class Name: UserHeart
	///Description: Data Transfer Object
	///</summary>
	///*****************************************************************

	class UserHeart extends DataTransferObject
	{
		private $_UserHeartID;
		private $_AppUserID;
		private $_HeartedByAppUserID;
		private $_CreateDate;
		private $_IsValid;
		private $_RemoveDate;


		public function getUserHeartID()
		{
			if ($this->_UserHeartID == NULL)
			{
				$this->_UserHeartID = 0;
			}
			return $this->_UserHeartID;
		}
		public function setUserHeartID($UserHeartID)
		{
			$this->_UserHeartID = $UserHeartID;
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
		public function getHeartedByAppUserID()
		{
			if ($this->_HeartedByAppUserID == NULL)
			{
				$this->_HeartedByAppUserID = 0;
			}
			return $this->_HeartedByAppUserID;
		}
		public function setHeartedByAppUserID($HeartedByAppUserID)
		{
			$this->_HeartedByAppUserID = $HeartedByAppUserID;
		}
		public function getCreateDate()
		{
			return $this->_CreateDate;
		}
		public function setCreateDate($CreateDate)
		{
			$this->_CreateDate = $CreateDate;
		}
		public function getIsValid()
		{
			return $this->_IsValid;
		}
		public function setIsValid($IsValid)
		{
			$this->_IsValid = $IsValid;
		}
		public function getRemoveDate()
		{
			return $this->_RemoveDate;
		}
		public function setRemoveDate($RemoveDate)
		{
			$this->_RemoveDate = $RemoveDate;
		}
	}
?>
