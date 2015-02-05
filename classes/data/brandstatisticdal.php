<?php
	include_once("basedal.php");
	include_once("brandstatisticsql.php");
	include_once("brandstatisticassembler.php");
	include_once("classes/domain/brandstatistic.php");


	///*****************************************************************
	///<summary>
	///Class Name: BrandStatistic
	///Description: Data Access Layer
	///</summary>
	///*****************************************************************

	class BrandStatisticDAL extends BaseDAL
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
		///Method Name: Insert
		///Description: Adds new Record to the Database
		///</summary>
		///*****************************************************************

		public function InsertBrandStatistic($_brandstatistic, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$_brandstatisticSQL = new BrandStatisticSQL($this->userInfo, $this->mysqli);
			$query = $_brandstatisticSQL->InsertBrandStatistic($_brandstatistic);
			$this->logger->debug($query);
			try
			{
				$this->mysqli->query($query);
				$_brandstatistic->setBrandStatisticID($this->mysqli->insert_id);
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

		public function UpdateFollowers($_brandstatistic, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$_brandstatisticSQL = new BrandStatisticSQL($this->userInfo, $this->mysqli);
			$query = $_brandstatisticSQL->UpdateFollowers($_brandstatistic);
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

		public function UpdatePageViews($_brandstatistic, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$_brandstatisticSQL = new BrandStatisticSQL($this->userInfo, $this->mysqli);
			$query = $_brandstatisticSQL->UpdatePageViews($_brandstatistic);
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

		public function UpdateTags($_brandstatistic, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$_brandstatisticSQL = new BrandStatisticSQL($this->userInfo, $this->mysqli);
			$query = $_brandstatisticSQL->UpdateTags($_brandstatistic);
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

		public function UpdateShares($_brandstatistic, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$_brandstatisticSQL = new BrandStatisticSQL($this->userInfo, $this->mysqli);
			$query = $_brandstatisticSQL->UpdateShares($_brandstatistic);
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

		public function UpdateHearts($_brandstatistic, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$_brandstatisticSQL = new BrandStatisticSQL($this->userInfo, $this->mysqli);
			$query = $_brandstatisticSQL->UpdateHearts($_brandstatistic);
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


	}
?>
