<?php

	include_once("classes/domain/datatransferobject.php");


	///*****************************************************************
	///<summary>
	///Class Name: BrandCategory
	///Description: Data Transfer Object
	///</summary>
	///*****************************************************************

	class BrandCategory extends DataTransferObject
	{
		private $_BrandCategoryID;
		private $_Name;


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
		public function getName()
		{
			return $this->_Name;
		}
		public function setName($Name)
		{
			$this->_Name = $Name;
		}
	}
?>
