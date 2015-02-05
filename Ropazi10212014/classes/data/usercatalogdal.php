<?php
	include_once("basedal.php");
	include_once("usercatalogsql.php");
	include_once("usercatalogassembler.php");
	include_once("classes/domain/usercatalog.php");


	///*****************************************************************
	///<summary>
	///Class Name: UserCatalog
	///Description: Data Access Layer
	///</summary>
	///*****************************************************************

	class UserCatalogDAL extends BaseDAL
	{
		private $userInfo;
		private $logger;


		///*****************************************************************
		///<summary>
		///Constructor for UserCatalog
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

		public function InsertUserCatalog($userCatalog, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$userCatalogSQL = new UserCatalogSQL($this->userInfo, $this->mysqli);
			$query = $userCatalogSQL->InsertUserCatalog($userCatalog);
			$this->logger->debug($query);
			try
			{
				$this->mysqli->query($query);
				$userCatalog->setUserCatalogID($this->mysqli->insert_id);
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

		public function UpdateUserCatalog($userCatalog, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$userCatalogSQL = new UserCatalogSQL($this->userInfo, $this->mysqli);
			$query = $userCatalogSQL->UpdateUserCatalog($userCatalog);
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
			$userCatalogSQL = new UserCatalogSQL($this->userInfo, $this->mysqli);
			$query = $userCatalogSQL->SelectByAppUserID($AppUserID);
			$this->logger->debug($query);
			try
			{
				$result = $this->mysqli->query($query);
				$userCatalogAssembler = new UserCatalogAssembler($this->userInfo);
				$userCatalogs = $userCatalogAssembler->AssembleList($result);
				$this->logger->debug("END");
				return $userCatalogs;
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectByName
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByName($AppUserID, $CatalogName, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$userCatalogSQL = new UserCatalogSQL($this->userInfo, $this->mysqli);
			$query = $userCatalogSQL->SelectByName($AppUserID, $CatalogName);
			$this->logger->debug($query);
			try
			{
				$result = $this->mysqli->query($query);
				$userCatalogAssembler = new UserCatalogAssembler($this->userInfo);
				return $userCatalogAssembler->AssembleUserCatalog($result);
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
		}


	}
?>
