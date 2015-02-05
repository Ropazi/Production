<?php


	include_once("basedal.php");


	///*****************************************************************
	///<summary>
	///Class Name: SQL
	///Description: Queries
	///</summary>
	///*****************************************************************

	class BrandCategorySQL extends BaseDAL
	{
		private $_UserInfo;



		///*****************************************************************
		///<summary>
		///Constructor for BrandCategorySQL
		///</summary>
		///*****************************************************************

		public function __construct($userInfo, $mysqli)
		{
			$this->_UserInfo = $userInfo;
			$this->mysqli = $mysqli;
		}




		///*****************************************************************
		///<summary>
		///Method Name: SearchBrandCategory
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SearchBrandCategory($Name, $sortBy, $sortDirection, $PageSize, $PageIndex)
		{
			$query = "select * from brandcategories";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: InsertBrandCategory
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function InsertBrandCategory($_brandcategory)
		{
			$query = "insert into brandcategories(";
			$query .= "categoryname";
			$query .= ")";
			$query .= " values (";
			$query .= "'" . $this->CheckString($_brandcategory->getName()) . "'";
			$query .= " )";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: UpdateBrandCategory
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function UpdateBrandCategory($_brandcategory)
		{
			$query = "update brandcategories set ";
			$query .= "categoryname = '" . $this->CheckString($_brandcategory->getName()) . "'";
			$query .= " where brandcategoryid = " . $_brandcategory->getBrandCategoryID();
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: SelectByBrandCategoryID
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SelectByBrandCategoryID($BrandCategoryID)
		{
			$query = "select * from brandcategories where brandcategoryid = '" . $BrandCategoryID . "'";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: SelectAllBrandCategory
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SelectAllBrandCategory()
		{
			$query = "select * from brandcategories w order by categoryname asc";
			return $query;
		}
	}
?>
