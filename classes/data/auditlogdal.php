<?php
	include_once("basedal.php");
	include_once("auditlogsql.php");
	include_once("auditlogassembler.php");
	include_once("classes/domain/auditlog.php");


	///*****************************************************************
	///<summary>
	///Class Name: AuditLog
	///Description: Data Access Layer
	///</summary>
	///*****************************************************************

	class AuditLogDAL extends BaseDAL
	{
		private $userInfo;
		private $logger;


		///*****************************************************************
		///<summary>
		///Constructor for AuditLog
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

		public function InsertAuditLog($auditLog, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$auditLogSQL = new AuditLogSQL($this->userInfo, $this->mysqli);
			$query = $auditLogSQL->InsertAuditLog($auditLog);
			$this->logger->debug($query);
			try
			{
				$this->mysqli->query($query);
				$auditLog->setLogID($this->mysqli->insert_id);
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
