<?php
	include_once("classes/domain/paginatedlist.php");


	///*****************************************************************
	///<summary>
	///Class Name: AuditLog
	///Description: Assembles AuditLog
	///</summary>
	///*****************************************************************

	class AuditLogAssembler
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
		///Method Name: Assemble List of AuditLog
		///Description: Assembles List of AuditLog from Results
		///</summary>
		///*****************************************************************

		public function AssembleList($result)
		{
			$this->logger->debug("START");
			$aList = array();
			try
			{
				if (!mysqli_num_rows($result))
				{
					return $aList;
				}
				while ($row = mysqli_fetch_array($result))
				{
					$auditLog = new AuditLog();
					$auditLog->setLogID($row['logid']);
					$auditLog->setElementType($row['elementtype']);
					$auditLog->setElementID($row['elementid']);
					$auditLog->setAction($row['action']);
					$auditLog->setDataDump($row['datadump']);
					$auditLog->setLoginName($row['loginname']);
					$auditLog->setActionDate($row['actiondate']);
					$aList[] = $auditLog;
				}
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}

			$this->logger->debug("END");
			return $aList;
		}




		///*****************************************************************
		///<summary>
		///Method Name: AssembleAuditLog
		///Description: Assembles AuditLog from DataReader
		///</summary>
		///*****************************************************************

		public function AssembleAuditLog($result)
		{
			$this->logger->debug("START");
			$auditLog = new AuditLog();
			try
			{
				if (!mysqli_num_rows($result))
				{
					return $auditLog;
				}
				if ($row = mysqli_fetch_array($result))
				{
					$auditLog->setLogID($row['logid']);
					$auditLog->setElementType($row['elementtype']);
					$auditLog->setElementID($row['elementid']);
					$auditLog->setAction($row['action']);
					$auditLog->setDataDump($row['datadump']);
					$auditLog->setLoginName($row['loginname']);
					$auditLog->setActionDate($row['actiondate']);
				}

			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
			$this->logger->debug("END");
			return $auditLog;
		}


	}
?>
