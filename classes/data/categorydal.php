<?php
	include_once("basedal.php");
	include_once("categorysql.php");
	include_once("categoryassembler.php");
	include_once("classes/domain/category.php");


	///*****************************************************************
	///<summary>
	///Class Name: Category
	///Description: Data Access Layer
	///</summary>
	///*****************************************************************

	class CategoryDAL extends BaseDAL
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
		///Method Name: Search
		///Description: Generic
		///</summary>
		///*****************************************************************

		public function SearchCategory($CategoryName, $sortBy, $sortDirection, $PageSize, $PageIndex)
		{
			$this->logger->debug("START");
			$this->mysqli = $this->getMySQLI();
			$categorySQL = new CategorySQL($this->userInfo, $this->mysqli);
			$query = $categorySQL->SearchCategory($CategoryName, $sortBy, $sortDirection, $PageSize, $PageIndex);
			$this->logger->debug($query);
			$result = $this->mysqli->query($query);
			$categoryAssembler = new CategoryAssembler($this->userInfo);
			$list = $categoryAssembler->AssemblePaginatedList($result, $PageSize, $PageIndex, $sortBy, $sortDirection);
			$this->logger->debug("END");
			return $list;
		}




		///*****************************************************************
		///<summary>
		///Method Name: Insert
		///Description: Adds new Record to the Database
		///</summary>
		///*****************************************************************

		public function InsertCategory($category, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$categorySQL = new CategorySQL($this->userInfo, $this->mysqli);
			$query = $categorySQL->InsertCategory($category);
			$this->logger->debug($query);
			try
			{
				$this->mysqli->query($query);
				$category->setCategoryID($this->mysqli->insert_id);
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

		public function UpdateCategory($category, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$categorySQL = new CategorySQL($this->userInfo, $this->mysqli);
			$query = $categorySQL->UpdateCategory($category);
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
		///Method Name: SelectByCategoryID
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByCategoryID($CategoryID, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$categorySQL = new CategorySQL($this->userInfo, $this->mysqli);
			$query = $categorySQL->SelectByCategoryID($CategoryID);
			$this->logger->debug($query);
			try
			{
				$result = $this->mysqli->query($query);
				$categoryAssembler = new CategoryAssembler($this->userInfo);
				return $categoryAssembler->AssembleCategory($result);
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectAllCategory
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectAllCategory($Filtered, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$categorySQL = new CategorySQL($this->userInfo, $this->mysqli);
			$query = $categorySQL->SelectAllCategory($Filtered);
			$this->logger->debug($query);
			try
			{
				$result = $this->mysqli->query($query);
				$categoryAssembler = new CategoryAssembler($this->userInfo);
				$categories = $categoryAssembler->AssembleList($result);
				$this->logger->debug("END");
				return $categories;
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectByParentCategoryID
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByParentCategoryID($ParentCategoryID, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$categorySQL = new CategorySQL($this->userInfo, $this->mysqli);
			$query = $categorySQL->SelectByParentCategoryID($ParentCategoryID);
			$this->logger->debug($query);
			try
			{
				$result = $this->mysqli->query($query);
				$categoryAssembler = new CategoryAssembler($this->userInfo);
				$categories = $categoryAssembler->AssembleList($result);
				$this->logger->debug("END");
				return $categories;
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
		}


	}
?>
