<?php
	include_once("classes/data/posttagdal.php");
	include_once("classes/data/apptransaction.php");


	///*****************************************************************
	///<summary>
	///Class Name: PostTag
	///Description: Entity Business Object
	///</summary>
	///*****************************************************************

	class PostTagBO
	{
		private $_userinfo;


		///*****************************************************************
		///<summary>
		///Constructor for PostTagBO
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

		public function InsertPostTag($posttag)
		{
			$tContext = new AppTransaction();
			$posttagDAL = new PostTagDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$posttagDAL->InsertPostTag($posttag, $tContext);
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

		public function UpdatePostTag($posttag)
		{
			$tContext = new AppTransaction();
			$posttagDAL = new PostTagDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$posttagDAL->UpdatePostTag($posttag, $tContext);
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
			$postTagDAL = new PostTagDAL($this->_userinfo);
			return $postTagDAL->SelectByPostID($PostID, null);
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectNotViewedByAppUserID
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectNotViewedByAppUserID($AppUserID)
		{
			$postTagDAL = new PostTagDAL($this->_userinfo);
			return $postTagDAL->SelectNotViewedByAppUserID($AppUserID, null);
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectViewedByAppUserID
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectViewedByAppUserID($AppUserID)
		{
			$postTagDAL = new PostTagDAL($this->_userinfo);
			return $postTagDAL->SelectViewedByAppUserID($AppUserID, null);
		}


	}
?>
