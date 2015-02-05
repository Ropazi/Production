<?php

	include_once("classes/domain/datatransferobject.php");


	///*****************************************************************
	///<summary>
	///Class Name: AuditLog
	///Description: Data Transfer Object
	///</summary>
	///*****************************************************************

	class AuditLog extends DataTransferObject
	{
		private $_LogID;
		private $_ElementType;
		private $_ElementID;
		private $_Action;
		private $_DataDump;
		private $_LoginName;
		private $_ActionDate;


		public function getLogID()
		{
			return $this->_LogID;
		}
		public function setLogID($LogID)
		{
			$this->_LogID = $LogID;
		}
		public function getElementType()
		{
			return $this->_ElementType;
		}
		public function setElementType($ElementType)
		{
			$this->_ElementType = $ElementType;
		}
		public function getElementID()
		{
			if ($this->_ElementID == NULL)
			{
				$this->_ElementID = 0;
			}
			return $this->_ElementID;
		}
		public function setElementID($ElementID)
		{
			$this->_ElementID = $ElementID;
		}
		public function getAction()
		{
			return $this->_Action;
		}
		public function setAction($Action)
		{
			$this->_Action = $Action;
		}
		public function getDataDump()
		{
			return $this->_DataDump;
		}
		public function setDataDump($DataDump)
		{
			$this->_DataDump = $DataDump;
		}
		public function getLoginName()
		{
			return $this->_LoginName;
		}
		public function setLoginName($LoginName)
		{
			$this->_LoginName = $LoginName;
		}
		public function getActionDate()
		{
			return $this->_ActionDate;
		}
		public function setActionDate($ActionDate)
		{
			$this->_ActionDate = $ActionDate;
		}
	}
?>
