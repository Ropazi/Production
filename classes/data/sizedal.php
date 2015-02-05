<?php
	include_once("basedal.php");
	include_once("sizesql.php");
	include_once("sizeassembler.php");
	include_once("classes/domain/size.php");


	///*****************************************************************
	///<summary>
	///Class Name: Size
	///Description: Data Access Layer
	///</summary>
	///*****************************************************************

	class SizeDAL extends BaseDAL
	{
		private $userInfo;
		private $logger;


		///*****************************************************************
		///<summary>
		///Constructor for Size
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

		public function SearchSize($SizeName, $sortBy, $sortDirection, $PageSize, $PageIndex)
		{
			$this->logger->debug("START");
			$this->mysqli = $this->getMySQLI();
			$sizeSQL = new SizeSQL($this->userInfo, $this->mysqli);
			$query = $sizeSQL->SearchSize($SizeName, $sortBy, $sortDirection, $PageSize, $PageIndex);
			$this->logger->debug($query);
			$result = $this->mysqli->query($query);
			$sizeAssembler = new SizeAssembler($this->userInfo);
			$list = $sizeAssembler->AssemblePaginatedList($result, $PageSize, $PageIndex, $sortBy, $sortDirection);
			$this->logger->debug("END");
			return $list;
		}




		///*****************************************************************
		///<summary>
		///Method Name: Insert
		///Description: Adds new Record to the Database
		///</summary>
		///*****************************************************************

		public function InsertSize($size, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$sizeSQL = new SizeSQL($this->userInfo, $this->mysqli);
			$query = $sizeSQL->InsertSize($size);
			$this->logger->debug($query);
			try
			{
				$this->mysqli->query($query);
				$size->setSizeID($this->mysqli->insert_id);
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

		public function UpdateSize($size, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$sizeSQL = new SizeSQL($this->userInfo, $this->mysqli);
			$query = $sizeSQL->UpdateSize($size);
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
		///Method Name: SelectBySizeID
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectBySizeID($SizeID, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$sizeSQL = new SizeSQL($this->userInfo, $this->mysqli);
			$query = $sizeSQL->SelectBySizeID($SizeID);
			$this->logger->debug($query);
			try
			{
				$result = $this->mysqli->query($query);
				$sizeAssembler = new SizeAssembler($this->userInfo);
				return $sizeAssembler->AssembleSize($result);
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectAllSize
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectAllSize($transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$sizeSQL = new SizeSQL($this->userInfo, $this->mysqli);
			$query = $sizeSQL->SelectAllSize();
			$this->logger->debug($query);
			try
			{
				$result = $this->mysqli->query($query);
				$sizeAssembler = new SizeAssembler($this->userInfo);
				$sizes = $sizeAssembler->AssembleList($result);
				$this->logger->debug("END");
				return $sizes;
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
		}


	}
?>
