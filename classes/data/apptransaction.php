<?php

	include_once("classes/utils/constants.php");


	///*****************************************************************
	///<summary>
	///Class Name: AppTransaction
	///Description: Data Access Layer
	///</summary>
	///*****************************************************************

	class AppTransaction
	{
		private $mysqli;
		///*****************************************************************
		///<summary>
		///Constructor for AppTransaction
		///</summary>
		///*****************************************************************

		public function __construct()
		{
			$this->mysqli = new mysqli(Constants::$DBSERVER, Constants::$DBUSER,Constants::$DBPASSWORD, Constants::$DBNAMESPACE);
		}
        
		///*****************************************************************
		///<summary>
		///Method Name: Get Transaction
		///Description: Returns the transaction object
		///</summary>
		///*****************************************************************
        public function BeginTransaction()
        {
            $this->mysqli->autocommit(FALSE);
        }
		///*****************************************************************
		///<summary>
		///Method Name: Close Connection
		///Description: Close the Connection
		///</summary>
		///*****************************************************************
        public function CloseConnection()
        {
            $this->mysqli->close();
        }
        
		
		///*****************************************************************
		///<summary>
		///Method Name: Get Database
		///Description: Returns the db object
		///</summary>
		///*****************************************************************

		public function GetMySQLi()
		{
			return $this->mysqli;
		}


		///*****************************************************************
		///<summary>
		///Method Name: CommitTransaction
		///Description: Commits the transaction
		///</summary>
		///*****************************************************************

		public function CommitTransaction()
		{
			$this->mysqli->commit();
			$this->mysqli->close();
		}




		///*****************************************************************
		///<summary>
		///Method Name: RollbackTransaction
		///Description: Commits the transaction
		///</summary>
		///*****************************************************************

		public function RollbackTransaction()
		{
			$this->mysqli->rollback();	
		}


	}
?>
