<?php
	include_once("classes/domain/paginatedlist.php");


	///*****************************************************************
	///<summary>
	///Class Name: BrandHeart
	///Description: Assembles BrandHeart
	///</summary>
	///*****************************************************************

	class BrandHeartAssembler
	{
		private $userInfo;
		private $logger;



		///*****************************************************************
		///<summary>
		///Constructor for BrandHeart
		///</summary>
		///*****************************************************************

		public function __construct($userInfo)
		{
			$this->userInfo = $userInfo;
			$this->logger = Logger::getLogger(__CLASS__);
		}




		///*****************************************************************
		///<summary>
		///Method Name: Assemble List of BrandHeart
		///Description: Assembles List of BrandHeart from Results
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
					$brandHeart = new BrandHeart();
					$brandHeart->setBrandHeartID($row['brandheartid']);
					$brandHeart->setAppUserID($row['appuserid']);
					$brandHeart->setBrandID($row['brandid']);
					$brandHeart->setCreateDate($row['createdate']);
					$brandHeart->setIsValid($row['isvalid']);
					$brandHeart->setRemoveDate($row['removedate']);
					$aList[] = $brandHeart;
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
		///Method Name: AssembleBrandHeart
		///Description: Assembles BrandHeart from DataReader
		///</summary>
		///*****************************************************************

		public function AssembleBrandHeart($result)
		{
			$this->logger->debug("START");
			$brandHeart = new BrandHeart();
			try
			{
				if (!mysqli_num_rows($result))
				{
					return $brandHeart;
				}
				if ($row = mysqli_fetch_array($result))
				{
					$brandHeart->setBrandHeartID($row['brandheartid']);
					$brandHeart->setAppUserID($row['appuserid']);
					$brandHeart->setBrandID($row['brandid']);
					$brandHeart->setCreateDate($row['createdate']);
					$brandHeart->setIsValid($row['isvalid']);
					$brandHeart->setRemoveDate($row['removedate']);
				}

			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
			$this->logger->debug("END");
			return $brandHeart;
		}


	}
?>
