<?php
	include_once("classes/data/brandstatisticdal.php");
	include_once("classes/data/apptransaction.php");


	///*****************************************************************
	///<summary>
	///Class Name: BrandStatistic
	///Description: Entity Business Object
	///</summary>
	///*****************************************************************

	class BrandStatisticBO
	{
		private $_userinfo;


		///*****************************************************************
		///<summary>
		///Constructor for BrandStatisticBO
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

		public function InsertBrandStatistic($brandstatistic)
		{
			$tContext = new AppTransaction();
			$brandstatisticDAL = new BrandStatisticDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$brandstatisticDAL->InsertBrandStatistic($brandstatistic, $tContext);
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

		public function UpdateFollowers($brandstatistic)
		{
			$tContext = new AppTransaction();
			$brandstatisticDAL = new BrandStatisticDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$brandstatisticDAL->UpdateFollowers($brandstatistic, $tContext);
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

		public function UpdatePageViews($brandstatistic)
		{
			$tContext = new AppTransaction();
			$brandstatisticDAL = new BrandStatisticDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$brandstatisticDAL->UpdatePageViews($brandstatistic, $tContext);
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

		public function UpdateTags($brandstatistic)
		{
			$tContext = new AppTransaction();
			$brandstatisticDAL = new BrandStatisticDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$brandstatisticDAL->UpdateTags($brandstatistic, $tContext);
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

		public function UpdateShares($brandstatistic)
		{
			$tContext = new AppTransaction();
			$brandstatisticDAL = new BrandStatisticDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$brandstatisticDAL->UpdateShares($brandstatistic, $tContext);
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

		public function UpdateHearts($brandstatistic)
		{
			$tContext = new AppTransaction();
			$brandstatisticDAL = new BrandStatisticDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$brandstatisticDAL->UpdateHearts($brandstatistic, $tContext);
				$tContext->CommitTransaction();
			}
			catch (Exception $ex)
			{
				$tContext->RollbackTransaction();
				throw $ex;
			}
		}


	}
?>
