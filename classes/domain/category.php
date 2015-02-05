<?php

	include_once("classes/domain/datatransferobject.php");


	///*****************************************************************
	///<summary>
	///Class Name: Category
	///Description: Data Transfer Object
	///</summary>
	///*****************************************************************

	class Category extends DataTransferObject
	{
		private $_CategoryID;
		private $_CategoryName;
		private $_ParentCategoryID;
		private $_Filtered;
		private $_DisplayOrder;


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
		public function getCategoryName()
		{
			return $this->_CategoryName;
		}
		public function setCategoryName($CategoryName)
		{
			$this->_CategoryName = $CategoryName;
		}
		public function getParentCategoryID()
		{
			if ($this->_ParentCategoryID == NULL)
			{
				$this->_ParentCategoryID = 0;
			}
			return $this->_ParentCategoryID;
		}
		public function setParentCategoryID($ParentCategoryID)
		{
			$this->_ParentCategoryID = $ParentCategoryID;
		}
		public function getFiltered()
		{
			return $this->_Filtered;
		}
		public function setFiltered($Filtered)
		{
			$this->_Filtered = $Filtered;
		}
		public function getDisplayOrder()
		{
			if ($this->_DisplayOrder == NULL)
			{
				$this->_DisplayOrder = 0;
			}
			return $this->_DisplayOrder;
		}
		public function setDisplayOrder($DisplayOrder)
		{
			$this->_DisplayOrder = $DisplayOrder;
		}
	}
?>
