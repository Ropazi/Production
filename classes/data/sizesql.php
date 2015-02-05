<?php


	include_once("basedal.php");


	///*****************************************************************
	///<summary>
	///Class Name: SQL
	///Description: Queries
	///</summary>
	///*****************************************************************

	class SizeSQL extends BaseDAL
	{
		private $_UserInfo;



		///*****************************************************************
		///<summary>
		///Constructor for SizeSQL
		///</summary>
		///*****************************************************************

		public function __construct($userInfo, $mysqli)
		{
			$this->_UserInfo = $userInfo;
			$this->mysqli = $mysqli;
		}




		///*****************************************************************
		///<summary>
		///Method Name: SearchSize
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SearchSize($SizeName, $sortBy, $sortDirection, $PageSize, $PageIndex)
		{
			$query = "select * from sizes";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: InsertSize
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function InsertSize($_size)
		{
			$query = "insert into sizes(";
			$query .= "sizename";
			$query .= ")";
			$query .= " values (";
			$query .= "'" . $this->CheckString($_size->getSizeName()) . "'";
			$query .= " )";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: UpdateSize
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function UpdateSize($_size)
		{
			$query = "update sizes set ";
			$query .= "sizename = '" . $this->CheckString($_size->getSizeName()) . "'";
			$query .= " where sizeid = " . $_size->getSizeID();
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: SelectBySizeID
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SelectBySizeID($SizeID)
		{
			$query = "select * from sizes where sizeid = '" . $SizeID . "'";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: SelectAllSize
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SelectAllSize()
		{
			$query = "select * from sizes w order by sizename asc";
			return $query;
		}
	}
?>
