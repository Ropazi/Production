<?php
	include_once("classes/domain/paginatedlist.php");


	///*****************************************************************
	///<summary>
	///Class Name: ScrapeRule
	///Description: Assembles ScrapeRule
	///</summary>
	///*****************************************************************

	class ScrapeRuleAssembler
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
		///Method Name: Assemble List of ScrapeRule
		///Description: Assembles List of ScrapeRule
		///</summary>
		///*****************************************************************

		public function AssemblePaginatedList($result, $PageSize, $PageIndex, $sortExpression, $sortDirection)
		{
			$this->logger->debug("START");
			$aList = array();
			$counter = 0;
			try
			{
				if (!mysqli_num_rows($result))
				{
					return new PaginatedList($aList, $counter, $PageSize, $PageIndex, $sortExpression, $sortDirection);
				}
				while ($row = mysqli_fetch_array($result))
				{
					if (($counter >= ($PageIndex * $PageSize)) && ($counter < (($PageIndex * $PageSize) + $PageSize)))
					{
						$scrapeRule = new ScrapeRule();
						$scrapeRule->setScrapeRuleID($row['scraperuleid']);
						$scrapeRule->setBrandID($row['brandid']);
						$scrapeRule->setRuleType($row['ruletype']);
						$scrapeRule->setSelector($row['selector']);
						$scrapeRule->setElementType($row['elementtype']);
						$scrapeRule->setNotes($row['notes']);
						$aList[] = $scrapeRule;
					}
					$counter++;
				}
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}

			$this->logger->debug("END");
			return new PaginatedList($aList, $counter, $PageSize, $PageIndex, $sortExpression, $sortDirection);
		}




		///*****************************************************************
		///<summary>
		///Method Name: Assemble List of ScrapeRule
		///Description: Assembles List of ScrapeRule from Results
		///</summary>
		///*****************************************************************

		public function AssembleList($result)
		{
			$this->logger->debug("START");
			$aList = array();
			try
			{
				if (!mysqli_num_rows($result))
				{
					return $aList;
				}
				while ($row = mysqli_fetch_array($result))
				{
					$scrapeRule = new ScrapeRule();
					$scrapeRule->setScrapeRuleID($row['scraperuleid']);
					$scrapeRule->setBrandID($row['brandid']);
					$scrapeRule->setRuleType($row['ruletype']);
					$scrapeRule->setSelector($row['selector']);
					$scrapeRule->setElementType($row['elementtype']);
					$scrapeRule->setNotes($row['notes']);
					$aList[] = $scrapeRule;
				}
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}

			$this->logger->debug("END");
			return $aList;
		}




		///*****************************************************************
		///<summary>
		///Method Name: AssembleScrapeRule
		///Description: Assembles ScrapeRule from DataReader
		///</summary>
		///*****************************************************************

		public function AssembleScrapeRule($result)
		{
			$this->logger->debug("START");
			$scrapeRule = new ScrapeRule();
			try
			{
				if (!mysqli_num_rows($result))
				{
					return $scrapeRule;
				}
				if ($row = mysqli_fetch_array($result))
				{
					$scrapeRule->setScrapeRuleID($row['scraperuleid']);
					$scrapeRule->setBrandID($row['brandid']);
					$scrapeRule->setRuleType($row['ruletype']);
					$scrapeRule->setSelector($row['selector']);
					$scrapeRule->setElementType($row['elementtype']);
					$scrapeRule->setNotes($row['notes']);
				}

			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
			$this->logger->debug("END");
			return $scrapeRule;
		}


	}
?>
