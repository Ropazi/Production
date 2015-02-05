<?php

	include_once("classes/domain/datatransferobject.php");


	///*****************************************************************
	///<summary>
	///Class Name: PostHeart
	///Description: Data Transfer Object
	///</summary>
	///*****************************************************************

	class PostHeart extends DataTransferObject
	{
		private $_HeartID;
		private $_AppUserID;
		private $_PostID;
		private $_CreateDate;
		private $_IsValid;
		private $_RemoveDate;


		public function getHeartID()
		{
			if ($this->_HeartID == NULL)
			{
				$this->_HeartID = 0;
			}
			return $this->_HeartID;
		}
		public function setHeartID($HeartID)
		{
			$this->_HeartID = $HeartID;
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
		public function getPostID()
		{
			return $this->_PostID;
		}
		public function setPostID($PostID)
		{
			$this->_PostID = $PostID;
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
