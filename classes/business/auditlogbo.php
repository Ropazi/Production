<?php
	include_once("classes/data/auditlogdal.php");
	include_once("classes/data/apptransaction.php");


	///*****************************************************************
	///<summary>
	///Class Name: AuditLog
	///Description: Entity Business Object
	///</summary>
	///*****************************************************************

	class AuditLogBO
	{
		private $_userinfo;


		///*****************************************************************
		///<summary>
		///Constructor for AuditLogBO
		///</summary>
		///*****************************************************************

		public function __construct($userinfo)
		{
			$this->_userinfo = $userinfo;
		}




		///*****************************************************************
		///<summary>
		///Method Name: Insert
		///Description: Adds new Record to the Database
		///</summary>
		///*****************************************************************

		public function InsertAuditLog($auditlog)
		{
			$tContext = new AppTransaction();
			$auditlogDAL = new AuditLogDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$auditlogDAL->InsertAuditLog($auditlog, $tContext);
				$tContext->CommitTransaction();
			}
			catch (Exception $ex)
			{
				$tContext->RollbackTransaction();
				throw $ex;
			}
		}


	}
?>
