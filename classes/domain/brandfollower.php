<?php

	include_once("classes/domain/datatransferobject.php");


	///*****************************************************************
	///<summary>
	///Class Name: BrandFollower
	///Description: Data Transfer Object
	///</summary>
	///*****************************************************************

	class BrandFollower extends DataTransferObject
	{
		private $_BrandFollowerID;
		private $_BrandID;
		private $_AppUserID;
		private $_CreateDate;
		private $_IsFollowing;
		private $_UnfollowDate;


		public function getBrandFollowerID()
		{
			if ($this->_BrandFollowerID == NULL)
			{
				$this->_BrandFollowerID = 0;
			}
			return $this->_BrandFollowerID;
		}
		public function setBrandFollowerID($BrandFollowerID)
		{
			$this->_BrandFollowerID = $BrandFollowerID;
		}
		public function getBrandID()
		{
			if ($this->_BrandID == NULL)
			{
				$this->_BrandID = 0;
			}
			return $this->_BrandID;
		}
		public function setBrandID($BrandID)
		{
			$this->_BrandID = $BrandID;
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
		public function getCreateDate()
		{
			return $this->_CreateDate;
		}
		public function setCreateDate($CreateDate)
		{
			$this->_CreateDate = $CreateDate;
		}
		public function getIsFollowing()
		{
			return $this->_IsFollowing;
		}
		public function setIsFollowing($IsFollowing)
		{
			$this->_IsFollowing = $IsFollowing;
		}
		public function getUnfollowDate()
		{
			return $this->_UnfollowDate;
		}
		public function setUnfollowDate($UnfollowDate)
		{
			$this->_UnfollowDate = $UnfollowDate;
		}
	}
?>
