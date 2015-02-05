<?php

	include_once("classes/domain/datatransferobject.php");


	///*****************************************************************
	///<summary>
	///Class Name: PostTag
	///Description: Data Transfer Object
	///</summary>
	///*****************************************************************

	class PostTag extends DataTransferObject
	{
		private $_TagID;
		private $_AppUserID;
		private $_PostID;
		private $_CreateDate;
		private $_TaggedByAppUserID;
		private $_Viewed;
		private $_ViewDate;


		public function getTagID()
		{
			if ($this->_TagID == NULL)
			{
				$this->_TagID = 0;
			}
			return $this->_TagID;
		}
		public function setTagID($TagID)
		{
			$this->_TagID = $TagID;
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
		public function getTaggedByAppUserID()
		{
			if ($this->_TaggedByAppUserID == NULL)
			{
				$this->_TaggedByAppUserID = 0;
			}
			return $this->_TaggedByAppUserID;
		}
		public function setTaggedByAppUserID($TaggedByAppUserID)
		{
			$this->_TaggedByAppUserID = $TaggedByAppUserID;
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
	}
?>
