<?php
	include_once("classes/data/scraperuledal.php");
	include_once("classes/data/apptransaction.php");


	///*****************************************************************
	///<summary>
	///Class Name: ScrapeRule
	///Description: Entity Business Object
	///</summary>
	///*****************************************************************

	class ScrapeRuleBO
	{
		private $_userinfo;


		///*****************************************************************
		///<summary>
		///Constructor for ScrapeRuleBO
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

		public function SearchScrapeRule($BrandID, $RuleType, $sortBy, $sortDirection, $PageSize, $PageIndex)
		{
			$scrapeRuleDAL = new ScrapeRuleDAL($this->_userinfo);
			return $scrapeRuleDAL->SearchScrapeRule($BrandID, $RuleType, $sortBy, $sortDirection, $PageSize, $PageIndex);
		}




		///*****************************************************************
		///<summary>
		///Method Name: Insert
		///Description: Adds new Record to the Database
		///</summary>
		///*****************************************************************

		public function InsertScrapeRule($scraperule)
		{
			$tContext = new AppTransaction();
			$scraperuleDAL = new ScrapeRuleDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$scraperuleDAL->InsertScrapeRule($scraperule, $tContext);
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

		public function UpdateScrapeRule($scraperule)
		{
			$tContext = new AppTransaction();
			$scraperuleDAL = new ScrapeRuleDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$scraperuleDAL->UpdateScrapeRule($scraperule, $tContext);
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
		///Method Name: SelectByScrapeRuleID
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByScrapeRuleID($ScrapeRuleID)
		{
			$scrapeRuleDAL = new ScrapeRuleDAL($this->_userinfo);
			return $scrapeRuleDAL->SelectByScrapeRuleID($ScrapeRuleID, null);
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectByBrandID
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByBrandID($BrandID)
		{
			$scrapeRuleDAL = new ScrapeRuleDAL($this->_userinfo);
			return $scrapeRuleDAL->SelectByBrandID($BrandID, null);
		}


	}
?>
