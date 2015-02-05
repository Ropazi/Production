<?php
	include_once("classes/domain/paginatedlist.php");


	///*****************************************************************
	///<summary>
	///Class Name: UserChildren
	///Description: Assembles UserChildren
	///</summary>
	///*****************************************************************

	class UserChildrenAssembler
	{
		private $userInfo;
		private $logger;



		///*****************************************************************
		///<summary>
		///Constructor for UserChildren
		///</summary>
		///*****************************************************************

		public function __construct($userInfo)
		{
			$this->userInfo = $userInfo;
			$this->logger = Logger::getLogger(__CLASS__);
		}




		///*****************************************************************
		///<summary>
		///Method Name: Assemble List of UserChildren
		///Description: Assembles List of UserChildren from Results
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
					$userChildren = new UserChildren();
					$userChildren->setUserChildrenID($row['userchildrenid']);
					$userChildren->setAppUserID($row['appuserid']);
					$userChildren->setGender($row['gender']);
					$userChildren->setDateOfBirth($row['dateofbirth']);
					$userChildren->setDisplayAge($row['displayage']);
					$userChildren->setAge($row['age']);
					$aList[] = $userChildren;
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
		///Method Name: AssembleUserChildren
		///Description: Assembles UserChildren from DataReader
		///</summary>
		///*****************************************************************

		public function AssembleUserChildren($result)
		{
			$this->logger->debug("START");
			$userChildren = new UserChildren();
			try
			{
				if (!mysqli_num_rows($result))
				{
					return $userChildren;
				}
				if ($row = mysqli_fetch_array($result))
				{
					$userChildren->setUserChildrenID($row['userchildrenid']);
					$userChildren->setAppUserID($row['appuserid']);
					$userChildren->setGender($row['gender']);
					$userChildren->setDateOfBirth($row['dateofbirth']);
					$userChildren->setDisplayAge($row['displayage']);
					$userChildren->setAge($row['age']);
				}

			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
			$this->logger->debug("END");
			return $userChildren;
		}


	}
?>
