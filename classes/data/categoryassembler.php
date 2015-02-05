<?php
	include_once("classes/domain/paginatedlist.php");


	///*****************************************************************
	///<summary>
	///Class Name: Category
	///Description: Assembles Category
	///</summary>
	///*****************************************************************

	class CategoryAssembler
	{
		private $userInfo;
		private $logger;



		///*****************************************************************
		///<summary>
		///Constructor for Category
		///</summary>
		///*****************************************************************

		public function __construct($userInfo)
		{
			$this->userInfo = $userInfo;
			$this->logger = Logger::getLogger(__CLASS__);
		}




		///*****************************************************************
		///<summary>
		///Method Name: Assemble List of Category
		///Description: Assembles List of Category
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
						$category = new Category();
						$category->setCategoryID($row['categoryid']);
						$category->setCategoryName($row['categoryname']);
						$category->setParentCategoryID($row['parentcategoryid']);
						$category->setFiltered($row['filtered']);
						$category->setDisplayOrder($row['displayorder']);
						$aList[] = $category;
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
		///Method Name: Assemble List of Category
		///Description: Assembles List of Category from Results
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
					$category = new Category();
					$category->setCategoryID($row['categoryid']);
					$category->setCategoryName($row['categoryname']);
					$category->setParentCategoryID($row['parentcategoryid']);
					$category->setFiltered($row['filtered']);
					$category->setDisplayOrder($row['displayorder']);
					$aList[] = $category;
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
		///Method Name: AssembleCategory
		///Description: Assembles Category from DataReader
		///</summary>
		///*****************************************************************

		public function AssembleCategory($result)
		{
			$this->logger->debug("START");
			$category = new Category();
			try
			{
				if (!mysqli_num_rows($result))
				{
					return $category;
				}
				if ($row = mysqli_fetch_array($result))
				{
					$category->setCategoryID($row['categoryid']);
					$category->setCategoryName($row['categoryname']);
					$category->setParentCategoryID($row['parentcategoryid']);
					$category->setFiltered($row['filtered']);
					$category->setDisplayOrder($row['displayorder']);
				}

			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
			$this->logger->debug("END");
			return $category;
		}


	}
?>
