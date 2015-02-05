<?php

	include_once("classes/domain/datatransferobject.php");


	///*****************************************************************
	///<summary>
	///Class Name: Brand
	///Description: Data Transfer Object
	///</summary>
	///*****************************************************************

	class Brand extends DataTransferObject
	{
		private $_BrandID;
		private $_BrandName;
		private $_BrandCode;
		private $_AboutBrand;
		private $_Website;
		private $_BrandCategoryID;
		private $_BrandLogo;
		private $_IsApproved;
		private $_CreateDate;
		private $_LastUpdateDate;
		private $_Tier;
		private $_IsFeatured;
		private $_Clips;
		private $_Hearts;
		private $_Followers;
		private $_AppUserID;
		private $_HeartByUser;


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
		public function getBrandName()
		{
			return $this->_BrandName;
		}
		public function setBrandName($BrandName)
		{
			$this->_BrandName = $BrandName;
		}
		public function getBrandCode()
		{
			return $this->_BrandCode;
		}
		public function setBrandCode($BrandCode)
		{
			$this->_BrandCode = $BrandCode;
		}
		public function getAboutBrand()
		{
			return $this->_AboutBrand;
		}
		public function setAboutBrand($AboutBrand)
		{
			$this->_AboutBrand = $AboutBrand;
		}
		public function getWebsite()
		{
			return $this->_Website;
		}
		public function setWebsite($Website)
		{
			$this->_Website = $Website;
		}
		public function getBrandCategoryID()
		{
			if ($this->_BrandCategoryID == NULL)
			{
				$this->_BrandCategoryID = 0;
			}
			return $this->_BrandCategoryID;
		}
		public function setBrandCategoryID($BrandCategoryID)
		{
			$this->_BrandCategoryID = $BrandCategoryID;
		}
		public function getBrandLogo()
		{
			return $this->_BrandLogo;
		}
		public function setBrandLogo($BrandLogo)
		{
			$this->_BrandLogo = $BrandLogo;
		}
		public function getIsApproved()
		{
			return $this->_IsApproved;
		}
		public function setIsApproved($IsApproved)
		{
			$this->_IsApproved = $IsApproved;
		}
		public function getCreateDate()
		{
			return $this->_CreateDate;
		}
		public function setCreateDate($CreateDate)
		{
			$this->_CreateDate = $CreateDate;
		}
		public function getLastUpdateDate()
		{
			return $this->_LastUpdateDate;
		}
		public function setLastUpdateDate($LastUpdateDate)
		{
			$this->_LastUpdateDate = $LastUpdateDate;
		}
		public function getTier()
		{
			if ($this->_Tier == NULL)
			{
				$this->_Tier = 0;
			}
			return $this->_Tier;
		}
		public function setTier($Tier)
		{
			$this->_Tier = $Tier;
		}
		public function getIsFeatured()
		{
			return $this->_IsFeatured;
		}
		public function setIsFeatured($IsFeatured)
		{
			$this->_IsFeatured = $IsFeatured;
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
		public function getHearts()
		{
			if ($this->_Hearts == NULL)
			{
				$this->_Hearts = 0;
			}
			return $this->_Hearts;
		}
		public function setHearts($Hearts)
		{
			$this->_Hearts = $Hearts;
		}
		public function getFollowers()
		{
			if ($this->_Followers == NULL)
			{
				$this->_Followers = 0;
			}
			return $this->_Followers;
		}
		public function setFollowers($Followers)
		{
			$this->_Followers = $Followers;
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
		public function getHeartByUser()
		{
			return $this->_HeartByUser;
		}
		public function setHeartByUser($HeartByUser)
		{
			$this->_HeartByUser = $HeartByUser;
		}
	}
?>
