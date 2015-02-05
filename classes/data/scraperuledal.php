<?php
	include_once("basedal.php");
	include_once("scraperulesql.php");
	include_once("scraperuleassembler.php");
	include_once("classes/domain/scraperule.php");


	///*****************************************************************
	///<summary>
	///Class Name: ScrapeRule
	///Description: Data Access Layer
	///</summary>
	///*****************************************************************

	class ScrapeRuleDAL extends BaseDAL
	{
		private $userInfo;
		private $logger;


		///*****************************************************************
		///<summary>
		///Constructor for ScrapeRule
		///</summary>
		///*****************************************************************

		public function __construct($userInfo)
		{
			$this->userInfo = $userInfo;
			$this->logger = Logger::getLogger(__CLASS__);
		}




		///*****************************************************************
		///<summary>
		///Method Name: Search
		///Description: Generic
		///</summary>
		///*****************************************************************

		public function SearchScrapeRule($BrandID, $RuleType, $sortBy, $sortDirection, $PageSize, $PageIndex)
		{
			$this->logger->debug("START");
			$this->mysqli = $this->getMySQLI();
			$scraperuleSQL = new ScrapeRuleSQL($this->userInfo, $this->mysqli);
			$query = $scraperuleSQL->SearchScrapeRule($BrandID, $RuleType, $sortBy, $sortDirection, $PageSize, $PageIndex);
			$this->logger->debug($query);
			$result = $this->mysqli->query($query);
			$scrapeRuleAssembler = new ScrapeRuleAssembler($this->userInfo);
			$list = $scrapeRuleAssembler->AssemblePaginatedList($result, $PageSize, $PageIndex, $sortBy, $sortDirection);
			$this->logger->debug("END");
			return $list;
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectByScrapeRuleID
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByScrapeRuleID($ScrapeRuleID, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$scrapeRuleSQL = new ScrapeRuleSQL($this->userInfo, $this->mysqli);
			$query = $scrapeRuleSQL->SelectByScrapeRuleID($ScrapeRuleID);
			$this->logger->debug($query);
			try
			{
				$result = $this->mysqli->query($query);
				$scrapeRuleAssembler = new ScrapeRuleAssembler($this->userInfo);
				return $scrapeRuleAssembler->AssembleScrapeRule($result);
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectByBrandID
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByBrandID($BrandID, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$scrapeRuleSQL = new ScrapeRuleSQL($this->userInfo, $this->mysqli);
			$query = $scrapeRuleSQL->SelectByBrandID($BrandID);
			$this->logger->debug($query);
			try
			{
				$result = $this->mysqli->query($query);
				$scrapeRuleAssembler = new ScrapeRuleAssembler($this->userInfo);
				$scrapeRules = $scrapeRuleAssembler->AssembleList($result);
				$this->logger->debug("END");
				return $scrapeRules;
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: Insert
		///Description: Adds new Record to the Database
		///</summary>
		///*****************************************************************

		public function InsertScrapeRule($scrapeRule, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$scrapeRuleSQL = new ScrapeRuleSQL($this->userInfo, $this->mysqli);
			$query = $scrapeRuleSQL->InsertScrapeRule($scrapeRule);
			$this->logger->debug($query);
			try
			{
				$this->mysqli->query($query);
				$scrapeRule->setScrapeRuleID($this->mysqli->insert_id);
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
			$this->logger->debug("END");
			return true;
		}




		///*****************************************************************
		///<summary>
		///Method Name: Update
		///Description: Update Record in the Database
		///</summary>
		///*****************************************************************

		public function UpdateScrapeRule($scrapeRule, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$scrapeRuleSQL = new ScrapeRuleSQL($this->userInfo, $this->mysqli);
			$query = $scrapeRuleSQL->UpdateScrapeRule($scrapeRule);
			$this->logger->debug($query);
			try
			{
				$this->mysqli->query($query);
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
			$this->logger->debug("END");
			return true;
		}


	}
?>
