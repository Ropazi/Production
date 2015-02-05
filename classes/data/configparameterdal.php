<?php
	include_once("basedal.php");
	include_once("configparametersql.php");
	include_once("configparameterassembler.php");
	include_once("classes/domain/configparameter.php");


	///*****************************************************************
	///<summary>
	///Class Name: ConfigParameter
	///Description: Data Access Layer
	///</summary>
	///*****************************************************************

	class ConfigParameterDAL extends BaseDAL
	{
		private $userInfo;
		private $logger;


		///*****************************************************************
		///<summary>
		///Constructor for ConfigParameter
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

		public function InsertConfigParameter($configParameter, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$configParameterSQL = new ConfigParameterSQL($this->userInfo, $this->mysqli);
			$query = $configParameterSQL->InsertConfigParameter($configParameter);
			$this->logger->debug($query);
			try
			{
				$this->mysqli->query($query);
				$configParameter->setParameterID($this->mysqli->insert_id);
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

		public function UpdateConfigParameter($configParameter, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$configParameterSQL = new ConfigParameterSQL($this->userInfo, $this->mysqli);
			$query = $configParameterSQL->UpdateConfigParameter($configParameter);
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
		///Method Name: SelectByParameterName
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByParameterName($ParameterName, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$configParameterSQL = new ConfigParameterSQL($this->userInfo, $this->mysqli);
			$query = $configParameterSQL->SelectByParameterName($ParameterName);
			$this->logger->debug($query);
			try
			{
				$result = $this->mysqli->query($query);
				$configParameterAssembler = new ConfigParameterAssembler($this->userInfo);
				return $configParameterAssembler->AssembleConfigParameter($result);
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

		public function SearchConfigParameter($ParameterName, $sortBy, $sortDirection, $PageSize, $PageIndex)
		{
			$this->logger->debug("START");
			$this->mysqli = $this->getMySQLI();
			$configparameterSQL = new ConfigParameterSQL($this->userInfo, $this->mysqli);
			$query = $configparameterSQL->SearchConfigParameter($ParameterName, $sortBy, $sortDirection, $PageSize, $PageIndex);
			$this->logger->debug($query);
			$result = $this->mysqli->query($query);
			$configParameterAssembler = new ConfigParameterAssembler($this->userInfo);
			$list = $configParameterAssembler->AssemblePaginatedList($result, $PageSize, $PageIndex, $sortBy, $sortDirection);
			$this->logger->debug("END");
			return $list;
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectByParameterID
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByParameterID($ParameterID, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$configParameterSQL = new ConfigParameterSQL($this->userInfo, $this->mysqli);
			$query = $configParameterSQL->SelectByParameterID($ParameterID);
			$this->logger->debug($query);
			try
			{
				$result = $this->mysqli->query($query);
				$configParameterAssembler = new ConfigParameterAssembler($this->userInfo);
				return $configParameterAssembler->AssembleConfigParameter($result);
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
		}


	}
?>
