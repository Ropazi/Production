<?php


	include_once("basedal.php");


	///*****************************************************************
	///<summary>
	///Class Name: SQL
	///Description: Queries
	///</summary>
	///*****************************************************************

	class UserHeartSQL extends BaseDAL
	{
		private $_UserInfo;



		///*****************************************************************
		///<summary>
		///Constructor for UserHeartSQL
		///</summary>
		///*****************************************************************

		public function __construct($userInfo, $mysqli)
		{
			$this->_UserInfo = $userInfo;
			$this->mysqli = $mysqli;
		}




		///*****************************************************************
		///<summary>
		///Method Name: InsertUserHeart
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function InsertUserHeart($_userheart)
		{
			$query = "insert into userhearts(";
			$query .= "appuserid,";
			$query .= "heartedbyappuserid,";
			$query .= "createdate,";
			$query .= "isvalid";
			$query .= ")";
			$query .= " values (";
			$query .= $_userheart->getAppUserID() . ",  ";
			$query .= $_userheart->getHeartedByAppUserID() . ",  ";
			$query .= $this->CheckDate($_userheart->getCreateDate()). " , ";
			$query .= $this->CheckBoolean($_userheart->getIsValid()) ;
			$query .= " )";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: UpdateUserHeart
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function UpdateUserHeart($_userheart)
		{
			$query = "update userhearts set ";
			$query .= "isvalid = " . $this->CheckBoolean($_userheart->getIsValid()) . " , ";
			$query .= "removedate = " . $this->CheckDate($_userheart->getRemoveDate()) . "";
			$query .= " where userheartid = " . $_userheart->getUserHeartID();
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
			$query = "select * from userhearts where appuserid = '" . $AppUserID . "'";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: SelectByHeartedByAppUserID
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SelectByHeartedByAppUserID($HeartedByAppUserID)
		{
			$query = "select * from userhearts where heartedbyappuserid = '" . $HeartedByAppUserID . "'";
			return $query;
		}


		///*****************************************************************
		///<summary>
		///Method Name: SelectByAppUserAndHeart
		///Description: Search Method
		///</summary>
		///*****************************************************************

		public function SelectByAppUserAndHeart($AppUserID, $HeartedByAppUserID)
		{
			$query = "select * from userhearts where appuserid = '" . $AppUserID . "' and heartedbyappuserid = '" . $HeartedByAppUserID . "'";
			return $query;
		}
	}
?>
