<?php


	include_once("basedal.php");


	///*****************************************************************
	///<summary>
	///Class Name: SQL
	///Description: Queries
	///</summary>
	///*****************************************************************

	class CategorySQL extends BaseDAL
	{
		private $_UserInfo;



		///*****************************************************************
		///<summary>
		///Constructor for CategorySQL
		///</summary>
		///*****************************************************************

		public function __construct($userInfo, $mysqli)
		{
			$this->_UserInfo = $userInfo;
			$this->mysqli = $mysqli;
		}




		///*****************************************************************
		///<summary>
		///Method Name: SearchCategory
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SearchCategory($CategoryName, $sortBy, $sortDirection, $PageSize, $PageIndex)
		{
			$query = "select * from categories";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: InsertCategory
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function InsertCategory($_category)
		{
			$query = "insert into categories(";
			$query .= "categoryname,";
			$query .= "parentcategoryid,";
			$query .= "filtered,";
			$query .= "displayorder";
			$query .= ")";
			$query .= " values (";
			$query .= "'" . $this->CheckString($_category->getCategoryName()) . "', ";
			$query .= $_category->getParentCategoryID() . ",  ";
			$query .= $this->CheckBoolean($_category->getFiltered()) . " , ";
			$query .= $_category->getDisplayOrder() . " ";
			$query .= " )";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: UpdateCategory
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function UpdateCategory($_category)
		{
			$query = "update categories set ";
			$query .= "categoryname = '" . $this->CheckString($_category->getCategoryName()) . "', ";
			$query .= "parentcategoryid = " . $_category->getParentCategoryID() . ",  ";
			$query .= "filtered = " . $this->CheckBoolean($_category->getFiltered()) . " , ";
			$query .= "displayorder = " . $_category->getDisplayOrder() . " ";
			$query .= " where categoryid = " . $_category->getCategoryID();
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: SelectByCategoryID
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SelectByCategoryID($CategoryID)
		{
			$query = "select * from categories where categoryid = '" . $CategoryID . "'";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: SelectAllCategory
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SelectAllCategory($Filtered)
		{
			$query = "select * from categories where filtered = '" . $Filtered . "' order by categoryname asc";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: SelectByParentCategoryID
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SelectByParentCategoryID($ParentCategoryID)
		{
			$query = "select * from categories where parentcategoryid = '" . $ParentCategoryID . "'";
			return $query;
		}
	}
?>
