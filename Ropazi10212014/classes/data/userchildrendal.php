<?php
	include_once("basedal.php");
	include_once("userchildrensql.php");
	include_once("userchildrenassembler.php");
	include_once("classes/domain/userchildren.php");


	///*****************************************************************
	///<summary>
	///Class Name: UserChildren
	///Description: Data Access Layer
	///</summary>
	///*****************************************************************

	class UserChildrenDAL extends BaseDAL
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
		///Method Name: Insert
		///Description: Adds new Record to the Database
		///</summary>
		///*****************************************************************

		public function InsertUserChildren($userChildren, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$userChildrenSQL = new UserChildrenSQL($this->userInfo, $this->mysqli);
			$query = $userChildrenSQL->InsertUserChildren($userChildren);
			$this->logger->debug($query);
			try
			{
				$this->mysqli->query($query);
				$userChildren->setUserChildrenID($this->mysqli->insert_id);
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

		public function UpdateUserChildren($userChildren, $transactionContext)
		{
			$this->logger->debug("START");
			$this->InitializeDatabase($transactionContext);
			$userChildrenSQL = new UserChildrenSQL($this->userInfo, $this->mysqli);
			$query = $userChildrenSQL->UpdateUserChildren($userChildren);
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
			$userChildrenSQL = new UserChildrenSQL($this->userInfo, $this->mysqli);
			$query = $userChildrenSQL->SelectByAppUserID($AppUserID);
			$this->logger->debug($query);
			try
			{
				$result = $this->mysqli->query($query);
				$userChildrenAssembler = new UserChildrenAssembler($this->userInfo);
				$userChildren = $userChildrenAssembler->AssembleList($result);
				$this->logger->debug("END");
				return $userChildren;
			}
			catch (Exception $ex)
			{
				$this->logger->error($query . "\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString());
				throw ex;
			}
		}


	}
?>
