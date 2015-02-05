<?php
	include_once("classes/domain/paginatedlist.php");


	///*****************************************************************
	///<summary>
	///Class Name: PostShare
	///Description: Assembles PostShare
	///</summary>
	///*****************************************************************

	class PostShareAssembler
	{
		private $userInfo;
		private $logger;



		///*****************************************************************
		///<summary>
		///Constructor for PostShare
		///</summary>
		///*****************************************************************

		public function __construct($userInfo)
		{
			$this->userInfo = $userInfo;
			$this->logger = Logger::getLogger(__CLASS__);
		}




		///*****************************************************************
		///<summary>
		///Method Name: Assemble List of PostShare
		///Description: Assembles List of PostShare from Results
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
					$postShare = new PostShare();
					$postShare->setPostShareID($row['postshareid']);
					$postShare->setAppUserID($row['appuserid']);
					$postShare->setPostID($row['postid']);
					$postShare->setEmails($row['emails']);
					$postShare->setMessage($row['message']);
					$postShare->setCreateDate($row['createdate']);
					$postShare->setViewLink($row['viewlink']);
					$postShare->setViewed($row['viewed']);
					$postShare->setViewDate($row['viewdate']);
					$aList[] = $postShare;
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
		///Method Name: AssemblePostShare
		///Description: Assembles PostShare from DataReader
		///</summary>
		///*****************************************************************

		public function AssemblePostShare($result)
		{
			$this->logger->debug("START");
			$postShare = new PostShare();
			try
			{
				if (!mysqli_num_rows($result))
				{
					return $postShare;
				}
				if ($row = mysqli_fetch_array($result))
				{
					$postShare->setPostShareID($row['postshareid']);
					$postShare->setAppUserID($row['appuserid']);
					$postShare->setPostID($row['postid']);
					$postShare->setEmails($row['emails']);
					$postShare->setMessage($row['message']);
					$postShare->setCreateDate($row['createdate']);
					$postShare->setViewLink($row['viewlink']);
					$postShare->setViewed($row['viewed']);
					$postShare->setViewDate($row['viewdate']);
				}

			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
			$this->logger->debug("END");
			return $postShare;
		}


	}
?>
