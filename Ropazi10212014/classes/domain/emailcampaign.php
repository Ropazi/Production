<?php

	include_once("classes/domain/datatransferobject.php");


	///*****************************************************************
	///<summary>
	///Class Name: EmailCampaign
	///Description: Data Transfer Object
	///</summary>
	///*****************************************************************

	class EmailCampaign extends DataTransferObject
	{
		private $_EmailCampaignID;
		private $_CompanyID;
		private $_CampaignName;
		private $_CampaignType;
		private $_ExecutionDate;
		private $_Executed;
		private $_EmailTemplate;
		private $_StartTime;
		private $_EndTime;
		private $_TotalRecords;
		private $_StartingRecord;
		private $_TotalEmailed;
		private $_IncludeBusiness;
		private $_IncludeUser;
		private $_IncludeRegistered;
		private $_IncludeUnsubscribed;
		private $_Clicks;
		private $_ReferenceDate;
		private $_IsApproved;
		private $_TestMode;


		public function getEmailCampaignID()
		{
			if ($this->_EmailCampaignID == NULL)
			{
				$this->_EmailCampaignID = 0;
			}
			return $this->_EmailCampaignID;
		}
		public function setEmailCampaignID($EmailCampaignID)
		{
			$this->_EmailCampaignID = $EmailCampaignID;
		}
		public function getCompanyID()
		{
			if ($this->_CompanyID == NULL)
			{
				$this->_CompanyID = 0;
			}
			return $this->_CompanyID;
		}
		public function setCompanyID($CompanyID)
		{
			$this->_CompanyID = $CompanyID;
		}
		public function getCampaignName()
		{
			return $this->_CampaignName;
		}
		public function setCampaignName($CampaignName)
		{
			$this->_CampaignName = $CampaignName;
		}
		public function getCampaignType()
		{
			return $this->_CampaignType;
		}
		public function setCampaignType($CampaignType)
		{
			$this->_CampaignType = $CampaignType;
		}
		public function getExecutionDate()
		{
			return $this->_ExecutionDate;
		}
		public function setExecutionDate($ExecutionDate)
		{
			$this->_ExecutionDate = $ExecutionDate;
		}
		public function getExecuted()
		{
			return $this->_Executed;
		}
		public function setExecuted($Executed)
		{
			$this->_Executed = $Executed;
		}
		public function getEmailTemplate()
		{
			return $this->_EmailTemplate;
		}
		public function setEmailTemplate($EmailTemplate)
		{
			$this->_EmailTemplate = $EmailTemplate;
		}
		public function getStartTime()
		{
			return $this->_StartTime;
		}
		public function setStartTime($StartTime)
		{
			$this->_StartTime = $StartTime;
		}
		public function getEndTime()
		{
			return $this->_EndTime;
		}
		public function setEndTime($EndTime)
		{
			$this->_EndTime = $EndTime;
		}
		public function getTotalRecords()
		{
			if ($this->_TotalRecords == NULL)
			{
				$this->_TotalRecords = 0;
			}
			return $this->_TotalRecords;
		}
		public function setTotalRecords($TotalRecords)
		{
			$this->_TotalRecords = $TotalRecords;
		}
		public function getStartingRecord()
		{
			if ($this->_StartingRecord == NULL)
			{
				$this->_StartingRecord = 0;
			}
			return $this->_StartingRecord;
		}
		public function setStartingRecord($StartingRecord)
		{
			$this->_StartingRecord = $StartingRecord;
		}
		public function getTotalEmailed()
		{
			if ($this->_TotalEmailed == NULL)
			{
				$this->_TotalEmailed = 0;
			}
			return $this->_TotalEmailed;
		}
		public function setTotalEmailed($TotalEmailed)
		{
			$this->_TotalEmailed = $TotalEmailed;
		}
		public function getIncludeBusiness()
		{
			return $this->_IncludeBusiness;
		}
		public function setIncludeBusiness($IncludeBusiness)
		{
			$this->_IncludeBusiness = $IncludeBusiness;
		}
		public function getIncludeUser()
		{
			return $this->_IncludeUser;
		}
		public function setIncludeUser($IncludeUser)
		{
			$this->_IncludeUser = $IncludeUser;
		}
		public function getIncludeRegistered()
		{
			return $this->_IncludeRegistered;
		}
		public function setIncludeRegistered($IncludeRegistered)
		{
			$this->_IncludeRegistered = $IncludeRegistered;
		}
		public function getIncludeUnsubscribed()
		{
			return $this->_IncludeUnsubscribed;
		}
		public function setIncludeUnsubscribed($IncludeUnsubscribed)
		{
			$this->_IncludeUnsubscribed = $IncludeUnsubscribed;
		}
		public function getClicks()
		{
			if ($this->_Clicks == NULL)
			{
				$this->_Clicks = 0;
			}
			return $this->_Clicks;
		}
		public function setClicks($Clicks)
		{
			$this->_Clicks = $Clicks;
		}
		public function getReferenceDate()
		{
			return $this->_ReferenceDate;
		}
		public function setReferenceDate($ReferenceDate)
		{
			$this->_ReferenceDate = $ReferenceDate;
		}
		public function getIsApproved()
		{
			return $this->_IsApproved;
		}
		public function setIsApproved($IsApproved)
		{
			$this->_IsApproved = $IsApproved;
		}
		public function getTestMode()
		{
			return $this->_TestMode;
		}
		public function setTestMode($TestMode)
		{
			$this->_TestMode = $TestMode;
		}
	}
?>
