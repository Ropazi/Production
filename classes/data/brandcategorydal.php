<?php
	include_once("basedal.php");
	include_once("brandcategorysql.php");
	include_once("brandcategoryassembler.php");
	include_once("classes/domain/brandcategory.php");


	///*****************************************************************
	///<summary>
	///Class Name: BrandCategory
	///Description: Data Access Layer
	///</summary>
	///*****************************************************************

	class BrandCategoryDAL extends BaseDAL
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
		///Method Name: Search
		///Description: Generic
		///</summary>
		///*****************************************************************

		public function SearchBrandCategory($Name, $sortBy, $sortDirection, $PageSize, $PageIndex)
		{
			$this->logger->debug("START");
			$this->mysqli = $this->getMySQLI();
			$brandcategorySQL = new BrandCategorySQL($this->userInfo, $this->mysqli);
			$query = $brandcategorySQL->SearchBrandCategory($Name, $sortBy, $sortDirection, $PageSize, $PageIndex);
			$this->logger->debug($query);
			$result = $this->mysqli->query($query);
			$brandCategoryAssembler = new BrandCategoryAssembler($this->userInfo);
			$list = $brandCategoryAssembler->AssemblePaginatedList($result, $PageSize, $PageIndex, $sortBy, $sortDirection);
			$this->logger->debug("END");
			return $list;
		}




		///*****************************************************************
		///<summary>
		///Method Name: Insert
		///Description: Adds new Record to the Database
		///</summary>
		///*****************************************************************

		public function InsertBrandCategory($brandCategory, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$brandCategorySQL = new BrandCategorySQL($this->userInfo, $this->mysqli);
			$query = $brandCategorySQL->InsertBrandCategory($brandCategory);
			$this->logger->debug($query);
			try
			{
				$this->mysqli->query($query);
				$brandCategory->setBrandCategoryID($this->mysqli->insert_id);
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

		public function UpdateBrandCategory($brandCategory, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$brandCategorySQL = new BrandCategorySQL($this->userInfo, $this->mysqli);
			$query = $brandCategorySQL->UpdateBrandCategory($brandCategory);
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




		///*****************************************************************
		///<summary>
		///Method Name: SelectByBrandCategoryID
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByBrandCategoryID($BrandCategoryID, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$brandCategorySQL = new BrandCategorySQL($this->userInfo, $this->mysqli);
			$query = $brandCategorySQL->SelectByBrandCategoryID($BrandCategoryID);
			$this->logger->debug($query);
			try
			{
				$result = $this->mysqli->query($query);
				$brandCategoryAssembler = new BrandCategoryAssembler($this->userInfo);
				return $brandCategoryAssembler->AssembleBrandCategory($result);
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectAllBrandCategory
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectAllBrandCategory($transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$brandCategorySQL = new BrandCategorySQL($this->userInfo, $this->mysqli);
			$query = $brandCategorySQL->SelectAllBrandCategory();
			$this->logger->debug($query);
			try
			{
				$result = $this->mysqli->query($query);
				$brandCategoryAssembler = new BrandCategoryAssembler($this->userInfo);
				$brandCategories = $brandCategoryAssembler->AssembleList($result);
				$this->logger->debug("END");
				return $brandCategories;
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
		}


	}
?>
