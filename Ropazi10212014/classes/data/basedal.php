<?php

	include_once("classes/utils/constants.php");
	///*****************************************************************
	///<summary>
	///Class Name: BaseDAL
	///Description: Base class of Data Access Layer
	///</summary>
	///*****************************************************************

	class BaseDAL
	{
		protected $mysqli;
		///*****************************************************************
		///<summary>
		///Method Name: getMySQLi
		///Description: return mySQL connection
		///</summary>
		///*****************************************************************

		public function getMySQLi()
		{
			$this->mysqli =  new mysqli(Constants::$DBSERVER, Constants::$DBUSER,Constants::$DBPASSWORD, Constants::$DBNAMESPACE);
			return $this->mysqli;
		}
		///*****************************************************************
		///<summary>
		///Method Name: CloseConnection
		///Description: Closes the mySQL connection
		///</summary>
		///*****************************************************************

		public function CloseConnection()
		{
			$this->mysqli->close();
		}
		///*****************************************************************
		///<summary>
		///Method Name: Initialize Database
		///Description: return mySQL connection
		///</summary>
		///*****************************************************************
		
		public function InitializeDatabase($transactionContext)
		{
			if ($transactionContext == NULL){
				return $this->getMySQLi();
			}
			else {
				$this->mysqli = $transactionContext->GetMySQLi();
				return $this->mysqli;
			}
		}
		///*****************************************************************
		///<summary>
		///Method Name: CheckString
		///Description: SQL Injection check
		///</summary>
		///*****************************************************************
		
		public function CheckString($str)
		{
			return mysqli_real_escape_string($this->mysqli, $str);
		}
		///*****************************************************************
		///<summary>
		///Method Name: CheckString
		///Description: SQL Injection check
		///</summary>
		///*****************************************************************
		
		public function CheckDate($date)
		{
			if ($date == NULL){
				return "null";
			}
			return "'" . $date->format('Y-m-d H:i:s') . "'";
		}
		///*****************************************************************
		///<summary>
		///Method Name: CheckBoolean
		///Description: Boolean to Bit
		///</summary>
		///*****************************************************************
		
		public function CheckBoolean($bool)
		{
			if ($bool == NULL){
				return "0";
			}
			else if ($bool == TRUE){
				return "1";
			}
			else {
				return "0";
			}
		}
		///*****************************************************************
		///<summary>
		///Method Name: CheckNumeric
		///Description: Currency
		///</summary>
		///*****************************************************************
		
		public function CheckNumeric($numeric)
		{
			if ($numeric == NULL){
				return "0";
			}
			else if ($numeric == ""){
				return "0";
			}
			else {
				return $numeric;
			}
		}
	}
?>