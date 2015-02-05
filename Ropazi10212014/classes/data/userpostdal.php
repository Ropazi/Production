<?php
	include_once("basedal.php");
	include_once("userpostsql.php");
	include_once("userpostassembler.php");
	include_once("classes/domain/userpost.php");


	///*****************************************************************
	///<summary>
	///Class Name: UserPost
	///Description: Data Access Layer
	///</summary>
	///*****************************************************************

	class UserPostDAL extends BaseDAL
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
		///Method Name: Insert
		///Description: Adds new Record to the Database
		///</summary>
		///*****************************************************************

		public function InsertUserPost($userPost, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$userPostSQL = new UserPostSQL($this->userInfo, $this->mysqli);
			$query = $userPostSQL->InsertUserPost($userPost);
			$this->logger->debug($query);
			try
			{
				$this->mysqli->query($query);
				$userPost->setUserPostID($this->mysqli->insert_id);
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
		///Method Name: SelectByPostID
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByPostID($PostID, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$userPostSQL = new UserPostSQL($this->userInfo, $this->mysqli);
			$query = $userPostSQL->SelectByPostID($PostID);
			$this->logger->debug($query);
			try
			{
				$result = $this->mysqli->query($query);
				$userPostAssembler = new UserPostAssembler($this->userInfo);
				$userPosts = $userPostAssembler->AssembleList($result);
				$this->logger->debug("END");
				return $userPosts;
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
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
			$userPostSQL = new UserPostSQL($this->userInfo, $this->mysqli);
			$query = $userPostSQL->SelectByAppUserID($AppUserID);
			$this->logger->debug($query);
			try
			{
				$result = $this->mysqli->query($query);
				$userPostAssembler = new UserPostAssembler($this->userInfo);
				$userPosts = $userPostAssembler->AssembleList($result);
				$this->logger->debug("END");
				return $userPosts;
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectExistingPost
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectExistingPost($PostID, $AppUserID, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$userPostSQL = new UserPostSQL($this->userInfo, $this->mysqli);
			$query = $userPostSQL->SelectExistingPost($PostID, $AppUserID);
			$this->logger->debug($query);
			try
			{
				$result = $this->mysqli->query($query);
				$userPostAssembler = new UserPostAssembler($this->userInfo);
				return $userPostAssembler->AssembleUserPost($result);
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

		public function UpdateUserPost($userPost, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$userPostSQL = new UserPostSQL($this->userInfo, $this->mysqli);
			$query = $userPostSQL->UpdateUserPost($userPost);
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

		public function UpdateUserCatalog($userPost, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$userPostSQL = new UserPostSQL($this->userInfo, $this->mysqli);
			$query = $userPostSQL->UpdateUserCatalog($userPost);
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


	}
?>
