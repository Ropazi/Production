<?php
	include_once("classes/domain/paginatedlist.php");


	///*****************************************************************
	///<summary>
	///Class Name: BrandCategory
	///Description: Assembles BrandCategory
	///</summary>
	///*****************************************************************

	class BrandCategoryAssembler
	{
		private $userInfo;
		private $logger;



		///*****************************************************************
		///<summary>
		///Constructor for BrandCategory
		///</summary>
		///*****************************************************************

		public function __construct($userInfo)
		{
			$this->userInfo = $userInfo;
			$this->logger = Logger::getLogger(__CLASS__);
		}




		///*****************************************************************
		///<summary>
		///Method Name: Assemble List of BrandCategory
		///Description: Assembles List of BrandCategory
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
						$brandCategory = new BrandCategory();
						$brandCategory->setBrandCategoryID($row['brandcategoryid']);
						$brandCategory->setName($row['categoryname']);
						$aList[] = $brandCategory;
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
		///Method Name: Assemble List of BrandCategory
		///Description: Assembles List of BrandCategory from Results
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
					$brandCategory = new BrandCategory();
					$brandCategory->setBrandCategoryID($row['brandcategoryid']);
					$brandCategory->setName($row['categoryname']);
					$aList[] = $brandCategory;
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
		///Method Name: AssembleBrandCategory
		///Description: Assembles BrandCategory from DataReader
		///</summary>
		///*****************************************************************

		public function AssembleBrandCategory($result)
		{
			$this->logger->debug("START");
			$brandCategory = new BrandCategory();
			try
			{
				if (!mysqli_num_rows($result))
				{
					return $brandCategory;
				}
				if ($row = mysqli_fetch_array($result))
				{
					$brandCategory->setBrandCategoryID($row['brandcategoryid']);
					$brandCategory->setName($row['categoryname']);
				}

			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
			$this->logger->debug("END");
			return $brandCategory;
		}


	}
?>
