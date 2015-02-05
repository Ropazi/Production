<?php
	include_once("classes/data/branddal.php");
	include_once("classes/data/apptransaction.php");


	///*****************************************************************
	///<summary>
	///Class Name: Brand
	///Description: Entity Business Object
	///</summary>
	///*****************************************************************

	class BrandBO
	{
		private $_userinfo;


		///*****************************************************************
		///<summary>
		///Constructor for BrandBO
		///</summary>
		///*****************************************************************

		public function __construct($userinfo)
		{
			$this->_userinfo = $userinfo;
		}




		///*****************************************************************
		///<summary>
		///Method Name: Insert
		///Description: Adds new Record to the Database
		///</summary>
		///*****************************************************************

		public function InsertBrand($brand)
		{
			$tContext = new AppTransaction();
			$brandDAL = new BrandDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$brandDAL->InsertBrand($brand, $tContext);
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

		public function UpdateBrand($brand)
		{
			$tContext = new AppTransaction();
			$brandDAL = new BrandDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$brandDAL->UpdateBrand($brand, $tContext);
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
		///Method Name: Search
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SearchBrand($BrandName, $BrandCode, $sortBy, $sortDirection, $PageSize, $PageIndex)
		{
			$brandDAL = new BrandDAL($this->_userinfo);
			return $brandDAL->SearchBrand($BrandName, $BrandCode, $sortBy, $sortDirection, $PageSize, $PageIndex);
		}




		///*****************************************************************
		///<summary>
		///Method Name: Update
		///Description: Updates Records in the Database
		///</summary>
		///*****************************************************************

		public function UpdateClips($brand)
		{
			$tContext = new AppTransaction();
			$brandDAL = new BrandDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$brandDAL->UpdateClips($brand, $tContext);
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

		public function UpdateHearts($brand)
		{
			$tContext = new AppTransaction();
			$brandDAL = new BrandDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$brandDAL->UpdateHearts($brand, $tContext);
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

		public function UpdateFollowers($brand)
		{
			$tContext = new AppTransaction();
			$brandDAL = new BrandDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$brandDAL->UpdateFollowers($brand, $tContext);
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
		///Method Name: SelectByBrandID
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByBrandID($BrandID)
		{
			$brandDAL = new BrandDAL($this->_userinfo);
			return $brandDAL->SelectByBrandID($BrandID, null);
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectByBrandCode
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByBrandCode($BrandCode)
		{
			$brandDAL = new BrandDAL($this->_userinfo);
			return $brandDAL->SelectByBrandCode($BrandCode, null);
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectByWebsite
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByWebsite($Website)
		{
			$brandDAL = new BrandDAL($this->_userinfo);
			return $brandDAL->SelectByWebsite($Website, null);
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectByBrandIDAndAppUserID
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByBrandIDAndAppUserID($BrandID, $AppUserID)
		{
			$brandDAL = new BrandDAL($this->_userinfo);
			return $brandDAL->SelectByBrandIDAndAppUserID($BrandID, $AppUserID, null);
		}


	}
?>
