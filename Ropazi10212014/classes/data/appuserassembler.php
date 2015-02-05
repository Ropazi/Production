<?php
	include_once("classes/domain/paginatedlist.php");


	///*****************************************************************
	///<summary>
	///Class Name: AppUser
	///Description: Assembles AppUser
	///</summary>
	///*****************************************************************

	class AppUserAssembler
	{
		private $userInfo;
		private $logger;



		///*****************************************************************
		///<summary>
		///Constructor for AppUser
		///</summary>
		///*****************************************************************

		public function __construct($userInfo)
		{
			$this->userInfo = $userInfo;
			$this->logger = Logger::getLogger(__CLASS__);
		}




		///*****************************************************************
		///<summary>
		///Method Name: Assemble List of AppUser
		///Description: Assembles List of AppUser from Results
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
					$appUser = new AppUser();
					$appUser->setAppUserID($row['appuserid']);
					$appUser->setEmail($row['email']);
					$appUser->setUsername($row['username']);
					$appUser->setPassword($row['password']);
					$appUser->setFirstName($row['firstname']);
					$appUser->setLastName($row['lastname']);
					$appUser->setProfileImage($row['profileimage']);
					$appUser->setAboutMe($row['aboutme']);
					$appUser->setCity($row['city']);
					$appUser->setState($row['state']);
					$appUser->setWebsite($row['website']);
					$appUser->setFacebook($row['facebook']);
					$appUser->setTwitter($row['twitter']);
					$appUser->setLastLogin($row['lastlogin']);
					$appUser->setUserType($row['usertype']);
					$appUser->setCreateDate($row['createdate']);
					$appUser->setLastUpdateDate($row['lastupdatedate']);
					$appUser->setDisabled($row['disabled']);
					$appUser->setEmailVerified($row['emailverified']);
					$appUser->setSource($row['source']);
					$appUser->setClips($row['clips']);
					$appUser->setHearts($row['hearts']);
					$appUser->setFollowers($row['followers']);
					$appUser->setFollowing($row['following']);
					$appUser->setBuys($row['buys']);
					$aList[] = $appUser;
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
		///Method Name: AssembleAppUser
		///Description: Assembles AppUser from DataReader
		///</summary>
		///*****************************************************************

		public function AssembleAppUser($result)
		{
			$this->logger->debug("START");
			$appUser = new AppUser();
			try
			{
				if (!mysqli_num_rows($result))
				{
					return $appUser;
				}
				if ($row = mysqli_fetch_array($result))
				{
					$appUser->setAppUserID($row['appuserid']);
					$appUser->setEmail($row['email']);
					$appUser->setUsername($row['username']);
					$appUser->setPassword($row['password']);
					$appUser->setFirstName($row['firstname']);
					$appUser->setLastName($row['lastname']);
					$appUser->setProfileImage($row['profileimage']);
					$appUser->setAboutMe($row['aboutme']);
					$appUser->setCity($row['city']);
					$appUser->setState($row['state']);
					$appUser->setWebsite($row['website']);
					$appUser->setFacebook($row['facebook']);
					$appUser->setTwitter($row['twitter']);
					$appUser->setLastLogin($row['lastlogin']);
					$appUser->setUserType($row['usertype']);
					$appUser->setCreateDate($row['createdate']);
					$appUser->setLastUpdateDate($row['lastupdatedate']);
					$appUser->setDisabled($row['disabled']);
					$appUser->setEmailVerified($row['emailverified']);
					$appUser->setSource($row['source']);
					$appUser->setClips($row['clips']);
					$appUser->setHearts($row['hearts']);
					$appUser->setFollowers($row['followers']);
					$appUser->setFollowing($row['following']);
					$appUser->setBuys($row['buys']);
				}

			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
			$this->logger->debug("END");
			return $appUser;
		}




		///*****************************************************************
		///<summary>
		///Method Name: Assemble List of AppUser
		///Description: Assembles List of AppUser
		///</summary>
		///*****************************************************************

		public function AssemblePaginatedList($result, $PageSize, $PageIndex, $sortExpression, $sortDirection)
		{
			$this->logger->debug("START");
			$aList = array();
			$counter = 0;
			try
			{
				if (!mysqli_num_rows($result))
				{
					return new PaginatedList($aList, $counter, $PageSize, $PageIndex, $sortExpression, $sortDirection);
				}
				while ($row = mysqli_fetch_array($result))
				{
					if (($counter >= ($PageIndex * $PageSize)) && ($counter < (($PageIndex * $PageSize) + $PageSize)))
					{
						$appUser = new AppUser();
						$appUser->setAppUserID($row['appuserid']);
						$appUser->setEmail($row['email']);
						$appUser->setUsername($row['username']);
						$appUser->setPassword($row['password']);
						$appUser->setFirstName($row['firstname']);
						$appUser->setLastName($row['lastname']);
						$appUser->setProfileImage($row['profileimage']);
						$appUser->setAboutMe($row['aboutme']);
						$appUser->setCity($row['city']);
						$appUser->setState($row['state']);
						$appUser->setWebsite($row['website']);
						$appUser->setFacebook($row['facebook']);
						$appUser->setTwitter($row['twitter']);
						$appUser->setLastLogin($row['lastlogin']);
						$appUser->setUserType($row['usertype']);
						$appUser->setCreateDate($row['createdate']);
						$appUser->setLastUpdateDate($row['lastupdatedate']);
						$appUser->setDisabled($row['disabled']);
						$appUser->setEmailVerified($row['emailverified']);
						$appUser->setSource($row['source']);
						$appUser->setClips($row['clips']);
						$appUser->setHearts($row['hearts']);
						$appUser->setFollowers($row['followers']);
						$appUser->setFollowing($row['following']);
						$appUser->setBuys($row['buys']);
						$aList[] = $appUser;
					}
					$counter++;
				}
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}

			$this->logger->debug("END");
			return new PaginatedList($aList, $counter, $PageSize, $PageIndex, $sortExpression, $sortDirection);
		}




		///*****************************************************************
		///<summary>
		///Method Name: AssembleAppUser
		///Description: Assembles AppUser from DataReader
		///</summary>
		///*****************************************************************

		public function AssembleAppUserDetail($result)
		{
			$this->logger->debug("START");
			$appUser = new AppUser();
			try
			{
				if (!mysqli_num_rows($result))
				{
					return $appUser;
				}
				if ($row = mysqli_fetch_array($result))
				{
					$appUser->setAppUserID($row['appuserid']);
					$appUser->setEmail($row['email']);
					$appUser->setUsername($row['username']);
					$appUser->setPassword($row['password']);
					$appUser->setFirstName($row['firstname']);
					$appUser->setLastName($row['lastname']);
					$appUser->setProfileImage($row['profileimage']);
					$appUser->setAboutMe($row['aboutme']);
					$appUser->setCity($row['city']);
					$appUser->setState($row['state']);
					$appUser->setWebsite($row['website']);
					$appUser->setFacebook($row['facebook']);
					$appUser->setTwitter($row['twitter']);
					$appUser->setLastLogin($row['lastlogin']);
					$appUser->setUserType($row['usertype']);
					$appUser->setCreateDate($row['createdate']);
					$appUser->setLastUpdateDate($row['lastupdatedate']);
					$appUser->setDisabled($row['disabled']);
					$appUser->setEmailVerified($row['emailverified']);
					$appUser->setSource($row['source']);
					$appUser->setClips($row['clips']);
					$appUser->setHearts($row['hearts']);
					$appUser->setHeartedByUser($row['heartedbyuser']);
					$appUser->setFollowers($row['followers']);
					$appUser->setFollowing($row['following']);
					$appUser->setBuys($row['buys']);
				}

			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
			$this->logger->debug("END");
			return $appUser;
		}




		///*****************************************************************
		///<summary>
		///Method Name: Assemble List of AppUser
		///Description: Assembles List of AppUser from Results
		///</summary>
		///*****************************************************************

		public function AssembleAppUserList($result)
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
					$appUser = new AppUser();
					$appUser->setAppUserID($row['appuserid']);
					$appUser->setEmail($row['email']);
					$appUser->setUsername($row['username']);
					$appUser->setPassword($row['password']);
					$appUser->setFirstName($row['firstname']);
					$appUser->setLastName($row['lastname']);
					$appUser->setProfileImage($row['profileimage']);
					$appUser->setAboutMe($row['aboutme']);
					$appUser->setCity($row['city']);
					$appUser->setState($row['state']);
					$appUser->setWebsite($row['website']);
					$appUser->setFacebook($row['facebook']);
					$appUser->setTwitter($row['twitter']);
					$appUser->setLastLogin($row['lastlogin']);
					$appUser->setUserType($row['usertype']);
					$appUser->setCreateDate($row['createdate']);
					$appUser->setLastUpdateDate($row['lastupdatedate']);
					$appUser->setDisabled($row['disabled']);
					$appUser->setEmailVerified($row['emailverified']);
					$appUser->setSource($row['source']);
					$appUser->setClips($row['clips']);
					$appUser->setHearts($row['hearts']);
					$appUser->setHeartedByUser($row['heartedbyuser']);
					$appUser->setFollowers($row['followers']);
					$appUser->setFollowing($row['following']);
					$appUser->setBuys($row['buys']);
					$aList[] = $appUser;
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


	}
?>
