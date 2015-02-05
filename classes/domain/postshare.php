<?php

	include_once("classes/domain/datatransferobject.php");


	///*****************************************************************
	///<summary>
	///Class Name: PostShare
	///Description: Data Transfer Object
	///</summary>
	///*****************************************************************

	class PostShare extends DataTransferObject
	{
		private $_PostShareID;
		private $_AppUserID;
		private $_Title;
		private $_Image;
		private $_PostID;
		private $_Emails;
		private $_Message;
		private $_CreateDate;
		private $_ViewLink;
		private $_Viewed;
		private $_ViewDate;


		public function getPostShareID()
		{
			if ($this->_PostShareID == NULL)
			{
				$this->_PostShareID = 0;
			}
			return $this->_PostShareID;
		}
		public function setPostShareID($PostShareID)
		{
			$this->_PostShareID = $PostShareID;
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
		public function getTitle()
		{
			return $this->_Title;
		}
		public function setTitle($Title)
		{
			$this->_Title = $Title;
		}
		public function getImage()
		{
			return $this->_Image;
		}
		public function setImage($Image)
		{
			$this->_Image = $Image;
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
		public function getEmails()
		{
			return $this->_Emails;
		}
		public function setEmails($Emails)
		{
			$this->_Emails = $Emails;
		}
		public function getMessage()
		{
			return $this->_Message;
		}
		public function setMessage($Message)
		{
			$this->_Message = $Message;
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
	}
?>
