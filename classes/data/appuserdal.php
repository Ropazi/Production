<?php
	include_once("basedal.php");
	include_once("appusersql.php");
	include_once("appuserassembler.php");
	include_once("classes/domain/appuser.php");


	///*****************************************************************
	///<summary>
	///Class Name: AppUser
	///Description: Data Access Layer
	///</summary>
	///*****************************************************************

	class AppUserDAL extends BaseDAL
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
		///Method Name: Insert
		///Description: Adds new Record to the Database
		///</summary>
		///*****************************************************************

		public function InsertAppUser($appUser, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$appUserSQL = new AppUserSQL($this->userInfo, $this->mysqli);
			$query = $appUserSQL->InsertAppUser($appUser);
			$this->logger->debug($query);
			try
			{
				$this->mysqli->query($query);
				$appUser->setAppUserID($this->mysqli->insert_id);
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
			$this->logger->debug("END");
			return true;
		}




		///*****************************************************************
		///<summary>
		///Method Name: Update
		///Description: Update Record in the Database
		///</summary>
		///*****************************************************************

		public function UpdateAppUser($appUser, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$appUserSQL = new AppUserSQL($this->userInfo, $this->mysqli);
			$query = $appUserSQL->UpdateAppUser($appUser);
			$this->logger->debug($query);
			try
			{
				$this->mysqli->query($query);
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
			$this->logger->debug("END");
			return true;
		}



		///*****************************************************************
		///<summary>
		///Method Name: Update
		///Description: Update Record in the Database
		///</summary>
		///*****************************************************************
		
		public function UpdateAppUserLastLogin($appUser, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$appUserSQL = new AppUserSQL($this->userInfo, $this->mysqli);
			$query = $appUserSQL->UpdateAppUserLastLogin($appUser);
			$this->logger->debug($query);
			try
			{
				$this->mysqli->query($query);
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
			$this->logger->debug("END");
			return true;
		}
		


		///*****************************************************************
		///<summary>
		///Method Name: Search
		///Description: Generic
		///</summary>
		///*****************************************************************

		public function SearchAppUser($Email, $sortBy, $sortDirection, $PageSize, $PageIndex)
		{
			$this->logger->debug("START");
			$this->mysqli = $this->getMySQLI();
			$appuserSQL = new AppUserSQL($this->userInfo, $this->mysqli);
			$query = $appuserSQL->SearchAppUser($Email, $sortBy, $sortDirection, $PageSize, $PageIndex);
			$this->logger->debug($query);
			$result = $this->mysqli->query($query);
			$appUserAssembler = new AppUserAssembler($this->userInfo);
			$list = $appUserAssembler->AssemblePaginatedList($result, $PageSize, $PageIndex, $sortBy, $sortDirection);
			$this->logger->debug("END");
			return $list;
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectByAppUserID
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByAppUserID($AppUserID, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$appUserSQL = new AppUserSQL($this->userInfo, $this->mysqli);
			$query = $appUserSQL->SelectByAppUserID($AppUserID);
			$this->logger->debug($query);
			try
			{
				$result = $this->mysqli->query($query);
				$appUserAssembler = new AppUserAssembler($this->userInfo);
				return $appUserAssembler->AssembleAppUser($result);
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectByUsername
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByUsername($Username, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$appUserSQL = new AppUserSQL($this->userInfo, $this->mysqli);
			$query = $appUserSQL->SelectByUsername($Username);
			$this->logger->debug($query);
			try
			{
				$result = $this->mysqli->query($query);
				$appUserAssembler = new AppUserAssembler($this->userInfo);
				return $appUserAssembler->AssembleAppUser($result);
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectByEmail
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByEmail($Email, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$appUserSQL = new AppUserSQL($this->userInfo, $this->mysqli);
			$query = $appUserSQL->SelectByEmail($Email);
			$this->logger->debug($query);
			try
			{
				$result = $this->mysqli->query($query);
				$appUserAssembler = new AppUserAssembler($this->userInfo);
				return $appUserAssembler->AssembleAppUser($result);
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: Update
		///Description: Update Record in the Database
		///</summary>
		///*****************************************************************

		public function UpdateProfile($appUser, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$appUserSQL = new AppUserSQL($this->userInfo, $this->mysqli);
			$query = $appUserSQL->UpdateProfile($appUser);
			$this->logger->debug($query);
			try
			{
				$this->mysqli->query($query);
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
			$this->logger->debug("END");
			return true;
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectAllAppUser
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectAllAppUser($transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$appUserSQL = new AppUserSQL($this->userInfo, $this->mysqli);
			$query = $appUserSQL->SelectAllAppUser();
			$this->logger->debug($query);
			try
			{
				$result = $this->mysqli->query($query);
				$appUserAssembler = new AppUserAssembler($this->userInfo);
				$appUsers = $appUserAssembler->AssembleList($result);
				$this->logger->debug("END");
				return $appUsers;
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: Update
		///Description: Update Record in the Database
		///</summary>
		///*****************************************************************

		public function UpdateClips($appUser, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$appUserSQL = new AppUserSQL($this->userInfo, $this->mysqli);
			$query = $appUserSQL->UpdateClips($appUser);
			$this->logger->debug($query);
			try
			{
				$this->mysqli->query($query);
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
			$this->logger->debug("END");
			return true;
		}




		///*****************************************************************
		///<summary>
		///Method Name: Update
		///Description: Update Record in the Database
		///</summary>
		///*****************************************************************

		public function UpdateHearts($appUser, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$appUserSQL = new AppUserSQL($this->userInfo, $this->mysqli);
			$query = $appUserSQL->UpdateHearts($appUser);
			$this->logger->debug($query);
			try
			{
				$this->mysqli->query($query);
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
			$this->logger->debug("END");
			return true;
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectFollowers
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectFollowers($AppUserID, $LoggedInAppUserID, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$appUserSQL = new AppUserSQL($this->userInfo, $this->mysqli);
			$query = $appUserSQL->SelectFollowers($AppUserID, $LoggedInAppUserID);
			$this->logger->debug($query);
			try
			{
				$result = $this->mysqli->query($query);
				$appUserAssembler = new AppUserAssembler($this->userInfo);
				$appUsers = $appUserAssembler->AssembleAppUserList($result);
				$this->logger->debug("END");
				return $appUsers;
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectFollowing
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectFollowing($AppUserID, $LoggedInAppUserID, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$appUserSQL = new AppUserSQL($this->userInfo, $this->mysqli);
			$query = $appUserSQL->SelectFollowing($AppUserID, $LoggedInAppUserID);
			$this->logger->debug($query);
			try
			{
				$result = $this->mysqli->query($query);
				$appUserAssembler = new AppUserAssembler($this->userInfo);
				$appUsers = $appUserAssembler->AssembleAppUserList($result);
				$this->logger->debug("END");
				return $appUsers;
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: Update
		///Description: Update Record in the Database
		///</summary>
		///*****************************************************************

		public function UpdateFollowers($appUser, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$appUserSQL = new AppUserSQL($this->userInfo, $this->mysqli);
			$query = $appUserSQL->UpdateFollowers($appUser);
			$this->logger->debug($query);
			try
			{
				$this->mysqli->query($query);
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
			$this->logger->debug("END");
			return true;
		}




		///*****************************************************************
		///<summary>
		///Method Name: Update
		///Description: Update Record in the Database
		///</summary>
		///*****************************************************************

		public function UpdateFollowing($appUser, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$appUserSQL = new AppUserSQL($this->userInfo, $this->mysqli);
			$query = $appUserSQL->UpdateFollowing($appUser);
			$this->logger->debug($query);
			try
			{
				$this->mysqli->query($query);
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
			$this->logger->debug("END");
			return true;
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectWhoToFollow
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectWhoToFollow($AppUserID, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$appUserSQL = new AppUserSQL($this->userInfo, $this->mysqli);
			$query = $appUserSQL->SelectWhoToFollow($AppUserID);
			$this->logger->debug($query);
			try
			{
				$result = $this->mysqli->query($query);
				$appUserAssembler = new AppUserAssembler($this->userInfo);
				$appUsers = $appUserAssembler->AssembleList($result);
				$this->logger->debug("END");
				return $appUsers;
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: Update
		///Description: Update Record in the Database
		///</summary>
		///*****************************************************************

		public function UpdateBuys($appUser, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$appUserSQL = new AppUserSQL($this->userInfo, $this->mysqli);
			$query = $appUserSQL->UpdateBuys($appUser);
			$this->logger->debug($query);
			try
			{
				$this->mysqli->query($query);
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
			$this->logger->debug("END");
			return true;
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectByAppUserIDAndLoggedInAppUserID
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByAppUserIDAndLoggedInAppUserID($AppUserID, $LoggedInAppUserID, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$appUserSQL = new AppUserSQL($this->userInfo, $this->mysqli);
			$query = $appUserSQL->SelectByAppUserIDAndLoggedInAppUserID($AppUserID, $LoggedInAppUserID);
			$this->logger->debug($query);
			try
			{
				$result = $this->mysqli->query($query);
				$appUserAssembler = new AppUserAssembler($this->userInfo);
				return $appUserAssembler->AssembleAppUserDetail($result);
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
		}


	}
?>
