<?php
	include_once("classes/data/brandcategorydal.php");
	include_once("classes/data/apptransaction.php");


	///*****************************************************************
	///<summary>
	///Class Name: BrandCategory
	///Description: Entity Business Object
	///</summary>
	///*****************************************************************

	class BrandCategoryBO
	{
		private $_userinfo;


		///*****************************************************************
		///<summary>
		///Constructor for BrandCategoryBO
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

		public function SearchBrandCategory($Name, $sortBy, $sortDirection, $PageSize, $PageIndex)
		{
			$brandCategoryDAL = new BrandCategoryDAL($this->_userinfo);
			return $brandCategoryDAL->SearchBrandCategory($Name, $sortBy, $sortDirection, $PageSize, $PageIndex);
		}




		///*****************************************************************
		///<summary>
		///Method Name: Insert
		///Description: Adds new Record to the Database
		///</summary>
		///*****************************************************************

		public function InsertBrandCategory($brandcategory)
		{
			$tContext = new AppTransaction();
			$brandcategoryDAL = new BrandCategoryDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$brandcategoryDAL->InsertBrandCategory($brandcategory, $tContext);
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

		public function UpdateBrandCategory($brandcategory)
		{
			$tContext = new AppTransaction();
			$brandcategoryDAL = new BrandCategoryDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$brandcategoryDAL->UpdateBrandCategory($brandcategory, $tContext);
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
		///Method Name: SelectByBrandCategoryID
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByBrandCategoryID($BrandCategoryID)
		{
			$brandCategoryDAL = new BrandCategoryDAL($this->_userinfo);
			return $brandCategoryDAL->SelectByBrandCategoryID($BrandCategoryID, null);
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectAllBrandCategory
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectAllBrandCategory()
		{
			$brandCategoryDAL = new BrandCategoryDAL($this->_userinfo);
			return $brandCategoryDAL->SelectAllBrandCategory(null);
		}


	}
?>
