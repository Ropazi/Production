<?php
	include_once("basedal.php");
	include_once("emailcampaignsql.php");
	include_once("emailcampaignassembler.php");
	include_once("classes/domain/emailcampaign.php");


	///*****************************************************************
	///<summary>
	///Class Name: EmailCampaign
	///Description: Data Access Layer
	///</summary>
	///*****************************************************************

	class EmailCampaignDAL extends BaseDAL
	{
		private $userInfo;
		private $logger;


		///*****************************************************************
		///<summary>
		///Constructor for EmailCampaign
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

		public function InsertEmailCampaign($emailCampaign, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$emailCampaignSQL = new EmailCampaignSQL($this->userInfo, $this->mysqli);
			$query = $emailCampaignSQL->InsertEmailCampaign($emailCampaign);
			$this->logger->debug($query);
			try
			{
				$this->mysqli->query($query);
				$emailCampaign->setEmailCampaignID($this->mysqli->insert_id);
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

		public function UpdateEmailCampaign($emailCampaign, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$emailCampaignSQL = new EmailCampaignSQL($this->userInfo, $this->mysqli);
			$query = $emailCampaignSQL->UpdateEmailCampaign($emailCampaign);
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
		///Method Name: SelectByEmailCampaignID
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByEmailCampaignID($EmailCampaignID, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$emailCampaignSQL = new EmailCampaignSQL($this->userInfo, $this->mysqli);
			$query = $emailCampaignSQL->SelectByEmailCampaignID($EmailCampaignID);
			$this->logger->debug($query);
			try
			{
				$result = $this->mysqli->query($query);
				$emailCampaignAssembler = new EmailCampaignAssembler($this->userInfo);
				return $emailCampaignAssembler->AssembleEmailCampaign($result);
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectByExecuted
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByExecuted($transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$emailCampaignSQL = new EmailCampaignSQL($this->userInfo, $this->mysqli);
			$query = $emailCampaignSQL->SelectByExecuted();
			$this->logger->debug($query);
			try
			{
				$result = $this->mysqli->query($query);
				$emailCampaignAssembler = new EmailCampaignAssembler($this->userInfo);
				$emailCampaigns = $emailCampaignAssembler->AssembleList($result);
				$this->logger->debug("END");
				return $emailCampaigns;
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: Update
		///Description: Update Record in the Database
		///</summary>
		///*****************************************************************

		public function UpdateEmailCampaignDetails($emailCampaign, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$emailCampaignSQL = new EmailCampaignSQL($this->userInfo, $this->mysqli);
			$query = $emailCampaignSQL->UpdateEmailCampaignDetails($emailCampaign);
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
		///Method Name: Search
		///Description: Generic
		///</summary>
		///*****************************************************************

		public function SearchEmailCampaign($CampaignName, $sortBy, $sortDirection, $PageSize, $PageIndex)
		{
			$this->logger->debug("START");
			$this->mysqli = $this->getMySQLI();
			$emailcampaignSQL = new EmailCampaignSQL($this->userInfo, $this->mysqli);
			$query = $emailcampaignSQL->SearchEmailCampaign($CampaignName, $sortBy, $sortDirection, $PageSize, $PageIndex);
			$this->logger->debug($query);
			$result = $this->mysqli->query($query);
			$emailCampaignAssembler = new EmailCampaignAssembler($this->userInfo);
			$list = $emailCampaignAssembler->AssemblePaginatedList($result, $PageSize, $PageIndex, $sortBy, $sortDirection);
			$this->logger->debug("END");
			return $list;
		}


	}
?>
