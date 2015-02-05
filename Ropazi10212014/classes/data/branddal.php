<?php
	include_once("basedal.php");
	include_once("brandsql.php");
	include_once("brandassembler.php");
	include_once("classes/domain/brand.php");


	///*****************************************************************
	///<summary>
	///Class Name: Brand
	///Description: Data Access Layer
	///</summary>
	///*****************************************************************

	class BrandDAL extends BaseDAL
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
		///Method Name: Insert
		///Description: Adds new Record to the Database
		///</summary>
		///*****************************************************************

		public function InsertBrand($brand, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$brandSQL = new BrandSQL($this->userInfo, $this->mysqli);
			$query = $brandSQL->InsertBrand($brand);
			$this->logger->debug($query);
			try
			{
				$this->mysqli->query($query);
				$brand->setBrandID($this->mysqli->insert_id);
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

		public function UpdateBrand($brand, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$brandSQL = new BrandSQL($this->userInfo, $this->mysqli);
			$query = $brandSQL->UpdateBrand($brand);
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
		///Method Name: SelectByBrandID
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByBrandID($BrandID, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$brandSQL = new BrandSQL($this->userInfo, $this->mysqli);
			$query = $brandSQL->SelectByBrandID($BrandID);
			$this->logger->debug($query);
			try
			{
				$result = $this->mysqli->query($query);
				$brandAssembler = new BrandAssembler($this->userInfo);
				return $brandAssembler->AssembleBrand($result);
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectByBrandCode
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByBrandCode($BrandCode, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$brandSQL = new BrandSQL($this->userInfo, $this->mysqli);
			$query = $brandSQL->SelectByBrandCode($BrandCode);
			$this->logger->debug($query);
			try
			{
				$result = $this->mysqli->query($query);
				$brandAssembler = new BrandAssembler($this->userInfo);
				return $brandAssembler->AssembleBrand($result);
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: Search
		///Description: Generic
		///</summary>
		///*****************************************************************

		public function SearchBrand($BrandName, $BrandCode, $sortBy, $sortDirection, $PageSize, $PageIndex)
		{
			$this->logger->debug("START");
			$this->mysqli = $this->getMySQLI();
			$brandSQL = new BrandSQL($this->userInfo, $this->mysqli);
			$query = $brandSQL->SearchBrand($BrandName, $BrandCode, $sortBy, $sortDirection, $PageSize, $PageIndex);
			$this->logger->debug($query);
			$result = $this->mysqli->query($query);
			$brandAssembler = new BrandAssembler($this->userInfo);
			$list = $brandAssembler->AssemblePaginatedList($result, $PageSize, $PageIndex, $sortBy, $sortDirection);
			$this->logger->debug("END");
			return $list;
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectByWebsite
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByWebsite($Website, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$brandSQL = new BrandSQL($this->userInfo, $this->mysqli);
			$query = $brandSQL->SelectByWebsite($Website);
			$this->logger->debug($query);
			try
			{
				$result = $this->mysqli->query($query);
				$brandAssembler = new BrandAssembler($this->userInfo);
				return $brandAssembler->AssembleBrand($result);
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: Update
		///Description: Update Record in the Database
		///</summary>
		///*****************************************************************

		public function UpdateClips($brand, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$brandSQL = new BrandSQL($this->userInfo, $this->mysqli);
			$query = $brandSQL->UpdateClips($brand);
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
		///Method Name: Update
		///Description: Update Record in the Database
		///</summary>
		///*****************************************************************

		public function UpdateHearts($brand, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$brandSQL = new BrandSQL($this->userInfo, $this->mysqli);
			$query = $brandSQL->UpdateHearts($brand);
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
		///Method Name: Update
		///Description: Update Record in the Database
		///</summary>
		///*****************************************************************

		public function UpdateFollowers($brand, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$brandSQL = new BrandSQL($this->userInfo, $this->mysqli);
			$query = $brandSQL->UpdateFollowers($brand);
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
		///Method Name: SelectByBrandIDAndAppUserID
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByBrandIDAndAppUserID($BrandID, $AppUserID, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$brandSQL = new BrandSQL($this->userInfo, $this->mysqli);
			$query = $brandSQL->SelectByBrandIDAndAppUserID($BrandID, $AppUserID);
			$this->logger->debug($query);
			try
			{
				$result = $this->mysqli->query($query);
				$brandAssembler = new BrandAssembler($this->userInfo);
				return $brandAssembler->AssembleBrandDetail($result);
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
		}


	}
?>
