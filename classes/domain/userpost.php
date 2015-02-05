<?php

	include_once("classes/domain/datatransferobject.php");


	///*****************************************************************
	///<summary>
	///Class Name: UserPost
	///Description: Data Transfer Object
	///</summary>
	///*****************************************************************

	class UserPost extends DataTransferObject
	{
		private $_UserPostID;
		private $_PostID;
		private $_AppUserID;
		private $_UserCatalogID;
		private $_CreateDate;
		private $_IsValid;
		private $_RemoveDate;


		public function getUserPostID()
		{
			if ($this->_UserPostID == NULL)
			{
				$this->_UserPostID = 0;
			}
			return $this->_UserPostID;
		}
		public function setUserPostID($UserPostID)
		{
			$this->_UserPostID = $UserPostID;
		}
		public function getPostID()
		{
			if ($this->_PostID == NULL)
			{
				$this->_PostID = 0;
			}
			return $this->_PostID;
		}
		public function setPostID($PostID)
		{
			$this->_PostID = $PostID;
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
		public function getUserCatalogID()
		{
			if ($this->_UserCatalogID == NULL)
			{
				$this->_UserCatalogID = 0;
			}
			return $this->_UserCatalogID;
		}
		public function setUserCatalogID($UserCatalogID)
		{
			$this->_UserCatalogID = $UserCatalogID;
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
