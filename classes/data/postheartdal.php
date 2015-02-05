<?php
	include_once("basedal.php");
	include_once("postheartsql.php");
	include_once("postheartassembler.php");
	include_once("classes/domain/postheart.php");


	///*****************************************************************
	///<summary>
	///Class Name: PostHeart
	///Description: Data Access Layer
	///</summary>
	///*****************************************************************

	class PostHeartDAL extends BaseDAL
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
		///Method Name: Insert
		///Description: Adds new Record to the Database
		///</summary>
		///*****************************************************************

		public function InsertPostHeart($postHeart, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$postHeartSQL = new PostHeartSQL($this->userInfo, $this->mysqli);
			$query = $postHeartSQL->InsertPostHeart($postHeart);
			$this->logger->debug($query);
			try
			{
				$this->mysqli->query($query);
				$postHeart->setHeartID($this->mysqli->insert_id);
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

		public function UpdatePostHeart($postHeart, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$postHeartSQL = new PostHeartSQL($this->userInfo, $this->mysqli);
			$query = $postHeartSQL->UpdatePostHeart($postHeart);
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
		///Method Name: SelectByAppUserID
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByAppUserID($AppUserID, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$postHeartSQL = new PostHeartSQL($this->userInfo, $this->mysqli);
			$query = $postHeartSQL->SelectByAppUserID($AppUserID);
			$this->logger->debug($query);
			try
			{
				$result = $this->mysqli->query($query);
				$postHeartAssembler = new PostHeartAssembler($this->userInfo);
				$postHearts = $postHeartAssembler->AssembleList($result);
				$this->logger->debug("END");
				return $postHearts;
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
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
			$postHeartSQL = new PostHeartSQL($this->userInfo, $this->mysqli);
			$query = $postHeartSQL->SelectByPostID($PostID);
			$this->logger->debug($query);
			try
			{
				$result = $this->mysqli->query($query);
				$postHeartAssembler = new PostHeartAssembler($this->userInfo);
				$postHearts = $postHeartAssembler->AssembleList($result);
				$this->logger->debug("END");
				return $postHearts;
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectByAppUserAndPost
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByAppUserAndPost($AppUserID, $PostID, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$postHeartSQL = new PostHeartSQL($this->userInfo, $this->mysqli);
			$query = $postHeartSQL->SelectByAppUserAndPost($AppUserID, $PostID);
			$this->logger->debug($query);
			try
			{
				$result = $this->mysqli->query($query);
				$postHeartAssembler = new PostHeartAssembler($this->userInfo);
				return $postHeartAssembler->AssemblePostHeart($result);
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
		}


	}
?>
