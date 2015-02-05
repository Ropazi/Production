<?php

	include_once("classes/domain/datatransferobject.php");


	///*****************************************************************
	///<summary>
	///Class Name: BrandStatistic
	///Description: Data Transfer Object
	///</summary>
	///*****************************************************************

	class BrandStatistic extends DataTransferObject
	{
		private $_BrandStatisticID;
		private $_BrandID;
		private $_Followers;
		private $_PageViews;
		private $_PostTags;
		private $_PostShares;
		private $_PostHearts;


		public function getBrandStatisticID()
		{
			if ($this->_BrandStatisticID == NULL)
			{
				$this->_BrandStatisticID = 0;
			}
			return $this->_BrandStatisticID;
		}
		public function setBrandStatisticID($BrandStatisticID)
		{
			$this->_BrandStatisticID = $BrandStatisticID;
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
		public function getPageViews()
		{
			if ($this->_PageViews == NULL)
			{
				$this->_PageViews = 0;
			}
			return $this->_PageViews;
		}
		public function setPageViews($PageViews)
		{
			$this->_PageViews = $PageViews;
		}
		public function getPostTags()
		{
			if ($this->_PostTags == NULL)
			{
				$this->_PostTags = 0;
			}
			return $this->_PostTags;
		}
		public function setPostTags($PostTags)
		{
			$this->_PostTags = $PostTags;
		}
		public function getPostShares()
		{
			if ($this->_PostShares == NULL)
			{
				$this->_PostShares = 0;
			}
			return $this->_PostShares;
		}
		public function setPostShares($PostShares)
		{
			$this->_PostShares = $PostShares;
		}
		public function getPostHearts()
		{
			if ($this->_PostHearts == NULL)
			{
				$this->_PostHearts = 0;
			}
			return $this->_PostHearts;
		}
		public function setPostHearts($PostHearts)
		{
			$this->_PostHearts = $PostHearts;
		}
	}
?>
