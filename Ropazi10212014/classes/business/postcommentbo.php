<?php
	include_once("classes/data/postcommentdal.php");
	include_once("classes/data/apptransaction.php");


	///*****************************************************************
	///<summary>
	///Class Name: PostComment
	///Description: Entity Business Object
	///</summary>
	///*****************************************************************

	class PostCommentBO
	{
		private $_userinfo;


		///*****************************************************************
		///<summary>
		///Constructor for PostCommentBO
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

		public function InsertPostComment($postcomment)
		{
			$tContext = new AppTransaction();
			$postcommentDAL = new PostCommentDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$postcommentDAL->InsertPostComment($postcomment, $tContext);
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

		public function UpdateProductCommentStatus($postcomment)
		{
			$tContext = new AppTransaction();
			$postcommentDAL = new PostCommentDAL($this->_userinfo);
			try
			{
				$tContext->BeginTransaction();
				$postcommentDAL->UpdateProductCommentStatus($postcomment, $tContext);
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
		///Method Name: SelectByPostCommentID
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByPostCommentID($PostCommentID)
		{
			$postCommentDAL = new PostCommentDAL($this->_userinfo);
			return $postCommentDAL->SelectByPostCommentID($PostCommentID, null);
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectByPostID
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByPostID($PostID)
		{
			$postCommentDAL = new PostCommentDAL($this->_userinfo);
			return $postCommentDAL->SelectByPostID($PostID, null);
		}


	}
?>
