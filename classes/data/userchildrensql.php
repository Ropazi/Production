<?php


	include_once("basedal.php");


	///*****************************************************************
	///<summary>
	///Class Name: SQL
	///Description: Queries
	///</summary>
	///*****************************************************************

	class UserChildrenSQL extends BaseDAL
	{
		private $_UserInfo;



		///*****************************************************************
		///<summary>
		///Constructor for UserChildrenSQL
		///</summary>
		///*****************************************************************

		public function __construct($userInfo, $mysqli)
		{
			$this->_UserInfo = $userInfo;
			$this->mysqli = $mysqli;
		}




		///*****************************************************************
		///<summary>
		///Method Name: InsertUserChildren
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function InsertUserChildren($_userchildren)
		{
			$query = "insert into userchildren(";
			$query .= "appuserid,";
			$query .= "gender,";
			$query .= "dateofbirth,";
			$query .= "displayage,";
			$query .= "age";
			$query .= ")";
			$query .= " values (";
			$query .= $_userchildren->getAppUserID() . ",  ";
			$query .= "'" . $this->CheckString($_userchildren->getGender()) . "', ";
			$query .= "'" . $this->CheckString($_userchildren->getDateOfBirth()) . "', ";
			$query .= "'" . $this->CheckString($_userchildren->getDisplayAge()) . "', ";
			$query .= $_userchildren->getAge() . " ";
			$query .= " )";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: UpdateUserChildren
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function UpdateUserChildren($_userchildren)
		{
			$query = "update userchildren set ";
			$query .= "gender = '" . $this->CheckString($_userchildren->getGender()) . "', ";
			$query .= "dateofbirth = '" . $this->CheckString($_userchildren->getDateOfBirth()) . "', ";
			$query .= "displayage = '" . $this->CheckString($_userchildren->getDisplayAge()) . "', ";
			$query .= "age = " . $_userchildren->getAge() . " ";
			$query .= " where userchildrenid = " . $_userchildren->getUserChildrenID();
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: SelectByAppUserID
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SelectByAppUserID($AppUserID)
		{
			$query = "select * from userchildren where appuserid = '" . $AppUserID . "'";
			return $query;
		}
	}
?>
