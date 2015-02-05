<?php


	include_once("basedal.php");


	///*****************************************************************
	///<summary>
	///Class Name: SQL
	///Description: Queries
	///</summary>
	///*****************************************************************

	class AuditLogSQL extends BaseDAL
	{
		private $_UserInfo;



		///*****************************************************************
		///<summary>
		///Constructor for AuditLogSQL
		///</summary>
		///*****************************************************************

		public function __construct($userInfo, $mysqli)
		{
			$this->_UserInfo = $userInfo;
			$this->mysqli = $mysqli;
		}




		///*****************************************************************
		///<summary>
		///Method Name: InsertAuditLog
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function InsertAuditLog($_auditlog)
		{
			$query = "insert into auditlog(";
			$query .= "elementtype,";
			$query .= "elementid,";
			$query .= "action,";
			$query .= "datadump,";
			$query .= "loginname,";
			$query .= "actiondate";
			$query .= ")";
			$query .= " values (";
			$query .= "'" . $this->CheckString($_auditlog->getElementType()) . "', ";
			$query .= $_auditlog->getElementID() . ",  ";
			$query .= "'" . $this->CheckString($_auditlog->getAction()) . "', ";
			$query .= "'" . $this->CheckString($_auditlog->getDataDump()) . "', ";
			$query .= "'" . $this->CheckString($_auditlog->getLoginName()) . "', ";
			$query .= $this->CheckDate($_auditlog->getActionDate());
			$query .= " )";
			return $query;
		}
	}
?>
