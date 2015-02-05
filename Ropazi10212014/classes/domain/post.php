<?php

	include_once("classes/domain/datatransferobject.php");


	///*****************************************************************
	///<summary>
	///Class Name: Post
	///Description: Data Transfer Object
	///</summary>
	///*****************************************************************

	class Post extends DataTransferObject
	{
		private $_PostID;
		private $_AppUserID;
		private $_BrandID;
		private $_CategoryID;
		private $_SubCategoryID;
		private $_Title;
		private $_CreateDate;
		private $_Currency;
		private $_PriceText;
		private $_Price;
		private $_RetailPriceText;
		private $_RetailPrice;
		private $_SalePriceText;
		private $_SalePrice;
		private $_DetailText;
		private $_LastUpdateDate;
		private $_IsActive;
		private $_FeaturedProduct;
		private $_IsApproved;
		private $_EnableComments;
		private $_LastUpdateBy;
		private $_OriginalImageURL;
		private $_LocalImageURL;
		private $_PostURL;
		private $_ScrapeError;
		private $_ItemGender;
		private $_ItemSize;
		private $_ItemAgeGroup;
		private $_SKU;
		private $_UPC;
		private $_InStock;
		private $_Clips;
		private $_Hearts;
		private $_BrandName;
		private $_BrandLogo;
		private $_UserName;
		private $_UserProfileImage;
		private $_CategoryName;
		private $_ClippedByUser;
		private $_HeartByUser;
		private $_Buys;
		private $_PosterAppUserID;
		private $_ProductID;
		private $_Rating;
		private $_CatalogName;
		private $_PostComments = array();


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
		public function getCategoryID()
		{
			if ($this->_CategoryID == NULL)
			{
				$this->_CategoryID = 0;
			}
			return $this->_CategoryID;
		}
		public function setCategoryID($CategoryID)
		{
			$this->_CategoryID = $CategoryID;
		}
		public function getSubCategoryID()
		{
			if ($this->_SubCategoryID == NULL)
			{
				$this->_SubCategoryID = 0;
			}
			return $this->_SubCategoryID;
		}
		public function setSubCategoryID($SubCategoryID)
		{
			$this->_SubCategoryID = $SubCategoryID;
		}
		public function getTitle()
		{
			return $this->_Title;
		}
		public function setTitle($Title)
		{
			$this->_Title = $Title;
		}
		public function getCreateDate()
		{
			return $this->_CreateDate;
		}
		public function setCreateDate($CreateDate)
		{
			$this->_CreateDate = $CreateDate;
		}
		public function getCurrency()
		{
			return $this->_Currency;
		}
		public function setCurrency($Currency)
		{
			$this->_Currency = $Currency;
		}
		public function getPriceText()
		{
			return $this->_PriceText;
		}
		public function setPriceText($PriceText)
		{
			$this->_PriceText = $PriceText;
		}
		public function getPrice()
		{
			return $this->_Price;
		}
		public function setPrice($Price)
		{
			$this->_Price = $Price;
		}
		public function getRetailPriceText()
		{
			return $this->_RetailPriceText;
		}
		public function setRetailPriceText($RetailPriceText)
		{
			$this->_RetailPriceText = $RetailPriceText;
		}
		public function getRetailPrice()
		{
			return $this->_RetailPrice;
		}
		public function setRetailPrice($RetailPrice)
		{
			$this->_RetailPrice = $RetailPrice;
		}
		public function getSalePriceText()
		{
			return $this->_SalePriceText;
		}
		public function setSalePriceText($SalePriceText)
		{
			$this->_SalePriceText = $SalePriceText;
		}
		public function getSalePrice()
		{
			return $this->_SalePrice;
		}
		public function setSalePrice($SalePrice)
		{
			$this->_SalePrice = $SalePrice;
		}
		public function getDetailText()
		{
			return $this->_DetailText;
		}
		public function setDetailText($DetailText)
		{
			$this->_DetailText = $DetailText;
		}
		public function getLastUpdateDate()
		{
			return $this->_LastUpdateDate;
		}
		public function setLastUpdateDate($LastUpdateDate)
		{
			$this->_LastUpdateDate = $LastUpdateDate;
		}
		public function getIsActive()
		{
			return $this->_IsActive;
		}
		public function setIsActive($IsActive)
		{
			$this->_IsActive = $IsActive;
		}
		public function getFeaturedProduct()
		{
			return $this->_FeaturedProduct;
		}
		public function setFeaturedProduct($FeaturedProduct)
		{
			$this->_FeaturedProduct = $FeaturedProduct;
		}
		public function getIsApproved()
		{
			return $this->_IsApproved;
		}
		public function setIsApproved($IsApproved)
		{
			$this->_IsApproved = $IsApproved;
		}
		public function getEnableComments()
		{
			return $this->_EnableComments;
		}
		public function setEnableComments($EnableComments)
		{
			$this->_EnableComments = $EnableComments;
		}
		public function getLastUpdateBy()
		{
			if ($this->_LastUpdateBy == NULL)
			{
				$this->_LastUpdateBy = 0;
			}
			return $this->_LastUpdateBy;
		}
		public function setLastUpdateBy($LastUpdateBy)
		{
			$this->_LastUpdateBy = $LastUpdateBy;
		}
		public function getOriginalImageURL()
		{
			return $this->_OriginalImageURL;
		}
		public function setOriginalImageURL($OriginalImageURL)
		{
			$this->_OriginalImageURL = $OriginalImageURL;
		}
		public function getLocalImageURL()
		{
			return $this->_LocalImageURL;
		}
		public function setLocalImageURL($LocalImageURL)
		{
			$this->_LocalImageURL = $LocalImageURL;
		}
		public function getPostURL()
		{
			return $this->_PostURL;
		}
		public function setPostURL($PostURL)
		{
			$this->_PostURL = $PostURL;
		}
		public function getScrapeError()
		{
			return $this->_ScrapeError;
		}
		public function setScrapeError($ScrapeError)
		{
			$this->_ScrapeError = $ScrapeError;
		}
		public function getItemGender()
		{
			return $this->_ItemGender;
		}
		public function setItemGender($ItemGender)
		{
			$this->_ItemGender = $ItemGender;
		}
		public function getItemSize()
		{
			return $this->_ItemSize;
		}
		public function setItemSize($ItemSize)
		{
			$this->_ItemSize = $ItemSize;
		}
		public function getItemAgeGroup()
		{
			return $this->_ItemAgeGroup;
		}
		public function setItemAgeGroup($ItemAgeGroup)
		{
			$this->_ItemAgeGroup = $ItemAgeGroup;
		}
		public function getSKU()
		{
			return $this->_SKU;
		}
		public function setSKU($SKU)
		{
			$this->_SKU = $SKU;
		}
		public function getUPC()
		{
			return $this->_UPC;
		}
		public function setUPC($UPC)
		{
			$this->_UPC = $UPC;
		}
		public function getInStock()
		{
			return $this->_InStock;
		}
		public function setInStock($InStock)
		{
			$this->_InStock = $InStock;
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
		public function getBrandName()
		{
			return $this->_BrandName;
		}
		public function setBrandName($BrandName)
		{
			$this->_BrandName = $BrandName;
		}
		public function getBrandLogo()
		{
			return $this->_BrandLogo;
		}
		public function setBrandLogo($BrandLogo)
		{
			$this->_BrandLogo = $BrandLogo;
		}
		public function getUserName()
		{
			return $this->_UserName;
		}
		public function setUserName($UserName)
		{
			$this->_UserName = $UserName;
		}
		public function getUserProfileImage()
		{
			return $this->_UserProfileImage;
		}
		public function setUserProfileImage($UserProfileImage)
		{
			$this->_UserProfileImage = $UserProfileImage;
		}
		public function getCategoryName()
		{
			return $this->_CategoryName;
		}
		public function setCategoryName($CategoryName)
		{
			$this->_CategoryName = $CategoryName;
		}
		public function getClippedByUser()
		{
			return $this->_ClippedByUser;
		}
		public function setClippedByUser($ClippedByUser)
		{
			$this->_ClippedByUser = $ClippedByUser;
		}
		public function getHeartByUser()
		{
			return $this->_HeartByUser;
		}
		public function setHeartByUser($HeartByUser)
		{
			$this->_HeartByUser = $HeartByUser;
		}
		public function getBuys()
		{
			if ($this->_Buys == NULL)
			{
				$this->_Buys = 0;
			}
			return $this->_Buys;
		}
		public function setBuys($Buys)
		{
			$this->_Buys = $Buys;
		}
		public function getPosterAppUserID()
		{
			if ($this->_PosterAppUserID == NULL)
			{
				$this->_PosterAppUserID = 0;
			}
			return $this->_PosterAppUserID;
		}
		public function setPosterAppUserID($PosterAppUserID)
		{
			$this->_PosterAppUserID = $PosterAppUserID;
		}
		public function getProductID()
		{
			return $this->_ProductID;
		}
		public function setProductID($ProductID)
		{
			$this->_ProductID = $ProductID;
		}
		public function getRating()
		{
			return $this->_Rating;
		}
		public function setRating($Rating)
		{
			$this->_Rating = $Rating;
		}
		public function getCatalogName()
		{
			return $this->_CatalogName;
		}
		public function setCatalogName($CatalogName)
		{
			$this->_CatalogName = $CatalogName;
		}
		public function getPostComments()
		{
			if ($this->_PostComments == NULL)
			{
				$this->_PostComments = array();
			}
			return $this->_PostComments;
		}
		public function setPostComments($postComments)
		{
			if ($postComments == NULL)
			{
				$postComments = array();
			}
			return $this->_PostComments = $postComments;
		}
	}
?>
