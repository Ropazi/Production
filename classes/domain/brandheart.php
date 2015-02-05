<?php

	include_once("classes/domain/datatransferobject.php");


	///*****************************************************************
	///<summary>
	///Class Name: BrandHeart
	///Description: Data Transfer Object
	///</summary>
	///*****************************************************************

	class BrandHeart extends DataTransferObject
	{
		private $_BrandHeartID;
		private $_AppUserID;
		private $_BrandID;
		private $_CreateDate;
		private $_IsValid;
		private $_RemoveDate;


		public function getBrandHeartID()
		{
			if ($this->_BrandHeartID == NULL)
			{
				$this->_BrandHeartID = 0;
			}
			return $this->_BrandHeartID;
		}
		public function setBrandHeartID($BrandHeartID)
		{
			$this->_BrandHeartID = $BrandHeartID;
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
		public function getBrandID()
		{
			return $this->_BrandID;
		}
		public function setBrandID($BrandID)
		{
			$this->_BrandID = $BrandID;
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
