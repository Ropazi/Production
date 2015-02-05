<?php
	include_once("classes/domain/paginatedlist.php");


	///*****************************************************************
	///<summary>
	///Class Name: UserPost
	///Description: Assembles UserPost
	///</summary>
	///*****************************************************************

	class UserPostAssembler
	{
		private $userInfo;
		private $logger;



		///*****************************************************************
		///<summary>
		///Constructor for UserPost
		///</summary>
		///*****************************************************************

		public function __construct($userInfo)
		{
			$this->userInfo = $userInfo;
			$this->logger = Logger::getLogger(__CLASS__);
		}




		///*****************************************************************
		///<summary>
		///Method Name: Assemble List of UserPost
		///Description: Assembles List of UserPost from Results
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
					$userPost = new UserPost();
					$userPost->setUserPostID($row['userpostid']);
					$userPost->setPostID($row['postid']);
					$userPost->setAppUserID($row['appuserid']);
					$userPost->setUserCatalogID($row['usercatalogid']);
					$userPost->setCreateDate($row['createdate']);
					$userPost->setIsValid($row['isvalid']);
					$userPost->setRemoveDate($row['removedate']);
					$aList[] = $userPost;
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
		///Method Name: AssembleUserPost
		///Description: Assembles UserPost from DataReader
		///</summary>
		///*****************************************************************

		public function AssembleUserPost($result)
		{
			$this->logger->debug("START");
			$userPost = new UserPost();
			try
			{
				if (!mysqli_num_rows($result))
				{
					return $userPost;
				}
				if ($row = mysqli_fetch_array($result))
				{
					$userPost->setUserPostID($row['userpostid']);
					$userPost->setPostID($row['postid']);
					$userPost->setAppUserID($row['appuserid']);
					$userPost->setUserCatalogID($row['usercatalogid']);
					$userPost->setCreateDate($row['createdate']);
					$userPost->setIsValid($row['isvalid']);
					$userPost->setRemoveDate($row['removedate']);
				}

			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
			$this->logger->debug("END");
			return $userPost;
		}


	}
?>
