<?php


	include_once("basedal.php");


	///*****************************************************************
	///<summary>
	///Class Name: SQL
	///Description: Queries
	///</summary>
	///*****************************************************************

	class EmailCampaignSQL extends BaseDAL
	{
		private $_UserInfo;



		///*****************************************************************
		///<summary>
		///Constructor for EmailCampaignSQL
		///</summary>
		///*****************************************************************

		public function __construct($userInfo, $mysqli)
		{
			$this->_UserInfo = $userInfo;
			$this->mysqli = $mysqli;
		}




		///*****************************************************************
		///<summary>
		///Method Name: InsertEmailCampaign
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function InsertEmailCampaign($_emailcampaign)
		{
			$query = "insert into emailcampaigns(";
			$query .= "companyid,";
			$query .= "campaignname,";
			$query .= "campaigntype,";
			$query .= "executiondate,";
			$query .= "executed,";
			$query .= "emailtemplate,";
			$query .= "starttime,";
			$query .= "endtime,";
			$query .= "totalrecords,";
			$query .= "startingrecord,";
			$query .= "totalemailed,";
			$query .= "includebusiness,";
			$query .= "includeuser,";
			$query .= "includeregistered,";
			$query .= "includeunsubscribed,";
			$query .= "clicks,";
			$query .= "referencedate,";
			$query .= "isapproved,";
			$query .= "testmode";
			$query .= ")";
			$query .= " values (";
			$query .= $_emailcampaign->getCompanyID() . ",  ";
			$query .= "'" . $this->CheckString($_emailcampaign->getCampaignName()) . "', ";
			$query .= "'" . $this->CheckString($_emailcampaign->getCampaignType()) . "', ";
			$query .= $this->CheckDate($_emailcampaign->getExecutionDate()). " , ";
			$query .= $this->CheckBoolean($_emailcampaign->getExecuted()) . " , ";
			$query .= "'" . $this->CheckString($_emailcampaign->getEmailTemplate()) . "', ";
			$query .= $this->CheckDate($_emailcampaign->getStartTime()). " , ";
			$query .= $this->CheckDate($_emailcampaign->getEndTime()). " , ";
			$query .= $_emailcampaign->getTotalRecords() . ",  ";
			$query .= $_emailcampaign->getStartingRecord() . ",  ";
			$query .= $_emailcampaign->getTotalEmailed() . ",  ";
			$query .= $this->CheckBoolean($_emailcampaign->getIncludeBusiness()) . " , ";
			$query .= $this->CheckBoolean($_emailcampaign->getIncludeUser()) . " , ";
			$query .= $this->CheckBoolean($_emailcampaign->getIncludeRegistered()) . " , ";
			$query .= $this->CheckBoolean($_emailcampaign->getIncludeUnsubscribed()) . " , ";
			$query .= $_emailcampaign->getClicks() . ",  ";
			$query .= $this->CheckDate($_emailcampaign->getReferenceDate()). " , ";
			$query .= $this->CheckBoolean($_emailcampaign->getIsApproved()) . " , ";
			$query .= $this->CheckBoolean($_emailcampaign->getTestMode()) ;
			$query .= " )";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: UpdateEmailCampaign
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function UpdateEmailCampaign($_emailcampaign)
		{
			$query = "update emailcampaigns set ";
			$query .= "campaignname = '" . $this->CheckString($_emailcampaign->getCampaignName()) . "', ";
			$query .= "campaigntype = '" . $this->CheckString($_emailcampaign->getCampaignType()) . "', ";
			$query .= "executiondate = " . $this->CheckDate($_emailcampaign->getExecutionDate()) . ", ";
			$query .= "executed = " . $this->CheckBoolean($_emailcampaign->getExecuted()) . " , ";
			$query .= "emailtemplate = '" . $this->CheckString($_emailcampaign->getEmailTemplate()) . "', ";
			$query .= "includebusiness = " . $this->CheckBoolean($_emailcampaign->getIncludeBusiness()) . " , ";
			$query .= "includeuser = " . $this->CheckBoolean($_emailcampaign->getIncludeUser()) . " , ";
			$query .= "includeregistered = " . $this->CheckBoolean($_emailcampaign->getIncludeRegistered()) . " , ";
			$query .= "includeunsubscribed = " . $this->CheckBoolean($_emailcampaign->getIncludeUnsubscribed()) . " , ";
			$query .= "referencedate = " . $this->CheckDate($_emailcampaign->getReferenceDate()) . ", ";
			$query .= "isapproved = " . $this->CheckBoolean($_emailcampaign->getIsApproved()) . " , ";
			$query .= "testmode = " . $this->CheckBoolean($_emailcampaign->getTestMode()) ;
			$query .= " where emailcampaignid = " . $_emailcampaign->getEmailCampaignID();
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: SelectByEmailCampaignID
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SelectByEmailCampaignID($EmailCampaignID)
		{
			$query = "select * from emailcampaigns where emailcampaignid = '" . $EmailCampaignID . "'";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: SelectByExecuted
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SelectByExecuted()
		{
			$query = "select * from emailcampaigns where Executed = '0' ";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: UpdateEmailCampaignDetails
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function UpdateEmailCampaignDetails($_emailcampaign)
		{
			$query = "update emailcampaigns set ";
			$query .= "executed = " . $this->CheckBoolean($_emailcampaign->getExecuted()) . " , ";
			$query .= "starttime = " . $this->CheckDate($_emailcampaign->getStartTime()) . ", ";
			$query .= "endtime = " . $this->CheckDate($_emailcampaign->getEndTime()) . ", ";
			$query .= "startingrecord = " . $_emailcampaign->getStartingRecord() . ",  ";
			$query .= "totalemailed = " . $_emailcampaign->getTotalEmailed() . " ";
			$query .= " where emailcampaignid = " . $_emailcampaign->getEmailCampaignID();
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: SearchEmailCampaign
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SearchEmailCampaign($CampaignName, $sortBy, $sortDirection, $PageSize, $PageIndex)
		{
			$query = "select * from emailcampaigns";
			return $query;
		}
	}
?>
