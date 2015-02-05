<?php

	include_once("classes/domain/datatransferobject.php");


	///*****************************************************************
	///<summary>
	///Class Name: PostComment
	///Description: Data Transfer Object
	///</summary>
	///*****************************************************************

	class PostComment extends DataTransferObject
	{
		private $_PostCommentID;
		private $_PostID;
		private $_AppUserID;
		private $_ThreadID;
		private $_CreateDate;
		private $_Comments;
		private $_IsRemoved;


		public function getPostCommentID()
		{
			if ($this->_PostCommentID == NULL)
			{
				$this->_PostCommentID = 0;
			}
			return $this->_PostCommentID;
		}
		public function setPostCommentID($PostCommentID)
		{
			$this->_PostCommentID = $PostCommentID;
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
		public function getThreadID()
		{
			if ($this->_ThreadID == NULL)
			{
				$this->_ThreadID = 0;
			}
			return $this->_ThreadID;
		}
		public function setThreadID($ThreadID)
		{
			$this->_ThreadID = $ThreadID;
		}
		public function getCreateDate()
		{
			return $this->_CreateDate;
		}
		public function setCreateDate($CreateDate)
		{
			$this->_CreateDate = $CreateDate;
		}
		public function getComments()
		{
			return $this->_Comments;
		}
		public function setComments($Comments)
		{
			$this->_Comments = $Comments;
		}
		public function getIsRemoved()
		{
			return $this->_IsRemoved;
		}
		public function setIsRemoved($IsRemoved)
		{
			$this->_IsRemoved = $IsRemoved;
		}
	}
?>
