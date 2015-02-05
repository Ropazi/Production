<?php
	include_once("classes/data/postsharedal.php");
	include_once("classes/data/apptransaction.php");


	///*****************************************************************
	///<summary>
	///Class Name: PostShare
	///Description: Entity Business Object
	///</summary>
	///*****************************************************************

	class PostShareBO
	{
		private $_userinfo;


		///*****************************************************************
		///<summary>
		///Constructor for PostShareBO
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

		public function InsertPostShare($postshare)
		{
			$tContext = new AppTransaction();
			$postshareDAL = new PostShareDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$postshareDAL->InsertPostShare($postshare, $tContext);
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

		public function UpdatePostShare($postshare)
		{
			$tContext = new AppTransaction();
			$postshareDAL = new PostShareDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$postshareDAL->UpdatePostShare($postshare, $tContext);
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
		///Method Name: SelectByPostID
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByPostID($PostID)
		{
			$postShareDAL = new PostShareDAL($this->_userinfo);
			return $postShareDAL->SelectByPostID($PostID, null);
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectByAppUserID
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByAppUserID($AppUserID)
		{
			$postShareDAL = new PostShareDAL($this->_userinfo);
			return $postShareDAL->SelectByAppUserID($AppUserID, null);
		}


	}
?>
