<?php
	include_once("classes/domain/paginatedlist.php");


	///*****************************************************************
	///<summary>
	///Class Name: Brand
	///Description: Assembles Brand
	///</summary>
	///*****************************************************************

	class BrandAssembler
	{
		private $userInfo;
		private $logger;



		///*****************************************************************
		///<summary>
		///Constructor for Brand
		///</summary>
		///*****************************************************************

		public function __construct($userInfo)
		{
			$this->userInfo = $userInfo;
			$this->logger = Logger::getLogger(__CLASS__);
		}




		///*****************************************************************
		///<summary>
		///Method Name: Assemble List of Brand
		///Description: Assembles List of Brand from Results
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
					$brand = new Brand();
					$brand->setBrandID($row['brandid']);
					$brand->setBrandName($row['brandname']);
					$brand->setBrandCode($row['brandcode']);
					$brand->setAboutBrand($row['aboutbrand']);
					$brand->setWebsite($row['website']);
					$brand->setBrandCategoryID($row['brandcategoryid']);
					$brand->setBrandLogo($row['brandlogo']);
					$brand->setIsApproved($row['isapproved']);
					$brand->setCreateDate($row['createdate']);
					$brand->setLastUpdateDate($row['lastupdatedate']);
					$brand->setTier($row['tier']);
					$brand->setIsFeatured($row['isfeatured']);
					$brand->setClips($row['clips']);
					$brand->setHearts($row['hearts']);
					$brand->setFollowers($row['followers']);
					$aList[] = $brand;
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
		///Method Name: AssembleBrand
		///Description: Assembles Brand from DataReader
		///</summary>
		///*****************************************************************

		public function AssembleBrand($result)
		{
			$this->logger->debug("START");
			$brand = new Brand();
			try
			{
				if (!mysqli_num_rows($result))
				{
					return $brand;
				}
				if ($row = mysqli_fetch_array($result))
				{
					$brand->setBrandID($row['brandid']);
					$brand->setBrandName($row['brandname']);
					$brand->setBrandCode($row['brandcode']);
					$brand->setAboutBrand($row['aboutbrand']);
					$brand->setWebsite($row['website']);
					$brand->setBrandCategoryID($row['brandcategoryid']);
					$brand->setBrandLogo($row['brandlogo']);
					$brand->setIsApproved($row['isapproved']);
					$brand->setCreateDate($row['createdate']);
					$brand->setLastUpdateDate($row['lastupdatedate']);
					$brand->setTier($row['tier']);
					$brand->setIsFeatured($row['isfeatured']);
					$brand->setClips($row['clips']);
					$brand->setHearts($row['hearts']);
					$brand->setFollowers($row['followers']);
				}

			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
			$this->logger->debug("END");
			return $brand;
		}




		///*****************************************************************
		///<summary>
		///Method Name: Assemble List of Brand
		///Description: Assembles List of Brand
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
						$brand = new Brand();
						$brand->setBrandID($row['brandid']);
						$brand->setBrandName($row['brandname']);
						$brand->setBrandCode($row['brandcode']);
						$brand->setAboutBrand($row['aboutbrand']);
						$brand->setWebsite($row['website']);
						$brand->setBrandCategoryID($row['brandcategoryid']);
						$brand->setBrandLogo($row['brandlogo']);
						$brand->setIsApproved($row['isapproved']);
						$brand->setCreateDate($row['createdate']);
						$brand->setLastUpdateDate($row['lastupdatedate']);
						$brand->setTier($row['tier']);
						$brand->setIsFeatured($row['isfeatured']);
						$brand->setClips($row['clips']);
						$brand->setHearts($row['hearts']);
						$brand->setFollowers($row['followers']);
						$aList[] = $brand;
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
		///Method Name: AssembleBrand
		///Description: Assembles Brand from DataReader
		///</summary>
		///*****************************************************************

		public function AssembleBrandDetail($result)
		{
			$this->logger->debug("START");
			$brand = new Brand();
			try
			{
				if (!mysqli_num_rows($result))
				{
					return $brand;
				}
				if ($row = mysqli_fetch_array($result))
				{
					$brand->setBrandID($row['brandid']);
					$brand->setBrandName($row['brandname']);
					$brand->setBrandCode($row['brandcode']);
					$brand->setAboutBrand($row['aboutbrand']);
					$brand->setWebsite($row['website']);
					$brand->setBrandCategoryID($row['brandcategoryid']);
					$brand->setBrandLogo($row['brandlogo']);
					$brand->setIsApproved($row['isapproved']);
					$brand->setCreateDate($row['createdate']);
					$brand->setLastUpdateDate($row['lastupdatedate']);
					$brand->setTier($row['tier']);
					$brand->setIsFeatured($row['isfeatured']);
					$brand->setClips($row['clips']);
					$brand->setHearts($row['hearts']);
					$brand->setFollowers($row['followers']);
					$brand->setHeartByUser($row['heartbyuser']);
				}

			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
			$this->logger->debug("END");
			return $brand;
		}


	}
?>
