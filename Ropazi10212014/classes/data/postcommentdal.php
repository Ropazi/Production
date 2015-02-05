<?php
	include_once("basedal.php");
	include_once("postcommentsql.php");
	include_once("postcommentassembler.php");
	include_once("classes/domain/postcomment.php");


	///*****************************************************************
	///<summary>
	///Class Name: PostComment
	///Description: Data Access Layer
	///</summary>
	///*****************************************************************

	class PostCommentDAL extends BaseDAL
	{
		private $userInfo;
		private $logger;


		///*****************************************************************
		///<summary>
		///Constructor for PostComment
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

		public function InsertPostComment($postComment, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$postCommentSQL = new PostCommentSQL($this->userInfo, $this->mysqli);
			$query = $postCommentSQL->InsertPostComment($postComment);
			$this->logger->debug($query);
			try
			{
				$this->mysqli->query($query);
				$postComment->setPostCommentID($this->mysqli->insert_id);
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

		public function UpdateProductCommentStatus($postComment, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$postCommentSQL = new PostCommentSQL($this->userInfo, $this->mysqli);
			$query = $postCommentSQL->UpdateProductCommentStatus($postComment);
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
		///Method Name: SelectByPostCommentID
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByPostCommentID($PostCommentID, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$postCommentSQL = new PostCommentSQL($this->userInfo, $this->mysqli);
			$query = $postCommentSQL->SelectByPostCommentID($PostCommentID);
			$this->logger->debug($query);
			try
			{
				$result = $this->mysqli->query($query);
				$postCommentAssembler = new PostCommentAssembler($this->userInfo);
				return $postCommentAssembler->AssemblePostComment($result);
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectByPostID
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByPostID($PostID, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$postCommentSQL = new PostCommentSQL($this->userInfo, $this->mysqli);
			$query = $postCommentSQL->SelectByPostID($PostID);
			$this->logger->debug($query);
			try
			{
				$result = $this->mysqli->query($query);
				$postCommentAssembler = new PostCommentAssembler($this->userInfo);
				$postComments = $postCommentAssembler->AssembleList($result);
				$this->logger->debug("END");
				return $postComments;
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
		}


	}
?>
