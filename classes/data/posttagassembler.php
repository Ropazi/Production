<?php
	include_once("classes/domain/paginatedlist.php");


	///*****************************************************************
	///<summary>
	///Class Name: PostTag
	///Description: Assembles PostTag
	///</summary>
	///*****************************************************************

	class PostTagAssembler
	{
		private $userInfo;
		private $logger;



		///*****************************************************************
		///<summary>
		///Constructor for PostTag
		///</summary>
		///*****************************************************************

		public function __construct($userInfo)
		{
			$this->userInfo = $userInfo;
			$this->logger = Logger::getLogger(__CLASS__);
		}




		///*****************************************************************
		///<summary>
		///Method Name: Assemble List of PostTag
		///Description: Assembles List of PostTag from Results
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
					$postTag = new PostTag();
					$postTag->setTagID($row['tagid']);
					$postTag->setAppUserID($row['appuserid']);
					$postTag->setPostID($row['postid']);
					$postTag->setCreateDate($row['createdate']);
					$postTag->setTaggedByAppUserID($row['taggedbyappuserid']);
					$postTag->setViewed($row['viewed']);
					$postTag->setViewDate($row['viewdate']);
					$aList[] = $postTag;
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
		///Method Name: AssemblePostTag
		///Description: Assembles PostTag from DataReader
		///</summary>
		///*****************************************************************

		public function AssemblePostTag($result)
		{
			$this->logger->debug("START");
			$postTag = new PostTag();
			try
			{
				if (!mysqli_num_rows($result))
				{
					return $postTag;
				}
				if ($row = mysqli_fetch_array($result))
				{
					$postTag->setTagID($row['tagid']);
					$postTag->setAppUserID($row['appuserid']);
					$postTag->setPostID($row['postid']);
					$postTag->setCreateDate($row['createdate']);
					$postTag->setTaggedByAppUserID($row['taggedbyappuserid']);
					$postTag->setViewed($row['viewed']);
					$postTag->setViewDate($row['viewdate']);
				}

			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
			$this->logger->debug("END");
			return $postTag;
		}


	}
?>
