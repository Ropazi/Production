<?php
	include_once("basedal.php");
	include_once("postsharesql.php");
	include_once("postshareassembler.php");
	include_once("classes/domain/postshare.php");


	///*****************************************************************
	///<summary>
	///Class Name: PostShare
	///Description: Data Access Layer
	///</summary>
	///*****************************************************************

	class PostShareDAL extends BaseDAL
	{
		private $userInfo;
		private $logger;


		///*****************************************************************
		///<summary>
		///Constructor for PostShare
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

		public function InsertPostShare($postShare, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$postShareSQL = new PostShareSQL($this->userInfo, $this->mysqli);
			$query = $postShareSQL->InsertPostShare($postShare);
			$this->logger->debug($query);
			try
			{
				$this->mysqli->query($query);
				$postShare->setPostShareID($this->mysqli->insert_id);
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

		public function UpdatePostShare($postShare, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$postShareSQL = new PostShareSQL($this->userInfo, $this->mysqli);
			$query = $postShareSQL->UpdatePostShare($postShare);
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
		///Method Name: SelectByPostID
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByPostID($PostID, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$postShareSQL = new PostShareSQL($this->userInfo, $this->mysqli);
			$query = $postShareSQL->SelectByPostID($PostID);
			$this->logger->debug($query);
			try
			{
				$result = $this->mysqli->query($query);
				$postShareAssembler = new PostShareAssembler($this->userInfo);
				$postShares = $postShareAssembler->AssembleList($result);
				$this->logger->debug("END");
				return $postShares;
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
			$postShareSQL = new PostShareSQL($this->userInfo, $this->mysqli);
			$query = $postShareSQL->SelectByAppUserID($AppUserID);
			$this->logger->debug($query);
			try
			{
				$result = $this->mysqli->query($query);
				$postShareAssembler = new PostShareAssembler($this->userInfo);
				$postShares = $postShareAssembler->AssembleList($result);
				$this->logger->debug("END");
				return $postShares;
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
		}


	}
?>
