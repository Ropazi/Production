<?php
	include_once("classes/domain/paginatedlist.php");


	///*****************************************************************
	///<summary>
	///Class Name: BrandFollower
	///Description: Assembles BrandFollower
	///</summary>
	///*****************************************************************

	class BrandFollowerAssembler
	{
		private $userInfo;
		private $logger;



		///*****************************************************************
		///<summary>
		///Constructor for BrandFollower
		///</summary>
		///*****************************************************************

		public function __construct($userInfo)
		{
			$this->userInfo = $userInfo;
			$this->logger = Logger::getLogger(__CLASS__);
		}




		///*****************************************************************
		///<summary>
		///Method Name: Assemble List of BrandFollower
		///Description: Assembles List of BrandFollower from Results
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
					$_brandfollower = new BrandFollower();
					$_brandfollower->setBrandFollowerID($row['brandfollowerid']);
					$_brandfollower->setBrandID($row['brandid']);
					$_brandfollower->setAppUserID($row['appuserid']);
					$_brandfollower->setCreateDate($row['createdate']);
					$_brandfollower->setIsFollowing($row['isfollowing']);
					$_brandfollower->setUnfollowDate($row['unfollowdate']);
					$aList[] = $_brandfollower;
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
		///Method Name: AssembleBrandFollower
		///Description: Assembles BrandFollower from DataReader
		///</summary>
		///*****************************************************************

		public function AssembleBrandFollower($result)
		{
			$this->logger->debug("START");
			$_brandfollower = new BrandFollower();
			try
			{
				if (!mysqli_num_rows($result))
				{
					return $_brandfollower;
				}
				if ($row = mysqli_fetch_array($result))
				{
					$_brandfollower->setBrandFollowerID($row['brandfollowerid']);
					$_brandfollower->setBrandID($row['brandid']);
					$_brandfollower->setAppUserID($row['appuserid']);
					$_brandfollower->setCreateDate($row['createdate']);
					$_brandfollower->setIsFollowing($row['isfollowing']);
					$_brandfollower->setUnfollowDate($row['unfollowdate']);
				}

			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
			$this->logger->debug("END");
			return $_brandfollower;
		}


	}
?>
