<?php


	include_once("basedal.php");


	///*****************************************************************
	///<summary>
	///Class Name: SQL
	///Description: Queries
	///</summary>
	///*****************************************************************

	class ConfigParameterSQL extends BaseDAL
	{
		private $_UserInfo;



		///*****************************************************************
		///<summary>
		///Constructor for ConfigParameterSQL
		///</summary>
		///*****************************************************************

		public function __construct($userInfo, $mysqli)
		{
			$this->_UserInfo = $userInfo;
			$this->mysqli = $mysqli;
		}




		///*****************************************************************
		///<summary>
		///Method Name: InsertConfigParameter
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function InsertConfigParameter($_configparameter)
		{
			$query = "insert into configparameters(";
			$query .= "parametername,";
			$query .= "parametervalue,";
			$query .= "datemodified,";
			$query .= "comments";
			$query .= ")";
			$query .= " values (";
			$query .= "'" . $this->CheckString($_configparameter->getParameterName()) . "', ";
			$query .= "'" . $this->CheckString($_configparameter->getParameterValue()) . "', ";
			$query .= $this->CheckDate($_configparameter->getDateModified()). " , ";
			$query .= "'" . $this->CheckString($_configparameter->getComments()) . "'";
			$query .= " )";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: UpdateConfigParameter
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function UpdateConfigParameter($_configparameter)
		{
			$query = "update configparameters set ";
			$query .= "parametername = '" . $this->CheckString($_configparameter->getParameterName()) . "', ";
			$query .= "parametervalue = '" . $this->CheckString($_configparameter->getParameterValue()) . "', ";
			$query .= "datemodified = " . $this->CheckDate($_configparameter->getDateModified()) . ", ";
			$query .= "comments = '" . $this->CheckString($_configparameter->getComments()) . "'";
			$query .= " where parameterid = " . $_configparameter->getParameterID();
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: SelectByParameterName
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SelectByParameterName($ParameterName)
		{
			$query = "select * from configparameters where parametername = '" . $ParameterName . "'";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: SearchConfigParameter
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SearchConfigParameter($ParameterName, $sortBy, $sortDirection, $PageSize, $PageIndex)
		{
			$query = "select * from configparameters";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: SelectByParameterID
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SelectByParameterID($ParameterID)
		{
			$query = "select * from configparameters where parameterid = '" . $ParameterID . "'";
			return $query;
		}
	}
?>
