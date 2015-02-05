<?php
	include_once("classes/data/emailcampaigndal.php");
	include_once("classes/data/apptransaction.php");


	///*****************************************************************
	///<summary>
	///Class Name: EmailCampaign
	///Description: Entity Business Object
	///</summary>
	///*****************************************************************

	class EmailCampaignBO
	{
		private $_userinfo;


		///*****************************************************************
		///<summary>
		///Constructor for EmailCampaignBO
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

		public function InsertEmailCampaign($emailcampaign)
		{
			$tContext = new AppTransaction();
			$emailcampaignDAL = new EmailCampaignDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$emailcampaignDAL->InsertEmailCampaign($emailcampaign, $tContext);
				$tContext->CommitTransaction();
			}
			catch (Exception $ex)
			{
				$tContext->RollbackTransaction();
				throw $ex;
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: Update
		///Description: Updates Records in the Database
		///</summary>
		///*****************************************************************

		public function UpdateEmailCampaign($emailcampaign)
		{
			$tContext = new AppTransaction();
			$emailcampaignDAL = new EmailCampaignDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$emailcampaignDAL->UpdateEmailCampaign($emailcampaign, $tContext);
				$tContext->CommitTransaction();
			}
			catch (Exception $ex)
			{
				$tContext->RollbackTransaction();
				throw $ex;
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: Update
		///Description: Updates Records in the Database
		///</summary>
		///*****************************************************************

		public function UpdateEmailCampaignDetails($emailcampaign)
		{
			$tContext = new AppTransaction();
			$emailcampaignDAL = new EmailCampaignDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$emailcampaignDAL->UpdateEmailCampaignDetails($emailcampaign, $tContext);
				$tContext->CommitTransaction();
			}
			catch (Exception $ex)
			{
				$tContext->RollbackTransaction();
				throw $ex;
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: Search
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SearchEmailCampaign($CampaignName, $sortBy, $sortDirection, $PageSize, $PageIndex)
		{
			$emailCampaignDAL = new EmailCampaignDAL($this->_userinfo);
			return $emailCampaignDAL->SearchEmailCampaign($CampaignName, $sortBy, $sortDirection, $PageSize, $PageIndex);
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectByEmailCampaignID
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByEmailCampaignID($EmailCampaignID)
		{
			$emailCampaignDAL = new EmailCampaignDAL($this->_userinfo);
			return $emailCampaignDAL->SelectByEmailCampaignID($EmailCampaignID, null);
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectByExecuted
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByExecuted()
		{
			$emailCampaignDAL = new EmailCampaignDAL($this->_userinfo);
			return $emailCampaignDAL->SelectByExecuted(null);
		}


	}
?>
