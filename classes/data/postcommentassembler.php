<?php
	include_once("classes/domain/paginatedlist.php");


	///*****************************************************************
	///<summary>
	///Class Name: PostComment
	///Description: Assembles PostComment
	///</summary>
	///*****************************************************************

	class PostCommentAssembler
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
		///Method Name: Assemble List of PostComment
		///Description: Assembles List of PostComment from Results
		///</summary>
		///*****************************************************************

		public function AssembleList($result)
		{
			$this->logger->debug("START");
			$aList = array();
			try
			{
				if (!mysqli_num_rows($result))
				{
					return $aList;
				}
				while ($row = mysqli_fetch_array($result))
				{
					$postComment = new PostComment();
					$postComment->setPostCommentID($row['postcommentid']);
					$postComment->setPostID($row['postid']);
					$postComment->setAppUserID($row['appuserid']);
					$postComment->setThreadID($row['threadid']);
					$postComment->setCreateDate($row['createdate']);
					$postComment->setComments($row['comments']);
					$postComment->setIsRemoved($row['isremoved']);
					$aList[] = $postComment;
				}
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}

			$this->logger->debug("END");
			return $aList;
		}




		///*****************************************************************
		///<summary>
		///Method Name: AssemblePostComment
		///Description: Assembles PostComment from DataReader
		///</summary>
		///*****************************************************************

		public function AssemblePostComment($result)
		{
			$this->logger->debug("START");
			$postComment = new PostComment();
			try
			{
				if (!mysqli_num_rows($result))
				{
					return $postComment;
				}
				if ($row = mysqli_fetch_array($result))
				{
					$postComment->setPostCommentID($row['postcommentid']);
					$postComment->setPostID($row['postid']);
					$postComment->setAppUserID($row['appuserid']);
					$postComment->setThreadID($row['threadid']);
					$postComment->setCreateDate($row['createdate']);
					$postComment->setComments($row['comments']);
					$postComment->setIsRemoved($row['isremoved']);
				}

			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
			$this->logger->debug("END");
			return $postComment;
		}


	}
?>
