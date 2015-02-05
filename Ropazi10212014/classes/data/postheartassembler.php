<?php
	include_once("classes/domain/paginatedlist.php");


	///*****************************************************************
	///<summary>
	///Class Name: PostHeart
	///Description: Assembles PostHeart
	///</summary>
	///*****************************************************************

	class PostHeartAssembler
	{
		private $userInfo;
		private $logger;



		///*****************************************************************
		///<summary>
		///Constructor for PostHeart
		///</summary>
		///*****************************************************************

		public function __construct($userInfo)
		{
			$this->userInfo = $userInfo;
			$this->logger = Logger::getLogger(__CLASS__);
		}




		///*****************************************************************
		///<summary>
		///Method Name: Assemble List of PostHeart
		///Description: Assembles List of PostHeart from Results
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
					$postHeart = new PostHeart();
					$postHeart->setHeartID($row['heartid']);
					$postHeart->setAppUserID($row['appuserid']);
					$postHeart->setPostID($row['postid']);
					$postHeart->setCreateDate($row['createdate']);
					$postHeart->setIsValid($row['isvalid']);
					$postHeart->setRemoveDate($row['removedate']);
					$aList[] = $postHeart;
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
		///Method Name: AssemblePostHeart
		///Description: Assembles PostHeart from DataReader
		///</summary>
		///*****************************************************************

		public function AssemblePostHeart($result)
		{
			$this->logger->debug("START");
			$postHeart = new PostHeart();
			try
			{
				if (!mysqli_num_rows($result))
				{
					return $postHeart;
				}
				if ($row = mysqli_fetch_array($result))
				{
					$postHeart->setHeartID($row['heartid']);
					$postHeart->setAppUserID($row['appuserid']);
					$postHeart->setPostID($row['postid']);
					$postHeart->setCreateDate($row['createdate']);
					$postHeart->setIsValid($row['isvalid']);
					$postHeart->setRemoveDate($row['removedate']);
				}

			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
			$this->logger->debug("END");
			return $postHeart;
		}


	}
?>
