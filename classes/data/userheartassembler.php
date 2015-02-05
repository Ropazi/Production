<?php
	include_once("classes/domain/paginatedlist.php");


	///*****************************************************************
	///<summary>
	///Class Name: UserHeart
	///Description: Assembles UserHeart
	///</summary>
	///*****************************************************************

	class UserHeartAssembler
	{
		private $userInfo;
		private $logger;



		///*****************************************************************
		///<summary>
		///Constructor for UserHeart
		///</summary>
		///*****************************************************************

		public function __construct($userInfo)
		{
			$this->userInfo = $userInfo;
			$this->logger = Logger::getLogger(__CLASS__);
		}




		///*****************************************************************
		///<summary>
		///Method Name: Assemble List of UserHeart
		///Description: Assembles List of UserHeart from Results
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
					$userHeart = new UserHeart();
					$userHeart->setUserHeartID($row['userheartid']);
					$userHeart->setAppUserID($row['appuserid']);
					$userHeart->setHeartedByAppUserID($row['heartedbyappuserid']);
					$userHeart->setCreateDate($row['createdate']);
					$userHeart->setIsValid($row['isvalid']);
					$userHeart->setRemoveDate($row['removedate']);
					$aList[] = $userHeart;
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
		///Method Name: AssembleUserHeart
		///Description: Assembles UserHeart from DataReader
		///</summary>
		///*****************************************************************

		public function AssembleUserHeart($result)
		{
			$this->logger->debug("START");
			$userHeart = new UserHeart();
			try
			{
				if (!mysqli_num_rows($result))
				{
					return $userHeart;
				}
				if ($row = mysqli_fetch_array($result))
				{
					$userHeart->setUserHeartID($row['userheartid']);
					$userHeart->setAppUserID($row['appuserid']);
					$userHeart->setHeartedByAppUserID($row['heartedbyappuserid']);
					$userHeart->setCreateDate($row['createdate']);
					$userHeart->setIsValid($row['isvalid']);
					$userHeart->setRemoveDate($row['removedate']);
				}

			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
			$this->logger->debug("END");
			return $userHeart;
		}


	}
?>
