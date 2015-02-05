<?php
	include_once("basedal.php");
	include_once("brandheartsql.php");
	include_once("brandheartassembler.php");
	include_once("classes/domain/brandheart.php");


	///*****************************************************************
	///<summary>
	///Class Name: BrandHeart
	///Description: Data Access Layer
	///</summary>
	///*****************************************************************

	class BrandHeartDAL extends BaseDAL
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
		///Method Name: Insert
		///Description: Adds new Record to the Database
		///</summary>
		///*****************************************************************

		public function InsertBrandHeart($brandHeart, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$brandHeartSQL = new BrandHeartSQL($this->userInfo, $this->mysqli);
			$query = $brandHeartSQL->InsertBrandHeart($brandHeart);
			$this->logger->debug($query);
			try
			{
				$this->mysqli->query($query);
				$brandHeart->setBrandHeartID($this->mysqli->insert_id);
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

		public function UpdateBrandHeart($brandHeart, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$brandHeartSQL = new BrandHeartSQL($this->userInfo, $this->mysqli);
			$query = $brandHeartSQL->UpdateBrandHeart($brandHeart);
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
		///Method Name: SelectByAppUserID
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByAppUserID($AppUserID, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$brandHeartSQL = new BrandHeartSQL($this->userInfo, $this->mysqli);
			$query = $brandHeartSQL->SelectByAppUserID($AppUserID);
			$this->logger->debug($query);
			try
			{
				$result = $this->mysqli->query($query);
				$brandHeartAssembler = new BrandHeartAssembler($this->userInfo);
				$brandHearts = $brandHeartAssembler->AssembleList($result);
				$this->logger->debug("END");
				return $brandHearts;
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
			$brandHeartSQL = new BrandHeartSQL($this->userInfo, $this->mysqli);
			$query = $brandHeartSQL->SelectByBrandID($BrandID);
			$this->logger->debug($query);
			try
			{
				$result = $this->mysqli->query($query);
				$brandHeartAssembler = new BrandHeartAssembler($this->userInfo);
				$brandHearts = $brandHeartAssembler->AssembleList($result);
				$this->logger->debug("END");
				return $brandHearts;
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectByAppUserAndBrand
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByAppUserAndBrand($AppUserID, $BrandID, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$brandHeartSQL = new BrandHeartSQL($this->userInfo, $this->mysqli);
			$query = $brandHeartSQL->SelectByAppUserAndBrand($AppUserID, $BrandID);
			$this->logger->debug($query);
			try
			{
				$result = $this->mysqli->query($query);
				$brandHeartAssembler = new BrandHeartAssembler($this->userInfo);
				return $brandHeartAssembler->AssembleBrandHeart($result);
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
		}


	}
?>
