<?php
	include_once("classes/data/categorydal.php");
	include_once("classes/data/apptransaction.php");


	///*****************************************************************
	///<summary>
	///Class Name: Category
	///Description: Entity Business Object
	///</summary>
	///*****************************************************************

	class CategoryBO
	{
		private $_userinfo;


		///*****************************************************************
		///<summary>
		///Constructor for CategoryBO
		///</summary>
		///*****************************************************************

		public function __construct($userinfo)
		{
			$this->_userinfo = $userinfo;
		}




		///*****************************************************************
		///<summary>
		///Method Name: Search
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SearchCategory($CategoryName, $sortBy, $sortDirection, $PageSize, $PageIndex)
		{
			$categoryDAL = new CategoryDAL($this->_userinfo);
			return $categoryDAL->SearchCategory($CategoryName, $sortBy, $sortDirection, $PageSize, $PageIndex);
		}




		///*****************************************************************
		///<summary>
		///Method Name: Insert
		///Description: Adds new Record to the Database
		///</summary>
		///*****************************************************************

		public function InsertCategory($category)
		{
			$tContext = new AppTransaction();
			$categoryDAL = new CategoryDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$categoryDAL->InsertCategory($category, $tContext);
				$tContext->CommitTransaction();
			}
			catch (Exception $ex)
			{
				$tContext->RollbackTransaction();
				throw $ex;
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: Update
		///Description: Updates Records in the Database
		///</summary>
		///*****************************************************************

		public function UpdateCategory($category)
		{
			$tContext = new AppTransaction();
			$categoryDAL = new CategoryDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$categoryDAL->UpdateCategory($category, $tContext);
				$tContext->CommitTransaction();
			}
			catch (Exception $ex)
			{
				$tContext->RollbackTransaction();
				throw $ex;
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectByCategoryID
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByCategoryID($CategoryID)
		{
			$categoryDAL = new CategoryDAL($this->_userinfo);
			return $categoryDAL->SelectByCategoryID($CategoryID, null);
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectAllCategory
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectAllCategory($Filtered)
		{
			$categoryDAL = new CategoryDAL($this->_userinfo);
			return $categoryDAL->SelectAllCategory($Filtered, null);
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectByParentCategoryID
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByParentCategoryID($ParentCategoryID)
		{
			$categoryDAL = new CategoryDAL($this->_userinfo);
			return $categoryDAL->SelectByParentCategoryID($ParentCategoryID, null);
		}


	}
?>
