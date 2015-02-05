<?php
	include_once("basedal.php");
	include_once("brandfollowersql.php");
	include_once("brandfollowerassembler.php");
	include_once("classes/domain/brandfollower.php");


	///*****************************************************************
	///<summary>
	///Class Name: BrandFollower
	///Description: Data Access Layer
	///</summary>
	///*****************************************************************

	class BrandFollowerDAL extends BaseDAL
	{
		private $userInfo;
		private $logger;


		///*****************************************************************
		///<summary>
		///Constructor for BrandFollower
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

		public function InsertBrandFollower($_brandfollower, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$_brandfollowerSQL = new BrandFollowerSQL($this->userInfo, $this->mysqli);
			$query = $_brandfollowerSQL->InsertBrandFollower($_brandfollower);
			$this->logger->debug($query);
			try
			{
				$this->mysqli->query($query);
				$_brandfollower->setBrandFollowerID($this->mysqli->insert_id);
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

		public function UpdateBrandFollower($_brandfollower, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$_brandfollowerSQL = new BrandFollowerSQL($this->userInfo, $this->mysqli);
			$query = $_brandfollowerSQL->UpdateBrandFollower($_brandfollower);
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
			$_brandfollowerSQL = new BrandFollowerSQL($this->userInfo, $this->mysqli);
			$query = $_brandfollowerSQL->SelectByBrandID($BrandID);
			$this->logger->debug($query);
			try
			{
				$result = $this->mysqli->query($query);
				$_BrandFollowerAssembler = new BrandFollowerAssembler($this->userInfo);
				$_BrandFollowers = $_BrandFollowerAssembler->AssembleList($result);
				$this->logger->debug("END");
				return $_BrandFollowers;
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
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
			$_brandfollowerSQL = new BrandFollowerSQL($this->userInfo, $this->mysqli);
			$query = $_brandfollowerSQL->SelectByAppUserID($AppUserID);
			$this->logger->debug($query);
			try
			{
				$result = $this->mysqli->query($query);
				$_BrandFollowerAssembler = new BrandFollowerAssembler($this->userInfo);
				$_BrandFollowers = $_BrandFollowerAssembler->AssembleList($result);
				$this->logger->debug("END");
				return $_BrandFollowers;
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
		}


	}
?>
