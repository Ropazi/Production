<?php
	include_once("classes/domain/paginatedlist.php");


	///*****************************************************************
	///<summary>
	///Class Name: BrandStatistic
	///Description: Assembles BrandStatistic
	///</summary>
	///*****************************************************************

	class BrandStatisticAssembler
	{
		private $userInfo;
		private $logger;



		///*****************************************************************
		///<summary>
		///Constructor for BrandStatistic
		///</summary>
		///*****************************************************************

		public function __construct($userInfo)
		{
			$this->userInfo = $userInfo;
			$this->logger = Logger::getLogger(__CLASS__);
		}




		///*****************************************************************
		///<summary>
		///Method Name: Assemble List of BrandStatistic
		///Description: Assembles List of BrandStatistic from Results
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
					$_brandstatistic = new BrandStatistic();
					$_brandstatistic->setBrandStatisticID($row['brandstatisticid']);
					$_brandstatistic->setBrandID($row['brandid']);
					$_brandstatistic->setFollowers($row['followers']);
					$_brandstatistic->setPageViews($row['pageviews']);
					$_brandstatistic->setPostTags($row['posttags']);
					$_brandstatistic->setPostShares($row['postshares']);
					$_brandstatistic->setPostHearts($row['posthearts']);
					$aList[] = $_brandstatistic;
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
		///Method Name: AssembleBrandStatistic
		///Description: Assembles BrandStatistic from DataReader
		///</summary>
		///*****************************************************************

		public function AssembleBrandStatistic($result)
		{
			$this->logger->debug("START");
			$_brandstatistic = new BrandStatistic();
			try
			{
				if (!mysqli_num_rows($result))
				{
					return $_brandstatistic;
				}
				if ($row = mysqli_fetch_array($result))
				{
					$_brandstatistic->setBrandStatisticID($row['brandstatisticid']);
					$_brandstatistic->setBrandID($row['brandid']);
					$_brandstatistic->setFollowers($row['followers']);
					$_brandstatistic->setPageViews($row['pageviews']);
					$_brandstatistic->setPostTags($row['posttags']);
					$_brandstatistic->setPostShares($row['postshares']);
					$_brandstatistic->setPostHearts($row['posthearts']);
				}

			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
			$this->logger->debug("END");
			return $_brandstatistic;
		}


	}
?>
