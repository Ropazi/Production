<?php
	include_once("classes/domain/paginatedlist.php");


	///*****************************************************************
	///<summary>
	///Class Name: UserCatalog
	///Description: Assembles UserCatalog
	///</summary>
	///*****************************************************************

	class UserCatalogAssembler
	{
		private $userInfo;
		private $logger;



		///*****************************************************************
		///<summary>
		///Constructor for UserCatalog
		///</summary>
		///*****************************************************************

		public function __construct($userInfo)
		{
			$this->userInfo = $userInfo;
			$this->logger = Logger::getLogger(__CLASS__);
		}




		///*****************************************************************
		///<summary>
		///Method Name: Assemble List of UserCatalog
		///Description: Assembles List of UserCatalog from Results
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
					$userCatalog = new UserCatalog();
					$userCatalog->setUserCatalogID($row['usercatalogid']);
					$userCatalog->setAppUserID($row['appuserid']);
					$userCatalog->setCatalogName($row['catalogname']);
					$userCatalog->setCreateDate($row['createdate']);
					$userCatalog->setClips($row['clips']);
					$aList[] = $userCatalog;
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
		///Method Name: AssembleUserCatalog
		///Description: Assembles UserCatalog from DataReader
		///</summary>
		///*****************************************************************

		public function AssembleUserCatalog($result)
		{
			$this->logger->debug("START");
			$userCatalog = new UserCatalog();
			try
			{
				if (!mysqli_num_rows($result))
				{
					return $userCatalog;
				}
				if ($row = mysqli_fetch_array($result))
				{
					$userCatalog->setUserCatalogID($row['usercatalogid']);
					$userCatalog->setAppUserID($row['appuserid']);
					$userCatalog->setCatalogName($row['catalogname']);
					$userCatalog->setCreateDate($row['createdate']);
					$userCatalog->setClips($row['clips']);
				}

			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
			$this->logger->debug("END");
			return $userCatalog;
		}


	}
?>
