<?php
	include_once("basedal.php");
	include_once("posttagsql.php");
	include_once("posttagassembler.php");
	include_once("classes/domain/posttag.php");


	///*****************************************************************
	///<summary>
	///Class Name: PostTag
	///Description: Data Access Layer
	///</summary>
	///*****************************************************************

	class PostTagDAL extends BaseDAL
	{
		private $userInfo;
		private $logger;


		///*****************************************************************
		///<summary>
		///Constructor for PostTag
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

		public function InsertPostTag($postTag, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$postTagSQL = new PostTagSQL($this->userInfo, $this->mysqli);
			$query = $postTagSQL->InsertPostTag($postTag);
			$this->logger->debug($query);
			try
			{
				$this->mysqli->query($query);
				$postTag->setTagID($this->mysqli->insert_id);
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

		public function UpdatePostTag($postTag, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$postTagSQL = new PostTagSQL($this->userInfo, $this->mysqli);
			$query = $postTagSQL->UpdatePostTag($postTag);
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
			$postTagSQL = new PostTagSQL($this->userInfo, $this->mysqli);
			$query = $postTagSQL->SelectByPostID($PostID);
			$this->logger->debug($query);
			try
			{
				$result = $this->mysqli->query($query);
				$postTagAssembler = new PostTagAssembler($this->userInfo);
				$postTags = $postTagAssembler->AssembleList($result);
				$this->logger->debug("END");
				return $postTags;
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectNotViewedByAppUserID
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectNotViewedByAppUserID($AppUserID, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$postTagSQL = new PostTagSQL($this->userInfo, $this->mysqli);
			$query = $postTagSQL->SelectNotViewedByAppUserID($AppUserID);
			$this->logger->debug($query);
			try
			{
				$result = $this->mysqli->query($query);
				$postTagAssembler = new PostTagAssembler($this->userInfo);
				$postTags = $postTagAssembler->AssembleList($result);
				$this->logger->debug("END");
				return $postTags;
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectViewedByAppUserID
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectViewedByAppUserID($AppUserID, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$postTagSQL = new PostTagSQL($this->userInfo, $this->mysqli);
			$query = $postTagSQL->SelectViewedByAppUserID($AppUserID);
			$this->logger->debug($query);
			try
			{
				$result = $this->mysqli->query($query);
				$postTagAssembler = new PostTagAssembler($this->userInfo);
				$postTags = $postTagAssembler->AssembleList($result);
				$this->logger->debug("END");
				return $postTags;
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
		}


	}
?>
