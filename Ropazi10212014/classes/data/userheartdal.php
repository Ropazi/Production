<?php
	include_once("basedal.php");
	include_once("userheartsql.php");
	include_once("userheartassembler.php");
	include_once("classes/domain/userheart.php");


	///*****************************************************************
	///<summary>
	///Class Name: UserHeart
	///Description: Data Access Layer
	///</summary>
	///*****************************************************************

	class UserHeartDAL extends BaseDAL
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
		///Method Name: Insert
		///Description: Adds new Record to the Database
		///</summary>
		///*****************************************************************

		public function InsertUserHeart($userHeart, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$userHeartSQL = new UserHeartSQL($this->userInfo, $this->mysqli);
			$query = $userHeartSQL->InsertUserHeart($userHeart);
			$this->logger->debug($query);
			try
			{
				$this->mysqli->query($query);
				$userHeart->setUserHeartID($this->mysqli->insert_id);
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

		public function UpdateUserHeart($userHeart, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$userHeartSQL = new UserHeartSQL($this->userInfo, $this->mysqli);
			$query = $userHeartSQL->UpdateUserHeart($userHeart);
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
			$userHeartSQL = new UserHeartSQL($this->userInfo, $this->mysqli);
			$query = $userHeartSQL->SelectByAppUserID($AppUserID);
			$this->logger->debug($query);
			try
			{
				$result = $this->mysqli->query($query);
				$userHeartAssembler = new UserHeartAssembler($this->userInfo);
				$userHearts = $userHeartAssembler->AssembleList($result);
				$this->logger->debug("END");
				return $userHearts;
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectByHeartedByAppUserID
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByHeartedByAppUserID($HeartedByAppUserID, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$userHeartSQL = new UserHeartSQL($this->userInfo, $this->mysqli);
			$query = $userHeartSQL->SelectByHeartedByAppUserID($HeartedByAppUserID);
			$this->logger->debug($query);
			try
			{
				$result = $this->mysqli->query($query);
				$userHeartAssembler = new UserHeartAssembler($this->userInfo);
				$userHearts = $userHeartAssembler->AssembleList($result);
				$this->logger->debug("END");
				return $userHearts;
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
		}




		///*****************************************************************
		///<summary>
		///Method Name: SelectByAppUserAndHeart
		///Description: Select Method
		///</summary>
		///*****************************************************************

		public function SelectByAppUserAndHeart($AppUserID, $HeartedByAppUserID, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$userHeartSQL = new UserHeartSQL($this->userInfo, $this->mysqli);
			$query = $userHeartSQL->SelectByAppUserAndHeart($AppUserID, $HeartedByAppUserID);
			$this->logger->debug($query);
			try
			{
				$result = $this->mysqli->query($query);
				$userHeartAssembler = new UserHeartAssembler($this->userInfo);
				return $userHeartAssembler->AssembleUserHeart($result);
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
		}


	}
?>
