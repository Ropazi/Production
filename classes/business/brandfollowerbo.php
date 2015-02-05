<?php
	include_once("classes/data/brandfollowerdal.php");
	include_once("classes/data/apptransaction.php");


	///*****************************************************************
	///<summary>
	///Class Name: BrandFollower
	///Description: Entity Business Object
	///</summary>
	///*****************************************************************

	class BrandFollowerBO
	{
		private $_userinfo;


		///*****************************************************************
		///<summary>
		///Constructor for BrandFollowerBO
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

		public function InsertBrandFollower($brandfollower)
		{
			$tContext = new AppTransaction();
			$brandfollowerDAL = new BrandFollowerDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$brandfollowerDAL->InsertBrandFollower($brandfollower, $tContext);
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

		public function UpdateBrandFollower($brandfollower)
		{
			$tContext = new AppTransaction();
			$brandfollowerDAL = new BrandFollowerDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$brandfollowerDAL->UpdateBrandFollower($brandfollower, $tContext);
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
			$_BrandFollowerDAL = new BrandFollowerDAL($this->_userinfo);
			return $_BrandFollowerDAL->SelectByBrandID($BrandID, null);
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectByAppUserID
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByAppUserID($AppUserID)
		{
			$_BrandFollowerDAL = new BrandFollowerDAL($this->_userinfo);
			return $_BrandFollowerDAL->SelectByAppUserID($AppUserID, null);
		}


	}
?>
