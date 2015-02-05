<?php

	include_once("classes/domain/datatransferobject.php");


	///*****************************************************************
	///<summary>
	///Class Name: UserCatalog
	///Description: Data Transfer Object
	///</summary>
	///*****************************************************************

	class UserCatalog extends DataTransferObject
	{
		private $_UserCatalogID;
		private $_AppUserID;
		private $_CatalogName;
		private $_CreateDate;
		private $_Clips;


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
		public function getCatalogName()
		{
			return $this->_CatalogName;
		}
		public function setCatalogName($CatalogName)
		{
			$this->_CatalogName = $CatalogName;
		}
		public function getCreateDate()
		{
			return $this->_CreateDate;
		}
		public function setCreateDate($CreateDate)
		{
			$this->_CreateDate = $CreateDate;
		}
		public function getClips()
		{
			if ($this->_Clips == NULL)
			{
				$this->_Clips = 0;
			}
			return $this->_Clips;
		}
		public function setClips($Clips)
		{
			$this->_Clips = $Clips;
		}
	}
?>
